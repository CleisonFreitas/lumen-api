<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


abstract class BaseController  extends Controller
{

    protected string $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
      return response()->json($this->classe::create($request->all()),201) ;
    }

    public function show(int $id)
    {
        $recurso = $this->classe::find($id);
        
        if(empty($recurso)){
            return response()->json('',204);
        }

        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {
        $recurso = $this->classe::findOrfail($id);
        $recurso->fill($request->all());
        $recurso->save();

        return response()->json($recurso);
    }

    public function destroy(int $id)
    {
       $qtdRecursosRemovidos = $this->classe::destroy($id);

       if($qtdRecursosRemovidos === 0){
           return response()->json([
               'erro' => 'Recurso não encontrado'
           ],404);
       }
       return response()->json('',204);
    }
    //
}
