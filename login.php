<?php session_start();?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    
    </head>
    <title>
        "csr loginpage through php"
    </title>
    <body>
    
        <?php include 'header.php' ;?>
       
        <div class="container "id="msform">
            <div class="row">
                <div col-lg-12>
                    <form method="post" action="redirect.php">
                    <?php
                    $d=strtotime("tomorrow");
                    echo date("Y-m-d h:i:sa", $d) . "<br>";
                    echo date("y.m.d");
                    ?>
                    <?php include 'infologin.php';
                
                   
                    
                    
                    /*$cookie_name="cEmail";
                    $cookie_value=$sessmail;
                    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
                    if(isset($_COOKIE['cEmail']))
                    {
                        echo "cookie is set";
                        echo $_COOKIE["$cookie_name"];
                    }
                    else{
                        echo "cookie not set";
                    }*/
                    ?>
                        <div>
                      
                        <label>Email</label>
                        <input name="Email" id="Email" placeholder="Email" value="" maxlength="20" type="email">
                        <h6 id="emailerr"></h6>
                        </div>
                        <div>
                        <label>Password</label>
                        <input name="Password" id="Password" placeholder="Password" value="" maxlength="20" type="password">
                        <h6 id="passerr"></h6>
                        </div>
                        <input name="login" id="btnlogin" class=" action-button" value="LogIn" type="submit">
                    </form>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ;?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
        <script type="text/javascript" src="js/validate2.js"></script>
    </body>
</html>