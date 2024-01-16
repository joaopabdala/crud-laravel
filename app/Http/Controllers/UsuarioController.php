<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        $findUser = $this->user->getUsersPesquisarIndex(search: $pesquisar?? '');

        return view('pages.user.pagination', compact('findUser'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true] );
    }

    public function cadastrarUser(UserRequest $request)
    {


        if ($request->method() == "POST") {
            // cria os dados
            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Dados gravados com sucesso.');
            return redirect()->route('usuario.index');
        }
        // mostrar os dados
        return view('pages.user.create');

    }

    public function editarUser(UserRequest $request, $id)
    {

        
        if($request->method() == "PUT"){

            $data = $request->all();

            $data['password'] = Hash::make($data['password']);
            
            $findRegister = User::find($id);

            $findRegister->update($data);


            return redirect()->route('user.index');
        }

        $findUser = User::where('id', '=', $id)->first();
        

        return view('pages.user.edit', compact('findUser'));
    }
}
