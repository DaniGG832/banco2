<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTitularesRequest;
use App\Http\Requests\StoreCuentaRequest;
use App\Http\Requests\UpdateCuentaRequest;
use App\Models\Cliente;
use App\Models\Cuenta;
use GuzzleHttp\Psr7\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cuentas = Cuenta::all();
        //dd($cuentas);

        return view('cuentas.index', compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $nCuenta = mt_rand(1, 9999999999);
        //dd($nCuenta);


        $clientes = Cliente::All();

        //dd($clientes);

        return view('cuentas.create', [
            'cuenta' => new Cuenta(), 'nCuenta' => $nCuenta,
            'clientes' => $clientes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCuentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCuentaRequest $request)
    {
        //dd($request->validated());
        //dd($request->validated('titular'));
        //dd($request);

        $cuenta = new Cuenta($request->validated());
        $cuenta->save();

        $cuenta->clientes()->attach($request->validated('titular'));

        return back()->with('success', 'Cuenta creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        
        //$cuenta = Cuenta::with('movimientos')->find($cuenta->id);

        //dd(json_decode( $cuenta));

        //dd($cuenta->movimientos);


        //dd($cuenta->movimientos->withsum('importe'));
        
        return view('cuentas.show', compact('cuenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCuentaRequest  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCuentaRequest $request, Cuenta $cuenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        //
    }

    public function addTitulares(Cuenta $cuenta)
    {

        return view('cuentas.addtitulares', [
            'cuenta' => $cuenta,
            'clientes' => Cliente::all()
        ]);
    }


    public function agregarTitulares(AddTitularesRequest $request, Cuenta $cuenta)
    {

        //dd( $cuenta->clientes);
        //dd(!$cuenta->clientes->contains($request->agregar));

        if ($request->agregar) {

            if (!$cuenta->clientes->contains($request->agregar)) {
                $cuenta->Clientes()->attach($request->agregar);

                return back()->with('success', 'titulular  agregado correctamente');
            } else {
                return back()->with('error', 'El cliente ya es titular de esta cuenta');
            }
        } elseif ($request->titulares) {

            //dd($request->titulares);
            $cuenta->Clientes()->syncWithoutDetaching($request->titulares);

            return back()->with('success', 'titululares  agregados correctamente');
        } else {
            return back()->with('error', 'No se ha agregado ningun titular');
        }


        //dd($request->titulares,$request->agregar);
        //$cuenta->Clientes()->attach(1);

    }

    public function bajaTitulares(Cuenta $cuenta)
    {



        return view('cuentas.bajaTitulares', [
            'cuenta' => $cuenta,
            'clientes' => Cliente::all()
        ]);
    }

    public function darBajaTitulares(AddTitularesRequest $request, Cuenta $cuenta)
    {
        $validado = $request->validate(['quitar'=>'required']);

        //dd($validado['quitar']);
        //dd($cuenta->Clientes->count());

        if ($cuenta->Clientes->count()>1 && $validado['quitar']) {

            $valor = $cuenta->Clientes()->detach($request->quitar);
            return back()->with('success', 'titulular  quitado correctamente');
        }else{

            return back()->with('error', 'Es obligatorio un titular por cuenta');
        }

        //dd($valor);


        //        dd($request);


    }
}
