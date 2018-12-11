<?php include 'inc/header.php'; ?>
<?php
  Session::checkSession();
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">You can start your exam</h1>
                <p class="lead">Take your time. Click Start Exam when you are ready.</p>
                <img src="img/takeTest.png" height="200" width="200"/>
                <br/>
                <br/>

                <a href="starttest.php" class="btn btn-success btn-lg">
                    <span class="fa fa-arrow-right"></span> Start Exam
                </a>
                <br/>
                <br/>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>