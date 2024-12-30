<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO members (name, email) VALUES (?, ?)");
    $stmt->execute([$name, $email]);

    echo "Data anggota berhasil ditambahkan!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Anggota</title>
</head>
<body>
    <h1>Tambah Data Anggota</h1>
    <form action="add_member.php" method="post">
        <label for="name">Nama Anggota:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="email">Email Anggota:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <button type="submit">Tambah Anggota</button>
    </form>
</body>
</html>
