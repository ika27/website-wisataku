<?php

namespace App\Controllers;

use App\Models\BookmarkModel;
use CodeIgniter\Controller;

class BookmarkController extends BaseController
{
    public function add()
    {
        $session = session();
        $email = $session->get('email');

        if (!$email) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not logged in']);
        }

        $id_wisata = $this->request->getPost('id_wisata');

        $bookmarkModel = new BookmarkModel();

        // Cek apakah sudah pernah disimpan
        $exists = $bookmarkModel->where('email', $email)
            ->where('id_wisata', $id_wisata)
            ->first();

        if ($exists) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Sudah ada di bookmark']);
        }

        $data = [
            'email' => $email,
            'id_wisata' => $id_wisata,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $bookmarkModel->insert($data);

        return $this->response->setJSON(['status' => 'success']);
    }
}
