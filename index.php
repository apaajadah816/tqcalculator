<?php
$kaido = isset($_GET['kaido']) ? $_GET['kaido'] : 'kaido0';

// Membaca daftar merek dari file teks
$validBrands = file('kirim.txt', FILE_IGNORE_NEW_LINES);

if (!in_array($kaido, $validBrands)) {
    // Membaca isi file index.html dari landing page
    $landingPageContent = file_get_contents('index.html');

    // Menampilkan pesan kesalahan
    echo $landingPageContent;

    // Menghentikan eksekusi skrip
    die();
}

// Mengonversi spasi menjadi tanda tambah (+) dalam URL sitemap
$kaido_normalized = str_replace(' ', '+', $kaido);

$canonicalUrl = "https://tq.calculator.earthcheck.org/?kaido=$kaido";
$link = "https://tq.calculator.earthcheck.org/?kaido=$kaido";

$title = "$kaido Daftar Game Online Populer Dengan Pilihan Metode Top Up Terlengkap";
$description = "$kaido adalah Daftar Game Online Populer Dengan Pilihan Metode Top Up Terlengkap dan juga menyediakan permainan yang mudah dipahami dan dimenangkan. Gunakan link $kaido resmi untuk mendapatkan bonus disetiap hari senin.";

// Memuat template dari file terpisah
$template = file_get_contents('template.php');

// Mengganti placeholder dengan nilai yang sesuai
$template = str_replace('{{canonicalUrl}}', $canonicalUrl, $template);
$template = str_replace('{{link}}', $link, $template);
$template = str_replace('{{title}}', $title, $template);
$template = str_replace('{{description}}', $description, $template);
$template = str_replace('{{kaido}}', $kaido, $template); 

echo $template;
?>