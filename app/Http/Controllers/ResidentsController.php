<?php

namespace App\Http\Controllers;

use App\Helpers\ValidateResidentHelper;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidentsController extends Controller
{
    use ValidateResidentHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $residents = Resident::all();
        return response()->json(['success' => true, "data" => $residents]);
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
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ]);
        }

        $resident = Resident::create([
            "Nombre" => $request->Nombre,
            "Apellidos" => $request->Apellidos,
            "Telefono" => $request->Telefono,
            "Correo" => $request->Correo,
            "Edad" => $request->Edad,
            "Direccion" => $request->Direccion,
            "Comida_Entregada" => $request->Comida_Entregada,
            "Observacion" => $request->Observacion,
        ]);

        return response()->json(['success' => true, "data" => $resident]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resident = Resident::find($id);
        return response()->json(['success' => true, "data" => $resident]);
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
        $validator = Validator::make($request->all(), $this->rules(), $this->messages());
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ]);
        }

        $resident = Resident::find($id);
        $resident->update([
            "Nombre" => $request->Nombre,
            "Apellidos" => $request->Apellidos,
            "Telefono" => $request->Telefono,
            "Correo" => $request->Correo,
            "Edad" => $request->Edad,
            "Direccion" => $request->Direccion,
            "Comida_Entregada" => $request->Comida_Entregada,
            "Observacion" => $request->Observacion,
        ]);

        return response()->json(['success' => true, "data" => $resident]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Resident::find($id)->delete();
        return response()->json(['success' => true, "message" => "Residente eliminado"]);
    }

    public function search(Request $request)
    {
        $residents = Resident::where('id', 'like', "%{$request->Search}%")
            ->orWhere('Nombre', 'like', "%{$request->Search}%")
            ->orWhere('Correo', 'like', "%{$request->Search}%")
            ->get();

        return response()->json(['success' => true, "data" => $residents]);
    }

    public function list($order, $sort)
    {
        $residents = Resident::select("Nombre", "Edad")->orderBy($order, $sort)->get();
        return response()->json(['success' => true, "data" => $residents]);
    }
}
