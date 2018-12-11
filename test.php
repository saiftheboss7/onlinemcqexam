<?php include 'inc/header.php'; ?>
<?php
 Session::checkSession();
 if (isset($_GET['q'])) {
 	$quesnumber = (int) $_GET['q'];
 }else{
 	header("Location:exam.php");
 }
 $total    = $exam->getTotalRows();
 $question = $exam->getQuestionNumber($quesnumber);

?>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 	$process = $pro->getProcessData($_POST);
 }

 
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Question <?php echo $question['quesNo']." of ". $total; ?></h1>
                <br/>
                <br/>
            </div>
            <div class="col-lg-12">
                <form method="post" action="">
                    <table>
                        <tr>
                            <td colspan="2">
                                <h3>Que <?php echo $question['quesNo']." : ".$question['ques']; ?></h3>
                            </td>
                        </tr>
                        <?php
                        $answer = $exam->getAnswer($quesnumber);
                        if ($answer) {
                            while ($result = $answer->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="ans" class="form-check-input" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
                                            </label>
                                        </div>

<!--                                        <input type="radio" name="ans" value="--><?php //echo $result['id']; ?><!--" />--><?php //echo $result['ans']; ?>
                                    </td>
                                </tr>
                            <?php } } ?>
                        <tr>
                            <td>
                                <br/>
                                <input type="submit" name="submit" class="btn btn-outline-primary" value="Next Question" />
                                <input type="hidden" name="quesnumber"
                                       value="<?php echo $quesnumber; ?>" />
                            </td>
                        </tr>

                    </table>
                </form>
                <br/>
                <br/>
            </div>
        </div>
    </div>

<?php include 'inc/footer.php'; ?>