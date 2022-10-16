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
<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>MyWardrobe</b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">All</a>
    <a onclick="expandCat(1)" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Season <i class="fa fa-caret-down"></i>
    </a>
    <div id="Season" class="w3-bar-block w3-hide w3-padding-large w3-medium">
       <a href="#" class="w3-bar-item w3-button">Spring</a>
      <a href="#" class="w3-bar-item w3-button">Summer</a>
      <a href="#" class="w3-bar-item w3-button">Fall</a>
      <a href="#" class="w3-bar-item w3-button">Winter</a>
    </div>
    
    <a onclick="expandCat(2)" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Tops <i class="fa fa-caret-down"></i>
    </a>
    <div id="Top" class="w3-bar-block w3-hide w3-padding-large w3-medium">
       <a href="#" class="w3-bar-item w3-button">Shirt</a>
      <a href="#" class="w3-bar-item w3-button">Jacket</a>
    </div>
    
    <a href="#" class="w3-bar-item w3-button">Bottom</a>

    <a href="#" class="w3-bar-item w3-button">Shoes</a>
    
  </div>
  <!--
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Newsletter</a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding">Subscribe</a>
-->
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">FindMyFit</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left">MyWardrobe</p>
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
<div>{{$data['inner shirt']}}</div>
<div>{{$data['outer wear']}}</div>
<div>{{$data['pants']}}</div>
<button type="button"><a href="{{route('outfit_generation_page')}}">Back to Outfit Generation</button>
<button type="button"><a href="{{route('wardrobe')}}">Wardrobe</button>

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
</div>

<script>
// Accordion 
function expandCat(cat) {
    if (cat == 1){
        var x = document.getElementById("Season");
    }
    else if (cat == 2) {
        var x = document.getElementById("Top");
    }
    else if (cat == 3) {
        var x = document.getElementById("Bottom");
    }
  if (x.className.indexOf("w3-show") == -1 && cat == 1) {
    x.className += " w3-show";
  } 
  else if (x.className.indexOf("w3-show") == -1 && cat == 2) {
    x.className += " w3-show";
  } 
  else {
    x.className = x.className.replace(" w3-show", "");
  }
}
// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();
// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>