<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NotaController;
use App\Http\Requests\NotaRequest;
use App\Models\Nota;

class HomeController extends Controller
{
    public function index()
    {
        $response = NotaController::index();
        
        return view('listNotes' , [
            'notas' => json_decode($response),
            'msg'   => null,
        ]);
    }

    public function createNote(Request $request)
    {
        return view('createNote' , [
            'msg'   => null,
            'final' => ''
        ]);
    }

    public function newNota(NotaRequest $request)
    {
        $response = NotaController::store($request);
        return view('createNote' , [
            'msg'   => $response['msg'],
            'final' => round($response['promedio'], 1)
        ]);
    }

    public function delNota(Request $request)
    {
        $nota = Nota::find($request->cod_nota);
        $msg = "";

        if($nota != null) {
            $response = NotaController::destroy($request->cod_nota);
            $msg = $response['msg'];
        }

        $notas    = NotaController::index();
        // dd($response);
        return view('listNotes' , [
            'msg'   => $msg,
            'notas' => json_decode($notas),
        ]);
    }
}
