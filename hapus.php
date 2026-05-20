<?php

if(isset($_GET['file'])){

    $file = basename($_GET['file']);

    $path = "uploads/" . $file;

    if(file_exists($path)){

        unlink($path);

    }

}

header("Location: lihat_file.php");

exit;

?>