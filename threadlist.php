<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        #ques {
            min-height: 443px;

        }
    </style>
    <title>BAUSTian Discussion</title>
</head>

<body>
    <?php include 'partials/_header.php';  ?>
    <?php include 'partials/_dbconnect.php';  ?>

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        //insert into DB

        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ( '$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if ($showAlert) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Thread has been Added.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
    ?>

    <div class="container my-4">

        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead"> <?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a Forum Which can be used to share knowledge about Recent of Tech related discussion.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>


    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo '<div class="container">
                <h1 class="py-3">Start a Discussion</h1>
                <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Discussion Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">Keep your discussion title as short & crisp as possible</small>
                    </div>
                    <input type="hidden" name="sno" value="' . $_SESSION["sno"] . '">
                     <div class="form-group">
                        <label for="exampleFormControlTextarea1">Explain Discussion</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                 <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>';
    } else {
        echo '<div class="container">
        <h1 class="py-3">Start a Discussion</h1>
        <p class ="lead"> You are not logged in. Please login to able to start a discussion.</p> 
    </div>
';
    }


    ?>

    <div class="container" id="ques">
        <h1 class="py-3">Browse Questions</h1>


        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;


        while ($row = mysqli_fetch_assoc($result)) {
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);





            echo '<div class="media my-3">
            <img src="img/default_user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="font-weight-bold my-0">Asked By: ' . $row2['user_email'] . ' at ' . $thread_time . ' </p>
                <h5 class="mt-0"><a href="thread.php?threadid=' . $id . '">' . $title . ' </a> </h5>
                ' . $desc . '
            </div>
        </div>';
        }

        if ($noResult) {
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No Questions Here</h1>
              <p class="lead">Be the first person to start a discussion.</p>
            </div>
          </div>';
        }
        ?>






    </div>


    <?php include 'partials/_footer.php';  ?>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>