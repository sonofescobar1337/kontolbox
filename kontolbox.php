<?php

/*

DECODED & CRACKED BY KontolKuda17
Lampung, Indonesia

*/

require_once("setting/phpmailer/PHPMailerAutoload.php");
include('setting/kontol.function.php');

//include('crot.php');

echo "\n\n      \e[92m          KKKKKKKKK    KKKKKKKNNNNNNNN        NNNNNNNNTTTTTTTTTTTTTTTTTTTTTTTLLLLLLLLLLL\r\n";
echo "              K:::::::K    K:::::KN:::::::N       N::::::NT:::::::::::::::::::::TL:::::::::L \r\n";
echo "              K:::::::K    K:::::KN::::::::N      N::::::NT:::::::::::::::::::::TL:::::::::L \r\n";
echo "                K:::::::K   K::::::KN:::::::::N     N::::::NT:::::TT:::::::TT:::::TLL:::::::LL  \r\n";
echo "                KK::::::K  K:::::KKKN::::::::::N    N::::::NTTTTTT T:::::T  TTTTTT L:::::L \r\n";
echo "                K:::::K K:::::K   N:::::::::::N   N::::::N        T:::::T          L:::::L  \e[0m \r\n";
echo "                ======= =======   =============   =========       ========         ======== \r\n";
echo "\e[42m                                                                                       \r\n";
echo "                                       \e[1m  KONTOLBOX V1.69 - SonOfEscobar 1337                  \r\n";
echo "                                                                                          \e[0m\r\n";
echo "                ======= ======    ========   =============        =======          ========\r\n";
echo "               \e[92m K::::::K:::::K    N::::::N   N:::::::::::N        T:::::T          L:::::L\r\n";
echo "                K:::::K K:::::K   N::::::N    N::::::::::N        T:::::T          L:::::L  \r\n";
echo "                KK::::::K  K:::::KKKN::::::N   N:::::::::N        T:::::T        L:::::L        LLLLLL\r\n";
echo "              K:::::::K   K::::::KN::::::N      N::::::::N      TT:::::::TT      LL:::::::LLLLLLLLL:::::L\r\n";
echo "              K:::::::K    K:::::KN::::::N       N:::::::N      T:::::::::T      L::::::::::::::::::::::L\r\n";
echo "              K:::::::K    K:::::KN::::::N        N::::::N      T:::::::::T      L::::::::::::::::::::::L\r\n";
echo "              KKKKKKKKK    KKKKKKKNNNNNNNN         NNNNNNN      TTTTTTTTTTT      LLLLLLLLLLLLLLLLLLLLLLLL \e[0m\r\n";
echo "\r\n";


$lastline = system('ls list');
echo "masukkan file mailist : " ;
$input_mailist = fopen("php://stdin", "r");
$nama = trim(fgets($input_mailist));
$location_list = "list/".$nama ;

$lastline = system('ls config');
echo "masukkan Config : " ;
$input_config = fopen("php://stdin", "r");
$nama_config = trim(fgets($input_config));
$location_config = "config/".$nama_config ;
include($location_config);

