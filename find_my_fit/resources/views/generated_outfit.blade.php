
<!DOCTYPE html>
<html>
<head>
    <title>Add Clothing</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>

body,h1,h2,h3,h4,h5,h6,.w3-wide {
  font-family: "Montserrat", sans-serif;
}

    </style>
</head>

<div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="min-vh-100 col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light sticky-top">
             <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a class="d-block p-3 link-dark text-decoration-none">
                  <span id="logo" class="text-secondary fs-2 w3-wide d-none d-sm-inline">FindMyFit</span>
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center" id="menu">
                  <li class="nav-item">
                    <a href="/wardrobe" class="text-info nav-link align-middle py-3 px-2">
                        <i class="fs-2 bi-house"></i> <span class="fs-4 ms-1 d-none d-sm-inline">Wardrobe</span>
                    </a>
                  </li>
                  <li>
                    <a href="/fitme" class="text-info nav-link py-3 px-2 align-middle">
                      <i class="fs-2 bi-table"></i> <span class="fs-4 ms-1 d-none d-sm-inline">Fit Me</span></a>
                  </li>
                  <li>
                    <a href="/social_page" class="text-info nav-link py-3 px-2 align-middle">
                      <i class="fs-2 bi-compass"></i> <span class="fs-4 ms-1 d-none d-sm-inline">Discover</span></a>
                  </li>
                  
                </ul>
                
                <div class="position-fixed pb-4" style="bottom: 0px">
                  <a href="#" class=" text-secondary d-flex align-items-center text-decoration-none dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fs-2 bi-person-circle"></i>
                    <span class="d-none d-sm-inline mx-1">Username</span>
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/account">Profile</a></li>
                    <li><form class="dropdown-item text-decoration-none" method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                            {{-- @endauth --}}
                        {{-- </div> --}}
                    {{-- @endif --}}
                    </li>
                  </ul>
                </div>
              </div>
          </div>
        <div class="col py-3">

          <header class="w3-container w3-xlarge">
            <p class="w3-left">Suggested Outfit</p>
          
          </header>
            <div>
              <div>{{$weather_msg}}</div>
              <?php foreach($outfit_data as $row) : ?>
                <div class="card" id="{{$row->id}}"style="max-width: 540px; background-color: {{$row->color}};">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="store_image/fetch_image/{{$row->id}}" class="img-fluid rounded-start" width="75">
                    </div>
                    
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">{{$row->user_name}}</h5>
                        <!-- <p class="card-text">Classification</p> -->
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
               
            </div>   
        <div style = "margin-left:50px">

          @foreach($outfit_descriptions as $row)
          <div>{{$row[0]}}</div>
          <div>{{$row[1]}}</div>
          @endforeach

<<<<<<< HEAD
          <button class="btn btn-light" type="button"><a href="{{route('generate_outfit')}}">Generate New Outfit</button>
        </div>
    
=======
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

<div class="container">
  <form method="post" action="{{ route('store-outfit') }}"
    enctype="multipart/form-data">
  @csrf
  @foreach ($outfit_data as $data)
   <input type='hidden' name='outfit_data[]' value='{{ $data->id }}'>
  @endforeach
 
   <input type="submit" value="Submit" >
 
  </form>
</div>

<!-- Newsletter Modal -->
{{-- <div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">NEWSLETTER</h2>
      <p>Join our mailing list to receive updates on new arrivals and special offers.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
</div> --}}
>>>>>>> main
</html>