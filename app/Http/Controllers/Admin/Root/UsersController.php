<?php

namespace App\Http\Controllers\admin\root;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System\User;

class UsersController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$users = User::with('roles.permissions')->orderBy('id', 'ASC')->paginate(5);
        $users = User::with('roles.permissions')->orderBy('id_user', 'ASC')->get();

        return view('admin.root.users.index', compact('users'));
    }


    public function cadastrar() 
    {
        $msg = 'Implementando - Cadastrar';
        return redirect()->route('admin.root.usuarios')->with('msg', $msg);
    }

    public function visualizar() 
    {
        $msg = 'Implementando - Visualizar';
        return redirect()->route('admin.root.usuarios')->with('msg', $msg);
    }

    public function editar($id) 
    {
        $msg = 'Implementando - Editar';
        return redirect()->route('admin.root.usuarios')->with('msg', $msg);
    }

    public function excluir($id) 
    {
        $msg = 'Implementando - Excluir';
        return redirect()->route('admin.root.usuarios')->with('msg', $msg);
    }

    public function salvar(Request $req) 
    {
        $msg = 'Implementando - Salvar';
        return redirect()->route('admin.root.usuarios')->with('msg', $msg);
    }


}
