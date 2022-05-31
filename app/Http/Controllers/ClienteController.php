<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Cliente;
use App\Models\Operacion;
use App\Models\Registro;

use Nette\Utils\Json;
use PhpParser\Node\Stmt\Return_;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $clientes = Cliente::orderBy('id','desc')->with('cuentas')->get();

        //$clientes = Cliente::with('cuentas')->find(2);

        //dd(json_decode( $clientes));

        // convierte en un array
        //dd($clientes->toArray());   
        
        //$cliente = Cliente::all()->find(1)->nombre;
         //$clientes = Cliente::all();

        //$clientes = Cliente::orderBy('id')->get();

        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = new Cliente();
        

        return view('clientes.create',['cliente' =>$cliente]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request,Cliente $cliente)
    {

        $cliente->fill($request->validated());

        $cliente->save();

        return redirect()->route('clientes.index')->with('success','Cliente creado correctamente');

        // dd($cliente);
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',['cliente' =>$cliente]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        //dd($request->validated());

        $cliente->fill($request->validated());

        $cliente->save();


        return Redirect()->route('clientes.index')->with('success', 'cliente modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }


    public function pruebas()
    {


        $operacion = Operacion::all();

        $registro = Registro::all();

        //return ($registro->find(1)->operacion);
        //return ($operacion->find(1)->registros->find(1)->cliente->cuentas[0]->clientes);


        $clientes = Cliente::orderBy('id','desc')->with('cuentas')->get();
        $operacion = Operacion::find(1);

        
        //return $clientes->find(2)->cuentas;
        return $clientes->find(1)->cuentas;
    }


}
