   <?php
   
        $population = "";
        
        $error = "";
    
      if ($_GET['city']) {
          
          $_GET['city'] = str_replace(' ', '', $_GET['city']);
          
          $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest");
          
            if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                
                $error = "That State could not be found";
                
            } else {
                      
          $forecast = file_get_contents("https://www.weather-forecast.com/locations/".$_GET['city']."/forecasts/latest");
          
          $ArrayPage = explode('forecast__table-description-content"><span class="phrase">',$forecast);
          
          $secondExplode = explode('</span></p></td><td class="b-forecast__table-description-cell--js" colspan="9">', $ArrayPage[1]);
          
          $population = $secondExplode[0];
          
             }
      }

   ?>
   
   <!doctype html>
<html lang="en">
  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Weather Scrapper!</title>
    
    <style type="text/css">
        
        body{
            
            background-image:url("unsplash.jpg");
        }
        
        h1{
            
            text-align: center;
            margin-top: 18%;
        }
        
        button{
            
            margin-left: 45%;
            margin-bottom: 17px;
        }
        
        #population{
            
            width: 300px;
            
        }
       
    </style>
    
  </head>
  <body>
      
    <div class="container">
        <h1>What is the weather in Nigeria?</h1>
        <h6 style="text-align:center;">Enter the name of a state in Nigeria.</h6>
            
        <form>
        <div class="mb-3">
      <input type="text" class="form-control" id="city" name="city" placeholder="e.g: Lagos, Abuja" value="<?php echo $_GET['city']; ?>">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
        <div id="population"><?php 
        
                if($population) {
                    
                    echo '<div class="alert alert-success" role="alert">'.$population.'</div>';
                    
                } else if($error) {
                    
                    echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
                    
                }
        
        
                ?></div>
        
        </div>
    
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    
  </body>
</html>
   
   