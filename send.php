<?php 

$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$userPhone = $_POST['userPhone'];
$userQuestion = $_POST['userQuestion'];

//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();

try {
    //Server settings
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'sends.info.space@gmail.com';                     //SMTP username
    $mail->Password   = 'CQZ-b99-CKe-cNC';                               //SMTP password
    $mail->SMTPSecure = 'ssl';         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sends.info.space@gmail.com', 'Денис');
    $mail->addAddress('deniska2002non@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Новая заявка на сайте';
    $mail->Body    = "Имя пользователя: ${userName}, <br><br> Телефон: ${userPhone}. <br><br> Почта: ${userEmail}. <br><br> Вопрос: ${userQuestion}";

    if ($mail->send(true)) {
        echo "ok";
    } else {
        echo "Письмо не было отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
    }
    // header('Location: thanks.html');
} catch (Exception $e) {
    echo "Письмо не было отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}

?>