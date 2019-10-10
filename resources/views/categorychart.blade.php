<!DOCTYPE html>
<html lang="en">

  <head>
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
                <div class="col-sm-3"></div>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Category</span>
                        <select class="form-control" id="range-tahun" name="category" style="padding:4px 10px; box-sizing: content-box;">
                              <option value="all">All Categories</option>
                              <option value="aplikasi">Aplikasi</option>
                              <option value="harga">Harga</option>
                              <option value="driver">Driver</option>
                              <option value="penumpang">Penumpang</option>
                              <option value="perusahaan">Perusahaan</option>
                              
                          </select>
                    </div>
                </div>
                <!-- <div class="col-sm-6">
                    <div class="input-group">
                        <span class="input-group-addon">Bulan</span>
                        <select class="form-control" id="range-bulan" name="bulan" style="padding:4px 10px; box-sizing: content-box;">
                            <option value="0">Semua Bulan</option>
                        </select>
                    </div>
                </div> -->
                <div class="col-sm-2">
                    <button style="padding:10px 20px; font-weight: bold;" type="submit" id="btn-update-statistik" class="btn btn-primary btn-flat btn-block">Lihat Statistik</button>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
</form>
</div>

	<div id="container"style="max-width: 80%; height: 500px; margin: 0 auto"></div>
	<script type="text/javascript">
	$(function() {
		var data = <?php echo json_encode($chartarray) ?>;
		console.log(data);
	  $('#container').highcharts(data);
	});
	</script>
  </body>
</html>