<?php

include_once('../db/database.php');

class BukuModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    // Fungsi untuk menambahkan buku
    public function addBuku($kode_buku, $judul, $pengarang, $penerbit, $tahun)
    {
        $sql = "INSERT INTO buku (kodebuku, judul, pengarang, penerbit, tahun) 
                VALUES (:kode_buku, :judul, :pengarang, :penerbit, :tahun)";
        $params = array(
            ":kode_buku" => $kode_buku,
            ":judul" => $judul,
            ":pengarang" => $pengarang,
            ":penerbit" => $penerbit,
            ":tahun" => $tahun
        );

        $result = $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
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

        // Return the response as JSON
        return json_encode($response);
    }

    // Fungsi untuk mendapatkan data buku berdasarkan ID
    public function getBuku($id)
    {
        $sql = "SELECT * FROM buku WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui data buku
    public function updateBuku($id, $kode_buku, $judul, $pengarang, $penerbit, $tahun)
    {
        $sql = "UPDATE buku SET kodebuku = :kode_buku, judul = :judul, pengarang = :pengarang, penerbit = :penerbit, tahun = :tahun WHERE id = :id";
        $params = array(
            ":kode_buku" => $kode_buku,
            ":judul" => $judul,
            ":pengarang" => $pengarang,
            ":penerbit" => $penerbit,
            ":tahun" => $tahun,
            ":id" => $id
        );

        // Execute the query
        $result = $this->db->executeQuery($sql, $params);

        // Check if the update was successful
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

        // Return the response as JSON
        return json_encode($response);
    }

    // Fungsi untuk menghapus data buku berdasarkan ID
    public function deleteBuku($id)
    {
        $sql = "DELETE FROM buku WHERE id = :id";
        $params = array(":id" => $id);

        $result = $this->db->executeQuery($sql, $params);
        // Check if the delete was successful
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

        // Return the response as JSON
        return json_encode($response);
    }

    // Fungsi untuk mendapatkan daftar buku
    public function getBukuList()
    {
        $sql = 'SELECT * FROM buku LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan data combo (misalnya untuk dropdown)
    public function getDataCombo()
    {
        $sql = 'SELECT * FROM buku';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
