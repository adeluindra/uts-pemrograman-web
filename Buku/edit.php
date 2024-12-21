<?php
include("../controllers/BukuController.php");
include("../lib/functions.php");

$obj = new BukuController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST["submitted"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    // Form was submitted, process the update here
    $id = $_POST["id"];
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $tahun = $_POST["tahun"];
    
    // Update the database record using your controller's method
    $dat = $obj->updateBuku($id, $kode_buku, $judul, $pengarang, $penerbit, $tahun);
    $msg = getJSON($dat);
}

$rows = $obj->getBuku($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Buku</h1>
        <p class="text-gray-600 mb-4">Edit Data Buku</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Update Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="2;url='.base_url().'buku/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Update Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-book-open fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Edit Data Buku</h2>
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
                    <label for="kode_buku" class="block text-sm font-medium text-gray-700">Kode Buku:</label>
                    <input type="text" id="kode_buku" name="kode_buku" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['kode_buku']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="judul" class="block text-sm font-medium text-gray-700">Judul:</label>
                    <input type="text" id="judul" name="judul" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['judul']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="pengarang" class="block text-sm font-medium text-gray-700">Pengarang:</label>
                    <input type="text" id="pengarang" name="pengarang" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['pengarang']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="penerbit" class="block text-sm font-medium text-gray-700">Penerbit:</label>
                    <input type="text" id="penerbit" name="penerbit" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['penerbit']; ?>" required/>
                </div>
                <div class="mb-4">
                    <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun:</label>
                    <input type="number" id="tahun" name="tahun" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-500" value="<?php echo $row['tahun']; ?>" required/>
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
