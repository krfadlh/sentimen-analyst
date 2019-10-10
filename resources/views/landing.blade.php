<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Drama Ojol</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">

    <!-- Custom fonts for this template -->
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{asset('css/agency.min.css')}}">
    <style type="text/css">
    .dropbtn {
        background-color: #049041;
        color: white;
        padding: 16px;
        font-size: 90%;
        font-weight: 550;
        border: none;
        font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    }
    .dropdown {
      position: relative;
      display: inline-block;
    }
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f1f1f1;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }
    .dropdown-content a { 
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-size: 80%;
      font-weight: 550;
      font-family: Montserrat,-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
    }
    .dropdown-content a:hover {background-color: #ddd;}
    .dropdown:hover .dropdown-content {display: block;}
    .dropdown:hover .dropbtn {background-color: #3e8e41;}

    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Drama Ojol</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Fitur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">Kategori</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/opinions" target="_blank">Opini</a>
            </li>

            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontak</a>
            </li>

           <!--  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/category-chart">Statistics</a>
            </li> -->
            
           <!--  <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/ranking-gojek">Ranking</a>
            </li> -->

            <div class="dropdown">
              <button class="dropbtn">GRAFIK KATEGORI</button>
              <div class="dropdown-content">
                <a href="/category-chart" target="_blank">Mentions Based</a>
                <a href="/ranking-category" target="_blank">Percentage Based</a>
                <a href="/gojek-wordcloud" target="_blank">WordCloud Gojek</a>
                <a href="/grab-wordcloud" target="_blank">WordCloud Grab</a>
              </div>
            </div>

            <div class="dropdown">
              <button class="dropbtn">GRAFIK SENTIMEN</button>
              <div class="dropdown-content">
                <a href="/positive-chart" target="_blank">Positif</a>
                <a href="/negative-chart" target="_blank">Negatif</a>
                <a href="/jumlah-data" target="_blank">Jumlah Data</a>
              </div>
            </div>

          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Sosial Media Analis</div>
          <div class="intro-heading text-uppercase">Tentang Ojek Online</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Details</a>
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Fitur</h2>
            <h3 class="section-subheading text-muted">Membantu perusahaan ojek online untuk meningkatan kualitas layanannya dengan menyediakan <br> infografis mengenai analisis sentimen dan kategori dari opini di sosial media twitter</h3>
            <!-- <h3 class="section-subheading text-muted">Help ojek online providers to improve their services quality <br> by providing information on the results of statistical analysis <br> and the category of complaints on social media twitter.</h3> -->
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fab fa-twitter-square fa-stack-1x fa-inverse"></i>
              
            </span>
            <h4 class="service-heading">Sentimen Analisis</h4>
            <p class="text-muted">Mengetahui apa yang dirasakan pengguna mengenai layanan ojek online dengan menghitung sentimen opini mereka mengenai Go-Jek dan Grab.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-database fa-stack-1x fa-inverse"></i>
              <!-- <i class="fas fa-laptop fa-stack-1x fa-inverse"></i> -->
            </span>
            <h4 class="service-heading">Kategorisasi</h4>
            <p class="text-muted">Mengkategorikan opini yang sudah memiliki sentimen apakah termasuk dalam kategori aplikasi, harga, driver, penumpang, perusahaan dan others.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-chart-bar fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Visualisasi</h4>
            <p class="text-muted">Menyajikan data hasil analisa sentimen dan kategori kedalam bentuk chart dan grafik sehingga data lebih mudah dibaca.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Jenis Kategori</h2>
            <h3 class="section-subheading text-muted">5 hal yang sering dibahas pengguna</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <br>
                  <h4>Aplikasi</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-body">
                    <p class="text-muted" style="text-align: justify;">Hal yang sering dikeluhkan masyarakat tentang transportasi online adalah aplikasi performa aplikasinya. Mulai dari aplikasi yang tiba-tiba ter-logout, tidak bisa login, Go-Pay tidak dapat digunakan, diskon tidak dapat diklaim dan masalah layanan lain yang ada dalam aplikasi.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <br>
                  <h4>Harga</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-body">
                    <p class="text-muted" style="text-align: justify;">Banyak pengemudi ojek online menganggap kebijakan manajemen salah satu perusahaan ojek online menurunkan harga tarif per kilometer adalah sikap yang keterlaluan. Semula, tarif berkisar Rp3 ribu hingga Rp4 ribu per kilometer. Saat ini hanya Rp1.200 per kilometer. Sehingga banyak pengemudi terbebani dengan kebijakan itu.</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <br>
                  <h4>Driver</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-body">
                    <p class="text-muted" style="text-align: justify;">Salah satu alasan yang membuat masyarakat tidak nyaman menggunakan layanan transportasi online adalah karena pengemudinya. Terbukti dengan ada kasus beberapa penumpang yang mendapatkan pernyataan tidak menyenangkan dari pengemudi dengan menyampaikan kata-kata tidak sopan. Atau kondisi pengemudi yang mengganggu penumpang seperti bau badan mereka, kondisi helm dan lain-lain.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <br>
                  <h4>Penumpang</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-body">
                    <p class="text-muted" style="text-align: justify;">Saat ini penumpang cukup meresahkan keadaan driver transportasi online. Pasalnya pada beberapa kasus, terdapat customer yang memberikan review/ rating negatif kepada pengemudi yang berdampak pada gaji pengemudi diperusahaan, padahal jika dilihat kesalahan bukan dari driver, namun dari penumpang itu sendiri</p>
                  </div>
                </div>
              </li>
               <li>
                <div class="timeline-image">
                  <br>
                 <h4>Perusahaan</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-body">
                    <p class="text-muted" style="text-align: justify;">Masyarakat terutama mitra gojek dan grab sering mengeluhkan kebijakan kedua perusahaan penyedia aplikasi yang dinilai semakin memberatkan. Perubahan-perubahan, seperti peningkatan target untuk insentif, penurunan harga bayar, serta terus bertambahnya driver, semakin menyulitkan dan membatasi pendapatan driver dilapangan. Diharapkan perusahaan melakukan jaring aspirasi sebelum menetapkan kebijakan.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <br>
                  <h4>Others</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Kontak</h2>
            <h3 class="section-subheading text-muted">Kami sangat antusias untuk mendengarkan segala saran Anda</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Kirim Pesan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Drama Ojol <script>document.write(new Date().getFullYear());</script></span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="https://twitter.com/karinaafh">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.facebook.com/karin.faradila">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/in/karinafh/">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/agency.min.js')}}"></script>
  </body>

</html>