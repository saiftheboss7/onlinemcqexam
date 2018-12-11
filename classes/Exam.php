<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
   
 public function getAddQuestion($data){
   $quesNo = mysqli_real_escape_string($this->db->link, $data['quesNo']);
   $ques   = mysqli_real_escape_string($this->db->link, $data['ques']);
   $ans    = array();
   $ans[1] = $data['ans1'];
   $ans[2] = $data['ans2'];
   $ans[3] = $data['ans3'];
   $ans[4] = $data['ans4'];
   $rightAns = mysqli_real_escape_string($this->db->link, $data['rightAns']);
   

   $query = "INSERT INTO tbl_ques(quesNo, ques) VALUES('$quesNo','$ques')";
   $insert_row = $this->db->insert($query);

   if ($insert_row) {
      foreach ($ans as $key => $ansName) {
         if ($ansName != '') {
            if ($rightAns == $key) {
               $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo','1','$ansName')";
            }else{
               $rquery = "INSERT INTO tbl_ans(quesNo, rightAns, ans) VALUES('$quesNo','0','$ansName')";
            }
            $rinsert = $this->db->insert($rquery);
            if ($rinsert) {
               continue;
            }else{
               die('Error...');
            }
         }
      }
      $msg = "<div class='alert alert-success'>Data Inserted Successfuly!</div>";
      return $msg;
   }
 }

 public function getqueData(){
   $query = "SELECT * FROM tbl_ques ORDER BY quesNo ASC";
   $result = $this->db->select($query);
   return $result;
 }
 public function getdelresult($quesNo){
   $tables = array("tbl_ques","tbl_ans");
   foreach ($tables as $table) {
      $delqs     = "DELETE FROM $table WHERE quesNo = '$quesNo'";
      $delresult = $this->db->delete($delqs);
   }
   if ($delresult) {
      $msg = "<div class='alert alert-success'>Qusetion Deleted Successfuly!</div>";
      return $msg;
   }else{
      $msg = "<div class='alert alert-danger'>Data Not Deleted.</div>";
      return $msg;
   }
 }

 public function getTotalRows(){
   $query     = "SELECT * FROM tbl_ques";
   $getResult = $this->db->select($query);
   $total     = $getResult->num_rows;
   return $total;
 }
 public function getQuestion(){
   $query      = "SELECT * FROM tbl_ques";
   $result     = $this->db->select($query);
   $resultData = $result->fetch_assoc();
   return $resultData;
 }
 public function getQuestionNumber($quesNo){
   $query      = "SELECT * FROM tbl_ques WHERE quesNo = '$quesNo'";
   $result     = $this->db->select($query);
   $resultData = $result->fetch_assoc();
   return $resultData;
 }
 public function getAnswer($quesnumber){
   $query = "SELECT * FROM tbl_ans WHERE quesNo = '$quesnumber'";
   $result = $this->db->select($query);
   return $result;

 }
}
?>