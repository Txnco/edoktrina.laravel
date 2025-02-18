<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class EmailService
{
    private $mailer;

    public function __construct()
    {
        $this->mailer = new PHPMailer(true); 
        $this->setupMailSettings();
    }

    private function setupMailSettings()
    {
        // Configure mailer settings
        $this->mailer->isSMTP();
        $this->mailer->Host = config('mail.mailers.smtp.host'); 
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = config('mail.mailers.smtp.username'); 
        $this->mailer->Password = config('mail.mailers.smtp.password');
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = config('mail.mailers.smtp.port'); // SMTP port  

        $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;

    }

    protected function replacePlaceholders($template, $data)
    {
        $body = file_get_contents($template);
        foreach ($data as $key => $value) {
            $body = str_replace('{' . $key . '}', $value, $body);
        }
        return $body;
    }

    public function send($to, $subject, $data = [], $email_template)
    {
        try {
            $this->mailer->setFrom(config('mail.from.address'), config('mail.from.name'));
            $body = $this->replacePlaceholders($email_template, $data);
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            //$this->mailer->AltBody = '';

            if (!$this->mailer->send()) {
                // Log the error or handle it as needed
                return false;
            }

            return 'success';
        } catch (Exception $e) {
            // Log the exception or handle it as needed
            return 'email_send_error ' . $e;
        }
    }
}