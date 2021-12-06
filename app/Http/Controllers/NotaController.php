<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Nota::all();
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
    public function store(Request $request)
    {
        $promedioNota = ($request->input('parcial1') + $request->input('parcial2') + $request->input('parcial3')) / 3;
        
        try {
            $nota = new Nota();
            $nota->nom_estudiante = $request->input('nom_estudiante');
            $nota->parcial1 = $request->input('parcial1');
            $nota->parcial2 = $request->input('parcial2');
            $nota->parcial3 = $request->input('parcial3');
            $nota->final = $promedioNota;
            $nota->save();

            $msg = 'Se registró correctamente la nota con número: ' . $nota->cod_nota;

        } catch (\Throwable $th) {
            $msg = 'Ocurrió un error al momento de registrar las notas... ' . $th;
            $promedioNota = null;
        }

        return [
            'msg' => $msg,
            'promedio'  => $promedioNota
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Nota::findOrFail($id);
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
    public function update(Request $request, $id)
    {
        //
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
            $nota = Nota::findOrFail($id);
            $nota->delete();

            $msg = 'Se eliminó correctamente la nota';
        } catch (\Throwable $th) {
            $msg = 'Ocurrió un error al momento al eliminar la nota... ' . $th;
        }

        return [
            'msg' => $msg
        ];
    }
}
