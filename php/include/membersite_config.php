<?PHP
require_once("./include/member.php");

$member = new member(
/*database name*/'savingou_projlegacy',/*hostname*/'www.savingourlegacy.com',
/*username*/'savingou_adminly',
/*password*/'façoanosemmarço',
/*database name*/'savingou_projlegacy',
/*table name*/'Utilizador');


//Provide your site name here
//$member->SetWebsiteName('savingourlegacy.com');

//Provide the email address where you want to get notifications
//$member->SetAdminEmail('a57820@alunos.uminho.pt');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
//$member->InitDB(/*hostname*/'www.savingourlegacy.com',
  //                    /*username*/'savingou_adminly',
  //                  /*password*/'façoanosemmarço',
  //                  /*database name*/'savingou_projlegacy',
  //                  /*table name*/'Utilizador');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
//$member->SetRandomKey('3tXJSkqyYMMaC97');


?>
