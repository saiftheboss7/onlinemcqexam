<?php include 'inc/header.php'; ?>
<?php
  Session::checkSession();
  $userId = Session::get("userId");
?>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$userProfile = $user->getUserPData($userId, $_POST);
}
?>


    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Update Your Profile</h1>
                <?php
                if (isset($userProfile)) {
                    echo $userProfile;
                }
                ?>
                <br/>
            </div>


            <div class="col-lg-12">

                <form action="" method="post">
                    <?php
                    $getData = $user->getUserProfile($userId);
                    if ($getData) {
                        while ($result = $getData->fetch_assoc()) {
                            ?>
                            <table>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" name="name" value="<?php echo $result['name']; ?>" id="name"></td>
                                </tr>
                                <tr>
                                    <td>User Name </td>
                                    <td><input type="text" name="userName" value="<?php echo $result['userName']; ?>" id="userName"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input name="email" type="email" value="<?php echo $result['email']; ?>" id="email"></td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td><input type="submit" id="profileUpdate" class="btn btn-primary" value="Update">
                                    </td>
                                </tr>
                            </table>
                        <?php }  } ?>
                </form>
                <br/>
                <br/>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>