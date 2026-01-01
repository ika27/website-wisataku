<?php

namespace App\Controllers;

use App\Models\PenilaianModel;

class DataPenilaian extends BaseController
{

    public function update()
    {
        $penilaianModel = new PenilaianModel();

        $id_wisata = $this->request->getPost('id');
        if (!$id_wisata) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'ID kosong']);
        }

        // Siapkan data C1 - C15
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data["C$i"] = $this->request->getPost("C$i") ?? 0;
        }

        // Update ke tbl_penilaian
        $penilaianModel->where('id_wisata', $id_wisata)->set($data)->update();

        return $this->response->setJSON(['status' => 'success']);
    }

    public function insert()
    {
        $penilaianModel = new PenilaianModel();

        $data = [
            'id_wisata' => $this->request->getPost('id_wisata'),
        ];

        // loop ambil C1 - C15
        for ($i = 1; $i <= 15; $i++) {
            $data['C' . $i] = $this->request->getPost('C' . $i);
        }

        $penilaianModel->insert($data);

        return redirect()->to(base_url('data-penilaian/'))
            ->with('success', 'Data penilaian berhasil ditambahkan!');
    }
}
