<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class PerroController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'img' => 'required',
            'raza' => 'required',
            'pelo' => 'required'
        ]);

        $perro = new Perro();
        $perro->img = $request->img;
        $perro->raza = $request->raza;
        $perro->pelo = $request->pelo;
        $perro->save();

        return response()->json("Perro creado");
    }

    public function get()
    {
        $select = 'SELECT * FROM perros';
    
        $perros = DB::select($select);
    
        return response()->json(["perros" => $perros], Response::HTTP_OK);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $select = 'SELECT id FROM perros WHERE id =' . $request->id;
        $perro = DB::select($select);
        $perro = Perro::find($perro[0]->id);
        $perro->delete();

        return response()->json("Perro deleted");
    }
}
