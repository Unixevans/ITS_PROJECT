<?php

// Connect To File Function
require 'setup/function_its.php';

// SELECT DATA SLIDE SHOW
$slide = query("SELECT * FROM slide_data");

// SELECT DATA BLOG
$blog = query("SELECT * FROM blog_data ORDER BY id ASC");

// SELECT DATA STRUCTURES
$structures = query("SELECT * FROM structure_data");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="img/logo/logo_its-removebg-preview.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stele.css" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Link Swiper -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">

    <title>IT Society</title>
  </head>
  <body>
    <header class="wrapper">
      <div class="top-bar1"></div>
      <div class="top-bar2">
        <h4 class="top">IT SOCIETY</h4>
        <h4 class="tep">Teknik Komputer Jaringan</h4>
      </div>
      <nav class="navigation">
        <div class="brand">
          <img src="img/logo/logo_its.png" alt="logo_its" class="logo-brand" />
        </div>

        <div class="plex">
          <button id="hamburger" class="hmbgr">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
          </button>
        </div>

        <ul class="navi" id="nav-menu">
          <li class="home"><a href="#home">HOME</a></li>
          <li class="prof"><a href="#profile">PROFILE</a></li>
          <li class="inpo"><a href="#visimi">VISI MISI</a></li>
          <li class="inpo"><a href="#structure">STRUCTURES</a></li>
          <li class="inpo"><a href="#blogs">BLOGS</a></li>
          <li class="contact"><a href="#contact">CONTACT</a></li>
        </ul>
      </nav>
    </header>

    <div class="spasi-mob"></div>

    <section id="home" class="container-fluid p-0">
      <div
        id="carouselExampleInterval"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
      >
        <div class="carousel-indicators">
        <?php $i = 0; ?>
        <?php $si1 = 1; ?>
        <?php $iterFirst = true; ?>
        <?php foreach ($slide as $sld) : ?>
          <?php if ($iterFirst) { ?>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="<?= $i;?>"
              class="active"
              aria-current="true"
              aria-label="Slide&nbsp;<?= $si1;?>"
            ></button>
            <?php $iterFirst = false;?>
          <?php } else { ?>
            <button
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide-to="<?= $i;?>"
              aria-label="Slide&nbsp;<?= $si1;?>"
            ></button>
          <?php } ?>
        <?php $i++;?>
        <?php $si1++; ?>
        <?php endforeach; ?>
        </div>
        <div class="carousel-inner">
        <?php $iterSec = true; ?>
        <?php foreach ($slide as $sld) :?>
          <?php if ($iterSec) { ?>
            <div class="carousel-item active" data-bs-interval="3000">
              <img src="resources/slide/<?= $sld["gambar"];?>" class="d-block w-100 set-brg" alt="..." />
              <div
                class="carousel-caption d-none d-md-block position-absolute top-50"
              >
                <h5 class="display-3 sld-shw"><?= $sld["judul"];?></h5>
                <p class="sld-shw-des"><?= $sld["deskripsi"];?></p>
              </div>
            </div>
            <?php $iterSec = false; ?>
          <?php } else { ?>
            <div class="carousel-item" data-bs-interval="3000">
              <img src="resources/slide/<?= $sld["gambar"];?>" class="d-block w-100 set-brg" alt="..." />
              <div
                class="carousel-caption d-none d-md-block position-absolute top-50"
              >
                <h5 class="display-3 sld-shw"><?= $sld["judul"];?></h5>
                <p class="sld-shw-des"><?= $sld["deskripsi"];?></p>
              </div>
            </div>
          <?php } ?>
        <?php endforeach; ?>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleInterval"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <div class="row to-point">
        <div
          class="col for-point bg-warning custom-height d-flex flex-column justify-content-center align-items-center text-center"
        >
          <h3 class="imt">KERJA SAMA YANG SOLID</h3>
          <p class="pimt">
            Sikap kerja sama antara satu dengan yang lain adalah hal yang diutamakan dalam himpunan kami.
          </p>
        </div>
        <div
          class="col for-point bg-dark text-warning custom-height d-flex flex-column justify-content-center align-items-center text-center"
        >
          <h3 class="imt">MENGEDEPANKAN SIKAP SEMANGAT BERORGANISASI</h3>
          <p class="pimt">
            Semangat berorganisasi merupakan aspek penting yang kami bangun bersama untuk kemajuan himpunan kami.
          </p>
        </div>
        <div
          class="col for-point bg-warning custom-height d-flex flex-column justify-content-center align-items-center text-center"
        >
          <h3 class="imt">SELALU MENGUTAMAKAN SIKAP SPIRITUAL</h3>
          <p class="pimt">
            Kami selalu mengutamakan aspek spiritual dalam setiap kegiatan program himpunan. Sebagai makhluk yang percaya adanya pencipta.
          </p>
        </div>
      </div>
    </section>

    <section id="profile" class="row profiles">
      <div class="col-sm-1 w-10 profilespc"></div>
      <div class="col profile1 d-flex flex-column justify-content-start pt-5 ps-5">
        <h3 class="w-100 a-b">PROFIL&nbsp;<b class="b-a">HIMPUNAN</b></h3>
        <div class="hr"></div>
        <p class="p-ab">
          IT Society atau yang biasa disingkat dengan ITS, adalah sebuah himpunan yang dimiliki oleh jurusan Teknik Komputer dan Jaringan SMK Negeri 1 Nglegok. Tujuan adanya himpunan ini, adalah untuk menampung aspirasi atau pendapat dari seluruh anggota TKJ. 
        </p>
        <div class="programs">
          <h3 class="progker-a">PROGRAM&nbsp;<b class="progker-b">KERJA</b></h3>
          <div class="hr"></div>
          <ul class="progs">
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PENATAAN LAB TKJ</li>
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PERBAIKAN SPOT TKJ</li>
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PEMBANGUNAN ZONA TKJ</li>
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PENGEMBANGAN UPJ</li>
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PEMBENTUKAN HSJ</li>
              <li><i class="fa-regular fa-circle-check" style="color: #ffbc05;"></i>&nbsp;PEMANFAATAN ALAT LAB TKJ</li>
          </ul>
          <a href="#" class="atag"><button class="abouts">TENTANG KAMI</button></a>
        </div>
      </div>
      <div class="col imager-logits">
          <img src="img/logo/logoits.jpg" alt="" class="logoits">
      </div>
    </section>


    <section id="visimi" class="bl-bg">
      <div class="vision-mision">
        <h2 class="visimisi">VISI MISI</h2>
        <p class="vismis">Berikut adalah visi dan misi himpunan IT Society</p>
      </div>
      <div class="centoner">
        <div class="cardu" style="--clr: #F9C72C;">
          <div class="cantont">
            <h2>VISI</h2>
            <p>"Membangun diri yang religius dan berkarakter Pancasila. Serta menciptakan tenaga yang profesional."</p>
          </div>
          <div class="imgBx">
            <img src="img/goal.png" alt="">
          </div>
          <div class="textBx">
            <h2>VISI</h2>
          </div>
        </div>
        <div class="cardu" style="--clr: #F9C72C;">
          <div class="cantont">
            <h2>MISI</h2>
            <ol type="1">
              <li>Mengembangkan sikap dan keterampilan yang siap menghadapi persaingan dunia industri.</li>
              <li>Menciptakan lingkungan yang harmonis dan kekeluargaan.</li>
              <li>Pemanfaatan dan pemberdayaan teknologi informasi yang berkesinambungan.</li>
            </ol>
          </div>
          <div class="imgBx">
            <img src="img/leadership.png" alt="">
          </div>
          <div class="textBx">
            <h2>MISI</h2>
          </div>
        </div>
      </div>
    </section>


    <section id="structure" class="structure">
      <div class="structure-ttl">
        <h2 class="str-ttl">STRUKTUR KEPENGURUSAN</h2>
        <p class="str-des">Berikut adalah struktur kepengurusan dari himpunan IT Society</p>
      </div>
      <div class="slet-centuner swiper">
        <div class="slet-cantunt mySwiper">
          <div class="karte-wrapp swiper-wrapper">
          <?php foreach ($structures as $str) :?>
            <div class="karte swiper-slide">
              <div class="image-cantunt">
                <span class="overlay"></span>

                <div class="karte-image">
                  <img src="resources/structures/<?= $str["gambar"];?>" alt="" class="karte-img">
                </div>
              </div>

              <div class="karte-cantunt">
                <h2 class="nama-karte text-uppercase text-center"><?= $str["nama"];?></h2>
                <p class="jabatan"><?= $str["divisi"];?></p>
              </div>
              <ul class="cocial-linked">
                <li><a href="<?= $str["instagram"];?>"><i class="fa-brands fa-instagram"></i></a></li>
                <li><a href="<?= $str["facebook"];?>"><i class="fa-brands fa-square-facebook"></i></a></li>
                <li><a href="<?= $str["linkedin"];?>"><i class="fa-brands fa-linkedin"></i></a></li>
                <li><a href="<?= $str["tiktok"];?>"><i class="fa-brands fa-tiktok"></i></a>
              </ul>
            </div>
          <?php endforeach; ?>
        </div>
        <!-- <div class="autoplay-progress">
          <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
          </svg>
          <span></span>
        </div> -->
      </div>
    </section>

    <section id="blogs" class="blogs">
      <div class="ttl-blogs">
        <h2 class="txt-blogs">TULISAN TERKINI</h2>
        <p class="des-blogs">Berikut adalah informasi dan berita terbaru dari himpunan kami.</p>
      </div>
      <div class="wadah-blogs">
      <?php foreach ($blog as $blg) : ?>
        <div class="kartu">
          <img src="resources/blog/<?= $blg["gambar"];?>" alt="">
          <div class="describes">
            <h3 class="truncate-blog"><?= $blg["title"];?></h3>
            <p class="describe-blog"><?= $blg["deskripsi"];?></p>
            <a href="#" class="read-more">Baca Selengkapnya</a>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </section>

    <section id="contact" class="contacts">
      <div class="contact-ttl">
        <h2 class="ttl-contact">HUBUNGI KAMI</h2>
        <p class="txt-contact">Kami tahu bahwa website kami masih jauh dari kata sempurna, oleh karena itu masukkan dari anda sangat membantu kami dalam penyempurnaan website ini.</p>
      </div>
      <div class="wadah-contact">
        <label for="name" class="lbl">Nama</label>
        <input type="text" id="name" class="inpt">

        <label for="email" class="lbl">Email</label>
        <input type="email" id="email" class="inpt">

        <label for="message" class="lbl">Pesan</label>
        <textarea type="text" name="message" id="message" class="txtarea"></textarea>

        <button type="submit" class="btn-sub">KIRIM</button>
      </div>
    </section>

    <div class="footer">
      <div class="foot-1">
        <div class="ftr-1">
          <h2 class="ftr-ttl">IT SOCIETY</h2>
          <h3 class="cnt-ftr">Contact Us</h3>
          <p class="des-ftr">itsociety2023@gmail.com<br>Jl. Raya Penataran No.1, Nglegok 1, Nglegok, Kec. Nglegok, Kabupaten Blitar, Jawa Timur 66181</p>
        </div>
        <div class="ftr-2">
          <h3 class="act-ftr">Aktivitas Lain</h3>
          <ul class="linked-ftr">
            <li><a href="#">Programs</a></li>
            <li><a href="#">Bloggers</a></li>
            <li><a href="#">Daily Works</a></li>
          </ul>
        </div>
        <div class="ftr-3">
          <h3 class="act-ftr">Kategori Tautan</h3>
          <ul class="linked-ftr">
            <li><a href="#">Home</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Vision and Mission</a></li>
            <li><a href="#">Structures</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="foot-2">
        <div class="sosial-ftr">
          <!-- Instagram -->
          <a href="#" class="link-ftr"><i class="fa-brands fa-instagram"></i></a>

          <!-- Tiktok -->
          <a href="#" class="link-ftr"><i class="fa-brands fa-tiktok"></i></a>

          <!-- Facebook -->
          <a href="#" class="link-ftr"><i class="fa-brands fa-square-facebook"></i></a>

          <!-- Twitter -->
          <a href="#" class="link-ftr"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <div class="copyright">
          <p class="developer">Copyright 2023 <a href="https://unixevans.github.io/webprofile/" class="tebal">Evan-Kamalludin</a> All Right Reserved</p>
        </div>
      </div>
    </div>

    <a href="#home" class="to-top" id="to-top"><i class="fa-solid fa-chevron-up"></i></a>


    <!-- Js Swiper -->
    <script src="js/swiper-bundle.min.js"></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script>

      window.onscroll = function() {
          const header = document.querySelector('#profile');
          const fixedNav = header.offsetTop;
          const toTop = document.querySelector('#to-top');


          if(window.pageYOffset > fixedNav) {
              toTop.classList.remove('hidden');
              toTop.classList.add('flex');
          } else {
              toTop.classList.remove('flex');
              toTop.classList.add('hidden');
          }
      }




      var topbar1 = document.querySelector(".wrapper .top-bar1");
      window.addEventListener("scroll", () => {
        if (document.documentElement.scrollTop > 100) {
          topbar1.classList.add("sticky");
        } else {
          topbar1.classList.remove("sticky");
        }
      });
      var topbar2 = document.querySelector(".wrapper .top-bar2");
      window.addEventListener("scroll", () => {
        if (document.documentElement.scrollTop > 100) {
          topbar2.classList.add("sticky");
        } else {
          topbar2.classList.remove("sticky");
        }
      });
      var wrap = document.querySelector(".wrapper");
      window.addEventListener("scroll", () => {
        if (document.documentElement.scrollTop > 100) {
          wrap.classList.add("sticky");
        } else {
          wrap.classList.remove("sticky");
        }
      });

      var nav = document.querySelector(".wrapper .navigation");
      window.addEventListener("scroll", () => {
        if (document.documentElement.scrollTop > 100) {
          nav.classList.add("sticky");
        } else {
          nav.classList.remove("sticky");
        }
      });

      // Hamburger Menu
      const hamburger = document.querySelector('#hamburger');
      const navMenu = document.querySelector('#nav-menu');
      hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        navMenu.classList.toggle('muncul');
      });



      // Mendapatkan elemen-elemen section pada halaman
      const sections = document.querySelectorAll("section");

      // Menambahkan EventListener untuk mengubah warna saat guliran
      window.addEventListener("scroll", () => {
        const scrollY = window.scrollY;

        sections.forEach((section, index) => {
          const sectionTop = section.offsetTop;
          const sectionBottom = sectionTop + section.clientHeight;

          if (scrollY >= sectionTop && scrollY < sectionBottom) {
            // Menambahkan kelas aktif ke tautan yang sesuai
            document.querySelectorAll("nav a").forEach((link) => {
              link.classList.remove("active");
            });
            document.querySelectorAll(".navi li a")[index].classList.add("active");
          }
        });
      });


      function handleResize() {
        const lebarJendela = window.innerWidth;

        const progressCircle = document.querySelector(".autoplay-progress svg");
        const progressContent = document.querySelector(".autoplay-progress span");
        if (lebarJendela <= 768) {
          var swiper = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
            delay: 4500,
            disableOnInteraction: false,
            },
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            on: {
              autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
              }
            }
          });
        } else {
          var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            autoplay: {
            delay: 4500,
            disableOnInteraction: false,
            },
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
            on: {
              autoplayTimeLeft(s, time, progress) {
                progressCircle.style.setProperty("--progress", 1 - progress);
                progressContent.textContent = `${Math.ceil(time / 1000)}s`;
              }
            }
          });
        }
      }

      window.addEventListener("resize", handleResize);
      handleResize();
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
