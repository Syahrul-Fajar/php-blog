<?php
session_start();
include '../config/db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$content = $_POST['content'];
$kategori = $_POST['kategori'];

// Image handling
$imageName = '';
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    $imageTmp = $_FILES['gambar']['tmp_name'];
    $imageName = basename($_FILES['gambar']['name']);
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    move_uploaded_file($imageTmp, $uploadDir . $imageName);
    
    // Update query with image
    $sql = "UPDATE posts SET title='$title', content='$content', image='$imageName', kategori='$kategori' WHERE id=$id";
} else {
    // Update query without image
    $sql = "UPDATE posts SET title='$title', content='$content', kategori='$kategori' WHERE id=$id";
}
$conn->query($sql);

header("Location: dashboard.php");