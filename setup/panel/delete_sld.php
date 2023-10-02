<?php

require '../function_slide.php';

$id = $_GET["id"];

if ( delete($id) > 0 ) {
    echo "<script>
            alert('Slide Berhasil Dihapus!');
            document.location.href = 'slide_show.php';
          </script>";
} else {
    echo "<script>
            alert('Slide Gagal Dihapus!');
          </script>";
}


?>