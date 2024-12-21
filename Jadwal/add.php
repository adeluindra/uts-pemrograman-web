<?php
include("../controllers/JadwalController.php");
include("../lib/functions.php");

$obj = new JadwalController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodemk = $_POST["kodemk"];
    $matakuliah = $_POST["matakuliah"];
    $kelas = $_POST["kelas"];
    $hari = $_POST["hari"];
    $waktu = $_POST["waktu"];
    $ruangan = $_POST["ruangan"];
    $dosen = $_POST["dosen"];

    $dat = $obj->addJadwal($kodemk, $matakuliah, $kelas, $hari, $waktu, $ruangan, $dosen);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Jadwal</h1>
        <p class="text-gray-600 mb-4">Entry Data Jadwal</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Insert Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'jadwal/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Insert Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-calendar-check fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Add New Jadwal</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="kodemk" class="block text-sm font-medium text-gray-700">Kode MK:</label>
                <input type="text" id="kodemk" name="kodemk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="matakuliah" class="block text-sm font-medium text-gray-700">Mata Kuliah:</label>
                <input type="text" id="matakuliah" name="matakuliah" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas:</label>
                <input type="text" id="kelas" name="kelas" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="hari" class="block text-sm font-medium text-gray-700">Hari:</label>
                <input type="text" id="hari" name="hari" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu:</label>
                <input type="time" id="waktu" name="waktu" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="ruangan" class="block text-sm font-medium text-gray-700">Ruangan:</label>
                <input type="text" id="ruangan" name="ruangan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="dosen" class="block text-sm font-medium text-gray-700">Dosen:</label>
                <input type="text" id="dosen" name="dosen" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
