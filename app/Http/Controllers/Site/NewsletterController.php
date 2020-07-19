<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Site\EmailNewsletter;
use App\Http\Helpers\StringHelper;

class NewsletterController extends Controller
{
    public function postCadastroNewsletter(Request $request)
	{
        $email = $request->email;
        
        if (empty($email) || !StringHelper::validaEmail($email)) {
            echo "Por favor informe um e-mail válido!";
            exit;
        }
        
        $email_newsletter = EmailNewsletter::where('email', '=', $email)->orderBy('id')->first();
        
        if ($email_newsletter) {
            echo "E-mail já está cadastrado";
            exit;
        }
        
        $dados = $request->only(['email']);

        $emailNewsletter = EmailNewsletter::create(
            $dados
        );

        if ($emailNewsletter->save()) {
            echo "E-mail cadastrado com sucesso!";
        }
	}
}
