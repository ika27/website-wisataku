<?php

namespace App\Controllers;

use App\Models\UserModel;

class DataUser extends BaseController
{
    public function update()
    {
        $id   = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $this->request->getPost('role');

        $userModel = new UserModel();

        $userModel->update($id, [
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'role' => $role,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        // Hash password hanya jika diisi
        if (!empty($password)) {
            $dataUpdate['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $dataUpdate);

        return redirect()->to('/data-user')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);

        return redirect()->to('/data-user')->with('success', 'Data berhasil dihapus!');
    }

    public function tambah()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $nama     = $this->request->getPost('nama_user');
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role     = $this->request->getPost('role');

        $data = [
            'username'   => $username,
            'nama'       => $nama,
            'email'      => $email,
            'password'   => password_hash($password, PASSWORD_DEFAULT),
            'role'       => $role,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $userModel->insert($data);

        return redirect()->to('/data-user')->with('success', 'User berhasil ditambahkan!');
    }
}
