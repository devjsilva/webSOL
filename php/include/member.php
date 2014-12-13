<?PHP
class member
{
  private $username;
  private $pwd;
  private $database;
  private $tablename;
  public $connection;
  public $db_host;
  private $rand_key;
  public $error;

  function member($dbname,$hostname,$username,$password,$table){
  $this->database=$dbname;
   $this->db_host=$hostname;
   $this->username=$username;
   $this->pwd=$password;
   $this->tablename=$table;


 }
 function connect()
 {

   // Create connection
   $this->connection = new mysqli($this->db_host,$this->username,$this->pwd,$this->database);
   // Check connection
   if ($this->connection->connect_errno) {
     $this->HandleError("Database login failed!");
     return false;
    }
   return true;
 }
 function checkuser($username,$password)
 {
   if(!$this->connect()){
     return false;
     }
   $pwdmd5 = md5($password);
   $username=$this->connection->real_escape_string($username);
   $qry = "Select username from $this->tablename ".
   " where username='$username' and password='$pwdmd5' ";
/*
   echo $qry;
   echo "<br>";
   $other=$this->connection->query("Select * from $this->tablename where username='$username'");
   $row=$other->fetch_array();
   for($i=0;$i<$other->field_count*2;$i++){
     printf ("\n%s<br>", $row[$i]);
   }
*/

   $result = $this->connection->query($qry);
   if($result->num_rows <= 0)
   {
     $this->HandleError("The username or password do not match!");
     return false;
   }
   return true;

 }


 function login()
 {
   if(empty($_POST['username']))
   {
     $this->HandleError("Username is empty!");
     return false;
   }

   if(empty($_POST['password']))
   {
     $this->HandleError("Username is empty!");
     return false;
   }
   $username = trim($_POST['username']);
   $password = trim($_POST['password']);

   if(!$this->checkuser($username,$password))
   {
     return false;
   }
   if(!isset($_SESSION)){ session_start(); }
   $_SESSION[$this->GetLoginSessionVar()] = $username;
   return true;

 }
 function RedirectToURL($url)
 {
   header("Location: $url");
   exit;
 }
 function SetRandomKey($key)
 {
   $this->rand_key = $key;
 }
 function HandleError($err){
   $this->error = $err;
 }

 function GetLoginSessionVar()
 {
   $retvar = md5($this->rand_key);
   $retvar = 'usr_'.substr($retvar,0,10);
   return $retvar;
 }
 function GetError()
 {
   return $this->error;
 }


}
?>
