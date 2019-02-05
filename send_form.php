<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$company = isset($_POST['company']) ? $_POST['company'] : false;
$name = isset($_POST['name']) ? $_POST['name'] : false;
$phone = isset($_POST['phone']) ? $_POST['phone'] : false;
$email = isset($_POST['email']) ? $_POST['email'] : false;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'oktell@sng-it.com';                 // SMTP username
    $mail->Password = 'Ololo123';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    //Recipients
    $mail->setFrom('oktell@sng-it.com', 'S&G IT');
    $mail->addAddress('godmanshot@gmail.com');

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Заказ с сайта';
    $mail->Body    = ($company ? ' Компания : '.$company : '').($name ? ' Имя : '.$name : '').($phone ? ' Телефон : '.$phone : '').($email ? ' Почта : '.$email : '');
    $mail->send();
} catch (Exception $e) {
}