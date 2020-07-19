<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Mail;
use Storage;

/**
* Classe que realiza disparo de e-mail
*/
class SendEmail extends Model
{
    /**
    * Metodo que realiza o disparo
    * $pageView - Caminho da view, exemplo: email.fale-conosco
    * $filds - campos do formulario dentro de um array, no corpo do html recuperar como: {{ $container['nome'] }}
    * $subject - assunto do email em string
    * $emailsDestination - emails de destino como obj ou string, caso tenha mais de um e-mail, ser separo por ";"
    * $from - string
    * $reply - string
    */
    public function send(
        $pageView,
        array $filds, 
        $subject, 
        $emailsDestination, 
        $from = null, 
        $reply = null,
        $pathToFile = false
        )
    {
        $from = $this->verifyFrom($from);
        $reply = $this->verifyReply($reply);
        
        if (isset($emailsDestination->email)) {
            $emails = explode(';', $emailsDestination->email);
        } else {
            $emails = explode(';', $emailsDestination);
        }

        foreach ($emails as $email) {
            Mail::send($pageView, ['container' => $filds], function ($message) use ($subject, $email, $from, $reply, $pathToFile) {
                //$message->replyTo("wagner@bitpix.com.br", 'Bitpix');
                $message->from("jumruthes@gmail.com", ' Dra Juliana Ruthes Martines');
                //$message->from("wagner.abr@hotmail.com", ' Dra Juliana Ruthes Martines');

                $message->subject($subject);

                if ($pathToFile) {
                    $message->attach(public_path() . "/$pathToFile");
                }
                $message->to($email);
                // dd($message);
            });

        }
        return true;
    }

    private function verifyFrom($from = null)
    {
        if ($from == null) {
            return env('MAIL_USERNAME');
        };
        return $from;
    }

    private function verifyReply($reply = null)
    {
        if ($reply == null) {
            return env('MAIL_USERNAME');
        }
        return $reply;
    }    
}
