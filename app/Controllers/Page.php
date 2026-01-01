<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\SubKriteriaModel;
use App\Models\PenilaianModel;
use App\Models\UserModel;
use App\Models\BookmarkModel;

class Page extends BaseController
{

    public function index()
    {
        $alternatifModel   = new AlternatifModel();
        $penilaianModel    = new PenilaianModel();
        $kriteriaModel     = new KriteriaModel();
        $subKriteriaModel  = new SubKriteriaModel();

        // Ambil semua kategori untuk dropdown
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Ambil semua data dasar
        $alternatif = $alternatifModel->findAll();
        $kriteria   = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $penilaianAll = $penilaianModel->findAll();

        // Siapkan bobot & tipe kriteria
        $weights = [];
        $types   = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float) $k['bobot'];
            $types[$k['kode_kriteria']]   = strtolower($k['type']);
        }

        // Hitung max & min tiap C
        $maxVal = [];
        $minVal = [];
        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $col  = array_column($penilaianAll, $kode);
            $maxVal[$kode] = max($col);
            $minVal[$kode] = min($col);
        }

        // Normalisasi & hitung skor total
        $penilaian = [];
        foreach ($penilaianAll as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        $scores = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata'];
            $nama     = $alt['nama_wisata'];

            $row = $penilaian[$idWisata] ?? null;
            $total = 0;

            if ($row) {
                for ($i = 1; $i <= 15; $i++) {
                    $kode  = 'C' . $i;
                    $nilai = (float)($row[$kode] ?? 0);
                    $bobot = $weights[$kode] ?? 0;

                    if (($types[$kode] ?? 'benefit') === 'cost') {
                        $norm = $nilai > 0 ? $minVal[$kode] / $nilai : 0;
                    } else {
                        $norm = $maxVal[$kode] > 0 ? $nilai / $maxVal[$kode] : 0;
                    }

                    $total += $norm * $bobot;
                }
            }

            $scores[$idWisata] = [
                'nama' => $nama,
                'id_wisata' => $idWisata,
                'total' => $total
            ];
        }

        // Urutkan berdasarkan ranking
        uasort($scores, fn($a, $b) => $b['total'] <=> $a['total']);

        // Gabungkan dengan data asli wisata
        $rankedWisata = [];
        $rank = 1;
        foreach ($scores as $id => $s) {
            $data = array_filter($alternatif, fn($a) => $a['id_wisata'] === $s['id_wisata']);
            $data = reset($data);
            if ($data) {
                $data['rank'] = $rank++;
                $data['total'] = number_format($s['total'], 3, ',', '.');
                $rankedWisata[] = $data;
            }
        }

        // --- Pagination Manual ---
        $perPage = 5;
        $page = (int)($this->request->getGet('page') ?? 1);
        $offset = ($page - 1) * $perPage;
        $paginatedWisata = array_slice($rankedWisata, $offset, $perPage);
        $totalPages = ceil(count($rankedWisata) / $perPage);

        return view('template/index', [
            'kategori' => $kategori,
            'wisata' => $rankedWisata,
            'totalPages' => 1,
            'currentPage' => 1,
            'kategoriDipilih' => null
        ]);
    }


    public function home()
    {
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to('/');
        }

        $wisataModel    = new AlternatifModel();   // tbl_alternatif
        $penilaianModel = new PenilaianModel();    // tbl_penilaian
        $kriteriaModel  = new KriteriaModel();     // tbl_kriteria
        $subKriteriaModel = new SubKriteriaModel(); // tbl_sub_kriteria

        // Hitung total data
        $totalAlternatif  = $wisataModel->countAllResults(false);
        $totalKriteria    = $kriteriaModel->countAllResults(false);
        $totalSubKriteria = $subKriteriaModel->countAllResults(false);

        // Alternatif
        $alternatif = $wisataModel->findAll();

        // Kriteria
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $weights = [];
        $types   = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float) $k['bobot'];
            $types[$k['kode_kriteria']]   = strtolower($k['type']); // Benefit/Cost
        }

        // Penilaian
        $penilaianAll = $penilaianModel->findAll();
        $penilaian = [];
        foreach ($penilaianAll as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        // Hitung max & min tiap C
        $maxVal = [];
        $minVal = [];
        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $col  = array_column($penilaianAll, $kode);
            $maxVal[$kode] = max($col);
            $minVal[$kode] = min($col);
        }

        // Hitung skor total tiap alternatif
        $scores = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata']; // ini kunci join
            $nama     = $alt['nama_wisata'];

            $row = $penilaian[$idWisata] ?? null;

            $total = 0;
            if ($row) {
                for ($i = 1; $i <= 15; $i++) {
                    $kode  = 'C' . $i;
                    $nilai = (float)($row[$kode] ?? 0);
                    $bobot = $weights[$kode] ?? 0;

                    if (($types[$kode] ?? 'benefit') === 'cost') {
                        $norm = $nilai > 0 ? $minVal[$kode] / $nilai : 0;
                    } else {
                        $norm = $maxVal[$kode] > 0 ? $nilai / $maxVal[$kode] : 0;
                    }

                    $total += $norm * $bobot;
                }
            }

            $scores[$idWisata] = [
                'nama'  => $nama,
                'id_wisata'  => $idWisata,
                'total' => $total
            ];
        }

        // Ranking
        uasort($scores, fn($a, $b) => $b['total'] <=> $a['total']);

        $ranked = [];
        $rank = 1;
        foreach ($scores as $id => $s) {
            $ranked[] = [
                'nama'  => $s['nama'],
                'id_wisata'  => $s['id_wisata'],
                'total' => number_format($s['total'], 3, ',', '.'),
                'rank'  => $rank++
            ];
        }

        //    Pagination 5 perdata
        $perPage = 5;
        $page    = (int) ($this->request->getGet('page') ?? 1);
        $total   = count($ranked);
        $start   = ($page - 1) * $perPage;

        $rankedPaginated = array_slice($ranked, $start, $perPage);

        $totalPages = ceil($total / $perPage);


        return view('template/home', [
            'ranked'          => $rankedPaginated,
            'totalAlternatif' => $totalAlternatif,
            'totalKriteria'   => $totalKriteria,
            'totalSubKriteria' => $totalSubKriteria,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }

    public function dataAlternatif()
    {
        // return view('template/data_alternatif');
        $alternatifModel = new AlternatifModel();

        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        $kategoriDipilih = $this->request->getGet('kategori');
        $search = $this->request->getGet('search');

        $wisata = [];

        // Filter search
        if (!empty($search)) {
            $alternatifModel->groupStart()
                ->like('nama_wisata', $search)
                ->orLike('deskripsi', $search)
                ->orLike('kategori_wisata', $search)
                ->groupEnd();
        }

        if ($kategoriDipilih) {
            $wisata = $alternatifModel->where('kategori_wisata', $kategoriDipilih)->findAll();
        } else {
            $wisata = $alternatifModel->findAll();
        }

        return view('template/data_alternatif', [
            'kategori'        => $kategori,
            'wisata'          => $wisata,
            'kategoriDipilih' => $kategoriDipilih,
            'search'          => $search
        ]);
    }
    public function dataKriteria()
    {
        // $kriteriaModel = new KriteriaModel();

        // $kriter = $kriteriaModel
        //     ->select('tbl_kriteria.id, tbl_kriteria.kode_kriteria, tbl_kriteria.nama_kriteria, tbl_kriteria.kategori_utama, tbl_kriteria.bobot, tbl_sub_kriteria.type')
        //     ->join('tbl_sub_kriteria', 'tbl_sub_kriteria.kode_kriteria = tbl_kriteria.kode_kriteria', 'left')
        //     ->groupBy('tbl_kriteria.kode_kriteria')
        //     ->orderBy('id', 'ASC')->findAll();

        // return view('template/data_kriteria', [
        //     'kriteria' => $kriter
        // ]);
        $kriteriaModel = new KriteriaModel();

        $search = $this->request->getGet('search');

        // base query
        $kriteriaModel->select('*')
            ->groupBy('kode_kriteria')
            ->orderBy('id', 'ASC');

        // apply search filter
        if (!empty($search)) {
            $kriteriaModel
                ->groupStart()
                ->like('kode_kriteria', $search)
                ->orLike('nama_kriteria', $search)
                ->orLike('type', $search)
                ->orLike('bobot', $search)
                ->groupEnd();
        }

        $kriter = $kriteriaModel->findAll();

        return view('template/data_kriteria', [
            'kriteria' => $kriter,
            'search' => $search
        ]);
    }

    public function dataSubKriteria()
    {
        $subKriteriaModel = new SubKriteriaModel();

        // Susun base query
        $subKriteriaModel
            ->select('tbl_sub_kriteria.*, tbl_kriteria.nama_kriteria')
            ->join('tbl_kriteria', 'tbl_kriteria.kode_kriteria = tbl_sub_kriteria.kode_kriteria')
            ->groupBy('tbl_sub_kriteria.kode_kriteria');

        // Ambil keyword
        $search = $this->request->getGet('search');

        // Terapkan filter SEARCH
        if (!empty($search)) {
            $subKriteriaModel
                ->groupStart()
                ->like('tbl_sub_kriteria.kode_kriteria', $search)
                ->orLike('tbl_kriteria.nama_kriteria', $search)
                ->orLike('tbl_kriteria.type', $search)
                ->orLike('tbl_kriteria.bobot', $search)
                ->groupEnd();
        }

        // Terakhir baru ambil data
        $subKriter = $subKriteriaModel->findAll();

        return view('template/data_sub_kriteria', [
            'kriteria' => $subKriter,
            'search'   => $search
        ]);
    }

    public function dataPenilaian()
    {
        $wisataModel    = new AlternatifModel();
        $penilaianModel = new PenilaianModel();
        $kriteriaModel  = new KriteriaModel();

        // Ambil kriteria
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();

        $search = $this->request->getGet('search');

        // Susun query base
        $wisataModel
            ->select('tbl_alternatif.id, tbl_alternatif.id_wisata, tbl_alternatif.nama_wisata, 
                  tbl_alternatif.kategori_wisata, tbl_alternatif.deskripsi, tbl_alternatif.gambar, 
                  tbl_alternatif.rating, tbl_penilaian.*')
            ->join('tbl_penilaian', 'tbl_penilaian.id_wisata = tbl_alternatif.id_wisata');

        // Terapkan SEARCH ke wisataModel (bukan kriteriaModel)
        if (!empty($search)) {
            $wisataModel
                ->groupStart()
                ->like('tbl_alternatif.nama_wisata', $search)
                ->orLike('tbl_alternatif.kategori_wisata', $search)
                ->orLike('tbl_alternatif.deskripsi', $search)
                ->groupEnd();
        }

        // Baru ambil hasil
        $alternatif = $wisataModel->findAll();

        // Susun ulang data penilaian
        $penilaian = [];
        foreach ($alternatif as $alt) {
            foreach ($kriteria as $k) {
                $kode = $k['kode_kriteria'];   // C1, C2, ...
                $penilaian[$alt['id']][$kode] = $alt[$kode] ?? 0;
            }
        }

        return view('template/data_penilaian', [
            'alternatif' => $alternatif,
            'kriteria'   => $kriteria,
            'penilaian'  => $penilaian,
            'search'     => $search
        ]);
    }


    public function dataPerhitungan()
    {
        $wisataModel     = new AlternatifModel();   // tbl_alternatif
        $kriteriaModel   = new KriteriaModel();     // tbl_kriteria
        $subKriteriaModel = new SubKriteriaModel();  // tbl_sub_kriteria
        $penilaianModel  = new PenilaianModel();    // tbl_penilaian

        $alternatif   = $wisataModel->findAll();
        $kriteria     = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $subKriteria  = $subKriteriaModel->orderBy('id', 'ASC')->findAll();

        // Group sub-kriteria per kriteria
        $subByK = [];
        foreach ($subKriteria as $s) {
            $subByK[$s['kode_kriteria']][] = $s;
        }

        // Ambil data penilaian (C1..C15) berdasarkan id_wisata
        $penilaian = [];
        foreach ($penilaianModel->findAll() as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        // STEP 1: Matriks Keputusan (X)
        $matrixX = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata'];
            $row = [];

            foreach ($kriteria as $k) {
                $kode = $k['kode_kriteria'];
                $rawValue = $penilaian[$idWisata][$kode] ?? 0; // ambil nilai dari tbl_penilaian
                $row[$kode] = is_numeric($rawValue) ? (float) $rawValue : 0;
            }

            $matrixX[$alt['id']] = [
                'nama'   => $alt['nama_wisata'],
                'values' => $row
            ];
        }

        // STEP 2: Normalisasi (R)
        $R = [];
        $maxPer = [];
        $minPer = [];

        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $vals = array_map(fn($a) => $a['values'][$kode], $matrixX);
            $maxPer[$kode] = max($vals);
            $minPer[$kode] = min($vals);
        }

        foreach ($matrixX as $id => $data) {
            $rrow = [];
            foreach ($kriteria as $k) {
                $kode = $k['kode_kriteria'];
                $xij  = $data['values'][$kode];

                $type = strtolower($k['kategori_utama']);
                if ($type === 'cost') {
                    $r = ($xij > 0) ? ($minPer[$kode] / $xij) : 0;
                } else {
                    $r = ($maxPer[$kode] > 0) ? ($xij / $maxPer[$kode]) : 0;
                }
                $rrow[$kode] = $r;
            }
            $R[$id] = ['nama' => $data['nama'], 'values' => $rrow];
        }

        // STEP 3: Hitung skor akhir (V)
        $weights = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float)$k['bobot'];
        }

        $scores = [];
        foreach ($R as $id => $d) {
            $v = 0;
            foreach ($kriteria as $k) {
                $kode = $k['kode_kriteria'];
                $v += $weights[$kode] * $d['values'][$kode];
            }
            $scores[$id] = ['nama' => $d['nama'], 'score' => $v];
        }

        // Urutkan skor
        uasort($scores, fn($a, $b) => $b['score'] <=> $a['score']);

        // STEP 4: Detail perhitungan (R, W, RW)
        $detail = [];
        foreach ($R as $id => $d) {
            foreach ($kriteria as $k) {
                $kode = $k['kode_kriteria'];
                $r = $d['values'][$kode];
                $w = $weights[$kode];
                $detail[$id][$kode] = [
                    'R'  => $r,
                    'W'  => $w,
                    'RW' => $r * $w,
                ];
            }
        }

        return view('template/data_perhitungan', [
            'kriteria'   => $kriteria,
            'matrixX'    => $matrixX,
            'R'          => $R,
            'scores'     => $scores,
            'weights'    => $weights,
            'detail'     => $detail,
        ]);
    }

    private function matchesSubCriteria($value, $subText)
    {
        $text = trim(str_replace(['–', '—', '−'], '-', $subText));
        $text = preg_replace('/\s+/', ' ', $text);

        if (preg_match('/^\s*>\s*([\d\.]+)/', $text, $m)) return floatval($value) > floatval($m[1]);
        if (preg_match('/^\s*<\s*([\d\.]+)/', $text, $m)) return floatval($value) < floatval($m[1]);
        if (preg_match('/([\d\.]+)\s*-\s*([\d\.]+)/', $text, $m)) {
            $v = floatval($value);
            return ($v >= $m[1] && $v <= $m[2]);
        }
        if (preg_match('/([\d\.]+)/', $text, $m)) return floatval($value) == floatval($m[1]);

        return false;
    }

    public function hasilAkhir()
    {
        $wisataModel    = new AlternatifModel();   // tbl_alternatif
        $penilaianModel = new PenilaianModel();    // tbl_penilaian
        $kriteriaModel  = new KriteriaModel();     // tbl_kriteria

        $search = $this->request->getGet('search');

        if (!empty($search)) {
            $wisataModel
                ->groupStart()
                ->like('nama_wisata', $search)
                ->orLike('deskripsi', $search)
                ->orLike('kategori_wisata', $search)
                ->groupEnd();
        }

        // Alternatif
        $alternatif = $wisataModel->findAll();

        // Kriteria
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $weights = [];
        $types   = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float) $k['bobot'];
            $types[$k['kode_kriteria']]   = strtolower($k['type']); // Benefit/Cost
        }

        // Penilaian
        $penilaianAll = $penilaianModel->findAll();
        $penilaian = [];
        foreach ($penilaianAll as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        // Hitung max & min tiap C
        $maxVal = [];
        $minVal = [];
        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $col  = array_column($penilaianAll, $kode);
            $maxVal[$kode] = max($col);
            $minVal[$kode] = min($col);
        }

        // Hitung skor total tiap alternatif
        $scores = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata']; // ini kunci join
            $nama     = $alt['nama_wisata'];

            $row = $penilaian[$idWisata] ?? null;

            $total = 0;
            if ($row) {
                for ($i = 1; $i <= 15; $i++) {
                    $kode  = 'C' . $i;
                    $nilai = (float)($row[$kode] ?? 0);
                    $bobot = $weights[$kode] ?? 0;

                    if (($types[$kode] ?? 'benefit') === 'cost') {
                        $norm = $nilai > 0 ? $minVal[$kode] / $nilai : 0;
                    } else {
                        $norm = $maxVal[$kode] > 0 ? $nilai / $maxVal[$kode] : 0;
                    }

                    $total += $norm * $bobot;
                }
            }

            $scores[$idWisata] = [
                'nama'  => $nama,
                'id_wisata'  => $idWisata,
                'total' => $total
            ];
        }

        // Ranking
        uasort($scores, fn($a, $b) => $b['total'] <=> $a['total']);

        $ranked = [];
        $rank = 1;
        foreach ($scores as $id => $s) {
            $ranked[] = [
                'nama'  => $s['nama'],
                'id_wisata'  => $s['id_wisata'],
                'total' => number_format($s['total'], 3, ',', '.'),
                'rank'  => $rank++
            ];
        }

        return view('template/hasil_akhir', [
            'ranked' => $ranked,
            'search' => $search
        ]);
    }

    public function dataUser()
    {
        $userModel = new UserModel();


        $search = $this->request->getGet('search');
        // Filter search
        if (!empty($search)) {
            $userModel->groupStart()
                ->like('username', $search)
                ->orLike('nama', $search)
                ->orLike('email', $search)
                ->orLike('role', $search)
                ->groupEnd();
        }
        $users = $userModel->findAll();

        return view('template/data_user', [
            'users' => $users,
            'search' => $search
        ]);
    }
    public function dataProfile()
    {
        $alternatifModel = new AlternatifModel();

        // Ambil semua kategori wisata untuk sidebar
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Cek apakah user login
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('/'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Kirim variabel ke view
        return view('template/data_profile', [
            'kategori' => $kategori
        ]);
    }

    public function updateProfile()
    {
        $session = session();
        $userModel = new UserModel();
        $id = $session->get('user_id');

        if (empty($id)) {
            return redirect()->back()->with('error', 'User tidak ditemukan dalam sesi login.');
        }

        // Ambil data dari form
        $nama     = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Data yang akan diupdate
        $dataUpdate = [
            'nama'       => $nama,
            'username'   => $username,
            'email'      => $email,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Jika password diisi baru, update hash
        if (!empty($password)) {
            $dataUpdate['password'] = password_hash($password, PASSWORD_BCRYPT);
        }

        // Jalankan update ke database
        $userModel->where('id', $id)->set($dataUpdate)->update();

        // Update session agar data langsung ter-refresh
        $session->set($dataUpdate);

        return redirect()->to(base_url('/data-profile'))->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateFoto()
    {
        $session = session();
        $userModel = new UserModel();
        $id = $session->get('user_id');

        if (empty($id)) {
            return redirect()->back()->with('error', 'User tidak ditemukan dalam sesi login.');
        }

        $file = $this->request->getFile('foto');
        if (!$file || !$file->isValid()) {
            return redirect()->back()->with('error', 'File foto tidak valid.');
        }

        // Validasi ekstensi
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower($file->getExtension());
        if (!in_array($ext, $allowed)) {
            return redirect()->back()->with('error', 'Format foto tidak valid. Gunakan JPG, PNG, atau WEBP.');
        }

        // Hapus foto lama jika ada
        $oldFoto = $session->get('foto');
        if ($oldFoto && file_exists('assets/images/users/' . $oldFoto)) {
            unlink('assets/images/users/' . $oldFoto);
        }

        // Simpan foto baru
        $newName = $file->getRandomName();
        $file->move('assets/images/users/', $newName);

        // Update database
        $userModel->update($id, [
            'foto' => $newName,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Update session
        $session->set('foto', $newName);

        return redirect()->to(base_url('/data-profile'))->with('success', 'Foto profil berhasil diperbarui.');
    }

    public function daftarWisata()
    {
        $alternatifModel = new AlternatifModel();

        // Ambil daftar kategori unik (untuk filter dropdown)
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Ambil parameter pencarian dan kategori dari URL
        $keyword = $this->request->getGet('q');
        $kategoriDipilih = $this->request->getGet('kategori');

        $perPage = 5; // jumlah data per halaman

        // Query dasar
        $builder = $alternatifModel;

        // Filter berdasarkan kategori (jika dipilih)
        if (!empty($kategoriDipilih)) {
            $builder = $builder->where('kategori_wisata', $kategoriDipilih);
        }

        // Filter berdasarkan keyword pencarian (jika ada)
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('nama_wisata', $keyword)
                ->orLike('kategori_wisata', $keyword)
                ->orLike('deskripsi', $keyword)
                ->groupEnd();
        }

        // Ambil data dengan pagination (otomatis membaca parameter page_wisata)
        $wisata = $builder->paginate($perPage, 'wisata');

        // Dapatkan instance pager
        $pager = $alternatifModel->pager;

        // Kirim semua data ke view
        return view('template/daftar_wisata', [
            'wisata'          => $wisata,
            'pager'           => $pager,
            'keyword'         => $keyword,
            'kategori'        => $kategori,
            'kategoriDipilih' => $kategoriDipilih
        ]);
    }

    public function hasilAkhirGuest()
    {
        // $session = session();
        // if (!$session->get('logged_in')) {
        //     return redirect()->to('/');
        // }

        $alternatifModel   = new AlternatifModel();   // tbl_alternatif
        $penilaianModel    = new PenilaianModel();    // tbl_penilaian
        $kriteriaModel     = new KriteriaModel();     // tbl_kriteria
        $subKriteriaModel  = new SubKriteriaModel();  // tbl_sub_kriteria

        // Ambil semua kategori untuk dropdown
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Hitung total data
        $totalAlternatif  = $alternatifModel->countAllResults(false);
        $totalKriteria    = $kriteriaModel->countAllResults(false);
        $totalSubKriteria = $subKriteriaModel->countAllResults(false);

        // Alternatif
        $alternatif = $alternatifModel->findAll();

        // Kriteria
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $weights = [];
        $types   = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float) $k['bobot'];
            $types[$k['kode_kriteria']]   = strtolower($k['type']); // Benefit/Cost
        }

        // Penilaian
        $penilaianAll = $penilaianModel->findAll();
        $penilaian = [];
        foreach ($penilaianAll as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        // Hitung max & min tiap C
        $maxVal = [];
        $minVal = [];
        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $col  = array_column($penilaianAll, $kode);
            $maxVal[$kode] = max($col);
            $minVal[$kode] = min($col);
        }

        // Hitung skor total tiap alternatif
        $scores = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata'];
            $nama     = $alt['nama_wisata'];

            $row = $penilaian[$idWisata] ?? null;

            $total = 0;
            if ($row) {
                for ($i = 1; $i <= 15; $i++) {
                    $kode  = 'C' . $i;
                    $nilai = (float)($row[$kode] ?? 0);
                    $bobot = $weights[$kode] ?? 0;

                    if (($types[$kode] ?? 'benefit') === 'cost') {
                        $norm = $nilai > 0 ? $minVal[$kode] / $nilai : 0;
                    } else {
                        $norm = $maxVal[$kode] > 0 ? $nilai / $maxVal[$kode] : 0;
                    }

                    $total += $norm * $bobot;
                }
            }

            $scores[$idWisata] = [
                'nama'      => $nama,
                'id_wisata' => $idWisata,
                'total'     => $total
            ];
        }

        // Ranking
        uasort($scores, fn($a, $b) => $b['total'] <=> $a['total']);

        $ranked = [];
        $rank = 1;
        foreach ($scores as $id => $s) {
            $ranked[] = [
                'nama'      => $s['nama'],
                'id_wisata' => $s['id_wisata'],
                'total'     => number_format($s['total'], 3, ',', '.'),
                'rank'      => $rank++
            ];
        }

        // return hanya sekali, gabung semua data
        return view('template/hasil_akhir_guest', [
            'kategori'         => $kategori,
            'wisata'           => $alternatif,
            'kategoriDipilih'  => null,
            'ranked'           => $ranked,
            'totalAlternatif'  => $totalAlternatif,
            'totalKriteria'    => $totalKriteria,
            'totalSubKriteria' => $totalSubKriteria
        ]);
    }

    public function search()
    {
        $alternatifModel   = new AlternatifModel();
        $penilaianModel    = new PenilaianModel();
        $kriteriaModel     = new KriteriaModel();
        $subKriteriaModel  = new SubKriteriaModel();

        // Ambil input kategori dari form
        $kategoriDipilih = $this->request->getPost('wisata_name');

        // Ambil semua kategori untuk dropdown
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Ambil data wisata sesuai kategori yang dipilih
        if (!empty($kategoriDipilih)) {
            $alternatif = $alternatifModel
                ->where('kategori_wisata', $kategoriDipilih)
                ->findAll();
        } else {
            $alternatif = $alternatifModel->findAll();
        }

        // Hitung total data
        $totalAlternatif  = $alternatifModel->countAllResults(false);
        $totalKriteria    = $kriteriaModel->countAllResults(false);
        $totalSubKriteria = $subKriteriaModel->countAllResults(false);

        // Proses ranking (sama seperti index)
        $kriteria = $kriteriaModel->orderBy('id', 'ASC')->findAll();
        $weights = [];
        $types   = [];
        foreach ($kriteria as $k) {
            $weights[$k['kode_kriteria']] = (float) $k['bobot'];
            $types[$k['kode_kriteria']]   = strtolower($k['type']);
        }

        $penilaianAll = $penilaianModel->findAll();
        $penilaian = [];
        foreach ($penilaianAll as $p) {
            $penilaian[$p['id_wisata']] = $p;
        }

        $maxVal = [];
        $minVal = [];
        foreach ($kriteria as $k) {
            $kode = $k['kode_kriteria'];
            $col  = array_column($penilaianAll, $kode);
            $maxVal[$kode] = max($col);
            $minVal[$kode] = min($col);
        }

        $scores = [];
        foreach ($alternatif as $alt) {
            $idWisata = $alt['id_wisata'];
            $nama     = $alt['nama_wisata'];

            $row = $penilaian[$idWisata] ?? null;

            $total = 0;
            if ($row) {
                for ($i = 1; $i <= 15; $i++) {
                    $kode  = 'C' . $i;
                    $nilai = (float)($row[$kode] ?? 0);
                    $bobot = $weights[$kode] ?? 0;

                    if (($types[$kode] ?? 'benefit') === 'cost') {
                        $norm = $nilai > 0 ? $minVal[$kode] / $nilai : 0;
                    } else {
                        $norm = $maxVal[$kode] > 0 ? $nilai / $maxVal[$kode] : 0;
                    }

                    $total += $norm * $bobot;
                }
            }

            $scores[$idWisata] = [
                'nama'      => $nama,
                'id_wisata' => $idWisata,
                'total'     => $total
            ];
        }

        uasort($scores, fn($a, $b) => $b['total'] <=> $a['total']);

        $ranked = [];
        $rank = 1;
        foreach ($scores as $id => $s) {
            $ranked[] = [
                'nama'      => $s['nama'],
                'id_wisata' => $s['id_wisata'],
                'total'     => number_format($s['total'], 3, ',', '.'),
                'rank'      => $rank++
            ];
        }

        $rankMap = [];
        foreach ($ranked as $r) {
            $rankMap[$r['id_wisata']] = $r['rank'];
        }

        foreach ($alternatif as &$a) {
            $a['rank'] = $rankMap[$a['id_wisata']] ?? null;
        }
        unset($a);

        return view('template/index', [
            'kategori'         => $kategori,
            'wisata'           => $alternatif,
            'kategoriDipilih'  => $kategoriDipilih,
            'rank'           => $ranked,
            'totalAlternatif'  => $totalAlternatif,
            'totalKriteria'    => $totalKriteria,
            'totalSubKriteria' => $totalSubKriteria
        ]);
    }



    // toogle bookmark user
    public function toggleBookmark()
    {
        $bookmarkModel = new BookmarkModel();
        $alternatifModel = new AlternatifModel();

        $idWisata = $this->request->getPost('id_wisata');
        $idUser = session()->get('email');

        if (!$idUser) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Silakan login terlebih dahulu.']);
        }

        $existing = $bookmarkModel->where(['id_user' => $idUser, 'id_wisata' => $idWisata])->first();

        if ($existing) {
            $bookmarkModel->delete($existing['id_bookmark']);
            return $this->response->setJSON(['status' => 'removed']);
        } else {
            $bookmarkModel->insert([
                'id_user' => $idUser,
                'id_wisata' => $idWisata
            ]);
            return $this->response->setJSON(['status' => 'added']);
        }
    }

    public function bookmarkList()
    {
        $bookmarkModel = new BookmarkModel();
        $alternatifModel = new AlternatifModel();

        // Ambil kategori wisata (untuk filter)
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Ambil parameter pencarian dan kategori dari URL
        $keyword = $this->request->getGet('q');
        $kategoriDipilih = $this->request->getGet('kategori');

        $perPage = 5;

        // Pastikan user login
        $email = session()->get('email');
        if (!$email) {
            return redirect()->to(base_url('/'))->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil semua data bookmark milik user
        $bookmarks = $bookmarkModel->where('id_user', $email)->findAll();

        $idWisataList = array_column($bookmarks, 'id_wisata');

        // Jika tidak ada bookmark, kosongkan hasil
        if (empty($idWisataList)) {
            return view('template/bookmark_list', [
                'wisata'          => [],
                'pager'           => null,
                'keyword'         => $keyword,
                'kategori'        => $kategori,
                'kategoriDipilih' => $kategoriDipilih
            ]);
        }

        // Query dasar hanya untuk wisata yang dibookmark user
        $builder = $alternatifModel
            ->select('tbl_alternatif.*, tbl_bookmark.created_at AS tanggal_disimpan')
            ->join('tbl_bookmark', 'tbl_bookmark.id_wisata = tbl_alternatif.id_wisata')
            ->where('tbl_bookmark.id_user', $email)
            ->whereIn('tbl_alternatif.id_wisata', $idWisataList);


        // Filter kategori
        if (!empty($kategoriDipilih)) {
            $builder = $builder->where('kategori_wisata', $kategoriDipilih);
        }

        // Filter pencarian
        if (!empty($keyword)) {
            $builder = $builder->groupStart()
                ->like('nama_wisata', $keyword)
                ->orLike('kategori_wisata', $keyword)
                ->orLike('deskripsi', $keyword)
                ->groupEnd();
        }

        // Ambil data dengan pagination
        $wisata = $builder->paginate($perPage, 'wisata');

        // Ambil pager instance
        $pager = $alternatifModel->pager;

        return view('template/bookmark_list', [
            'wisata'          => $wisata,
            'pager'           => $pager,
            'keyword'         => $keyword,
            'kategori'        => $kategori,
            'kategoriDipilih' => $kategoriDipilih
        ]);
    }

    public function detail($id)
    {
        $alternatifModel = new AlternatifModel();
        $bookmarkModel = new BookmarkModel();

        // Ambil data wisata
        $wisata = $alternatifModel->where('id_wisata', $id)->first();

        if (!$wisata) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Wisata tidak ditemukan");
        }

        // Ambil kategori untuk header/filter
        $kategori = $alternatifModel->select('kategori_wisata')
            ->groupBy('kategori_wisata')
            ->findAll();

        // Cek apakah user login sudah punya bookmark ini
        $idUser = session()->get('email');
        $isBookmarked = false;

        if ($idUser) {
            $existing = $bookmarkModel->where([
                'id_user' => $idUser,
                'id_wisata' => $id
            ])->first();

            $isBookmarked = $existing ? true : false;
        }

        // Pastikan key yang dibutuhkan tersedia
        $defaults = [
            'fasilitas' => null,
            'jumlah_pengunjung' => null,
            'jumlah_ulasan' => null,
            'rating' => null,
            'harga_tiket' => null,
            'gambar' => null,
        ];

        $wisata = array_merge($defaults, $wisata);

        return view('template/detail_wisata', [
            'wisata' => $wisata,
            'kategori' => $kategori,
            'isBookmarked' => $isBookmarked
        ]);
    }
}
