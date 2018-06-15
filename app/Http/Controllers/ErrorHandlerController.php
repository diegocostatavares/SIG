<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ErrorHandlerController extends Controller
{

	public function errorCode403()
    {
    	$view_error = Auth::check() ? 'errors.logado' : 'errors.deslogado';
    	$message = 'Acesso proibido';
    	return view($view_error, ['message'=>$message]);  
    }

    public function errorCode404()
    {
    	$view_error = Auth::check() ? 'errors.logado' : 'errors.deslogado';
    	$message = 'Página não encontrada';
    	return view($view_error, ['message'=>$message]);  
    }

    public function errorCode500()
    {
    	$view_error = Auth::check() ? 'errors.logado' : 'errors.deslogado';
    	$message = 'Erro interno do servidor';
    	return view($view_error, ['message'=>$message]);  
    }

    public function errorCodeDefault()
    {
        $view_error = Auth::check() ? 'errors.logado' : 'errors.deslogado';
        $message = 'Erro interno do servidor [Desconhecido]';
        return view($view_error, ['message'=>$message]);  
    }
    
}