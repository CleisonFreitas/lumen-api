<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


abstract class BaseController extends Controller
{
    protected string $classe;

    public function index(Request $request)
    {
        $recurso = $this->classe::paginate($request->per_page);

        if(!$recurso){
            return response()->json('Nenhum dado encontrado',204);
        }
       return response()->json(['dados' => $recurso],200) ;
    }

    public function store(Request $request)
    {
        $recurso = $this->classe::create($request->all());

        if($recurso === false){
            return response()->json('Não possivel gravar o seu registro');
        }

        return response()->json(['registro' => $recurso],201);

    }

    public function show($id)
    {
        try{
            $recurso = $this->classe::find($id);
        }catch(\Exception $ex){
            return response()->json(['error' => $ex->getMessage()],404);
        }

        return response()->json($recurso,200);
       
    }
    
    public function update(Request $request,$id)
    {
        try{
            $recurso = $this->classe::find($id);
            $recurso->fill($request->all());
            $recurso->save();

        }catch(\Exception $ex){
            return response()->json(['error' => $ex->getMessage()],404);
        }

        return response()->json($recurso,200); 
    }

    public function destroy($id)
    {
        try{
            $recurso = $this->classe::destroy($id);

        }catch(\Exception $ex){
            return response()->json(['error' => $ex->getMessage()],404);
        }

        return response()->json(['success' => 'Excluído com sucesso!'],200); 
    }
}
/*
abstract class BaseController  extends Controller
{

    protected string $classe;
    protected $requests;

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
*/