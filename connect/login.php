<?php
include_once 'connect.php';
session_start();
if(isset($_POST['login'])){

    $em=$_POST['email'];
    if(empty($_POST['email'])){
	 header("Location:../../index?err=" . urlencode("Please fill in your email!")); 
    }
    
    elseif ((!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $em))){
        header("Location:../../index?err=" . urlencode("You have entered invalid email!"));  
       }
 
    $pwd = check_input($_POST["password"]);
    if(empty($_POST['password'])){
	header("Location:../index?err=" . urlencode("Password is required!"));  
	}
    else{
        $email = check_input($_POST["email"]);
        $pwd = check_input($_POST["password"]);

        $que= dbConnect()->prepare("SELECT * FROM users WHERE email=:email");
        $que->bindParam(':email', $email);
        $que->execute();
        if($row=$que->fetch()){
                
             

            $phash=$row['password'];
            $password = password_verify($pwd, $phash);
            
            if($password){

                $_SESSION["email"]      = $row['email']; // setting session
                $_SESSION["id"]         = $row['id'];
                
                

                echo  " <script>location.href='../crete/dashboard'</script>";

            }else{  
                $e="Incorrect password"; 
                echo  " <script>alert('$e'); window.location='../index'</script> ";
              }
        }
        else{
            header("Location:../index?err=" . urlencode("This email does not exists!"));
        }
    }

    
}
function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
