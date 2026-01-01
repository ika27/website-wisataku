<?php

namespace App\Controllers;

use App\Models\KriteriaModel;

class DataKriteria extends BaseController
{
    public function update()
    {
        $id   = $this->request->getPost('id');
        $kode = $this->request->getPost('kode_kriteria');
        $nama = $this->request->getPost('nama_kriteria');
        $type = $this->request->getPost('kategori_utama');
        $bobot = $this->request->getPost('bobot');

        $kriteriaModel = new KriteriaModel();

        $kriteriaModel->update($id, [
            'kode_kriteria' => $kode,
            'nama_kriteria' => $nama,
            'kategori_utama' => $type,
            'bobot'         => $bobot
        ]);

        return redirect()->to('/data-kriteria')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $kriteriaModel = new KriteriaModel();
        $kriteriaModel->delete($id);

        return redirect()->to('/data-kriteria')->with('success', 'Data berhasil dihapus!');
    }

    public function tambah()
    {
        $kriteriaModel = new KriteriaModel();

        $id    = $this->request->getPost('id');
        $kode  = $this->request->getPost('kode_kriteria');
        $nama  = $this->request->getPost('nama_kriteria');
        $type  = $this->request->getPost('kategori_utama');
        $bobot = $this->request->getPost('bobot');

        $data = [
            'kode_kriteria'  => $kode,
            'nama_kriteria'  => $nama,
            'kategori_utama' => $type,
            'bobot'          => $bobot
        ];

        if ($id) {
            $data['id'] = $id;
        }

        $kriteriaModel->save($data);

        return redirect()->to('/data-kriteria')->with('success', 'Data berhasil disimpan!');
    }

    public function cetak()
    {
        $kriteriaModel = new KriteriaModel();
        $data['kriteria'] = $kriteriaModel->findAll();

        // cek dulu isi data
        if (empty($data['kriteria'])) {
            return "Data kriteria kosong!";
        }

        $html = view('cetak_pdf/pdf_datakriteria', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("data-kriteria.pdf", ["Attachment" => false]);
        // Attachment=false supaya preview di browser, bukan auto download
    }
}
