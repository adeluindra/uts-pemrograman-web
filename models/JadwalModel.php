<?php

include_once('../db/database.php');

class JadwalModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Menambahkan data jadwal
    public function addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        $sql = "INSERT INTO jadwal (kodemk, matakuliah, kelas, hari, waktu, ruangan, dosen) 
                VALUES (:kodemk, :matakuliah, :kelas, :hari, :waktu, :ruangan, :dosen)";
        $params = array(
            ":kodemk" => $kodemk,
            ":matakuliah" => $matakuliah,
            ":kelas" => $kelas,
            ":hari" => $hari,
            ":waktu" => $waktu,
            ":ruangan" => $ruangan,
            ":dosen" => $dosen
        );

        $result = $this->db->executeQuery($sql, $params);
        // Cek apakah insert berhasil
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }

        // Mengembalikan response dalam format JSON
        return json_encode($response);
    }

    // Mendapatkan data jadwal berdasarkan ID
    public function getJadwal($id)
    {
        $sql = "SELECT * FROM jadwal WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mengupdate data jadwal berdasarkan ID
    public function updateJadwal($id, $kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen)
    {
        $sql = "UPDATE jadwal SET kodemk = :kodemk, matakuliah = :matakuliah, kelas = :kelas, 
                hari = :hari, waktu = :waktu, ruangan = :ruangan, dosen = :dosen WHERE id = :id";
        $params = array(
            ":kodemk" => $kodemk,
            ":matakuliah" => $matakuliah,
            ":kelas" => $kelas,
            ":hari" => $hari,
            ":waktu" => $waktu,
            ":ruangan" => $ruangan,
            ":dosen" => $dosen,
            ":id" => $id
        );

        // Menjalankan query update
        $result = $this->db->executeQuery($sql, $params);

        // Cek apakah update berhasil
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Update successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Update failed"
            );
        }

        // Mengembalikan response dalam format JSON
        return json_encode($response);
    }

    // Menghapus data jadwal berdasarkan ID
    public function deleteJadwal($id)
    {
        $sql = "DELETE FROM jadwal WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Cek apakah delete berhasil
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Delete successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Delete failed"
            );
        }

        // Mengembalikan response dalam format JSON
        return json_encode($response);
    }

    // Mendapatkan daftar jadwal
    public function getJadwalList()
    {
        $sql = 'SELECT * FROM jadwal LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Mendapatkan data untuk kombinasi pilihan (misalnya untuk dropdown)
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM jadwal';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>
