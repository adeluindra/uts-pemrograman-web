<?php
include("../controllers/BarangController.php");
include("../lib/functions.php");

$obj = new BarangController();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$msg = null;
if (isset($_POST['submitted']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $dat = $obj->deleteBarang($id);
    $msg = getJSON($dat);
}

$rows = $obj->getBarang($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-2">Barang</h1>
        <p class="text-gray-600 mb-4">Delete Data Barang</p>

        <?php 
        if ($msg === true) { 
            echo '<div class="bg-green-500 text-white p-3 rounded mb-4">Delete Data Berhasil</div>';
            echo '<meta http-equiv="refresh" content="3;url='.base_url().'barang/">';
        } elseif ($msg === false) {
            echo '<div class="bg-red-500 text-white p-3 rounded mb-4">Delete Gagal</div>'; 
        }
        ?>

        <div class="flex items-center mb-4">
            <i class="fas fa-box-open fa-4x mr-4"></i>
            <h2 class="text-xl font-semibold">Delete Data Barang</h2>
        </div>
        <hr class="mb-4"/>

        <form name="formDelete" method="POST" action="">
            <input type="hidden" name="submitted" value="1"/>
            <dl class="row mt-1">
                <?php foreach ($rows as $row): ?>
                    <dt class="col-sm-3 font-medium text-gray-700">ID:</dt>
                    <dd class="col-sm-9"><?php echo $row['id']; ?></dd>
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" readonly />

                    <dt class="col-sm-3 font-medium text-gray-700">Kode Barang:</dt>
                    <dd class="col-sm-9"><?php echo $row['kodebrg']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-700">Nama Barang:</dt>
                    <dd class="col-sm-9"><?php echo $row['namabrg']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-700">Kategori:</dt>
                    <dd class="col-sm-9"><?php echo $row['kategori']; ?></dd>

                    <dt class="col-sm-3 font-medium text-gray-700">Harga:</dt>
                    <dd class="col-sm-9"><?php echo $row['harga']; ?></dd>
                <?php endforeach; ?>
            </dl>
            <div class="flex justify-between mt-4">
                <button class="bg-red-500 text-white font-semibold py-2 px-4 rounded hover:bg-red-600" type="submit">Delete</button>
                <a href="#index" class="bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
