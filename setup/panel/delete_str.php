<?php

require '../function_str.php';

$id = $_GET["id"];

if ( delete($id) > 0 ) {
    echo "<script>
            alert('Divisi Berhasil Dihapus!');
            document.location.href = 'structure.php';
          </script>";
} else {
    echo "<script>
            alert('Divisi Gagal Dihapus!');
          </script>";
}


?>