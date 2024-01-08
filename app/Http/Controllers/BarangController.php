<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;

class BarangController extends Controller
{
    public $successStatus = 200;

    public function show(Request $request)
    {
        $filters = $request->all();
        return Barang::when(isset($filters['barangId']), function ($query) use ($filters) {
            return $query->where('id_barang', $filters['barangId']);
        })->orderBy('id_barang', 'ASC')->get();
    }

    public function store(Request $request)
    {
        $data = [
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
        ];
        try {
            DB::beginTransaction();
            $response = Barang::create($data);

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = [
                'nama_barang' => $request->nama_barang,
                'harga_barang' => $request->harga_barang,
            ];
            DB::beginTransaction();
            Barang::where('id_barang', $request->id_barang)->update($data);
            $response = Barang::where('id_barang', $request->id_barang)->first();

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function getById(Request $request)
    {
        $filters = $request->all();
        return Barang::when(isset($filters['id']), function ($query) use ($filters) {
            return $query->where('id_barang', $filters['id'])->orWhere('id_barang', 'like', '%' . $filters['id'] . '%');
        })->get();
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            Barang::where('id_barang', $request->id_barang)->delete();

            DB::commit();
            return response([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
