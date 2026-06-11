<?php
declare(strict_types=1);

require_once 'functions.php';

//--------------------------------------------------
// Soal 1: Profil User Sederhana (Introduction, Syntax, Variable & Data Type)
//--------------------------------------------------
$nama = "Mustaqim";
$usia = 18;
$hobi = ["mancing", "berenang", "makan", "masak"];
$saldo = 12_000_000.00;
$statusAktif = true;

echo judul("soal 1");

tampilkanProfil($nama, $usia, $statusAktif, $hobi);

// Menampilkan informasi variabel
echo "var_dump(\$saldo) : ";
var_dump($saldo);
var_dump($hobi);

//--------------------------------------------------
// Soal 2: Sistem Penilaian Sederhana (Conditional)
//--------------------------------------------------
echo judul("Soal 2: Sistem Penilaian Sederhana (Conditional)");

$semuaNilai = [80, 90, 60, 50, 70];

foreach ($semuaNilai as $nilai) {
    printf("Nilai: %d, Grade: %s\n", $nilai, tentukanGrade($nilai));
}

//--------------------------------------------------
// Soal 3: Mini Sistem Kasir (Conditional, Function, Array, Looping)
//--------------------------------------------------

$daftarBelanja =  [
    ["nama" => "Benih Padi", "harga" => 150_000, "qty" => 2],
    ["nama" => "Benih Jagung", "harga" => 120_000, "qty" => 1],
    ["nama" => "Benih Timun", "harga" => 90_000, "qty" => 2]
];

echo judul("Soal 3: Mini Sistem Kasir (Conditional, Function, Array, Looping)");

$bukanMember = hitungTotalBelanja($daftarBelanja, true);
$member = hitungTotalBelanja($daftarBelanja, false);

rincianTotalBelanja($bukanMember);
rincianTotalBelanja($member);


//--------------------------------------------------
// Soal 4: Data Siswa & Rekap Nilai (Array Multidimensi, Looping, Function)
//--------------------------------------------------
echo judul("Soal 4: Data Siswa & Rekap Nilai (Array Multidimensi, Looping, Function)");

$dataSiswa = [
    ["nama" => "Budi", "jurusan" => "RPL", "nilai" => [80, 90, 75]],
    ["nama" => "Bagus", "jurusan" => "RPL", "nilai" => [80, 90, 70]],
    ["nama" => "Sinta", "jurusan" => "RPL", "nilai" => [90, 90, 75]],
    ["nama" => "Paijo", "jurusan" => "RPL", "nilai" => [50, 60, 60]],
    ["nama" => "Yadi", "jurusan" => "RPL", "nilai" => [60, 70, 60]],
];

$siswaRemedi = prosesDataSiswa($dataSiswa, SISWA_REMEDI);
$siswaLulus = prosesDataSiswa($dataSiswa, SISWA_LULUS);

foreach ($siswaLulus as $siswa) {
    $rataRata = $siswa['rataRata'];
    printf("Selamat %s anda %s dengan nilai %d\n", $siswa['nama'],
    tentukanGrade($rataRata, STATUS), $rataRata);
}