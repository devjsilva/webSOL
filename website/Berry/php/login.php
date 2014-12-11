<?php


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
    die();
  }
   return $conn;
}

function checkuser($username,$password)
{
    $dbconn=connect();
    $pwdmd5 = md5($password);
    $qry = "Select name, email from $this->tablename ".
    " where username='$username' and password='$pwdmd5' ".
    " and confirmcode='y'";

    $result = mysql_query($qry,$this->connection);

    if(!$result || mysql_num_rows($result) <= 0)
    {
    $this->HandleError("Error logging in. ".
    "The username or password does not match");
    return false;
  }
  return true;

}

function HandleError($error){
  echo $error;
}




/*
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

  $sql=$conn->query("SHOW TABLES");
  echo "<p>Available tables:</p>\n";
  echo "<pre>\n";
  echo "</pre>\n";
  while ($row = $sql->fetch_row()) {
    printf ("\n%s<br>", $row[0]);
  }

}*/


function login()
{
  /*if(empty($_POST['username']))
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
*/
  if(!checkuser("TET","TOL"))
  {
    return false;
  }

  session_start();

  $_SESSION['username'] = $username;

  return true;

}


login();
?>
