<?php
    declare(strict_types=1);
    $nama = "Mustaqim";
    $usia = 18;
    $hobi = ["mancing", "berenang", "makan", "masak"];
    $saldo = 12_000_000.00;
    $statusAktif = true;
    var_dump($saldo).PHP_EOL;

    // menghitung karater terpanjang dari string yang pernah di masukkan
    function maxStrLen(string $str, bool $reset = false): int {
        static $longest = 0;
        if (!$longest || $reset) {
            $longest = strlen($str);
            return $longest;
        }
        if ($longest < strlen($str)) {
            $longest = strlen($str);
        }
        return $longest;
    }
    function str_right(string $str): string {
        return str_pad($str, maxStrLen($str)+1, ' ', STR_PAD_RIGHT);
    }
    function tampilkanProfil
    (string $nama, int $usia,  bool $statusAktif, array $hobi) {
        echo str_right("Status").": ", ($statusAktif ? "aktif" : "tidak aktif").PHP_EOL;
        echo str_right("Nama").": $nama".PHP_EOL;
        echo str_right("Usia").": $usia".PHP_EOL;
        echo str_right("Hobi").": ".implode(", ", $hobi).PHP_EOL;
    }
    tampilkanProfil($nama, $usia, $statusAktif, $hobi);
?>

