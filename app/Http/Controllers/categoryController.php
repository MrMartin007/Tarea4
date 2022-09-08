<?php

namespace App\Http\Controllers;
use App\Models\category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class categoryController extends Controller
{

    public function listaCategory(Request $request){
        $texto=trim($request->get('texto'));
        $category = DB::table('category')
            ->select('category.*')
            ->where('description','LIKE','%'.$texto.'%')
            ->orwhere('id','LIKE','%'.$texto.'%')
            ->orderBy('id','asc')
            ->paginate(4);//el numero de filas

        return view('category.listaCategory', compact('category','texto'));
    }
    public function formCategory(){
        return view('category.crearCategory');
    }

    public function guardarCategory(Request $request){
        try{
            $validar=$this->validate($request,[
                'description'=>'required',
            ]);
            category::create([
                'description'=>$validar['description'],
            ]);
        }catch (QueryException $queryException){
            Log::debug($queryException->getMessage());
            return redirect('/formCategory')->with('alertaQery', 'no');
        } catch (\Exception $exception){

            Log::debug($exception->getMessage());

            return redirect('/formCategory')->with('alerta', 'si');
    }
    return redirect('/listaCategory')->with('categoriaGuardado', 'Guardado');
    }

    public function editformCategory($id){
        $category=category::findOrFail($id);

        return view('category.editCategory', compact('category'));
    }
    public function editCategory(Request $request, $id ){
        $category=request()->except((['_token','_method']));
        category::where('id','=', $id)->update($category);
        return redirect('/listaCategory')->with('categoryModificado', 'Modificado');
    }

    public function destroy($id){
        try {
            category::destroy($id);
            return redirect('/listaCategory')->with('categoryEliminado', 'Eliminado');
        }catch (\Exception $exception){
            Log::debug($exception->getMessage());
            return redirect('/listaCategory')->with('alerta','si');
        }
    }
}

