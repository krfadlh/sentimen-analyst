<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Drama Ojol</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="{{asset('css/animate.css')}}">
 
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">

  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
  <style>
    .bold {
      font-size: 100px;
      color: #f0f0f0;
      font-weight: 700; }
    @media screen and (max-width: 768px) {
    .bold {
      font-size: 60px; } }
  </style>

  </head>
  <body>
    <header>
      <div class="container">
         <div class="row text-center">
          <h2 class="bold">Ranking Category Grab</h2>
        </div>
      </div>
    </header>


    <div class="row">
    <form method="get" action="">
    <div class="col-md-12">
        <div style="background-color: #ccc;  margin:40px; padding:20px">
            <div class="row">
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Tahun</span>
                        <select class="form-control" id="range-tahun" name="tahun" style="padding:4px 10px; box-sizing: content-box;">
                               <option value="2018">2018</option>
                                <option value="2019">2019</option>
                          </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">Bulan</span>
                        <select class="form-control" id="range-bulan" name="bulan" style="padding:4px 10px; box-sizing: content-box;">
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>

                    </div>
                </div>
                 <div class="col-sm-2">
                    <button style="padding:10px 20px; font-weight: bold;" type="submit" id="btn-update-statistik" class="btn btn-primary btn-flat btn-block">Lihat Statistik</button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>


    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Name Category</th>
        <th>Positif</th>
        <th>Negatif</th>
        <th>Netral</th>
        <th>Ranking</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ranks as $rank)
      <tr>
        <td>{{$rank['kategori']}}</td>
        <td>{{$rank['positif']}}</td>
        <td>{{$rank['negatif']}}</td>
         <td>{{$rank['netral']}}</td>
        <td>{{$rank['ranking']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>