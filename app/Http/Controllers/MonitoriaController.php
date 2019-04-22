<?php

namespace App\Http\Controllers;

use App\User;
use App\Curso;
use App\Cadeira;
use App\Monitoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MonitoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('monitoria');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function monitor(){
        $curso = Curso::find(Auth::user()->fk_curso);
        $monitorias = Monitoria::where('users_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('area-monitor');
    } 

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
        $monitoria = new Monitoria();
        $monitoria->data = $request->data;
        $monitoria->hora_inicio = $request->hora_inicio;
        $monitoria->hora_fim = $request->hora_fim;
        $monitoria->titulo = $request->titulo;
        $monitoria->descricao = $request->descricao;
        $monitoria->users_id = Auth::id();
        $monitoria->cadeiras_id = Auth::user()->cadeira_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}