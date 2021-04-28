<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Estados;

class EstadosController extends Controller
{
    private $estados;

    public function __construct(Estados $request)
    {
        $this->estados = $request;
    }

    public function index()
    {
        try {
            $estados = $this->estados->paginate(5);
            return response()->json($estados);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }


    }


    public function store(Request $request)
    {
        try {
           
        $data = $request->all();

        $validate = validator($data, $this->estados->rules());

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json(['validade.error', $messages]);
        }

        if (!$insert = $this->estados->create($data))
            return response()->json(['error' => 'Error_insert'], 500);

        return response()->json($insert);

        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }

        
    }


    public function show($id)
    {
        try {
            if (!$estados = $this->estados::find($id)) {
                return response()->json(['error' => 'not_found']);
            }
    
            return response()->json(["estados" => $estados]);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }

       
    }



    public function update(Request $request, $id)
    {
        try {
            
        $data = $request->all();
        $validate = validator($data, $this->estados->rules($id));

        if ($validate->fails()) {
            $messages = $validate->messages();
            return response()->json(['validade.error', $messages]);
        }

        if (!$estados = $this->estados::find($id)) {
            return response()->json(['error' => 'not_found']);
        }


        if (!$update = $estados->update($data)) {

            return response()->json(['error' => 'not_update'], 500);
        }

        return response()->json(['Response', $update]);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }

        
    }


    public function destroy($id)
    {
        try {
           
        if (!$estados = $this->estados::find($id)) {
            return response()->json(['error' => 'not_found']);
        }


        if (!$delete = $estados->delete($id)) {

            return response()->json(['error' => 'not_deleted'], 500);
        }

        return response()->json(['Response', $delete]);
        } catch (\Throwable $th) {
            return ["return"=>'erro', 'details'=>$th];
        }
        
    }
}
