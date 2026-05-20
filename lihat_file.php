<?php

$folder = "uploads/";

$files = scandir($folder);

$imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gallery Upload</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:linear-gradient(135deg,#0f172a,#020617);
    color:white;
    min-height:100vh;
    padding:40px;
}

.container{
    max-width:1300px;
    margin:auto;
}

h1{
    text-align:center;
    margin-bottom:35px;
    font-size:40px;
}

.gallery{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:25px;
}

.card{
    background:#1e293b;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0,0,0,0.4);
    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.image-box{
    width:100%;
    height:250px;
    background:#0f172a;
    display:flex;
    justify-content:center;
    align-items:center;
    overflow:hidden;
}

.image-box img{
    width:100%;
    height:100%;
    object-fit:cover;
}

.content{
    padding:20px;
}

.filename{
    word-break:break-all;
    margin-bottom:15px;
    color:#cbd5e1;
}

.btn-group{
    display:flex;
    gap:10px;
}

.btn{
    flex:1;
    text-align:center;
    padding:10px;
    border-radius:10px;
    text-decoration:none;
    color:white;
    font-weight:bold;
    transition:0.3s;
}

.view{
    background:#2563eb;
}

.view:hover{
    background:#1d4ed8;
}

.download{
    background:#16a34a;
}

.download:hover{
    background:#15803d;
}

.delete{
    background:#dc2626;
}

.delete:hover{
    background:#b91c1c;
}

.top-btn{
    display:inline-block;
    margin-bottom:30px;
    padding:12px 20px;
    background:#2563eb;
    color:white;
    text-decoration:none;
    border-radius:12px;
    font-weight:bold;
}

.top-btn:hover{
    background:#1d4ed8;
}

.empty{
    text-align:center;
    color:#94a3b8;
    margin-top:50px;
    font-size:20px;
}

</style>

</head>
<body>

<div class="container">

    <a href="index.html" class="top-btn">
        Upload Lagi
    </a>

    <h1>Gallery Upload</h1>

    <div class="gallery">

        <?php

        $found = false;

        foreach($files as $file){

            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

            if(in_array($extension, $imageExtensions)){

                $found = true;

                $path = $folder . $file;

                ?>

                <div class="card">

                    <div class="image-box">
                        <img src="<?= $path ?>">
                    </div>

                    <div class="content">

                        <div class="filename">
                            <?= htmlspecialchars($file) ?>
                        </div>

                        <div class="btn-group">

                            <a 
                              href="<?= $path ?>" 
                              target="_blank"
                              class="btn view"
                            >
                              Lihat
                            </a>

                            <a 
                              href="<?= $path ?>" 
                              download
                              class="btn download"
                            >
                              Download
                            </a>

                            <a 
                              href="hapus.php?file=<?= urlencode($file) ?>"
                              class="btn delete"
                              onclick="return confirm('Yakin ingin menghapus file ini?')"
                            >
                              Hapus
                            </a>

                        </div>

                    </div>

                </div>

                <?php
            }
        }

        if(!$found){
            echo "<div class='empty'>Belum ada gambar yang diupload.</div>";
        }

        ?>

    </div>

</div>

</body>
</html>