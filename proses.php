<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $komentar = htmlspecialchars($_POST["komentar"]);
    $waktu = date("Y-m-d H:i:s");

    $data = "$nama|$waktu|$komentar" . PHP_EOL;
    file_put_contents("komentar.txt", $data, FILE_APPEND);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Komentar Pengunjung</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body class="body">

<div class="komen">
    <h2>Daftar Komentar Pengunjung</h2>

 <?php
    if (file_exists("komentar.txt")) {
        $lines = file("komentar.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $no = 1;
        foreach ($lines as $line) {
            $data = explode("|", $line);
            if (count($data) === 3) {
                list($nama, $waktu, $komentar) = $data;

                echo '<div class="komentar">';
                echo "<strong>$no. " . htmlspecialchars($nama) . " ($waktu)</strong>";
                echo "<p>" . htmlspecialchars($komentar) . "</p>";
                echo '</div>';

                $no++;
            }
        }
    } else {
        echo "<p>Belum ada komentar.</p>";
    }
    ?>

    <a href="index.html" class="btn">🔙 Kembali ke Halaman Utama</a>
</div>

</body>
</html>