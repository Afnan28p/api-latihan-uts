<?php

namespace App\Http\Controllers;

use App\Models\Gundam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GundamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gundam = Gundam::all();
        $data['success'] = true;
        $data['message'] = "Data gundam";
        $data['result'] = $gundam;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate ([
            'nama' => 'required'
        ]);

        $result = Gundam::create($validate);
        if ($result) {
            $data['success'] = true;
            $data['message'] = "Data gundam Berhasil Disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($gundam)
    {
        $gundam = Gundam::find($gundam);
        $data['success'] = true;
        $data['message'] = "Detail data Gundam";
        $data['result'] = $gundam;
        return response()->json($data,Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gundam $gundam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $result = Gundam::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Gundam Berhasil Di update";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gundam = Gundam::find($id);
        if ($gundam) {
            $gundam->delete();
            $data['success'] = true;
            $data['message'] = "Data Gundam berhasil Dihapus";
            return response()->json($data, Response::HTTP_OK);
        } else {
            $data['success'] = false;
            $data['message'] = "Data Gundam Tidak Ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
