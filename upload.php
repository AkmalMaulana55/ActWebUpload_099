<?php

$target_dir = __DIR__ . "/uploads/";

if (!is_dir($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$message = "";

if(isset($_FILES["fileToUpload"])){

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $message = "File terlalu besar!";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

            $message = "Upload berhasil!";

        } else {

            $message = "Upload gagal!";

        }

    }

}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hasil Upload</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#0f172a,#1e293b);
}

.card{
    width:450px;
    background:white;
    padding:35px;
    border-radius:20px;
    box-shadow:0 15px 35px rgba(0,0,0,0.3);
    text-align:center;
}

h1{
    margin-bottom:15px;
    color:#111827;
}

.success{
    color:#16a34a;
    font-weight:bold;
    margin-bottom:20px;
}

.error{
    color:#dc2626;
    font-weight:bold;
    margin-bottom:20px;
}

.btn{
    display:inline-block;
    margin-top:15px;
    padding:12px 20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:10px;
    transition:0.3s;
}

.btn:hover{
    background:#1d4ed8;
}

</style>

</head>
<body>

<div class="card">

    <h1>Upload File</h1>

    <?php if($message == "Upload berhasil!"): ?>

        <div class="success">
            <?= $message ?>
        </div>

    <?php else: ?>

        <div class="error">
            <?= $message ?>
        </div>

    <?php endif; ?>

    <a href="lihat_file.php" class="btn">
      Lihat Semua File
    </a>

</div>

</body>
</html>