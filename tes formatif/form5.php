<!DOCTYPE html>
<html>
<head>
    <title>Kalkulator Sederhana</title>
</head>
<body>
    <h1>Kalkulator Sederhana</h1>
    <form method="get" action="hasil.php">
        <label>Masukkan Angka Pertama: </label>
        <input type="text" name="angka1" required><br><br>

        <label>Pilih Operasi: </label>
        <select name="operasi" required>
            <option value="penjumlahan">+</option>
            <option value="pengurangan">-</option>
            <option value="pembagian">/</option>
            <option value="perkalian">*</option>
        </select><br><br>

        <label>Masukkan Angka Kedua: </label>
        <input type="text" name="angka2" required><br><br>
        
        <input type="submit" name="hitung" value="Hitung">
        <input type="reset" name="reset" value="reset">
    </form>
</body>
</html>
