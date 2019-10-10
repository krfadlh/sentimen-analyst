<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Drama Ojol</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">
  
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

  <link rel="stylesheet" href="{{asset('css/style.css')}}">

 
  <style type="text/css">
      span.yellow{
        background-color: yellow;
      }
      span.red{
        background-color: #FB5E64;
      }
      span.blue{
        background-color:lightblue;
      }
  </style>

  </head>
  <body>
  <div id="colorlib-page">
    <header>
      <div class="container">
         <div class="row text-center">
          <h2 class="bold">Opinion Details</h2>
        </div>
      </div>
    </header>
    
    <div id="colorlib-contact">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-offset-0">
            <div class="row">
             
              @if (\Session::has('success'))
              <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
              </div><br />
              @endif
              <table class="table table-striped">
   
                @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div><br />
                @endif
                <tbody>
                  <tr>
                    <td>{!! $content !!}</td>
                  </tr>
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>

  </body>
</html>
