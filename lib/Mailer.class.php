<?php

class Mailer {
    public function sendUserInscriptionSuccess($userInfo)
    {}

    public function sendAdminValidation($userInfo)
    {}

    public function sendUserValidationSuccess($userInfo)
    {}

    public function send($dest, $subject, $body, $altBody)
    {
        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->Host = SMTP_HOST;
        $mail->SMTPAuth = true;
        $mail->Username = SMTP_USERNAME;
        $mail->Password = SMTP_PASSWORD;
        $mail->SMTPSecure = 'tls';
        $mail->Port = SMTP_PORT;

        $mail->setFrom(EMAIL_FROM, EMAIL_FROM_NAME);
        $mail->addAddress($dest);
        $mail->addReplyTo(EMAIL_FROM, EMAIL_FROM_NAME);

        $mail->isHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = $altBody;

        //return $mail->send();
        return $mail->send();
    }
}

// END /lib/Mailer.class.php
