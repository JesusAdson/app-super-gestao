<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;
class ContatoController extends Controller
{
    public function contato(Request $request){
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request){
        //realizar a validação dos dados
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email|required',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|min:5|max:2000'
            ],
            [
                'nome.min' => 'O campo nome precisa ter mais que 3 caracteres.',
                'nome.max' => 'O campo nome precisa ter menos que 40 caracteres',
                'email.email' => 'Insira um email válido.',
                'motivo_contatos_id.required' => 'O campo motivo contato precisa ser preenchido',
                'mensagem.min' => 'O campo mensagem precisa ter mais que 5 caracteres',
                'mensagem.max' => 'O campo mensagem precisa ter menos que 2000 caracteres',

                'required' => 'O campo :attribute precisa ser preenchido'
            ]
    );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
