<?php
    $showError="false";
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        include '_dbconnect.php';

        $user_email=$_POST['signupemail'];
        $pass=$_POST['signuppassword'];
        $cpass=$_POST['signupcpassword'];

        //check weather this email exists or not

        $existSql="select * from users where user_email='$user_email'";
        $result=mysqli_query($conn,$existSql);
        $numRows=mysqli_num_rows($result);

        if($numRows>0)
        {
            $showError="Email already in use";
        }else
        {
            if($pass==$cpass)
            {
                $hash=password_hash($pass,PASSWORD_DEFAULT);
                $sql="INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUES ( '$user_email', '$hash', current_timestamp())";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $showAlert=true;
                    header("Location:/forum/index.php?signupsuccess=true");
                    exit();
                    }


            }else
            {
                $showError="Password do not match";
                
            }
        }
        header("Location:/forum/index.php?signupsuccess=false&error=$showError");
    }

?>