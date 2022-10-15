<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" type="text/css" href="https://classes.engineering.wustl.edu/cse330/content/weather.css">
    <style>
    .w3-sidebar a {font-family: "Roboto", sans-serif}
    body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
  </style>
</head>
<body>

  <div id="weather">
      <div id="description"></div>
      <h1 id="temp"></h1>
      <div id="location"></div>
  </div>

  <p>Click the button to get your coordinates.</p>

  <button type="submit" id="loc" onclick="getLocation()">Try It</button>

  <p id="demo"></p>

  <script lang="text/javascript">
    var x = document.getElementById("demo");
    function getLocation() {
      event.preventDefault(); 
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }


    function showPosition(position) {
      x.innerHTML = "Latitude: " + position.coords.latitude + 
      "<br>Longitude: " + position.coords.longitude;
      long = position.coords.longitude
      lat = position.coords.latitude
      
    
      var key = '4b8e7bbc342f87a6e521860430a27b2b';
      fetch('https://api.openweathermap.org/data/2.5/weather?lat=' + lat + '&lon=' + long +'&appid=' + key)  
      .then(function(resp) { return resp.json() }) // Convert data to json
      .then(function(data) {

        drawWeather(data)

      })
    }
  

    function drawWeather( d ) {
      //var celcius = Math.round(parseFloat(d.main.temp)-273.15);
      var fahrenheit = Math.round(((parseFloat(d.main.temp)-273.15)*1.8)+32); 
      
      document.getElementById('description').innerHTML = d.weather[0].description;
      document.getElementById('temp').innerHTML = fahrenheit + '&deg;';
      document.getElementById('location').innerHTML = d.name;
    }
 
   
  </script>

</body>
</html>



