<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Perhitungan BMI</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Aplikasi Perhitungan BMI</h1>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Berat Badan (Kg): <input type="text" name="fbb"><br>
    Tinggi Badan (cm): <input type="text" name="ftb"><br>
    <input type="submit" name="hitung" value="Hitung BMI">
    <input type="submit" name="reset" value="Reset">
</form>


        <div class="result">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'calculate_bmi.php';
            }
            ?>
        </div>
    </div>
</body>
</html>
