   <?php
    
         $error = "";
         
         $success = "";
         
        if ($_POST) {
                  
                  if (!$_POST["email"]) {
                      
                      $error .= "The email field is empty<br>";
                  }
                  
                  if (!$_POST["subject"]) {
                      
                      $error .= "The subject field is empty<br>";
                  }
                  
                  if (!$_POST["topic"]) {
                      
                      $error .= "The topic field is empty<br>";
                  }
                    
                  if ($_POST["email"] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
                            
                          $error .= "The email address is not valid<br>";
                  }
                    
                  if ($error != "") {
              
                      $error = '<div class="alert alert-danger" role="alert"><p>
                      <strong>There were error(s) in your form:</strong></p>' . $error . '</div>';
                      
                  }  else { 
                
                            $emailTo = "tudjegabriel@gmail.com";
                            
                            $subject = $_POST["subject"];
                            
                            $content = $_POST["content"];
                            
                            $headers = "From: ". $_POST["email"];
                            
                            if (mail($emailTo, $subject, $content, $headers)) {
                                
                                $success = '<div class="alert alert-success" role="alert">Your form was submitted successfully</div>';
                                
                                
                            } else {
                                
                                $error = '<div class="alert alert-warning" role="alert">Your form was not submitted!</div>';
                                
                            }
                
                 }
            
        }
                
      

   ?>
   
   
   <!doctype html>
<html lang="en">
  <head>
      
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>

    <title>Contact form!!</title>
  </head>
  
  <body>
      
      
      
      <div class="container">
          
          <h1>Get in Touch!</h1>
          
          <div id="error"><? echo $error.$success; ?></div>
          
          
    <form method="post">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject">
  </div>
  <div class="mb-3">
    <label for="topic" class="form-label">Topic</label>
    <input type="text" class="form-control" id="topic" name="topic">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

   
   <script type="text/javascript">
               
       
       $("form").submit(function(e){
           
           var error = "";
           
            if ($("#email").val() == "") {
              
              error += "Please enter an email address.<br>";
          }
           
          if ($("#subject").val() == "") {
              
              error += "Please enter a subject<br>";
          }
          
          if ($("#topic").val() == "") {
              
              error += "<p>Please enter a Topic.";
          }
           
           
          if (error != "") {
              
              $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');
           
                    return false;
           
          } else {
              
                    return true;
            
          }  
           
           
           
       })
      
       
       
   </script>
   
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    
  </body>
</html>
   
  