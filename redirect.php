<?php
 include 'infologin.php';
 $cookie_name = "email";
$cookie_value = $sessmail;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
 //$cookie_name = "email";
 
setcookie("email", "", time() - 3600);
 if(isset($_COOKIE[$cookie_name]))
 {
     echo "cookie is set";
     echo $_COOKIE[$cookie_name];
     

 }
 else{
     echo "cookie not set";
 }
 
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
} else {
    echo "Cookies are disabled.";
}




 ?>
 <html>
 <head>
 </head>
 <body>
    <div>
    "you are logged in";
    </div>
 </body>
 </html>