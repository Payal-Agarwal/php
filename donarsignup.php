

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
    
    </head>
    <title>
        "csr signuppage through php"
    </title>
    <body>
    <?php
         
            $user = 'root';
            $password='!@#$%300198';
            $db='csr_db';
            $db = new mysqli('localhost',$user,$password,$db)or die("unable to connect");
        
         
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
        
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
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
                
                    $Email = $_POST['Email'];
                    if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                        $emailerr = "Invalid email format"; 
                    }
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
            }
        
                //echo $nameerr,$emailerr,$phoneerr,$passworderr,$addresserr,$pincodeerr;
                if(($nameerr=="")&&($emailerr=="")&&($passworderr=="")&&($phoneerr=="")&&($pincodeerr=="")&&($emailerr=="")){

                    $sql="INSERT INTO `SIGNUP`" ."( `first_name`,`last_name`, `Email`,`pswd`, `Phone`,`state`,`Addres`, `Pincode`)".
                    "VALUES ('$first_name','$last_name','$Email','$Password','$Phone','$state','$Addres','$Pincode')";
                }else{
                
                    include 'header.php';
                    echo '<div class="container "id="msform">
                    <div class="row">
                        <h3 id ="text-cntr"> Welcome </h3>
                        <h6>Joins hands and make a difference</h6>
                        <div class="col-sm-12 col-lg-6">
                            <form  method="post" action="donarsignup.php">
                                <div class="line">
                                    <div class="marginb">
                                        <select>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Dr">Dr</option>
                                        </select>
                                    </div>
                                    <div class="marginb">
                                        <input name="first_name" id="first_name" placeholder="First Name" value="" maxlength="20" type="text">
                                        <h6 id="nameerr"></h6>';
                                        echo $nameerr;

                                    echo' </div>
                                    <div class="marginb ">
                                        <input name="last_name" id="last_name" placeholder="Last Name" value="" maxlength="20" type="text">
                                        
                                    </div>
                                </div>
                                <div class="marginb ">
                                    <input name="Email" id="Email" placeholder="Email" value="" maxlength="20" type="email">
                                    
                                    <h6 id="emailerr"></h6>';
                                    echo $emailerr;
                                echo '</div>
                                <div class="marginb ">
                                    <input name="Password" id="Password" placeholder="Password" value="" maxlength="20" type="password">
                                    <h6 id="passerr"></h6>';
                                    echo $passworderr;
                                echo'
                                </div>
                                <div class="marginb ">
                                    <input name="Phone" id="Phone" placeholder="Phone" value="" maxlength="20" type="text">
                                    <h6 id="phoneerr"></h6>';
                                    echo $phoneerr;
                                echo '
                                </div>
                                <div class="marginb">
                                    <select  name="state" id="state" class="state" value="">
                                        <option disabled="" selected="" hidden="">State</option>
                                        <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="4">Assam</option>
                                        <option value="5">Bihar</option>
                                        <option value="6">Chandigarh</option>
                                        <option value="7">Chhattisgarh</option>
                                        <option value="8">Dadra &amp; Nagar Haveli</option>
                                        <option value="9">Daman &amp; Diu</option>
                                        <option value="10">Delhi</option>
                                    </select>
                                </div>
                                <div class="marginb ">
                                    <input name="Addres" id="Addres" placeholder="Address" value="" maxlength="20" type="textarea">
                                    <h6 id="adderr"></h6>';
                                    echo $addresserr;
                                echo '
                                </div>
                                <div class="marginb ">
                                    <input name="Pincode" id="Pincode" placeholder="PIN CODE" value="" maxlength="20" type="text">
                                    <h6 id="pincodeerr"></h6>';
                                echo $pincodeerr;
                                echo '
                                </div>
                            
                                <input name="donor_submit" id="btnsub" class=" action-button" value="Signup" type="submit">
                            </form>
                            <div class="col-sm-6 col-lg-6">

                            </div>
                        </div>
                    </div>
                </div>';
                include 'footer.php';
                    

                }
                    

                // $sql1="INSERT INTO LOGIN"."(pswd)"."VALUES('$Password')";
                
                    if(!mysqli_query($db,$sql)){
                        die("Can't inserted");
                    }
                    else{
                        echo "1 record inserted";
                    }
                
                mysqli_close($db);
        }
            
            
        
    ?>
<?php include 'header.php' ;?>
        <div class="container "id="msform">
            <div class="row">
                <h3 id ="text-cntr"> Welcome </h3>
                <h6>Joins hands and make a difference</h6>
                <div class="col-sm-12 col-lg-6">
                    <form  method="post" action="donarsignup.php">
                        <div class="line">
                            <div class="marginb">
                                <select>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Dr">Dr</option>
                                </select>
                            </div>
                            <div class="marginb">
                                <input name="first_name" id="first_name" placeholder="First Name" value="" maxlength="20" type="text">
                                <h6 id="nameerr"></h6>
                                <?php echo $nameerr;?>
                                </div>
                            <div class="marginb ">
                                <input name="last_name" id="last_name" placeholder="Last Name" value="" maxlength="20" type="text">
                                
                            </div>
                        </div>
                        <div class="marginb ">
                            <input name="Email" id="Email" placeholder="Email" value="" maxlength="20" type="email">
                            
                            <h6 id="emailerr"></h6>
                            <?php echo $emailerr;?>
                        </div>
                        <div class="marginb ">
                            <input name="Password" id="Password" placeholder="Password" value="" maxlength="20" type="password">
                            <h6 id="passerr"></h6>
                            <?php echo $passworderr;?>
                        </div>
                        <div class="marginb ">
                            <input name="Phone" id="Phone" placeholder="Phone" value="" maxlength="20" type="text">
                            <h6 id="phoneerr"></h6>
                            <?php echo $phoneerr;?>
                        </div>
                        <div class="marginb">
                            <select  name="state" id="state" class="state" value="">
                                <option disabled="" selected="" hidden="">State</option>
                                <option value="Andaman &amp; Nicobar Islands">Andaman &amp; Nicobar Islands</option>
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="4">Assam</option>
                                <option value="5">Bihar</option>
                                <option value="6">Chandigarh</option>
                                <option value="7">Chhattisgarh</option>
                                <option value="8">Dadra &amp; Nagar Haveli</option>
                                <option value="9">Daman &amp; Diu</option>
                                <option value="10">Delhi</option>
                            </select>
                        </div>
                        <div class="marginb ">
                            <input name="Addres" id="Addres" placeholder="Address" value="" maxlength="20" type="textarea">
                            <h6 id="adderr"></h6>
                            <?php echo $addresserr;?>
                        </div>
                        <div class="marginb ">
                            <input name="Pincode" id="Pincode" placeholder="PIN CODE" value="" maxlength="20" type="text">
                            <h6 id="pincodeerr"></h6>
                            <?php echo $pincodeerr;?>
                        </div>
                       
                        <input name="donor_submit" id="btnsub" class=" action-button" value="Signup" type="submit">
                    </form>
                    <div class="col-sm-6 col-lg-6">

                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ;?>
      
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
        <script type="text/javascript" src="js/validate.js"></script>
    </body>
    </html>
    