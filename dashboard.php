<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Harap login terlebih dahulu!'); window.location.href='index.html';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
     <!-- My CSS -->
     <link rel="stylesheet" href="style.css" />
    </head>
  
    <body>
  
</head>
<body>
  <!-- Start navbar -->
  <nav class="navbar navbar-expand-lg" style="background-color: var(--bs-tertiary-color);">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fas fa-book"></i> Toko Buku Bella</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#Home"><i class="fas fa-home"></i> Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#About"><i class="fas fa-info-circle"></i> About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#Orders"><i class="fas fa-shopping-cart"></i>Orders</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->

  <!-- Start jumbotron -->
   <section class="jumbotron text-center">
    <img src="img/Toko buku.jpg" alt="Toko Buku" width="200" class="rounded-circle img-thumbnail" />
    <h2 class="display-4">Hello! Selamat Data Di Website Kami!</h1>
    <p class="lead" > Kami menyediakan berbagai macam buku dengan harga terjangkau dan kualitas terbaik</p>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffd700" fill-opacity="1" d="M0,64L21.8,64C43.6,64,87,64,131,80C174.5,96,218,128,262,154.7C305.5,181,349,
      203,393,197.3C436.4,192,480,160,524,144C567.3,128,611,128,655,144C698.2,160,742,192,785,
      213.3C829.1,235,873,245,916,229.3C960,213,1004,171,1047,133.3C1090.9,96,1135,64,1178,80C1221.8,
      96,1265,160,1309,176C1352.7,192,1396,160,1418,144L1440,128L1440,320L1418.2,320C1396.4,320,1353,320,1309,
      320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,
      320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,320,305,320,
      262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path>
    </svg>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffd700" fill-opacity="1" d="M0,64L21.8,64C43.6,64,87,
      64,131,80C174.5,96,218,128,262,154.7C305.5,181,
      349,203,393,197.3C436.4,192,480,160,524,144C567.3,128,611,128,655,144C698.2,160,742,192,785,213.3C829.1,235,873,245,
      916,229.3C960,213,1004,171,1047,133.3C1090.9,96,1135,64,1178,80C1221.8,96,1265,160,1309,
      176C1352.7,192,1396,160,1418,144L1440,128L1440,0L1418.2,0C1396.4,0,1353,0,
      1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,
      829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,
      175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path></svg>
  </div>
  
  <!-- end jumbotrond -->

<!-- Start About -->
<section id="About">
  <div class="container-fluid">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>About</h2>
      </div>
    </div>
    <div class="row justify-content-center fs-5 text-center">
      <div class="col-4">
        <p>Toko Buku Kami adalah tempat terbaik untuk menemukan inspirasi dan pengetahuan.
           Kami menyediakan beragam buku untuk semua kalangan, dari fiksi hingga non-fiksi. 
           Dengan koleksi yang terus diperbarui, kami siap menemani perjalanan membaca Anda.
           Temukan cerita Anda di sini!</p>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#ffd700" fill-opacity="1" d="M0,64L21.8,64C43.6,64,87,64,131,80C174.5,96,218,128,
    262,154.7C305.5,181,349,203,393,197.3C436.4,192,480,160,524,144C567.3,128,611,128,655,144C698.2,
    160,742,192,785,213.3C829.1,235,873,245,916,229.3C960,213,1004,171,1047,133.3C1090.9,96,1135,64,1178,
    80C1221.8,96,1265,160,1309,176C1352.7,192,1396,160,1418,144L1440,128L1440,320L1418.2,320C1396.4,320,1353,
    320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,
    320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,
    320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffd700" fill-opacity="1" d="M0,64L21.8,64C43.6,64,87,
      64,131,80C174.5,96,218,128,262,154.7C305.5,181,
      349,203,393,197.3C436.4,192,480,160,524,144C567.3,128,611,128,655,144C698.2,160,742,192,785,213.3C829.1,235,873,245,
      916,229.3C960,213,1004,171,1047,133.3C1090.9,96,1135,64,1178,80C1221.8,96,1265,160,1309,
      176C1352.7,192,1396,160,1418,144L1440,128L1440,0L1418.2,0C1396.4,0,1353,0,
      1309,0C1265.5,0,1222,0,1178,0C1134.5,0,1091,0,1047,0C1003.6,0,960,0,916,0C872.7,0,
      829,0,785,0C741.8,0,698,0,655,0C610.9,0,567,0,524,0C480,0,436,0,393,0C349.1,0,305,0,262,0C218.2,0,
      175,0,131,0C87.3,0,44,0,22,0L0,0Z"></path></svg>
