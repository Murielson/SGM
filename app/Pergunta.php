<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Pergunta extends Model
{

	protected $table = 'perguntas';

    protected $fillable = [
        'titulo', 'texto', 'users_id', 'estado'
    ];
    

    public function listaPerguntas(){
        $perguntas = DB::table('perguntas')
            ->join('cursos', 'perguntas.fk_curso', '=', 'cursos.id')
            ->select('perguntas.*', 'cursos.sigla')
            ->orderBy('perguntas.created_at', 'desc')
        ->get();
        return $perguntas;
    }

    public function exibirPergunta($id){
        $pergunta = DB::table('perguntas')
            ->join('cursos', 'perguntas.fk_curso', '=', 'cursos.id')
            ->where('perguntas.id', '=', $id)
            ->select('perguntas.*', 'cursos.sigla')
        ->get();
        return $pergunta;
    }
}
