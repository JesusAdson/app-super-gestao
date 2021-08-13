<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $erro = '';
        if($request->get('erro') == 1){
            $erro = 'Usuário e ou senha inválidos!';
        }else if($request->get('erro') == 2){
            $erro = 'Necessário efetuar o login para ter acesso a página';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }
    public function autenticar(Request $request){
       //regras
       $regras = [
           'usuario' => 'email|required',
           'senha' => 'required'
       ];

       //mensagens feedback
       $feedback = [
           'usuario.email' => 'O campo usuário (email) é obrigatório.',
           'senha.required' => 'O campo senha é obrigatório'
       ];

       //se não passar pelo validate aparece as msg de erro nas views
       $request->validate($regras, $feedback);

       //recuperando valores do formulário
       $email = $request->get('usuario');
       $password = $request->get('senha');

       //iniciar o model user
       $user = new User();
       $usuario = $user->where('email', $email)->where('password', $password)->get()->first();
       //WHERE comparando se o email e senha recebidos do form existem dentro do bd
       //o WHERE retorna um builder, então usa-se o GET para que seja retornando uma collection
       // o FIRST retorna o primeiro da coleção, método disponível para coleções
       
       if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
       }else{
           return redirect()->route('site.login', ['erro' => 1]);
       }
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