</section>
<!-- End About -->

<!-- Start Orders --> 
<section id="Orders">
  <div class="container-fluid">
    <div class="row text-center mb-3">
      <div class="col">
        <h2>Orders</h2>
        <form name="Toko-Buku">
            <div class="row">
                <!-- Nama -->
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required>
                </div>
                <!-- Email -->
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                     placeholder="Email Anda" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted" </small>
                </div>
            </div>
            <div class="row">
                <!-- Alamat -->
                <div class="col-md-12 mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" 
                    rows="2" placeholder="Alamat Anda" required></textarea>
                </div>
            </div>
            <div class="row">
                <!-- Judul Buku -->
                <div class="col-md-6 mb-3">
                    <label for="judulBuku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judulBuku" 
                    name="judulBuku" placeholder="Judul Buku" required>
                </div>
                <!-- Jumlah Pembelian -->
                <div class="col-md-6 mb-3">
                    <label for="jumlahPembelian" class="form-label">Jumlah Pembelian</label>
                    <input type="number" class="form-control" 
                    id="jumlahPembelian" name="jumlahPembelian" placeholder="Jumlah" min="1" required>
                </div>
            </div>
            <!-- Tombol Submit -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-custom">Kirim</button>

            </div>
        </form>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#ffd700" fill-opacity="1" d="M0,64L21.8,64C43.6,64,87,64,131,80C174.5,96,218,128,
      262,154.7C305.5,181,349,203,393,197.3C436.4,192,480,160,524,144C567.3,128,611,128,655,144C698.2,
      160,742,192,785,213.3C829.1,235,873,245,916,229.3C960,213,1004,171,1047,133.3C1090.9,96,1135,64,1178,
      80C1221.8,96,1265,160,1309,176C1352.7,192,1396,160,1418,144L1440,128L1440,320L1418.2,320C1396.4,320,1353,
      320,1309,320C1265.5,320,1222,320,1178,320C1134.5,320,1091,320,1047,320C1003.6,320,960,320,916,320C872.7,320,829,
      320,785,320C741.8,320,698,320,655,320C610.9,320,567,320,524,320C480,320,436,320,393,320C349.1,
      320,305,320,262,320C218.2,320,175,320,131,320C87.3,320,44,320,22,320L0,320Z"></path></svg>
<!-- end Orders -->

<!-- Start Footer -->
<footer class="text-white text-center pb-5" style="background-color: var(--bs-tertiary-color);">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-3">
        <h5>Alamat</h5>
        <p>Jl. Buku No. 456, Jakarta, Indonesia</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Kontak</h5>
        <p>Telepon: (021) 987-6543</p>
        <p>Email: toko@buku.com</p>
      </div>
      <div class="col-md-4 mb-3">
        <h5>Sosial Media</h5>
        <ul class="list-unstyled">
          <li><a href="https://facebook.com" class="text-white" target="_blank">Facebook : Toko Buku Bella</a></li>
          <li><a href="https://twitter.com" class="text-white" target="_blank">Twitter : tokobukubella</a></li>
          <li><a href="https://instagram.com" class="text-white" target="_blank">Instagram : @tokobukubella</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- End Footer -->

<script>
  const scriptURL = 'https://script.google.com/macros/s/AKfycbxoRQ7L2grP44xVwkp0c6NxBSiVOfw0HqcefXVtNB0lgHmNSAdk41HpUSdHT-joEF1U/exec'
  const form = document.forms["Toko-Buku"]

  form.addEventListener('submit', e => {
      e.preventDefault()
      fetch(scriptURL, { method: 'POST', body: new FormData(form)
    }
  ).then(response => {
    console.log('Success!', response)
    form.reset()
    alert("Success!")
  }
).catch(error => {
  console.error('Error!', error.message)
  alert("Error!")
})
  })
  </script>
  </body>


</html>
