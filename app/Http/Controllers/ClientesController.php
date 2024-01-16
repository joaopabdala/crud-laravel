<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Components;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    private $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index(Request $request)
    {

        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar?? '');

        return view('pages.clientes.pagination', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();
        return response()->json(['success' => true] );
    }

    public function cadastrarCliente(FormRequestClientes $request)
    {
        if($request->method() == "POST"){

            $data = $request->all();
            Cliente::create($data);

            Toastr::success('Gravado com sucesso');

            return redirect()->route('clientes.index');
        }

        return view('pages.clientes.create');

    }

    public function editarCliente(FormRequestClientes $request, $id)
    {

        
        if($request->method() == "PUT"){

            $data = $request->all();
            
            $findRegister = Cliente::find($id);
            $findRegister->update($data);


            return redirect()->route('clientes.index');
        }

        $findCliente = Cliente::where('id', '=', $id)->first();
        

        return view('pages.clientes.edit', compact('findCliente'));
    }
}
