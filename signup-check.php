<?php
session_start();
include "db_conn.php";

if(isset($_POST['username']) && isset($_POST['emailid']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['username']);
    $email = validate($_POST['emailid']);
    $pass = validate($_POST['password']);

    $user_data = 'uname='. $uname. '&email='. $email;

    if(empty($uname)){
        header("Location: index.php?error=User Name is required&$user_data");
        exit();
    }else if(empty($email)){
        header("Location: index.php?error=Emailid is required&$user_data");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required&$user_data");
        exit();
    }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: index.php?error=Invalid Emailid&$user_data");
        exit();
    }else{
        
        $uppercase = preg_match('@[A-Z]@',$pass);
        $lowercase = preg_match('@[a-z]@',$pass);
        $number = preg_match('@[0-9]@',$pass);
        $specialChars = preg_match('@[^\w]@',$pass);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pass) < 8){
            header("Location: index.php?error=Password should have atleast 8 characters and should contain a number,special character and uppercase letter&$user_data");
            exit();
        }
        else{
            $sql = "SELECT * FROM users_tb WHERE username='$uname'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                header("Location: index.php?error=The username is already taken try another&$user_data");
                exit();
            }else{
                $sql2 = "INSERT INTO users_tb(username,pwd,emailid) VALUES('$uname','$pass','$email')";
                $result2 = mysqli_query($conn, $sql2);

                if($result2){
                    header("Location: index.php?success=Your account has been created successfully&$user_data");
                    exit();
                }else{
                    header("Location: index.php?error=unknown error occured&$user_data");
                    exit();
                }
            }
        }
    }

}else{
    header("Location: index.php");
    exit();
}
?>                 