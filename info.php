<?php




function condb()
{
    $user='root';
    $password='!@#$%300198';
    $db='csr_db';
    $db = new mysqli('localhost',$user,$password,$db)or die("unable to connect");
}

$nameerr=$emailerr=$phoneerr=$passworderr=$addresserr=$pincodeerr="";
if( isset( $_POST['donor_submit'] ) ){
    print_r($_POST);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $Email = $_POST['Email'];
    $Password= password_hash($_POST['Password'], PASSWORD_ARGON2I);
    $Phone = $_POST['Phone'];
   $state = $_POST['state'];
    $Addres = $_POST['Addres'];
    $Pincode= $_POST['Pincode'];
   
    if(empty($first_name)){
    $nameerr="Please  enter your name";
    }
    else
    {
        $first_name = $_POST['first_name']; 
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameerr = "Only letters and white space allowed"; 
        }
    }
    if(empty($Email))
    {
        $emailerr="Email is required";
    }
    else
    {
        
        $regex = "/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/";
        if(!preg_match($regex,$Email))
        {
            $emailerr = "Invalid email format";

        }
        $Email = $_POST['Email'];
        /*if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerr = "Invalid email format"; 
        }*/
    }
    if(empty($Phone))
    {
        $phoneerr="Phone is required";
    }
    else{
    
    if (!preg_match("/^[0-9]*$/",$Phone)) {
    $phoneerr = "Only numbers are allowed"; 
    $Phone = $_POST['Phone'];
    }
    }
    if(empty($Password)){
        $passworderr="password required";
    }
    
    if(empty($Addres))
    {
        $addresserr="Addres is required";
    }
    if(empty($Pincode))
    {
        $pincodeerr="Pincode is required";
    }
   if(($nameerr=="")&&($emailerr=="")&&($passworderr=="")&&($phoneerr=="")&&($pincodeerr=="")&&($emailerr=="")){

    $sql="INSERT INTO `SIGNUP`" ."( `first_name`,`last_name`, `Email`,`pswd`, `Phone`,`state`,`Addres`, `Pincode`)".
     "VALUES ('$first_name','$last_name','$Email','$Password','$Phone','$state','$Addres','$Pincode')";
   }
    

   // $sql1="INSERT INTO LOGIN"."(pswd)"."VALUES('$Password')";
   
    if(!mysqli_query($db,$sql)){
        die("Can't inserted");
    }
    else{
        echo "1 record inserted";
    }
}
mysqli_close($db);
?>

