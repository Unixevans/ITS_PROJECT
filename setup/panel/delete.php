<?php

require '../function.php';

$id = $_GET["id"];

if ( delete($id) > 0 ) {
    echo "<script>
            alert('Postingan Berhasil Dihapus!');
            document.location.href = 'blog.php';
          </script>";
} else {
    echo "<script>
            alert('Postingan Gagal Dihapus!');
          </script>";
}


?>