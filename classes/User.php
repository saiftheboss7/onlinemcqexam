<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../helpers/Format.php');

class User{
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function userRegistion($name,$userName,$password,$email){
      $name     = $this->fm->validation($name);
      $userName = $this->fm->validation($userName);
      $password = $this->fm->validation($password);
      $email    = $this->fm->validation($email);

      $name     = mysqli_real_escape_string($this->db->link, $name);
      $userName = mysqli_real_escape_string($this->db->link, $userName);
      $password = mysqli_real_escape_string($this->db->link, $password); 
      $email    = mysqli_real_escape_string($this->db->link, $email);

      if ($name == "" || $userName == "" || $password == "" || $email == "") {
         echo "<div class=\"alert alert-danger alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    <strong>Fields must not be empty</strong>
  </div>";
          exit();
      }elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
         echo "<div class=\"alert alert-danger alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    <strong>Invalid email address.</strong></div>";
          exit();
      }else{
         $chkquery = "SELECT * FROM tbl_user WHERE email = '$email'";
         $chkresult = $this->db->select($chkquery);
         if ($chkresult != false) {
            echo "<div class=\"alert alert-danger alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    <strong>Email already exists. Try with different email.</strong></div>";
          exit();
         }else{
            $query = "INSERT INTO tbl_user(name, userName, password, email) VALUES('$name','$userName', MD5('".$password."'),'$email')";
            $insertr = $this->db->insert($query);
            if ($insertr) {
               echo "<div class=\"alert alert-success alert-dismissible fade show\">Registration Successful. Please login.</div>";
               exit();
            }else{
               echo "<div class=\"alert alert-danger alert-dismissible\">
    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    <strong>Something happened. Registration Unsucessful.</strong></div>";
               exit();
            }
         }
      }

           
	}

   public function userLogin($email, $password){
      $email    = $this->fm->validation($email);
      $password = $this->fm->validation($password);
      $email    = mysqli_real_escape_string($this->db->link, $email);
      if ($email == "" || $password == "") {
         echo "empty";
          exit();
      }else{
        $password = mysqli_real_escape_string($this->db->link, $password);
         $query = "SELECT * FROM tbl_user WHERE email = '$email' AND password = MD5('".$password."')";
         $result = $this->db->select($query);
         if ($result != false) {
            $value = $result->fetch_assoc();
            if ($value['status'] == '1') {
               echo "disable";
               exit();
            }else{
               Session::init();
               Session::set("login", true);
               Session::set("userId", $value['userId']);
               Session::set("userName", $value['userName']);
               Session::set("name", $value['name']);
            }
         }else{
            echo "error";
            exit();
         }
      }
   }

   public function getUserPData($userId, $data){
      $name     = $this->fm->validation($data['name']);
      $userName = $this->fm->validation($data['userName']);
      $email    = $this->fm->validation($data['email']);
      $name     = mysqli_real_escape_string($this->db->link, $name);
      $userName = mysqli_real_escape_string($this->db->link, $userName);
      $email    = mysqli_real_escape_string($this->db->link, $email);
             $query = "UPDATE tbl_user 
                SET
                name     = '$name',
                userName = '$userName',
                email    = '$email' WHERE 
                userId   = '$userId'";
         $result = $this->db->update($query);
         if ($result) {
            $msg = "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  <strong>All right!</strong> Data updated successfully
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
         return $msg;
         }else{
            $msg =  "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  <strong>Oh shoot!</strong> Data was NOT updated.
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
            return $msg;
         }
      }
   
      public function getUserData(){
        $query  = "SELECT * FROM tbl_user ORDER BY userId DESC";
        $result = $this->db->select($query);
        return $result;    
      }

      public function  disableUser($userId){
            $update = "UPDATE tbl_user SET status = '1' WHERE userId = '$userId'";
            $result = $this->db->update($update);
            if ($result) {
                  $msg = "<span class='success'>Data Disable Successfuly!</span>";
               return $msg;   
            }else{
                  $msg = "<span class='error'>Data Not Disable! </span>";
                  return $msg;
            }
            
      }

      public function enaUser($userId){
            $update = "UPDATE tbl_user SET status = '0' WHERE userId = '$userId'";
            $result = $this->db->update($update);
            if ($result) {
                  $msg = "<span class='success'>Data Enable Successfuly!</span>";
               return $msg;   
            }else{
                  $msg = "<span class='error'>Data Not Enable! </span>";
                  return $msg;
            }
      }

      public function delUser($userId){
            $delete = "DELETE FROM tbl_user WHERE userId = '$userId'";
            $result = $this->db->delete($delete);
            if ($result) {
                  $msg = "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  <strong>All right!</strong> Data was deleted successfully
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
                  return $msg;
            }else{
                  $msg = "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
  <strong>All right!</strong> Data was not deleted
  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
  </button>
</div>";
                  return $msg;
            }
      }
      

      public function getUserProfile($userId){
         $query = "SELECT * FROM tbl_user WHERE userId = '$userId'";
         $result = $this->db->select($query);
         return $result;
      }
 }

