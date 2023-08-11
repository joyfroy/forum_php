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


     
    <!--search result starts-->
    <div class="container my-3">
          <?php
            $noresults=true;
            $query=$_GET["search"];
            $sql="SELECT * FROM threads WHERE MATCH(thread_title, thread_desc) AGAINST ('$query')";
            $result=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
              $title=$row['thread_title'];
              $desc=$row['thread_desc'];
              $thread_id=$row['thread_id'];
              $url="thread.php?threadid=".$thread_id;
              $noresults=false;

               echo '<div class="result">
                  <h2><a href="'.$url.'" class="text-dark">'.$title.'</a></h2>
                  <p>'.$desc.'</p>
              </div>';

             
              
            }
            if($noresults)
            {
              echo '<div class="jumbotron jumbotron-fluid>
                      <div class="container">
                        <p class="display-4">No Search found</p>
                        <p class="lead">Suggestions:
                              Make sure that all words are spelled correctly.
                              Try different keywords.
                              Try more general keywords.
                              Try fewer keywords.</p>
                        </div>
                        </div>';

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