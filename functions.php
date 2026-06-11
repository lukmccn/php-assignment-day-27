<?php
declare(strict_types=1);

function judul (string $text): string
{
    return str_pad("", 45, '_', STR_PAD_RIGHT).PHP_EOL.
        str_pad("$text", 45, ' ', STR_PAD_RIGHT).PHP_EOL.
        str_pad("", 45, '-', STR_PAD_RIGHT).PHP_EOL;
};

//--------------------------------------------------
// Fungsi untuk Soal 1:
// Profil User Sederhana (Introduction, Syntax, Variable & Data Type)
//--------------------------------------------------
function tampilkanProfil (
    string $nama,
    int $usia,
    bool $statusAktif,
    array $hobi
): void {
    echo str_pad("Nama", 7, " ", STR_PAD_RIGHT)
        .": $nama\n";
    echo str_pad("Usia", 7, " ", STR_PAD_RIGHT)
        .": $usia\n";
    echo str_pad("Hobi", 7, " ", STR_PAD_RIGHT)
        .": "
        .implode(", ", $hobi)
        .PHP_EOL;
    echo str_pad("Status", 7, " ", STR_PAD_RIGHT)
        .": "
        .($statusAktif ? "aktif" : "tidak aktif")
        .PHP_EOL;
}

//--------------------------------------------------
// Fungsi untuk Soal 2:
// Sistem Penilaian Sederhana (Conditional)
//--------------------------------------------------
const STATUS = true, NO_STATUS = false;
function tentukanGrade (int $val, bool $status = false): string
{
    if ($val < 0 || $val > 100) {
        throw new \InvalidArgumentException('Prameter nilai yang benar adalah 0 - 100.');
    }
    
    $grade =  match (true) {
        ($val >= 85) => 'A',
        ($val >= 70) => 'B',
        ($val >= 60) => 'C',
        default => 'D'
    };

    if ($status) {
        return match ($grade) {
            "A" => "Lulus dengan pujian",
            "B" => "Lulus",
            default => "Remedial"
        };
    }

    return $grade;

}

function status(string $status) {
   
}

function apakahLulus (string|int|float $grade): bool
{
    if (is_numeric($grade)) {
        $grade = tentukanGrade($grade);
    }

    return match (true) {
        $grade === "A" || $grade === "B" => true,
        default => false
    };
}


//--------------------------------------------------
// Fungsi untuk Soal 3:
// Mini Sistem Kasir (Conditional, Function, Array, Looping)
//--------------------------------------------------
function hitungTotalBelanja (
    array $daftarBelanja,
    bool $isMember = false
): array {
    $grandTotal = 0;
    $totalQty = 0;

    foreach ($daftarBelanja as $item) {
        $subtotal = $item['harga'] * $item['qty'];
        $grandTotal += $subtotal;
        $totalQty += $item['qty'];
    }

    // Tentukan persentase diskon
    $diskonPersen = 0;

    // Diskon dasar untuk member
    if ($isMember) {
        $diskonPersen = 15;
    }

    // Tambahan diskon jika total quantity > 5
    if ($totalQty > 5) {
        $diskonPersen += 5;
    }

    $diskonNominal = $grandTotal * $diskonPersen / 100;
    $totalBayar = $grandTotal - $diskonNominal;

    return [
        'grandTotal'    => $grandTotal,
        'totalQty'      => $totalQty,
        'diskonPersen'  => $diskonPersen,
        'diskonNominal' => $diskonNominal,
        'totalBayar'    => $totalBayar,
    ];
}

function rincianTotalBelanja (array $totalBelanja): void
{
    echo "Total Qty: "
        . number_format($totalBelanja['totalQty'], 0, ',', '.').PHP_EOL;
    echo "Diskon Persen: "
        . number_format($totalBelanja['diskonPersen'], 0, ',', '.') . "%".PHP_EOL;
    echo "Diskon Nominal: Rp "
        . number_format($totalBelanja['diskonNominal'], 0, ',', '.').PHP_EOL;
    echo "Grand Total: Rp "
        . number_format($totalBelanja['grandTotal'], 0, ',', '.').PHP_EOL;
    echo "TOTAL BAYAR: Rp "
        . number_format($totalBelanja['totalBayar'], 0, ',', '.').PHP_EOL.PHP_EOL;
}


//--------------------------------------------------
// Fungsi untuk Soal 4:
// Data Siswa & Rekap Nilai (Array Multidimensi, Looping, Function)
//--------------------------------------------------
function rataRata (array $nilai): int
{
    return intval(array_sum($nilai) / count($nilai));
}

const SEMUA_SISWA = 0, SISWA_LULUS = 1, SISWA_REMEDI = 2;
function prosesDataSiswa (array $dataSiswa, int $filter = SEMUA_SISWA): array
{
    if ($filter < 0 && $filter > 2) {
        throw new \InvalidArgumentException(
            "Parameter salah, silahkan gunakan angka 0-2 atau gunakan constanta.");
    }

    $siswaLulus = [];
    $siswaRemedi = [];

    for ($i = 0; $i < count($dataSiswa); $i++) {
        $siswa = &$dataSiswa[$i];
        $nilaiRataRata = intval(
            array_sum($siswa['nilai']) / count($siswa['nilai'])
        );

        $siswa['rataRata'] = $nilaiRataRata;
        if (apakahLulus($nilaiRataRata) && $filter === SISWA_LULUS) {
            $siswaLulus[] = $siswa;
        } elseif (!apakahLulus($nilaiRataRata) && $filter === SISWA_REMEDI) {
            $siswaRemedi[] = $siswa;
        }
    }
    
    return match ($filter) {
        SISWA_LULUS => $siswaLulus,
        SISWA_REMEDI => $siswaRemedi,
        default => $dataSiswa
    };
}