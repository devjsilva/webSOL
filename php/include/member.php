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
   if (!$this->connection->set_charset("utf8")) {
     $this->HandleError("Error loading character set utf8:".$mysqli->error);
   }
   // Check connection
   if ($this->connection->connect_errno) {
     $this->HandleError("Database login failed!");
     return false;
    }
   return true;
 }
  public function checkuser($username,$password)
 {

   if(!$this->connect())
   {
     return false;
   }
   //Get Password
   $pwd=$this->GetPwd($username,$password);
   if(!strcmp($pwd,"")){return false;}

   //Escape dangerous SQL Injections and make query
   $username=$this->connection->real_escape_string($username);
   $qry = "Select ut_nome from $this->tablename ".
   " where ut_mail='$username' and password='$pwd' ";

   $result = $this->connection->query($qry);
   if($result->num_rows <= 0)
   {
     $this->HandleError("The username or password do not match!");
     $this->connection->close();
     return false;
   }
   $this->connection->close();
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
 function register($name, $mail,$password,$dataNasc){
   if(!$this->connect()){
     return false;
   }
   /*Receber os parametros pelo $_POST[] quando o formulário estiver pronto !!!!!!!!!!!!*/
   $salt=hash("sha256",(trim($name.$mail)));
   $options = [
     'cost' => 11,
     'salt' => $salt,
   ];
   $pwd=password_hash($password, PASSWORD_BCRYPT, $options);
   if(!$dataNasc){ $dataNasc='DEFAULT';}
   $qry="INSERT INTO Utilizador (ut_nome,ut_mail,password,ut_dataNasc,ut_dataReg,ut_dataAtual) ".
   "VALUES('$name','$mail','$pwd',$dataNasc,CURDATE(),CURDATE())";
   if(!$this->connection->query($qry)){
     $this->connection->close();
     return false;
   }
   $this->connection->close();
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
 private function GetPwd($user,$password){
   $this->connect();
   $qry="SELECT ut_nome,ut_mail FROM $this->tablename WHERE ut_mail='$user'";
   $result=$this->connection->query($qry);
   if($result->num_rows <= 0)
   {
     $this->HandleError("The username or password do not match!");
     $this->connection->close();
     return "";
   }
   $row=$result->fetch_assoc();
   $salt=hash("sha256",(trim($row['ut_nome'].$row['ut_mail'])));
   $options = [
     'cost' => 11,
     'salt' => $salt,
   ];
   $pwd=password_hash($password, PASSWORD_BCRYPT, $options);
   return $pwd;

 }


}
?>
