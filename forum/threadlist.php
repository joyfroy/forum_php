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
        $id=$_GET['catid'];
        $sql="SELECT * FROM `categories` WHERE categories_id=$id ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $catname=$row['categories_name'];
            $catdesc=$row['categories_discription'];
        }

    
        $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method =='POST')
        {
            //inssert thread into db
            $th_title=$_POST['title'];
            $th_desc=$_POST['desc'];

            $th_title=str_replace("<","&lt;",$th_title);
            $th_title=str_replace(">","&gt;",$th_title);

            $th_desc=str_replace("<","&lt;",$th_desc);
            $th_desc=str_replace(">","&gt;",$th_desc);
            $sno=$_POST['sno'];
            $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";

            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert){
                echo '<div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Success!</h4>
                        <p>Your thread has been added successfully! Please wait for community to respond.</p>
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
                Welcome to <?php echo $catname;?> forums
            </h1>
            <p class="lead">
                <?php echo $catdesc;?>
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
            <a href="" class="btn btn-primary btn-lg" role="button" >Learn more</a>
        </div>
    </div>
<?php
    if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin']==true){
        echo'
            <div class="container">
                <h1>Start a Discussion</h1>
                <form action="'. $_SERVER ["REQUEST_URI"] .'" method="post" >
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Problem </label>
                        <div class="mb-3">
                        <label for="title" class="form-label">Keep your title as crisp as possible.</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Ellaborate your concern</label>
                        <textarea class="form-control" id="desc" name ="desc" rows="3"></textarea>

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>';}
            else{
                echo '<div class="container" id="ques">
                <h1>Sart a Discussion</h1>
                <p>You are not loggedin...||Please login to start discussion</p>
                </div>
                ';
            }

    ?>

    <div class="container" id="ques">
        <h1>Browser Question</h1>
         <?php
            $id=$_GET['catid'];
            $sql="SELECT * FROM `threads` where thread_cat_id=$id ";
            $result=mysqli_query($conn,$sql);
            
            while($row=mysqli_fetch_assoc($result)){
                
                $title=$row['thread_title'];
                $desc=$row['thread_desc'];
                $id=$row['thread_id'];
                $thread_time=$row['timestamp'];
                $thread_user_id=$row['thread_user_id'];

                $sql2="SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
                $result2=mysqli_query($conn,$sql2);

                $row2=mysqli_fetch_assoc($result2);
                

      echo'
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
            <p class="my-0"><b>Asked by '.$row2['user_email'].' at </b>'.$thread_time.'</p>
                <h5 class="mt-0">
                <a href="thread.php?threadid='.$id.'">
                    '.$title.'
                    </a>
                </h5>
                '.$desc.'
            </div>
        </div>';

              }

             

        ?>


    
        <!--
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
                <h5 class="m-0">
                    Media Heading
                </h5>
                ehfuoielfkkjfio9ufopiwprhfiy  u8eureqjieqiu9uo
                uiqwy890qkq ui0poqkhuiurrouqipq[w\
                ihoqequr0eirqelmrrj 
                rlejhuu98qer0ripqke;rkq]qijeu90rupoir
                jq3hirioupiqepr[o[eprewijdopefpe]]hruiurioei rojoie
                wsjoih.
            </div>
        </div>
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
                <h5 class="m-0">
                    Media Heading
                </h5>
                ehfuoielfkkjfio9ufopiwprhfiy  u8eureqjieqiu9uo
                uiqwy890qkq ui0poqkhuiurrouqipq[w\
                ihoqequr0eirqelmrrj 
                rlejhuu98qer0ripqke;rkq]qijeu90rupoir
                jq3hirioupiqepr[o[eprewijdopefpe]]hruiurioei rojoie
                wsjoih.
            </div>
        </div>
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
                <h5 class="m-0">
                    Media Heading
                </h5>
                ehfuoielfkkjfio9ufopiwprhfiy  u8eureqjieqiu9uo
                uiqwy890qkq ui0poqkhuiurrouqipq[w\
                ihoqequr0eirqelmrrj 
                rlejhuu98qer0ripqke;rkq]qijeu90rupoir
                jq3hirioupiqepr[o[eprewijdopefpe]]hruiurioei rojoie
                wsjoih.
            </div>
        </div>
        <div class="media">
            <img src="img/du.jpg" alt="" class="mr-3" width="54px" hight="54px" >
            <div class="media-body">
                <h5 class="m-0">
                    Media Heading
                </h5>
                ehfuoielfkkjfio9ufopiwprhfiy  u8eureqjieqiu9uo
                uiqwy890qkq ui0poqkhuiurrouqipq[w\
                ihoqequr0eirqelmrrj 
                rlejhuu98qer0ripqke;rkq]qijeu90rupoir
                jq3hirioupiqepr[o[eprewijdopefpe]]hruiurioei rojoie
                wsjoih.
            </div>
        </div>-->

    </div>
    <?php include 'partials/_footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>