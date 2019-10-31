<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Configuration у
if (is_file('config.php')) {
    require_once('config.php');
}else{
    die("невозможно загрузить конфигурацию");
}
// Autoloader
if (is_file(DIR_STORAGE . 'vendor/autoload.php')) {
    require_once(DIR_STORAGE . 'vendor/autoload.php');
}

if( !empty($_POST["name"]) ) {
    $name = $_POST["name"];
}
if( !empty($_POST["tel"]) ) {
    $tel = $_POST["tel"];
}
if( !empty($_POST["email"]) ) {
    $pmail = $_POST["email"];
}
if( !empty($_POST["comments"]) ) {
    $comments = $_POST["comments"];
}
//var_dump($_POST);
//die();
$headers = 'From: webmaster@example.com' . "\r\n" .
        'Reply-To: webmaster@example.com' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
$message = "Заказ звонка с сайта".PHP_EOL."от почта клиента $pmail ".PHP_EOL."телефонный номер клиента $tel ".PHP_EOL."клиет оствил следующее сообщение ".PHP_EOL."$comments";
mail('dennis.bochkov@yandex.ru', 'Заказ звонка с сайта', $message,$headers);
die();
$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'smtp.yandex.ru';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'dokc007';                     // SMTP username
    $mail->Password = '1tC4y7527f';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('dokc007@yandex.ru', 'Mailer');
    $mail->addAddress('logic@xaker.ru', 'mail Robot');     // Add a recipient 'dennis.bochkov@yandex.ru'

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Заказ звонка с сайта';
    $mail->Body = $message;
    $mail->AltBody = $tel;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
