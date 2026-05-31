<?php
    declare(strict_types=1);
    $nama = "Mustaqim";
    $usia = 18;
    $saldo = 12_000_000.00;
    $hobi = ["mancing", "berenang", "makan", "masak"];
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
        return str_pad($str, maxStrLen($str)+2, ' ', STR_PAD_RIGHT);
    }
    function tampilkanProfil
    (string $nama, int $usia, float $saldo, bool $statusAktif, array $hobi) {
        $result =  str_right("Nama").": $nama".PHP_EOL.
            str_right("Usia").": $usia".PHP_EOL.
            str_right("Status aktif").": $statusAktif".PHP_EOL.
            str_right("Hobi").": ";
       
        foreach($hobi as $h) {
            $result .= " $h,";
        }
        return substr($result, 0, -1);
    }
?>

