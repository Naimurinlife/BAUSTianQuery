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
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);


    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
    }
    ?>

    <div class="container my-4">

        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?> </h1>
            <p class="lead"> <?php echo $desc; ?></p>
            <hr class="my-4">
            <p>This is a Forum Which can be used to share knowledge about Recent of Tech related discussion.</p>
            <p><b>Posted By: Naimur</b></p>
        </div>


    </div>
    <div class="container" id="ques">
        <h1 class="py-3">Discussions</h1>


        <!-- <?php
                $id = $_GET['catid'];
                $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
                $result = mysqli_query($conn, $sql);
                $noResult = true;


                while ($row = mysqli_fetch_assoc($result)) {
                    $noResult = false;
                    $id = $row['thread_id'];
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];


                    echo '<div class="media my-3">
            <img src="img/default_user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
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


                ?> -->



    </div>
    <?php include 'partials/_footer.php';  ?>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>