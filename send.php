<?php

if (!empty($_POST["name"])) {
    $name = $_POST["name"];
}
if (!empty($_POST["tel"])) {
    $tel = $_POST["tel"];
}
if (!empty($_POST["email"])) {
    $mail = $_POST["email"];
}
if (!empty($_POST["comments"])) {
    $comments = $_POST["comments"];
}

$customEmail = "dennis.bochkov@yandex.ru"; //вставь нужную почту получателя
$email = "$customEmail";
$subject .= "Заявка с сайта";
$msg = "

                Имя: $name;<br /> 

                Телефон: $tel;<br /> 

                Почта: $mail;<br />

                Город: $comments;<br />";

function smtp_mail($email, $subject, $msg, $alt_msg = 'HTML is disabled') {

    include_once 'lib/class_phpmailer.php';

    include_once 'lib/class_smtp.php';

    $mail = new PHPMailer();

    $mail->CharSet = 'utf-8';

    $mail->SMTPDebug = 2; // use 2 to on this function 

    $mail->isSMTP();

    $mail->Host = "smtp.yandex.ru";

    $mail->SMTPAuth = true;

    $mail->FromName = 'Сообщение с сайта';

    $mail->Username = "dokc007@yandex.ru";

    $mail->Password = "1tC4y7527f";

    // киногерой BATMAN

    $mail->SMTPSecure = 'ssl';

    $mail->Port = 465;



    $mail->isHTML(true);

    $mail->addAddress($email);



    $mail->Subject = $subject;

    $mail->Body = $msg;

    $mail->AltBody = $alt_msg;



    $mail->From = $mail->Username;



    return $mail->send();
}

$success = smtp_mail($email, $subject, $msg);

