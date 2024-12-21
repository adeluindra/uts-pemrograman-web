<?php
include_once('../models/JadwalModel.php');

class JadwalController
{
    private $model;

    public function __construct()
    {
        $this->model = new JadwalModel();
    }

    // Menambahkan data jadwal
    public function addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        return $this->model->addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    }

    // Mendapatkan data jadwal berdasarkan ID
    public function getJadwal($id)
    {
        return $this->model->getJadwal($id);
    }

    // Menampilkan nama matakuliah berdasarkan ID jadwal
    public function show($id)
    {
        $rows = $this->model->getJadwal($id);
        foreach ($rows as $row) {
            $val = $row['matakuliah']; // Menampilkan nama matakuliah
        }
        return $val;
    }

    // Mengupdate data jadwal
    public function updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        return $this->model->updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    }

    // Menghapus data jadwal
    public function deleteJadwal($id)
    {
        return $this->model->deleteJadwal($id);
    }

    // Mendapatkan daftar jadwal
    public function getJadwalList()
    {
        return $this->model->getJadwalList();
    }

    // Mendapatkan data untuk kombinasi pilihan (misalnya untuk dropdown)
    public function getDataCombo()
    {
        return $this->model->getDataCombo();
    }
}
?>
