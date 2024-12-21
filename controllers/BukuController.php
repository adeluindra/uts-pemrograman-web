<?php
include_once('../models/BukuModel.php');

class BukuController
{
    private $model;

    public function __construct()
    {
        $this->model = new BukuModel();
    }

    // Fungsi untuk menambahkan buku
    public function addBuku($kode_buku, $judul, $pengarang, $penerbit, $tahun)
    {
        return $this->model->addBuku($kode_buku, $judul, $pengarang, $penerbit, $tahun);
    }

    // Fungsi untuk mendapatkan data buku berdasarkan ID
    public function getBuku($id)
    {
        return $this->model->getBuku($id);
    }

    // Fungsi untuk menampilkan judul buku berdasarkan ID
    public function show($id)
    {
        $rows = $this->model->getBuku($id);
        foreach ($rows as $row) {
            $val = $row['judul'];
        }
        return $val;
    }

    // Fungsi untuk memperbarui data buku
    public function updateBuku($id, $kode_buku, $judul, $pengarang, $penerbit, $tahun)
    {
        return $this->model->updateBuku($id, $kode_buku, $judul, $pengarang, $penerbit, $tahun);
    }

    // Fungsi untuk menghapus data buku berdasarkan ID
    public function deleteBuku($id)
    {
        return $this->model->deleteBuku($id);
    }

    // Fungsi untuk mendapatkan daftar buku
    public function getBukuList()
    {
        return $this->model->getBukuList();
    }

    // Fungsi untuk mendapatkan data combo (misalnya untuk dropdown)
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
