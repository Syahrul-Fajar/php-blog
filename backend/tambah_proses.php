<?php
session_start();
include '../config/db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$kategori = $_POST['kategori'];

// Penanganan upload gambar
$imageName = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $imageTmp = $_FILES['gambar']['tmp_name'];
    $imageName = basename($_FILES['gambar']['name']);
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    move_uploaded_file($imageTmp, $uploadDir . $imageName);
}

$sql = "INSERT INTO posts (title, content, image, kategori) VALUES ('$title', '$content', '$imageName', '$kategori')";
$conn->query($sql);

header("Location: dashboard.php");