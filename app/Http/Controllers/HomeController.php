<?php

namespace App\Http\Controllers;

use App\Exports\NotasExport;
use Illuminate\Http\Request;
use App\Http\Controllers\NotaController;
use App\Http\Requests\NotaRequest;
use App\Imports\NotasImport;
use App\Jobs\EnviarEmailJob;
use App\Models\Nota;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function exportExcel ()
    {
        return Excel::download(new NotasExport, 'notas.xlsx');
    }

    public function importExcel ()
    {
        Excel::import(new NotasImport, storage_path('/app/public/notas.xlsx'));//request()->file('your_file')
        EnviarEmailJob::dispatch('STEVCODE', 'jhons_1101@hotmail.com', 'archivo importado correctamente');
        return redirect('/')->with('success', 'All good!');
    }

    public function exportPDF ()
    {
        $notas = Nota::all();
        $pdf = PDF::loadView('pdf.notasExport', compact('notas'));
        return $pdf->download('Notas Export.pdf');
    }
}
