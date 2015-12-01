<?php

class Mailer {
    public function sendUserInscriptionSuccess($userInfo)
    {
        $subject = 'Votre demande d\'inscription au colloque OLIC 2016';

        $body = file_get_contents('../config/email_content_inscription_success.txt');
        $body = str_replace('{{USER_REFERENCE}}', $userInfo['ref'], $body);
        $body = str_replace('{{USER_EMAIL}}', $userInfo['email'], $body);
        $body = str_replace("\r\n", '<br>', $body);

        return self::send($userInfo['email'], $subject, $body);
    }

    public function sendAdminValidation($userInfo, $validationURL)
    {
        $subject = 'Demande d\'inscription OLIC 2016';

        $keyMap = array(
            'lastname' => 'Nom',
            'firstname' => 'Prénom',
            'affiliation' => 'Affiliation',
            'email' => 'Email',
            'birthday' => 'Date de naissance',
            'birthplace' => 'Lieu de naissance',
            'address' => 'Adresse',
            'nationality' => 'Nationalité',
            'interest' => 'Intérêt',
            'ref' => 'Référence dossier',
        );

        $body = 'Informations:<br>';
        foreach ($userInfo as $key => $value) {
            if ($key === 'event0') {
                $body .= $value === '1' ? '<br>Participation matin' : '<br>';
            } else if ($key === 'event1') {
                $body .= $value === '1' ? 'Participation déjeuner' : '';
            } else if ($key === 'event2') {
                $body .= $value === '1' ? 'Participation après-midi<br>' : '';
            } else {
                $body .= '  - ';
                $body .= $keyMap[$key];
                $body .= ': ';
                $body .= $value;
            }
            $body .= '<br>';
        }
        $body .= '<br>Cliquez sur le lien ci-dessous pour valider cette inscription:<br>';
        $body .= $validationURL;
        $body .= '<br><br>------<br>OLIC Team with plenty of smile! (*^_^*)';

        return self::send(EMAIL_ADMIN, $subject, $body);
    }

    public function sendUserValidationSuccess($userInfo)
    {
        $subject = 'Confirmation de l\'inscription au colloque OLIC 2016';

        $body = file_get_contents('../config/email_content_validation_success.txt');
        $body = str_replace("\r\n", '<br>', $body);

        return self::send($userInfo['email'], $subject, $body);
    }

    private function send($dest, $subject, $body)
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

        //return $mail->send();
        return $mail->send();
    }
}

// END /lib/Mailer.class.php
