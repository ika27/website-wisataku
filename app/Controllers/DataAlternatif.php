<?php

namespace App\Controllers;

use App\Models\AlternatifModel;

class DataAlternatif extends BaseController
{
    public function update()
    {
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $kategori = $this->request->getPost('kategori_wisata');
        $deskripsi = $this->request->getPost('deskripsi');
        $rating = $this->request->getPost('rating');

        $alternatifModel = new AlternatifModel();

        // ambil file gambar
        $fileGambar = $this->request->getFile('gambar');
        $gambarName = null;

        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            // buat nama unik
            $gambarName = $fileGambar->getRandomName();
            // pindahkan ke folder public/uploads
            $fileGambar->move('assets/images/foto_wisata/', $gambarName);
        }

        // data untuk update
        $dataUpdate = [
            'nama_wisata'     => $nama,
            'kategori_wisata' => $kategori,
            'deskripsi'       => $deskripsi,
            'rating'          => $rating
        ];

        // tambahkan gambar jika ada file baru
        if ($gambarName) {
            $dataUpdate['gambar'] = $gambarName;
        }

        // update ke database
        $alternatifModel->update($id, $dataUpdate);

        return redirect()->to('/data-alternatif')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $alternatifModel = new AlternatifModel();
        $alternatifModel->delete($id);

        return redirect()->to('/data-alternatif')->with('success', 'Data berhasil dihapus!');
    }

    public function tambah()
    {
        $alternatifModel = new AlternatifModel();

        $idWisata   = $this->request->getPost('id_wisata');
        $nama       = $this->request->getPost('nama');
        $kategori   = $this->request->getPost('kategori');
        $deskripsi  = $this->request->getPost('deskripsi');
        $rating     = $this->request->getPost('rating');
        $gambarFile = $this->request->getFile('gambar');
        $gambarNama = null;

        // Jika ada gambar yang diupload
        if ($gambarFile && $gambarFile->isValid() && !$gambarFile->hasMoved()) {
            $gambarNama = $gambarFile->getRandomName();
            $gambarFile->move('uploads', $gambarNama);
        }

        // Simpan ke database
        $alternatifModel->insert([
            'id_wisata'       => $idWisata,
            'nama_wisata'     => $nama,
            'kategori_wisata' => $kategori,
            'deskripsi'       => $deskripsi,
            'gambar'          => $gambarNama,
            'rating'          => $rating
        ]);

        return redirect()->to('/data-alternatif')->with('success', 'Data wisata berhasil ditambahkan!');
    }
}
