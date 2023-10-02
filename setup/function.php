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






function insert($data) {
    global $conn;

    $title = htmlspecialchars($data["title"]);
    $desc = htmlspecialchars($data["deskripsi"]);

    // upload gambar
    $gambar = uploadGambar();
    if ( !$gambar ) {
        return false;
    }

    $query = "INSERT INTO blog_data VALUES (NULL, '$title', '$desc', '$gambar', CURRENT_TIMESTAMP())";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}




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

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, '../../resources/blog/' . $namaFileBaru);

    return $namaFileBaru;

}



function delete($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM blog_data WHERE id = $id");

    return mysqli_affected_rows($conn);
}


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

  
    $query = "UPDATE blog_data SET title = '$title', deskripsi = '$desc', gambar = '$gambar' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword) {
    $query = "SELECT * FROM blog_data WHERE title LIKE '%$keyword%' ORDER BY id DESC";
    return query($query);
}

function registrasi($data) {
    global $conn;
  
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
  
    //cek konfirmasi username sudah ada atau belum
    $arrow = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
  
    if ( mysqli_fetch_assoc($arrow) ) {
      echo "<script>
                alert('Username sudah terdaftar gagal menambahkan user baru!')
            </script>";
      return false;
    }
  
    //cek konfirmasi password
    if ( $password !== $password2 ) {
      echo "<script>
              alert('Konfirmasi password tidak sesuai!')
            </script>";
      return false;
    }
  
    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
  
    //tambahkan user baru ke dalam database
    mysqli_query($conn, "INSERT INTO users VALUES(NULL, '$username', '$password')");
    return mysqli_affected_rows($conn);
  }



?>

