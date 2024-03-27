<?php
// Inisialisasi variabel dengan nilai null
$berat_badan = null;
$tinggi_badan = null;
$hasil_perhitungan = ''; // Menyimpan hasil perhitungan

// Cek apakah ada data yang dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Tangkap data berat badan dan tinggi badan
    $berat_badan = isset($_POST['fbb']) ? $_POST['fbb'] : null;
    $tinggi_badan = isset($_POST['ftb']) ? $_POST['ftb'] : null;

    // Cek apakah tombol "Hitung" ditekan
    if (isset($_POST['hitung'])) {
        // Lakukan perhitungan BMI hanya jika nilai berat badan dan tinggi badan sudah ada
        if ($berat_badan !== null && $tinggi_badan !== null) {
            // Cek apakah nilai berat badan dan tinggi badan valid (numerik)
            if (!is_numeric($berat_badan) || !is_numeric($tinggi_badan)) {
                $hasil_perhitungan = "Mohon masukkan nilai berat badan dan tinggi badan yang valid.";
            } else {
                // Lakukan perhitungan BMI
                $berat_badan = floatval($berat_badan);
                $tinggi_badan = floatval($tinggi_badan);

                if ($tinggi_badan == 0) {
                    $hasil_perhitungan = "Tinggi badan tidak boleh nol.";
                } else {
                    $tinggi_badan_m = $tinggi_badan / 100;
                    $bmi = $berat_badan / ($tinggi_badan_m * $tinggi_badan_m);

                    // Simpan hasil perhitungan
                    $hasil_perhitungan .= "<h2> HASIL PERHITUNGAN </h2>";
                    $hasil_perhitungan .= "<p>Berat Badan Anda : ". $berat_badan . " kg</p>";
                    $hasil_perhitungan .= "<p>Tinggi Badan Anda : " . $tinggi_badan . " cm</p>";
                    $hasil_perhitungan .= "<p>BMI Anda: " . number_format($bmi, 2) . "</p>";

                    if ($bmi < 18.5) {
                        $hasil_perhitungan .= "<p>Anda berada di bawah berat badan normal.</p>";
                    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                        $hasil_perhitungan .= "<p>Berat badan Anda normal.</p>";
                    } elseif ($bmi >= 24.9 && $bmi < 29.9) {
                        $hasil_perhitungan .= "<p>Anda kelebihan berat badan.</p>";
                    } else {
                        $hasil_perhitungan .= "<p>Anda termasuk ke dalam kategori obesitas.</p>";
                    }
                }
            }
            // Tampilkan hasil perhitungan
            echo $hasil_perhitungan;
        }
    } elseif (isset($_POST['reset'])) {
        // Jika tombol "Reset" ditekan, reset nilai berat badan, tinggi badan, dan hasil perhitungan
        $berat_badan = null;
        $tinggi_badan = null;
        $hasil_perhitungan = '';
    }
}
?>
