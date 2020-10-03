<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

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

    <div class="container my-4">

        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead"> <?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is a Forum Which can be used to share knowledge about Recent of Tech related discussion.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>


    </div>
    <div class="container">
        <h1 class="py-3">Browse Questions</h1>


        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);


        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];


            echo '<div class="media my-3">
            <img src="img/default_user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">
                <h5 class="mt-0"><a href="thread.php">' . $title . ' </a> </h5>
                ' . $title . '
            </div>
        </div>';
        }
        ?>

        <!-- <div class="media my-3">
                        <img src="img/default_user.png" width="54px" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">Unable to install Android Studio SDK</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
            -->
    </div>


    <?php include 'partials/_footer.php';  ?>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>