<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'../inc/header.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Welcome to Exam Control Panel - Admin</h1>
                <h2>You can manage your users and online exam system to add questions.</h2>
                <br/>
                <br/>

                <div class="jumbotron">
                    <h1>Controls</h1>
                    <a class="btn btn-outline-success btn-lg" href="index.php"><span class="fa fa-home"></span> Home</a>
                    <a class="btn btn-outline-info btn-lg" href="users.php"><span class="fa fa-user-circle"></span> Manage Users</a>
                    <a class="btn btn-outline-primary btn-lg" href="quesadd.php"><span class="fa fa-question-circle"></span> Add Question</a>
                    <a class="btn btn-outline-dark btn-lg" href="queslist.php"><span class="fa fa-list"></span> Ques List</a>
                    <a class="btn btn-outline-danger btn-lg" href="?action=logout"><span class="fa fa-sign-out"></span> Logout</a>
                </div>

            </div>
        </div>
    </div>
<?php include '../inc/footer.php'; ?>