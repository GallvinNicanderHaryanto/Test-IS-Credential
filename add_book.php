<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("INSERT INTO books (title, author, year) VALUES (?, ?, ?)");
    $stmt->execute([$title, $author, $year]);

    echo "Data buku berhasil ditambahkan!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body>
    <h1>Tambah Data Buku</h1>
    <form action="add_book.php" method="post">
        <label for="title">Judul Buku:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="author">Penulis:</label><br>
        <input type="text" name="author" id="author" required><br><br>

        <label for="year">Tahun Terbit:</label><br>
        <input type="number" name="year" id="year" required><br><br>

        <button type="submit">Tambah Buku</button>
    </form>
</body>
</html>
