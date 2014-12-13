<?PHP
require_once("include/member.php");
$member = new member(/*database name*/'savingou_projlegacy',
/*hostname*/'www.savingourlegacy.com',
/*username*/'savingou_adminly',
/*password*/'façoanosemmarço',
/*table name*/'Utilizador');
$member->SetRandomKey('3tXJSkqyYMMaC97');
if($member->login())
{
  echo "true";
  //header("Location: ../index.html");
  //exit;
}
echo $member->GetError();



/*
<?php
require_once("../php/member_login.php");

if(isset($_POST['submitted']))
{
if($member->login())
{
return true;
}
return false;
}
?>
function connect()
{

  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_errno) {
    HandleError("Database login failed!");
    die("Database login failed!");
  }
  return $conn;
}

function connect()
{
  $dbname="savingou_projlegacy";
  $servername = "www.savingourlegacy.com";
  $username = "savingou_adminly";
  $password = "façoanosemmarço";

  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_errno) {
    HandleError("Database login failed!");
    die("Database login failed!");
  }
   return $conn;
}

function checkuser($username,$password)
{
    $dbconn=connect();
    $pwdmd5 = md5($password);
    $qry = "Select username from Utilizador ".
    " where username='$username' and password='$pwdmd5' ";

    $result = $dbconn->query($qry);
    print_r($result);
    if($result->num_rows <= 0)
    {
    HandleError("Error logging in. ".
    "The username or password does not match");
    return false;
  }
  return true;

}

function HandleError($error){
  echo $error;
}





function tempconnect()
{
  $dbname="savingou_projlegacy";
  $servername = "www.savingourlegacy.com";
  $username = "savingou_adminly";
  $password = "façoanosemmarço";

  // Create connection
  $conn = new mysqli($servername, $username, $password,$dbname);

  // Check connection
  if ($conn->connect_errno) {
    die("Connection failed!");
  }
  //$result=$conn->query("SHOW COLUMNS FROM Utilizador");
  //$conn->query("INSERT INTO Utilizador (username,password,ut_nome,ut_dataNasc,ut_dataReg) VALUES('md5','md5','Teste md5',CURDATE(),CURDATE())");
  //$conn->query("UPDATE Utilizador SET password='$md5' WHERE username='md5'");
  $result=$conn->query("SELECT * FROM Utilizador where username='md5'");
  print_r($result);
  echo "<p>Available tables:</p>\n";
  echo "<pre>\n";
  echo "</pre>\n";
  //while ($row = $result->fetch_row()) {
    //printf ("\n%s<br>", $row[0]);
  //}
  $row=$result->fetch_array();
  for($i=0;$i<$result->field_count*2;$i++){
    printf ("\n%s<br>", $row[$i]);
  }

}
/*
utID
flag_admin
username
password
ut_nome
ut_dataNasc
ut_dataReg
estadoBloqueado


function login()
{
  if(empty($_POST['username']))
  {
    HandleError("Username is empty!");
    return false;
  }

  if(empty($_POST['password']))
  {
    HandleError("Username is empty!");
    return false;
  }
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  if(!checkuser($username,$password))
  {
    return false;
  }

  session_start();

  $_SESSION['username'] = $username;

  return true;

}
function RedirectToURL($url)
{
  header("Location: $url");
  exit;
}

tempconnect();
//login();
*/
?>
