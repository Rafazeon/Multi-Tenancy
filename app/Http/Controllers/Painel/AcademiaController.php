<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aluno1 = 'Matheus';
        $aluno2 = 'Luiz';
        $aluno3 = 'Mauro';
        $ArrayData = ['Aluno' => 'Luiz',
        'Pratica' => 'Academia',
        'Mensalidade' => 500];


        $alunos = array([
            [
                'name' => 'Luiz',
                'pratica' => 'Academia',
                'mensalidade' => 500
            ],
            [
                'name' => 'Mauro',
                'pratica' => 'Jiu-Jitsu',
                'mensalidade' => 300
            ],
            [
                'name' => 'Matheus',
                'pratica' => 'Pilates',
                'mensalidade' => 350
            ]
        ]);



        return view('academia.index', compact('aluno1','aluno2','aluno3', 'ArrayData', 'alunos'));
    }

    public function alunos_ativos($id)
    {
        echo "aluno {$id}";
    }

    public function alunos_inativos($id)
    {
        //
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
        //
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




