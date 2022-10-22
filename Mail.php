
<?php
// zrogycdxvlfpwxmp
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class Mail{

    public function __construct(){        
        include('phpmailer/src/Exception.php');
        include('phpmailer/src/PHPMailer.php');
        include('phpmailer/src/SMTP.php');
    }

    public function sendMail($toAdress,$subject,$body){

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host ='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'sl.info.jobslanka@gmail.com';
        $mail->Password = 'zrogycdxvlfpwxmp';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        
        $mail->setFrom('sl.info.jobslanka@gmail.com');

        $mail->addAddress($toAdress);

        $mail->isHTML(true);
        
        $mail->Subject = $subject;
        $mail->Body = $body;
        
        if(!$mail->send()){
            return false;
        }else{
            return true;
        }        
    }
}

?>