<?php

namespace App\Controllers;

use App\Models\SubKriteriaModel;

class DataSubKriteria extends BaseController
{
    public function update()
    {
        $id   = $this->request->getPost('id');
        $type = $this->request->getPost('type');
        $subkritera = $this->request->getPost('sub_kriteria');
        $nilai = $this->request->getPost('nilai');

        $subKriteriaModel = new SubKriteriaModel();

        $subKriteriaModel->update($id, [
            'type' => $type,
            'sub_kriteria' => $subkritera,
            'nilai' => $nilai
        ]);

        return redirect()->to('/data-sub-kriteria')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $subKriteriaModel = new SubKriteriaModel();
        $subKriteriaModel->delete($id);

        return redirect()->to('/data-sub-kriteria')->with('success', 'Data berhasil dihapus!');
    }

    public function tambah()
    {
        $subKriteriaModel = new SubKriteriaModel();

        $id    = $this->request->getPost('id');
        $kode  = $this->request->getPost('kode_kriteria');
        $type  = $this->request->getPost('type');
        $subkriteria  = $this->request->getPost('sub_kriteria');
        $nilai = $this->request->getPost('nilai');

        $data = [
            'kode_kriteria'  => $kode,
            'type'  => $type,
            'sub_kriteria' => $subkriteria,
            'nilai'          => $nilai
        ];

        if ($id) {
            $data['id'] = $id;
        }

        $subKriteriaModel->save($data);

        return redirect()->to('/data-sub-kriteria')->with('success', 'Data berhasil disimpan!');
    }

    public function cetak()
    {
        $subKriteriaModel = new SubKriteriaModel();
        $data['sub_kriteria'] = $subKriteriaModel->findAll();

        // cek dulu isi data
        if (empty($data['sub_kriteria'])) {
            return "Data sub kriteria kosong!";
        }

        $html = view('cetak_pdf/pdf_datasubkriteria', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("data-sub-kriteria.pdf", ["Attachment" => false]);
        // Attachment=false supaya preview di browser, bukan auto download
    }
}
