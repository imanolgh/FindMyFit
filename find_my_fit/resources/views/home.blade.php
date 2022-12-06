<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
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
<body>

  <div class="container-fluid">
      <div class="row flex-nowrap">
          <div class="min-vh-100 col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light sticky-top">
             <div class="d-flex flex-sm-column flex-row flex-nowrap bg-light align-items-center sticky-top">
                <a class="d-block p-3 link-dark text-decoration-none">
                  <span id="logo" class="text-secondary fs-2 w3-wide d-none d-sm-inline">FindMyFit</span>
                </a>
                <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center" id="menu">
                  <li class="nav-item">
                    <a href="/wardrobe/all" class="text-info nav-link align-middle py-3 px-2">
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
                    <span class="d-none d-sm-inline mx-1">{{ $username }}</span>
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
             <div class="row dropdown-center" >
              <button id="dropdownMenu1"class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">All</button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" onclick="showGenre(this)" href="/wardrobe/all">All</a></li>
                <li><a class="dropdown-item" onclick="showGenre(this)" href="/wardrobe/inner">Innerwear</a></li>
                <li><a class="dropdown-item" onclick="showGenre(this)" href="/wardrobe/outter">Outerwear</a></li>
                <li><a class="dropdown-item" onclick="showGenre(this)" href="/wardrobe/bottom">Bottom</a></li>
                <li><a class="dropdown-item" onclick="showGenre(this)" href="/wardrobe/shoes">Shoes</a></li>

               
              </ul>
             </div>
             
            <button class="m-3 btn btn-info" type="button" onclick="window.location='/store_image'">Add Clothing</button>
            
              
              <div class="row row-cols-1 row-cols-sm-3 g-4 m-4">
                @foreach($data as $row)
                <div class="col">
                
                  <div class="card">
                    
                    <img src="store_image/fetch_image/{{ $row->id }}" class="card-img-top" height=200>
                    <div class="card-body">
                      <h5 class="card-title">{{ $row->user_name }}</h5>
                      <p class="card-text">{{ $row->type }}</p>
                      <a href="/delete_image/{{ $row->id }}">Delete</a>

                    </div>
                    
                  </div>
                  
                </div>
                @endforeach
                

              </div> 
  
         </div>   
        </div>
      </div>
    </div>
  </div>

<script>
function showGenre(item) {
  document.getElementById("dropdownMenu1").innerHTML = item.innerHTML;
}
</script>
</body>
</html>



