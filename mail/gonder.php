<title>Posta Gönderme Sonuç Raporu</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php

if($_POST['token'] != 'gvdssad5adashdgvewh65dasfd5fv3r4rhgrvhdscsx5ef36cdefdch'){ die(""); }

$post['name'] = 'Dr. Light'; 

$post['mail'] = '**************';
$post['password'] = '**********';

$host = 'mail.domain.com';
$port = 587;
$receiver = $_POST['to'];
require("class.phpmailer.php"); // PHPMailer dosyamizi çagiriyoruz
$mail = new PHPMailer(); // Sinifimizi $mail degiskenine atadik
$mail->IsSMTP(true);  // Mailimizin SMTP ile gönderilecegini belirtiyoruz
$mail->SMTPDebug = 1;
$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);
$mail->From     = $post['mail'];//"admin@localhost"; //Gönderen kisminda yer alacak e-mail adresi
$mail->Sender   = $post['mail'];//"admin@localhost";//Gönderen Mail adresi
//$mail->ReplyTo  = ($post['mail']);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->AddReplyTo=($post['mail']);//"admin@localhost";//Tekrar gönderimdeki mail adersi
$mail->FromName = $post["name"];//"PHP Mailer";//gönderenin ismi
$mail->Host     = $host;//"localhost"; //SMTP server adresi
$mail->SMTPAuth = true; //SMTP server'a kullanici adi ile baglanilcagini belirtiyoruz
$mail->SMTPSecure = 'tls'; 
$mail->SMTPAutoTLS = false;
$mail->Port     = $port; //Natro SMPT Mail Portu
$mail->CharSet = 'UTF-8'; //Türkçe yazı karakterleri için CharSet  ayarını bu şekilde yapıyoruz.
$mail->Username = $post['mail'];//"admin@localhost"; //SMTP kullanici adi
$mail->Password = $post['password'];//""; //SMTP mailinizin sifresi
$mail->WordWrap = 50;
$mail->IsHTML(true); //Mailimizin HTML formatinda hazirlanacagini bildiriyoruz.

//Mailimizin gövdesi: (HTML ile)
$body  = $_POST['body'];


//  $body = $_POST["mesaj"];//"Bu mail bir deneme mailidir. SMTP server ile gönderilmistir.";
// HTML okuyamayan mail okuyucularda görünecek düz metin:
$textBody = $body;//"Bu mail bir deneme mailidir. SMTP server ile gönderilmistir.";
$mail->Subject  = '=?UTF-8?B?'.base64_encode($_POST['subject']).'?=';
$mail->Body = $body;
//$mail->AltBody = $text_body;
//$mail->AddAttachment('images.png'); //mail içinde resim göndermek için
//$mail->addCC('mailadi@alanadiniz.site');// cc email adresi
//$mail->addBCC('mailadi@alanadiniz.site');// bcc email adresi
$mail->AddAddress($receiver); // Mail gönderilecek adresleri ekliyoruz.
//$mail->AddAddress("mailadi@alanadiniz.site"); // Mail gönderilecek adresleri ekliyoruz. Birden fazla ekleme yapılabilir.
if(!$mail->Send())
    {
    echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
echo "Message has been sent";
}
$mail->ClearAddresses();
$mail->ClearAttachments();
?>