<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    print_r($_POST);
    $book_id = $_POST['book_id'];
    $member_id = $_POST['member_id'];
    $loan_date = date('Y-m-d');
    $return_date = date('Y-m-d', strtotime('+7 days'));

    $stmt = $conn->prepare("INSERT INTO loans (book_id, member_id, loan_date, return_date) VALUES (?, ?, ?, ?)");
    $stmt->execute([$book_id, $member_id, $loan_date, $return_date]);

    echo "Peminjaman berhasil dicatat!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
</head>
<body>
    <h1>Form Peminjaman Buku</h1>
    <form action="loans.php" method="post">
        <label for="book_id">ID Buku:</label>
        <input type="number" name="book_id" id="book_id" required>
        <br>
        <label for="member_id">ID Anggota:</label>
        <input type="number" name="member_id" id="member_id" required>
        <br>
        <button type="submit">Catat Peminjaman</button>
    </form>
</body>
</html>
