<?php

include_once('../db/database.php');

class BarangModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addBarang($kodebrg, $namabrg, $kategori, $harga)
    {
        $sql = "INSERT INTO barang (kodebrg, namabrg, kategori, harga) VALUES (:kodebrg, :namabrg, :kategori, :harga)";
        $params = array(
            ":kodebrg" => $kodebrg,
            ":namabrg" => $namabrg,
            ":kategori" => $kategori,
            ":harga" => $harga
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

    public function getBarang($id)
    {
        $sql = "SELECT * FROM barang WHERE id = :id";
        $params = array(":id" => $id);

        return $this->db->executeQuery($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateBarang($id, $kodebrg, $namabrg, $kategori, $harga)
    {
        $sql = "UPDATE barang SET kodebrg = :kodebrg, namabrg = :namabrg, kategori = :kategori, harga = :harga WHERE id = :id";
        $params = array(
            ":kodebrg" => $kodebrg,
            ":namabrg" => $namabrg,
            ":kategori" => $kategori,
            ":harga" => $harga,
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

    public function deleteBarang($id)
    {
        $sql = "DELETE FROM barang WHERE id = :id";
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

    public function getBarangList()
    {
        $sql = 'SELECT * FROM barang LIMIT 100';
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDataCombo()
    {
        $sql = 'SELECT * FROM barang';
        $data = array();
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
