<?php

namespace App\Http\Model\Site;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    private $modelSendEmail;

	public function __construct()
    {
        $this->modelSendEmail = $this->makeModelSendEmail();
    }


    private function getModelSendEmail()
    {
        return $this->modelSendEmail;
    }

    
    private function makeModelSendEmail()
    {
        $app = app();
        return $app->make('App\Http\Model\SendEmail');
    }

    public function sendEmail(array $inputs)
    {

        //$inputs = array_merge($inputs, $newsInputs);
        $subject = 'Mensagem Enviada pelo site Dra Juliana Ruthes Martines';
        // $emails = 'wagner@bitpix.com.br';
        $emails = 'jumruthes@gmail.com';

        $dados = $this->getArrayInputs($inputs);

        $resposta = $this->getModelSendEmail()->send('email.fale-conosco', $dados, $subject, $emails, 'wagner@bitpix.com.br', null, false);

        if ($resposta) {
            return redirect('/contato')
                ->with('sucesso', 'Sua mensagem foi enviada com sucesso, obrigado!');
        } 
    }

    private function getArrayInputs(array $inputs)
    {
        $labels = $this->getValuesLabels();

        return $this->setCampos($inputs, $labels); 
    }

    public static function getValuesLabels() 
    {
        return array(
            'nome' => "Nome",
            'email' => "E-mail",
            'mensagem' => "Mensagem"
            );
    }

    public function setCampos($values = array(), $labels = array()) {
        if (count($values) > 0 && count($labels) > 0) {
            $dados = array();
            foreach ($labels as $c => $l) {
                $valor = $values[$c];
                $dados[$l] = $valor; 
            }
            return $dados;
        }
    }
}
