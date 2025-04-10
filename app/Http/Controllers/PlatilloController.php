<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    public function index()
    {
        $platillos = Platillo::where('disponibilidad', true)->get();
        return view('platillos', compact('platillos'));
    }

    public function show($id)
    {
        $platillo = Platillo::where('id_platillo', $id)->where('disponibilidad', true)->first();

        if (!$platillo) {
            return response()->json(['message' => 'Platillo no disponible o no encontrado'], 404);
        }
        return response()->json($platillo, 200);
    }
}
