<?php include '../config/db.php'; ?>
<?php
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-state=1.0">
    <title>Postingan Terbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 p-6 font-sans">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <input type="text" placeholder="Cari" class="w-full max-w-md px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <h1 class="text-2xl font-bold mb-4">Postingan Terbaru</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php
            $sql = "SELECT * FROM posts ORDER BY created_at DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()):
                    $row['author'] = $row['author'] ?? 'Syahrul Fajar';
                    $row['category'] = $row['kategori'] ?? 'kategori';
            ?>
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:-translate-y-1 transition">
                        <?php if (!empty($row['image'])): ?>
                            <div class="rounded-xl bg-gray-200">
                                <img
                                    src="../uploads/<?= htmlspecialchars($row['image']) ?>"
                                    alt="<?= htmlspecialchars($row['title']) ?>"
                                    class="w-full h-40 object-cover">
                            </div>
                        <?php else: ?>
                            <span class="text-gray-400 italic">No Image</span>
                        <?php endif; ?>
                        <div class="p-4">
                            <div class="text-sm text-blue-600 mb-1">
                                #<?= htmlspecialchars($row['kategori']) ?>
                            </div>
                            <div class="font-bold text-lg leading-tight mb-1">
                                <a href="artikel.php?id=<?= $row['id'] ?>">
                                    <?= htmlspecialchars($row['title']) ?>
                                </a>
                            </div>
                            <div class="text-sm text-gray-500">
                                <?= htmlspecialchars($row['author']) ?><br>
                                <?= date('d M Y', strtotime($row['created_at'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
            else: ?>
                <p class="text-center text-gray-500">Belum ada artikel.</p>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>