<?php
$conn = mysqli_connect("sql203.infinityfree.com", "if0_35089016", "V0flSgHyBW1hO", "if0_35089016_dataweb");


function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function insertSlide($data) {
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $desc = htmlspecialchars($data["deskripsi"]);

    // upload gambar
    $gambar = uploadGambar();
    if ( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO slide_data VALUES (NULL, '$gambar', '$title', '$desc')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// FUNGSI UPLOAD GAMBAR SLIDE SHOW
function uploadGambar() {
    $namaFile = $_FILES["gambar"]["name"];
    $sizeFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // Validasi sudah upload gambar belum
    if ($error === 4) {
        echo "<script>
                alert('Harap Pilih Gambar Dahulu!');
            </script>";
        return false;
    }

    // Validasi jenis gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
        echo "<script>
                alert('Yang Anda Upload Bukan Gambar! Harap Upload File Bertipe JPG, JPEG, atau PNG!');
            </script>";
        return false;
    }

    // Validasi size gambar
    if ( $sizeFile > 3000000 ) {
        echo "<script>
                alert('Ukuran Gambar Terlalu Besar! Harap Upload Gambar Kurang Dari 3MB!');
            </script>";
        return false; 
    }

    
    // Lolos Validasi Gambar Siap Di Upload

    $namaFileBaruSlide = uniqid();
    $namaFileBaruSlide .= '.';
    $namaFileBaruSlide .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../resources/slide/' . $namaFileBaruSlide);

    return $namaFileBaruSlide;

}


//  FUNGSI UPDATE SLIDE SHOW

function update($data) {
    global $conn;

    $id = $data["id"];
    $title = htmlspecialchars($data["title"]);
    $desc = htmlspecialchars($data["deskripsi"]);
    $gambarLama = htmlspecialchars($data["gambarlama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = uploadGambar();
    }

  
    $query = "UPDATE slide_data SET gambar = '$gambar', judul = '$title', deskripsi = '$desc' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// FUNGSI HAPUS DATA SLIDE
function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM slide_data WHERE id = $id");

    return mysqli_affected_rows($conn);
}



?>