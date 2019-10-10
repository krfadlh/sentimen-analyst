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

  
  <div id="colorlib-page">
    <header>
      <div class="container">
         <div class="row text-center">
          <h2 class="bold">Opinions</h2>
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
    <thead>
      <tr>
        <th>ID</th>
        <th>Tweet</th>
        <th>Sentiment</th>
        <th>Perusahaan</th>
        <th>Kategori</th>
        <th colspan="2">Action</th>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td>
          <form method="POST" action="{{route('sentiment')}}"> <!-- lari ke route di web -->
            {{csrf_field()}} <!-- untuk mengirim data -->
          <select name="sentiment" onchange="this.form.submit()">
            @if(!empty($selected))
                  @if($selected==1 && !empty($selected))
                  <option value="1" selected="selected">Positif</option>    
                  <option value="0">Netral</option>    
                  <option value="-1">Negatif</option>    
                  @elseif($selected=='kosong' && !empty($selected))
                  <option value="1" >Positif</option>    
                  <option value="0" selected="selected">Netral</option>    
                  <option value="-1">Negatif</option>  
                  @else
                  <option value="1" >Positif</option>    
                  <option value="0" >Netral</option>    
                  <option value="-1" selected="selected">Negatif</option>  
                  @endif
            @else
            <option value="1" >Positif</option>    
            <option value="0" >Netral</option>    
            <option value="-1">Negatif</option>  
            @endif
          </select>
        </form>
        </td>

        <td>
          <form method="POST" action="{{route('objek')}}"> <!-- lari ke route di web -->
            {{csrf_field()}} <!-- untuk mengirim data -->
          <select name="objek" onchange="this.form.submit()">
            @if(!empty($selected))
                  @if($selected==1)
                  <option value="1" selected="selected">Gojek</option>    
                  <option value="2">Grab</option>        
                   
                  @else
                  <option value="1" >Gojek</option>    
                  <option value="2" selected="selected">Grab</option>  
                  @endif
            @else
            <option value="1" >Gojek</option>    
            <option value="2" >Grab</option>     
            @endif
          </select>
        </form>
        </td>
        <td></td>
      </tr>
    </thead>
    <tbody>
      @foreach($opinions as $opinion)
      <tr>
        <td>{{$opinion['id']}}</td>
        <td>{{$opinion['content']}}</td>

        @if($opinion['sentiment']==1)
          <td>Positif</td>
        @elseif($opinion['sentiment']==0)
          <td>Netral</td>
        @else
          <td>Negatif</td>
        @endif

        @if($opinion['id_object']==1)
          <td>Gojek</td>
        @else
          <td>Grab</td>
        @endif

        <td>{{$opinion['cat_result']}}</td>
       
        <td><a href="{{action('OpinionsController@edit', $opinion['id'])}}" class="btn btn-warning" style="background-color: #049041;
    border-color: #049041" >Lihat</a></td>
       <!--  <td>
          <form action="{{action('OpinionsController@destroy', $opinion['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td> -->
      </tr>
      @endforeach
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
