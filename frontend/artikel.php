<?php
include '../config/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$id = (int)$_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($row['title']) ?> - Blog Farsy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<!-- NAVIGATION -->
<nav class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <a href="index.php" class="text-lg font-semibold text-gray-900">blog Farsy.</a>
        <a href="index.php" class="text-sm text-blue-600 hover:underline">← Kembali</a>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="max-w-5xl mx-auto px-4 py-6">
    <!-- Breadcrumb -->
    <div class="text-sm text-gray-500 mb-3"><a href="index.php" class="text-blue-600 hover:underline">
    <?= htmlspecialchars($row['kategori']) ?>
</a>

        <span class="mx-1">›</span>
        <span><?= htmlspecialchars($row['title']) ?></span>
    </div>

    <!-- Title -->
    <h1 class="text-3xl font-bold text-gray-900 mb-2"><?= htmlspecialchars($row['title']) ?></h1>

    <!-- Meta Info -->
    <div class="flex items-center text-sm text-gray-600 mb-6 gap-6 flex-wrap">
        <div class="flex items-center space-x-2">
            <img src="https://i.pravatar.cc/40" alt="Penulis" class="rounded-full w-8 h-8">
            <div>
                <div class="font-semibold text-gray-800"><?= $row['author'] ?? 'Syahrul Fajar' ?></div>
                <div class="text-xs">Penulis</div>
            </div>
        </div>
        <div>
            <div class="text-xs uppercase text-gray-500">Terakhir Diperbarui</div>
            <div><?= date('F d, Y', strtotime($row['created_at'])) ?></div>
        </div>
    </div>

    <!-- Cover Image -->
    <?php if (!empty($row['image'])): ?>
        <div class="flex justify-center mb-6">
    <div class="rounded-xl overflow-hidden shadow-sm inline-block bg-gray-200">
        <img 
            src="../uploads/<?= htmlspecialchars($row['image']) ?>" 
            alt="<?= htmlspecialchars($row['title']) ?>" 
            class="block max-w-full h-auto object-center"
        >
    </div>
</div>



    <?php endif; ?>

    <!-- Content -->
    <div class="prose max-w-none prose-slate">
        <?= nl2br($row['content']) ?>
    </div>
</div>

</body>
</html>
