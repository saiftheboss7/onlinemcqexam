<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/inc/loginheader.php');
include_once ($filepath.'/../classes/Admin.php');
$ad = new Admin();
?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adminData = $ad->getAdminData($_POST);
}
?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Online Exam System</h1>
                <p class="lead">Login to your Administration Panel</p>
            </div>

            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control" name="adminUser" placeholder="Enter admin username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="adminPass" class="form-control" placeholder="Password">
                    </div>
                    <button type="submit" name="login" value="Login" class="btn btn-primary">Submit</button>
                </form>
                <br/>

                <?php
                if (isset($adminData)) {
                    echo $adminData;
                }
                ?>
            </div>
        </div>
    </div>
<?php include '../inc/footer.php'; ?>