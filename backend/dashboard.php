<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit();
}
include '../config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-yellow-400 via-yellow-500 to-orange-500">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white bg-opacity-90 shadow-lg flex flex-col justify-between p-6">
            <div>
                <h1 class="text-2xl font-bold text-orange-600 mb-8">Admin Panel</h1>
                <nav class="space-y-4">
                    <a href="dashboard.php" class="block px-4 py-2 rounded hover:bg-yellow-100 text-orange-700 font-semibold">Dashboard</a>
                    <a href="tambah.php" class="block px-4 py-2 rounded hover:bg-yellow-100 text-orange-700">Tambah Artikel</a>
                </nav>
            </div>
            <div>
                <a href="../logout.php" class="block px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white text-center font-semibold transition">Logout</a>
            </div>
        </aside>
        <!-- Main Content -->
        <main class="flex-1 p-10">
            <div class="bg-white bg-opacity-90 rounded-lg shadow-lg p-8">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-3xl font-bold text-orange-600">Daftar Artikel</h2>
                    <a href="tambah.php" class="bg-yellow-500 hover:bg-orange-500 text-white px-5 py-2 rounded transition font-semibold">+ Tambah Artikel</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white rounded shadow">
                        <thead>
                            <tr class="bg-yellow-200 text-orange-700">
                                <th class="py-2 px-4">No</th>
                                <th class="py-2 px-4">Judul</th>
                                <th class="py-2 px-4">Konten</th>
                                <th class="py-2 px-4">Gambar</th>
                                <th class="py-2 px-4">Kategori</th> <!-- Added Category Column -->
                                <th class="py-2 px-4">Tanggal</th>
                                <th class="py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
                        $no = 1;
                        while ($row = $result->fetch_assoc()):
                        ?>
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="py-2 px-4 text-center"><?php echo $no++; ?></td>
                                <td class="py-2 px-4"><?php echo htmlspecialchars($row['title']); ?></td>
                                <td class="py-2 px-4 max-w-xs truncate" title="<?php echo htmlspecialchars($row['content']); ?>"><?php echo htmlspecialchars(mb_strimwidth($row['content'], 0, 60, '...')); ?></td>
                                <td class="py-2 px-4">
                                    <?php if (!empty($row['image'])): ?>
                                        <img src="../uploads/<?php echo htmlspecialchars($row['image']); ?>" alt="Image" class="w-16 h-16 object-cover rounded shadow" />
                                    <?php else: ?>
                                        <span class="text-gray-400 italic">No Image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-2 px-4">
                                    <?php echo isset($row['kategori']) ? htmlspecialchars($row['kategori']) : '<span class="text-gray-400 italic">No Category</span>'; ?>
                                </td> <!-- Display Category -->
                                <td class="py-2 px-4"><?php echo date('d-m-Y H:i', strtotime($row['created_at'])); ?></td>
                                <td class="py-2 px-4 flex gap-2 justify-center">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">Edit</a>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus artikel ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>