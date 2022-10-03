<?php

namespace App\Http\Controllers;

use App\Helpers\JsonReturnHelper;
use App\Helpers\ValidateResidentHelper;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResidentsController extends Controller
{
    use ValidateResidentHelper, JsonReturnHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = $this->jsonSuccessReturn(200);
        $response["data"] = Resident::all();
        return response()->json($response, $response["status"]);
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
            $response = $this->jsonFailReturn(400);
            $response["data"] = $validator->errors();
        } else {
            $response = $this->jsonSuccessReturn(201);
            $response["data"] = Resident::create([
                "Nombre" => $request->Nombre,
                "Apellidos" => $request->Apellidos,
                "Telefono" => $request->Telefono,
                "Correo" => $request->Correo,
                "Edad" => $request->Edad,
                "Direccion" => $request->Direccion,
                "Comida_Entregada" => $request->Comida_Entregada,
                "Observacion" => $request->Observacion,
            ]);
        }
        return response()->json($response, $response["status"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Resident::find($id);
        if ($data != null) {
            $response = $this->jsonSuccessReturn(202);
        } else {
            $response = $this->jsonFailReturn(401);
        }

        $response["data"] = $data;
        return response()->json($response, $response["status"]);
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
            $response = $this->jsonFailReturn(400);
            $data = $validator->errors();
        } else {
            $data = Resident::find($id);
            if ($data != null) {
                $response = $this->jsonSuccessReturn(203);
                $data->update([
                    "Nombre" => $request->Nombre,
                    "Apellidos" => $request->Apellidos,
                    "Telefono" => $request->Telefono,
                    "Correo" => $request->Correo,
                    "Edad" => $request->Edad,
                    "Direccion" => $request->Direccion,
                    "Comida_Entregada" => $request->Comida_Entregada,
                    "Observacion" => $request->Observacion,
                ]);
            } else {
                $response = $this->jsonFailReturn(401);
            }
        }
        $response["data"] = $data;
        return response()->json($response, $response["status"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Resident::find($id);
        if ($data != null) {
            $response = $this->jsonSuccessReturn(204);
            $data->delete();
        } else {
            $response = $this->jsonFailReturn(401);
        }
        return response()->json($response, $response["status"]);
    }

    public function search(Request $request, $order = "created_at", $sort =  "asc", $limit = 10)
    {
        $data = new Resident;

        if (!in_array($order, $data->getTableColumns())) {
            $response = $this->jsonFailReturn(402);
            return response()->json($response, $response["status"]);
        }

        if (!in_array($sort, ["desc", "asc"])) {
            $response = $this->jsonFailReturn(403);
            return response()->json($response, $response["status"]);
        }

        if (!is_numeric($limit)) {
            $response = $this->jsonFailReturn(404);
            return response()->json($response, $response["status"]);
        }

        $data = Resident::orderBy($order, $sort);
        if ($request->has("search")) {
            $data->where('id', 'like', "%{$request->search}%")
                ->orWhere('Nombre', 'like', "%{$request->search}%")
                ->orWhere('Correo', 'like', "%{$request->search}%");
        }
        $response = $this->jsonSuccessReturn(200);
        $response["data"] =$data->paginate($limit);
        return response()->json($response, $response["status"]);
    }
}
