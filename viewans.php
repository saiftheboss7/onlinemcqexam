<?php include 'inc/header.php'; ?>
<?php
 Session::checkSession();
$total    = $exam->getTotalRows(); 
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">All Question & Answer - Total <?php echo $total; ?> Questions</h1>
                <br/>
                <br/></div>

                <div class="col-lg-12">
                <table>
                    <?php
                    $getQues = $exam->getqueData();
                    if ($getQues) {
                        while ($question = $getQues->fetch_assoc()) {
                            ?>
                            <tr>
                                <td colspan="2">
                                    <h5>Que <?php echo $question['quesNo']." : ".$question['ques']; ?></h5>
                                </td>
                            </tr>
                            <?php
                            $quesnumber = $question['quesNo'];
                            $answer = $exam->getAnswer($quesnumber);
                            if ($answer) {
                                while ($result = $answer->fetch_assoc()) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="radio" /><?php
                                            if ($result['rightAns'] == '1') {
                                                echo "<span style='color:green;font-weight: bold;'>".$result['ans']." (Correct Ans)</span>";
                                            }else{
                                                echo $result['ans'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php } } ?>
                        <?php } } ?>
                </table>


                <a href="starttest.php" class="btn btn-success btn-lg">
                    <span class="fa fa-arrow-right"></span> Start Exam
                </a>
                <br/>
                <br/>
                </div>
            </div>
        </div>
    </div>
<?php include 'inc/footer.php'; ?>