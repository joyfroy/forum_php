<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <style>
            #ques{
                min-height:433px;
            }
            </style>  
</head>
  <body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
     
    <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM `threads` WHERE thread_id=$id ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['thread_title'];
            $desc=$row['thread_desc'];
            $thread_user_id=$row['thread_user_id'];
            //query the users table
            $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2=mysqli_query($conn,$sql2);
            $posted_by=$row2['user_email'];

        }

    ?>

       
      <?php
        $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method =='POST')
        {
            //insert comment into db
            $comment=$_POST['comment'];
            $comment=str_replace("<","&lt;",$comment);
            $comment=str_replace(">","&gt;",$comment);
            $sno=$_POST['sno'];
            
            $sql="INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment ', '$id', '$sno', current_timestamp())";

            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert){
                echo '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Success!</h4>
                        <p>Your comment has been added successfully! </p>
                        <hr>
                        <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
                        </div>';
            }

        }

    ?>


<!--categorie-->
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">   
                 <?php echo $title;?> 
            </h1>
            <p class="lead">
                <?php echo $desc;?>
            </p>
            <hr class="my-4">
            <p>this forum is for sharing knowledge wih each other
                    Warn About Adult Content.
                    Do not spam.
                    Do Not Bump Posts.
                    Do Not Offer to Pay for Help.
                    Do Not Offer to Work For Hire.
                    Do Not Post About Commercial Products.
                    Do Not Create Multiple Accounts (Sockpuppets)
                    When creating links to other resources.
            </p>
            <p ><b>Posted by:<?php echo $posted_by;?> </b></p>
        </div>
    </div>
    <?php
if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
    echo' <div class="container">
        <h1>Post a comment</h1>
        <form action="'. $_SERVER ['REQUEST_URI'] .'" method="post" >
           
                <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment!</label>
                <textarea class="form-control" id="comment" name ="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'"  >
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>
        </form>
    </div>';}
else{
    echo '<div class="container" id="ques">
                <h1>Post a comment</h1>
                <p>You are not loggedin...||Please login to post comment</p>
                </div>
                ';
}

    ?>


    <div class="container" id="ques">
        <h1>Discussion</h1>
         <?php
            $id=$_GET['threadid'];
            $sql="SELECT * FROM `comments` where thread_id=$id ";
            $result=mysqli_query($conn,$sql);
            $noResult=true;
            while($row=mysqli_fetch_assoc($result)){
                $noResult=false;
                $content=$row['comment_content'];
                $comment_time=$row['comment_time'];
                $id=$row['comment_id'];
                $thread_user_id=$row['comment_by'];
                $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);

      echo'
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
                <p class="font-weight-bold my-0"><b>'.$row2['user_email'].' </b>'.$comment_time.'</p>
                
                '.$content.'
            </div>
        </div>';

              }
               if($noResult)
              {
                echo "<br> Be the first person to ask the quesion<br>";
              }

        ?>
        

    </div>
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>