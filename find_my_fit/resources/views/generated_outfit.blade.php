<!DOCTYPE html>
<html>
<head>
<title>MyWardrobe</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
</head>
<body class="w3-content" style="max-width:100%">


<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">FindMyFit</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" >

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>

  <!-- Horizontal nav bar-->
  <div class="w3-bar w3-black">
    <a href="{{route('outfit_generation_page')}}" class="w3-bar-item w3-button">Outfit Generator</a>
    <a href="{{route('wardrobe')}}" class="w3-bar-item w3-button">Wardrobe</a>
    <a href="{{route('login')}}" class="w3-bar-item w3-button">Log in/ Register</a>
    <a href="{{route('logout')}}" class="w3-bar-item w3-button">Log out</a>
  </div>
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">Suggested Outfit</p>
    <!--
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
-->
  </header>

  <!-- Image header -->
  <!--
  <div class="w3-display-container w3-container">
    <img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%">
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">New arrivals</h1>
      <h1 class="w3-hide-large w3-hide-medium">New arrivals</h1>
      <h1 class="w3-hide-small">COLLECTION 2016</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">SHOP NOW</a></p>
    </div>
  </div>
-->
<div style = "margin-left:50px">
  <div>{{$weather_msg}}</div>
  @foreach($outfit_data as $row)
  <div>{{$row->user_name}}
    <img src="store_image/fetch_image/{{$row->id}}"  class="img-thumbnail" width="75" />
  </div>
  <div class="color-box" style="background-color: {{$row->color}};">hi</div>
  @endforeach

  @foreach($outfit_descriptions as $row)
  <div>{{$row[0]}}</div>
  <div>{{$row[1]}}</div>
  @endforeach

  <button type="button"><a href="{{route('outfit_generation_page')}}">Back to Outfit Generation</button>
  <button type="button"><a href="{{route('generate_outfit')}}">Generate New Outfit</button>
  <button type="button"><a href="{{route('wardrobe')}}">Wardrobe</button>
</div>
<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
</div>
</html>