<?php
session_start();
if (!isset($_SESSION['login'])) header("Location: login.php");
include '../config/db.php';
$id = $_GET['id'];
$data = $conn->query("SELECT * FROM posts WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-yellow-400 via-yellow-500 to-orange-500 flex items-center justify-center">
    <div class="w-full max-w-lg bg-white bg-opacity-90 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-orange-600 mb-6">Edit Artikel</h2>
        <form action="edit_proses.php" method="POST" enctype="multipart/form-data" class="space-y-6">
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Judul:</label>
                <input type="text" name="title" value="<?php echo htmlspecialchars($data['title']) ?>" required class="w-full px-4 py-2 border border-yellow-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Konten:</label>
                <textarea name="content" rows="10" required class="w-full px-4 py-2 border border-yellow-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400"><?php echo htmlspecialchars($data['content']) ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori:</label>
                <input type="text" name="kategori" value="<?php echo htmlspecialchars($data['kategori']) ?>" required class="w-full px-4 py-2 border border-yellow-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400">
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Format Teks:</label>
                <select name="text_format" class="w-full px-4 py-2 border border-yellow-300 rounded focus:outline-none focus:ring-2 focus:ring-orange-400">
                    <option value="heading">Heading</option>
                    <option value="body">Body</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar:</label>
                <input type="file" name="gambar" accept="image/*" class="block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-yellow-500 file:text-white hover:file:bg-orange-500" />
            </div>
            <div class="flex justify-end">
                <input type="submit" value="Update" class="bg-yellow-500 hover:bg-orange-500 text-white font-semibold px-6 py-2 rounded cursor-pointer transition">
            </div>
        </form>
    </div>
</body>
</html>