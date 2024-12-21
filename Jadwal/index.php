<?php
include("../controllers/JadwalController.php");
include("../lib/functions.php");

$obj = new JadwalController();
$rows = $obj->getJadwalList();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gradient-to-r from-teal-500 to-blue-600 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-6 text-blue-900">Jadwal</h1>
        <p class="text-gray-800 mb-4 text-lg">List Semua Data Jadwal</p>
        
        <!-- Button to create new data -->
        <a href="add.php" class="bg-teal-500 text-white px-6 py-3 rounded-full hover:bg-teal-600 mb-6 inline-flex items-center">
            <i class="fas fa-plus mr-3"></i> Tambah Data Baru
        </a>

        <!-- Table for listing jadwal -->
        <div class="overflow-x-auto rounded-lg shadow-md">
            <table class="min-w-full bg-white border border-gray-300 shadow-sm rounded-lg">
                <thead class="bg-teal-100 text-gray-700">
                    <tr>
                        <th class="py-4 px-6 text-left text-sm font-medium">ID</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Kode MK</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Mata Kuliah</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Kelas</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Hari</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Waktu</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Ruangan</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Dosen</th>
                        <th class="py-4 px-6 text-left text-sm font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row): ?>
                    <tr class="bg-teal-50 hover:bg-teal-200 transition-all duration-300">
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['id']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['kodemk']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['matakuliah']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['kelas']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['hari']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['waktu']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['ruangan']; ?></td>
                        <td class="py-4 px-6 border-b text-sm"><?php echo $row['dosen']; ?></td>
                        <td class="py-4 px-6 border-b text-sm">
                            <div class="flex space-x-4">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-indigo-500 text-white px-4 py-2 rounded-lg hover:bg-indigo-600 flex items-center">
                                    <i class="fas fa-edit mr-2"></i> Edit
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']; ?>" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 flex items-center" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class="fas fa-trash-alt mr-2"></i> Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
