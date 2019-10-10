<!DOCTYPE html>
<html lang="en">

  <head>
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

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Drama Ojol</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

  </head>
  <body>
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


    <div class="row">
        <div id="container-pos" class="col-md-6" style="height: 500px;"></div>
        <script type="text/javascript">
        $(function() {
          $('#container-pos').highcharts( <?php echo json_encode($chartarray[0]) ?>)
        });
        </script>

        <div id="container-neg" class="col-md-6" style=" height: 500px;"></div>
        <script type="text/javascript">
        $(function() {
          $('#container-neg').highcharts( <?php echo json_encode($chartarray[1]) ?>)
        });
        </script>
    </div>
  </body>
</html>