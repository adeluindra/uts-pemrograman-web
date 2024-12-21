<?php
include("../controllers/BarangController.php");
include("../lib/functions.php");

$obj = new BarangController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $kode_barang = $_POST["kode_barang"];
    $nama_barang = $_POST["nama_barang"];
    $kategori = $_POST["kategori"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];
    $tanggal_masuk = $_POST["tanggal_masuk"];
    
    // Update the database record using your controller's method
    $dat = $obj->updateBarang($id, $kode_barang, $nama_barang, $kategori, $harga, $stok, $tanggal_masuk);
    $msg = getJSON($dat);
}

$rows = $obj->getBarang($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Barang</h1>
        <p class="text-gray-600 mb-4">Edit Data Barang</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Update Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'barang/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Update Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-box-open fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Edit Data Barang</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formEdit" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <?php foreach ($rows as $row): ?>
                <div class="mb-4">
                    <label for="id" class="block text-sm font-medium text-gray-700">ID:</label>
                    <input type="text" id="id" name="id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['id']; ?>" readonly/>
                </div>
                <div class="mb-4">
                    <label for="kode_barang" class="block text-sm font-medium text-gray-700">Kode Barang:</label>
                    <input type="text" id="kode_barang" name="kode_barang" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kode_barang']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="nama_barang" class="block text-sm font-medium text-gray-700">Nama Barang:</label>
                    <input type="text" id="nama_barang" name="nama_barang" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['nama_barang']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori:</label>
                    <input type="text" id="kategori" name="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kategori']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                    <input type="number" id="harga" name="harga" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['harga']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                    <input type="number" id="stok" name="stok" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['stok']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="tanggal_masuk" class="block text-sm font-medium text-gray-700">Tanggal Masuk:</label>
                    <input type="date" id="tanggal_masuk" name="tanggal_masuk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['tanggal_masuk']; ?>" required/>
                </div>
            <?php endforeach; ?>
            <div class="flex justify-between">
                <button class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600" type="submit">Save</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
