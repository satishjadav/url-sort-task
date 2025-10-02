<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Transport\Transport;

class EmailSend extends Controller
{
   static public function Send($data = [])
    {
        $username = 'ujjaintobarnagar2021@gmail.com';
        $password = 'brvmqjxttmruryje';
        $host = "smtp.gmail.com";
        $port = "587";
        $encryption = "tls";
        $fromAddress = "ujjaintobarnagar2021@gmail.com";
        $fromName = "satish";
        $toEmail = $data['email']??"";
        if(($data['id']??"1") == 1){
            $html = 'admin Logout';
            $title = "admin";
        }elseif(($data['id']??"1") == 2){
            $html = 'Url Expiry';
            $title = "Expiry";
        }
        try {
            
            $transport = \Symfony\Component\Mailer\Transport::fromDsn("smtp://$username:$password@$host:$port?encryption=$encryption");
            $mailer = new \Symfony\Component\Mailer\Mailer($transport);
            $email = (new \Symfony\Component\Mime\Email())
                ->from(new \Symfony\Component\Mime\Address($fromAddress, $fromName))
                ->to($toEmail)
                ->subject($title)
                ->html($html);
            $mailer->send($email);
            return true;
        } catch (\Throwable $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
        }
    }
}
