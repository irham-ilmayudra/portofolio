<?php
//  Terhubung ke API youtube dan instagram menggunakan teknik cURL

function get_CURL($url)
{

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$youtubeIdWPU = 'UCkXmLjEr95LVtGuIm3l2dPg'; // ID video YouTube yang ingin Anda ambil informasinya
$youtubeIdKT = 'UCnrZ-UFSzeMSxKx_OHtwKsQ';

$apiKey = 'AIzaSyDVSPRwSFx4p29aweT6YOKXizWd3NzKFZ8'; // Kunci API YouTube Anda

$result = get_CURL("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id={$youtubeIdWPU}&key={$apiKey}");

$youtubeProfilePicWPU = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelNameWPU = $result['items'][0]['snippet']['title'];
$subscriberWPU = $result['items'][0]['statistics']['subscriberCount'];


$result2 = get_CURL("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id={$youtubeIdKT}&key={$apiKey}");

$youtubeProfilePicKT = $result2['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelNameKT = $result2['items'][0]['snippet']['title'];
$subscriberKT = $result2['items'][0]['statistics']['subscriberCount'];

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

  <!-- My CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>My Portfolio</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">Irham ilmayudra</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#channels">Channels</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#materi">Materi</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="home" id="home">
    <div class="container">
      <div class="text-center">
        <img src="img/profile.jpg" class="rounded-circle img-thumbnail">
        <h1 class="display-4">Irham ilmayudra</h1>
        <h3 class="lead">Mahasiswa | Abulyatama</h3>
      </div>
    </div>
  </div>

  <!-- About -->
  <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2>About</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-5">
          <p>Halo! Perkenalkan, saya Irham Ilmayudra, seorang mahasiswa IT yang antusias dalam dunia pemrograman dan pengembangan web. Sejauh ini, saya telah belajar melalui sumber-sumber pembelajaran online seperti YouTube, khususnya dari saluran Web Programming UNPAS dan Kelas Terbuka. Melalui saluran-saluran ini, saya telah mempelajari berbagai bahasa pemrograman dan teknologi web yang meliputi HTML, CSS, PHP dan lainnya serta kerangka kerja populer seperti Codeigniter dan Laravel!</p>
        </div>
        <div class="col-md-5">
          <p>Melalui website ini, saya berharap dapat berbagi channel youtube tempat saya dalam belajar pemograman web.Saya berharap dengan belajar dari channel ini Saya bisa menciptakan konten edukatif yang bermanfaat, termasuk tutorial, artikel, dan tips praktis tentang pemrograman dan teknologi web. Saya juga terbuka untuk kolaborasi dan proyek-proyek yang menantang untuk terus mengembangkan keterampilan saya. Terima kasih atas kunjungan Anda!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Channel YouTube -->
  <section class="social bg-light" id="channels">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Channels YouTube</h2>
        <p style="opacity: 0.7;">ini adalah dua channel youtube tempat saya belajar pemograman</p>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePicWPU; ?>" width="150" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelNameWPU; ?></h5>
            <p><?= $subscriberWPU; ?> Subscriber</p>
            <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="full" data-count="default"></div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4">
            <img src="<?= $youtubeProfilePicKT; ?>" width="150" class="rounded-circle img-thumbnail">
          </div>
          <div class="col-md-8">
            <h5><?= $channelNameKT; ?></h5>
            <p><?= $subscriberKT; ?> Subscriber</p>
            <div class="g-ytsubscribe" data-channelid="UCnrZ-UFSzeMSxKx_OHtwKsQ" data-layout="full" data-count="default"></div>
          </div>
        </div>
      </div>
  </section>

  <!-- Materi -->
  <section class="portfolio" id="materi">
    <div class="container">
      <div class="row pt-4 mb-4">
        <div class="col text-center">
          <h2>Materi</h2>
          <p style="opacity: 0.7;">materi-materi yang sudah saya pelajari di kedua channel di atas</p>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NBZ9Ro6UKV8" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar dasar dasar HTML</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/CleFk3BZB3g" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar dasar dasar CSS</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Phn2eN6j0pg" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar CSS layouting</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/l1W2OwV5rgY" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar PHP</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZKDUFoouyBI" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar PHP OOP</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vQJJ_K1JbEA" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar API</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/WtBF_-pLrjE" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar C++</p>
            </div>
          </div>
        </div>
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/ZYBkuY1eiZ4" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar C++ OOP</p>
            </div>
          </div>
        </div>       
        <div class="col-md mb-4">
          <div class="card">
            <div div class="embed-responsive embed-responsive-16by9">
              <iframe iframe class="embed-responsive-item" src="https://www.youtube.com/embed/uHyfQV0kbgo" allowfullscreen></iframe>
            </div>
            <div class="card-body">
              <p class="card-text">Belajar java</p>
            </div>
          </div>
        </div>
      </div> 
    </div>
  </section>


  <!-- footer -->
  <footer class="bg-dark text-white mt-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <p>Copyright &copy; 2023.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>