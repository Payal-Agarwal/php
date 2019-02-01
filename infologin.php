<?php
$user='root';
$password='!@#$%300198';
$db='csr_db';
$db = new mysqli('localhost',$user,$password,$db)or die("unable to connect");

session_start();

if( isset( $_POST['login'] ) ){
    $email = $_POST['Email'];
    $pswd = $_POST['Password'];
    $sessmail = $_SESSION['email']=$email;
    $sesspass = $_SESSION['password']=$pswd;
    /*$cookie_name="cEmail";
    $cookie_value=$sessmail;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    if(isset($_COOKIE['cEmail']))
    {
        echo "cookie is set";
        echo $_COOKIE["$cookie_name"];
    }*/

    $sql = "SELECT * FROM SIGNUP WHERE Email = '$sessmail' ";
    $result = mysqli_query( $db,$sql );
    $row = mysqli_fetch_assoc( $result );
    
    $verifypassword = password_verify( $pswd,$row['pswd'] );
   
    if( $row["Email"] == $email && $verifypassword == 1 ) 
    {
        echo"You are a validated user.";
    }
    else
    {
        echo"Sorry, your credentials are not valid, Please try again.";
    }
    
        
    
}
?>