function Kirim($email, $smtp_acc, $gx_setup)
{
    global $ahh, $num;
    $smtp    = new SMTP;
    $smtp->do_debug = 0;

    $smtpserver     = $smtp_acc['host'];
    $smtpport       = $smtp_acc['port'];
    $smtpuser       = $smtp_acc['username'];
    $smtppass       = $smtp_acc['password'];
    $priority       = $gx_setup['priority'];
    $userandom      = $gx_setup['userandom'];
    $sleeptime      = $gx_setup['sleeptime'];
    $replacement    = $gx_setup['replacement'];
    $userremoveline = $gx_setup['userremoveline'];
    $fromname       = $gx_setup['fromname'];
    $frommail       = $gx_setup['frommail'];
    $subject        = $gx_setup['subject'];
    $msgfile        = $gx_setup['msgfile'];
    $filepdf        = $gx_setup['filesend'];
    $randurl        = $gx_setup['scampage'];

    if (!$smtp->connect($smtpserver, $smtpport)) {
        throw new Exception('Connect failed');
    }

    //Say hello
    if (!$smtp->hello(gethostname())) {
        throw new Exception('EHLO failed: ' . $smtp->getError()['error']);
    }

    $e = $smtp->getServerExtList();

    if (array_key_exists('STARTTLS', $e)) {
        $tlsok = $smtp->startTLS();
        if (!$tlsok) {
            throw new Exception('Failed to start encryption: ' . $smtp->getError()['error']);
        }
        if (!$smtp->hello(gethostname())) {
            throw new Exception('EHLO (2) failed: ' . $smtp->getError()['error']);
        }
        $e = $smtp->getServerExtList();
    }

    if (array_key_exists('AUTH', $e)) {

        if ($smtp->authenticate($smtpuser, $smtppass)) {
            $mail           = new PHPMailer;
            $mail->Encoding = 'base64'; // 8bit  base64 multipart/alternative quoted-printable
            $mail->CharSet  = 'UTF-8';
            $mail->headerLine("format", "flowed");
            /*  Smtp connect    */
            //$mail->addCustomHeader('X-Ebay-Mailtracker', '11400.000.0.0.df812eaca5dd4ebb8aa71380465a8e74');
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host     = $smtpserver;
            $mail->Port     = $smtpport;
            $mail->Priority = $priority;
            $mail->Username = $smtpuser;
            $mail->Password = $smtppass;
			

            if ($userandom == 1) {
                $rand     = rand(1, 50);
                $fromname = randName($rand);
                $frommail = randMail($rand);
                $subject  = randSubject($rand);
            }

            if ($gx_setup['filesend'] == 0) {
                $filepdf = file_get_contents($AddAttachment);
                $mail->AddAttachment($filepdf);
            }

            $asu       = RandString1(10);
            $asu1      = RandString(5);
            $asu2      = RandNumber(4);
            $nmbr      = RandNumber(5);
            $fromnames = str_replace('##randstring##', $asu1, $fromname);
            $frommails = str_replace('##randstring##', $asu, $frommail);
            $subjects  = str_replace('##randstring##', $asu2, $subject);
            $randurls   = str_replace('##email##', $asu, $randurl);

            $mail->setFrom($frommails, $fromnames);

            $mail->AddAddress($email);
			
            $mail->Subject = $subjects;
            if ($replacement == 1) {
                $msg = lettering($msgfile, $email, $frommail, $fromname, $randurl, $subject);
            } else {
                $msg = file_get_contents($msgfile);
            }


            $mail->msgHTML($msg);

            if (!$mail->send()) {
                echo "SMTP Error : " . $mail->ErrorInfo;
                exit();
            } else {
				print "[ ";
                print $num+1 ." ] Send To: $email\n";
            }
            $mail->clearAddresses();

        } else {
            throw new Exception('Authentication failed: ' . $smtp->getError()['error']);
        }

        $smtp->quit(true);

    }

}


// bagian fiel

//
    $file = file_get_contents($location_list);
    if(empty($file)){
            echo "[KONTOLBOX] FILE TIDAK TERSEDIA KONTOL!!!\r\n";
            die();
        }
    if ($file) {
        $ext = explode("\n", $file);
		//$ext = array_unique($ext);
        echo "                                \r\n";
        echo "=============================KONTOLBOX READY ANJING==============================";
        echo "\r\n";
        echo "\n";
        $smtp_key = 0;
        
        $crot = 0;
        $crotmax = count($fname) - 1;
        
        foreach ($ext as $num => $email) {
            if ($smtp_key == count($smtp_acc)) {
                $smtp_key = 0;
            }
            //kirim
            //    $gx_setup = $gx_sett;
            
            $ahh = $fname[$crot];
            $gx_setup['fromname'] = $ahh;
            $crot++;
            if ($crot >= $crotmax){
                $crot = 0;
            }
            
            Kirim($email, $smtp_acc[$smtp_key], $gx_setup);
            $smtp_key++;
            ///
            sleep($gx_setup['sleeptime']);
        }
        if ($gx_setup['userremoveline'] == 1) {
            $remove = Removeline($mailist, $email);
        }
    }
//".cok(1)."".nomer(2)."".RandString(1)."