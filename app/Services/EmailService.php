<?php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
        $this->mailer->Host = env('MAIL_HOST', 'smtp.zoho.eu'); 
        $this->mailer->SMTPAuth = true;
        $this->mailer->Username = env('MAIL_USERNAME', 'info@salabahter.eu'); 
        $this->mailer->Password = env('MAIL_PASSWORD', 'Salabahter3!');
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mailer->Port = env('MAIL_PORT', 587); // SMTP port
    }

    protected function replacePlaceholders($body, $data)
    {
        foreach ($data as $key => $value) {
            $body = str_replace('{' . $key . '}', $value, $body);
        }
        return $body;
    }

    public function send($to, $subject, $body, $altBody = '', $data = [])
    {
        try {
            $this->mailer->setFrom(env('MAIL_FROM_ADDRESS', 'info@salabahter.eu'), env('MAIL_FROM_NAME', 'Salabahter'));
            $body = $this->replacePlaceholders($body, $data);
            $this->mailer->addAddress($to);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = $subject;
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $altBody;

            if (!$this->mailer->send()) {
                // Log the error or handle it as needed
                return false;
            }
            return true;
        } catch (Exception $e) {
            // Log the exception or handle it as needed
            return 'email_send_error';
        }
    }
}