<?php
require_once './mailer/config.inc.php';
require_once './mailer/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class MailTo {
    
    public function sendMail($asunto, $texto, $receptor){
        $mail = new PHPMailer(true);                             
        try {
            
            $mail->isSMTP();                                     
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            
            $mail->Username = REMITENTE;
            $mail->Password = CLAVE;
            $mail->SMTPSecure = 'tls';                           
          
            $mail->setFrom(REMITENTE, REMITENTE_NAME);
            
            $para = explode(";", $receptor);
            for($i=0;$i<count($para);$i++){
                $mail->addAddress($para[$i]);				
            }
                                        
            $mail->Subject = $asunto;
            $mail->Body    = $texto;
               
            $mail->send();
            echo 'Envio OK';
        } catch (Exception $e) {
            echo 'No se pudo realizar el envio. Mensaje del Error: '. $mail->ErrorInfo;
        }
        
    }

}
?>