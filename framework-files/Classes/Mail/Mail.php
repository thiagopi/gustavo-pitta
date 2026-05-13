<?php
/**
* @author      Thiago Pereira Idehama <thiago@thiagopi.com.br>
* @date        2019-08-26
* @copyright   Copyright (c), 2019 VEE Digital Tecnologia S.A.
* @license     MIT public license
*/

namespace Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once('framework-files/vendor/PHPMailer/src/Exception.php');
require_once('framework-files/vendor/PHPMailer/src/PHPMailer.php');
require_once('framework-files/vendor/PHPMailer/src/SMTP.php');


class Mail{

    private $addAdress = array();
    private $addCC = array();
    private $addBCC = array();
    private $subject;
    private $message;
    private $fromName;
    private $body;
    private $view;
    private $addAttachment = array();

    public function __construct(){
        // $this->setMail(new PHPMailer(true));
    }

    public function sendMail(){
        
        $mail = new PHPMailer(true);
        $emailSettings = getConfig("email_smtp_server");
        //
        try {
            //Server settings
            $mail->CharSet              = 'UTF-8';
            $mail->SMTPDebug            = 0;                                       // Enable verbose debug output
            $mail->Debugoutput = 'html';
            $mail->isSMTP();                                                        // Set mailer to use SMTP
            $mail->Host                 = $emailSettings['host'];                  // Specify main and backup SMTP servers
            $mail->SMTPAuth             = true;                                   // Enable SMTP authentication
            
            $mail->Username             = $emailSettings["username"];              // SMTP username
            $mail->Password             = $emailSettings['password'];              // SMTP password
            $mail->SMTPSecure           = $emailSettings['encryption'];            // Enable TLS encryption, `ssl` also accepted
            $mail->Port                 = $emailSettings['port'];                  // TCP port to connect to

            //Recipients
            $mail->setFrom($emailSettings['username'], $this->getFromName());
            foreach($this->getAddAdress() as $m){
                $mail->addAddress($m);
            }
            if(count($this->getAddCC()) > 0){
                foreach($this->getAddCC() as $cc){
                    $mail->addCC($cc);
                }
            }
            if(count($this->getAddBCC()) > 0){
                foreach($this->getAddBCC() as $bcc){
                    $mail->addBCC($bcc);
                }
            }
            
            if(is_array($this->addAttachment) && count($this->addAttachment) > 0) {
                $mail->AddAttachment($this->addAttachment["file"]['tmp_name'], $this->addAttachment["file"]['name']); 
            }

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $this->getSubject();
            
            $mail->Body    = $this->getView();
            $mail->AltBody = $this->getView();

            $mail->send();
            // echo 'Message has been sent!';
            return true;
        } catch (Exception $e) {
            // echo 'Message has been sent!';
            return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function to(array $to){
        $this->setAddAdress($to);
        return $this;
    }
    public function cc(array $cc){
        $this->setAddCC($cc);
        return $this;
    }
    public function bcc(array $bcc){
        $this->setAddBCC($bcc);
        return $this;
    }
    public function subject(string $subject){
        $this->setSubject($subject);
        // echo $to;
        return $this;
    }

    public function fromName(string $from){
        $this->setFromName($from);
        return $this;
    }

    public function body(string $body){
        $this->setBody($body);
        return $this;
    }

    public function addAttachment(array $addAttachment){
        $this->setAddAttachment($addAttachment);
        return $this;
    }

    public function view(string $template, array $data = null){
        
        $view = viewEmail($template, compact('data'));
        $this->setView($view);
        return $this;
    }



    /*
        Setters and Getters
    */
    private function setAddAdress($addAdress){
        $this->addAdress = $addAdress;
    }
    public function getAddAdress(){
        return $this->addAdress;
    }
    //
    private function setAddCC($addCC){
        $this->addCC = $addCC;
    }
    public function getAddCC(){
        return $this->addCC;
    }
    //
    private function setAddBCC($addBCC){
        $this->addBCC = $addBCC;
    }
    public function getAddBCC(){
        return $this->addBCC;
    }
    //
    private function setSubject($subject){
        $this->subject = $subject;
    }
    public function getSubject(){
        return $this->subject;
    }
    //
    private function setMessage($message){
        $this->message = $message;
    }
    public function getMessage(){
        return $this->message;
    }
    //
    private function setFromName(string $fromName){
        $this->fromName = $fromName;
    }
    public function getFromName(){
        return $this->fromName;
    }
    //
    private function setBody(string $body){
        $this->body = $body;
    }
    public function getBody(){
        return $this->body;
    }
    //
    private function setView(string $view){
        $this->view = $view;
    }
    public function getView(){
        return $this->view;
    }
    //
    private function setAddAttachment(array $addAttachment){
        $this->addAttachment = $addAttachment;
    }
    public function getAddAttachment(){
        return $this->addAttachment;
    }
}