function tampilkanWaktu() {
    var waktuElement = document.getElementById("waktu");
    var waktuSaatIni = new Date();
    var jam = waktuSaatIni.getHours();
    var menit = waktuSaatIni.getMinutes();
    var detik = waktuSaatIni.getSeconds();

    // Tambahkan leading zero untuk menit jika kurang dari 10
    var jamFormatted = jam.toString().padStart(2, '0');
    var menitFormatted = menit.toString().padStart(2, '0');
    var detikFormatted = detik.toString().padStart(2, '0');
    
    var waktuFormatted = jamFormatted + ":" + menitFormatted + ":" + detikFormatted;
    waktuElement.textContent = waktuFormatted;
}

setInterval(tampilkanWaktu, 1000); // Pembaruan setiap 1 detik
tampilkanWaktu(); 