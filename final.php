<?php include 'inc/header.php'; ?>
<?php
  Session::checkSession();
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Congrats! You have just completed test.</h1>
            <p class="lead">Check your final score. You can also check the correct answers.</p>
            <br/>

            <div class="jumbotron">
            <h1 class="text-danger">Final Score:
                    <?php
                    if (isset($_SESSION['score'])) {
                        echo $_SESSION['score'];
                        unset($_SESSION['score']);
                    }
                    ?>
                </h1></div>
            <br/>
            <br/>
            <a class="btn btn-outline-success btn-lg" href="viewans.php"><span class="fa fa-check-circle"></span> View Answer</a>
            <a class="btn btn-outline-info btn-lg" href="starttest.php"><span class="fa fa-arrow-right"></span> Start Test</a>
            <br/>
            <br/>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>