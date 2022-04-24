<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $estudantes = Estudante::get();
            return view(
                'estudantes.index',[
                    'estudantes' => $estudantes
                ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('estudantes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $dados = $request->except('_token');
        Estudante::create($dados);
        return redirect('estudantes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id)
    {
        $estudante = Estudante::find($id);
        return view('estudantes.show', ['estudante'=>$estudante]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit($id)
    {
        $estudante = Estudante::find($id);
        return view('estudantes.edit', ['estudante'=>$estudante]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $estudante = Estudante::find($id);
        $estudante->update([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'nascimento' => $request->nascimento,
            'sala_id' => $request->sala_id]);
            return redirect('estudantes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $estudante = Estudante::find($id);
        $estudante->delete();
        return redirect('estudantes');
    }
}
