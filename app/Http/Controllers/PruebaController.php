<?php

namespace App\Http\Controllers;

use App\Exports\PruebaExport;
use App\Http\Requests\PruebaRequest;
use App\Jobs\PruebaJob;
use App\Models\Prueba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Maatwebsite\Excel\Facades\Excel;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Prueba::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pruebas = Prueba::all();
        return view('prueba', compact('pruebas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PruebaRequest $request)
    {
        $prueba = new Prueba();
        $prueba->name = $request->name;
        $prueba->numero = $request->numero;
        $prueba->fecha = date('Y-m-d', strtotime($request->fecha));

        $prueba->save();
        return response()->json($prueba, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return Prueba::findOrFail($id);
        } catch (\Throwable $th) {
            $response = [
                'codError' => '1',
                'msg' => 'No se encontró el registro'
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PruebaRequest $request, $id)
    {
        try {
            $prueba = Prueba::findOrFail($id);
            $prueba->name = $request->name;
            $prueba->numero = $request->numero;
            $prueba->fecha = date('Y-m-d', strtotime($request->fecha));
            $prueba->update();
            $response = [
                'codError' => '0',
                'msg' => 'Registro actualizado correctamente'
            ];
        } catch (\Throwable $th) {
            $response = [
                'codError' => '1',
                'msg' => 'No se encontró el registro'
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $prueba = Prueba::findOrFail($id);
            $prueba->delete();
            $response = [
                'codError' => '0',
                'msg' => 'Eliminado correctamente'
            ];
        } catch (\Throwable $th) {
            $response = [
                'codError' => '1',
                'msg' => 'No se encontró el registro'
            ];
        }
        return response()->json($response, 200);
    }

    /**
     * download the excel report
     *
     * @return \Maatwebsite\Excel\Facades\Excel
     */
    public function export()
    {
        return Excel::download(new PruebaExport, 'prueba.xlsx');
    }

    /**
     * exec job
     *
     * @return \App\Jobs\PruebaJob;
     */
    public function callJob()
    {
        PruebaJob::dispatch();
        return back();
    }
}
