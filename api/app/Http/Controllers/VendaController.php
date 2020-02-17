<?php

namespace App\Http\Controllers;

use App\Model\Venda;
use Illuminate\Http\Request;
use App\Http\Requests\VendaRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class VendaController extends Controller
{
    public $headers = [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json'
    ];

    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendas = Venda::paginate(5);
        return response()->json($vendas, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendaRequest $request)
    {
        $venda = new Venda;
        $venda->telefone = $request->telefone;
        $venda->recarga = $request->recarga;
        $venda->cliente_id = $request->cliente_id;
        $venda->save();
        return response()->json($venda, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda)
    {
        return $venda;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda)
    {
        $venda->update($request->all());
        return response()->json($venda, 200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda)
    {
        $venda->delete();
        return response()->json(null, 204, $this->headers);
    }
}
