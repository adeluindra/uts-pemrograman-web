<?php
include("../controllers/BarangController.php");
include("../lib/functions.php");

$obj = new BarangController();
$msg = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kodebrg = $_POST["kodebrg"];
    $namabrg = $_POST["namabrg"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];

    $dat = $obj->addBarang($kodebrg, $namabrg, $kategori, $harga);
    $msg = getJSON($dat);
}
?>
<html>
<head>
    <title>Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Barang</h1>
        <p class="text-gray-600 mb-4">Entry Data Barang</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Insert Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'barang/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Insert Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-box-open fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Add New Barang</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formAdd" method="POST" action="">
            <div class="mb-4">
                <label for="kodebrg" class="block text-sm font-medium text-gray-700">Kode Barang:</label>
                <input type="text" id="kodebrg" name="kodebrg" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="namabrg" class="block text-sm font-medium text-gray-700">Nama Barang:</label>
                <input type="text" id="namabrg" name="namabrg" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                <input type="text" id="kategori" name="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                <input type="number" id="harga" name="harga" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" required />
            </div>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
