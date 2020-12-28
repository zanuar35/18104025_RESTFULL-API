<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalModel;

class apicontroller extends Controller
{
    //
    public function get_all_jadwal(){
        return response()->json(JadwalModel::all(),200);
    }

    public function insert_data(Request $request){
        $insert_jadwal = new JadwalModel;
        $insert_jadwal->nama_bus = $request->namaBus;
        $insert_jadwal->tujuan = $request->tujuan;
        $insert_jadwal->save();
        return response([
            'status' => 'OK',
            'message' => 'Jadwal Disimpan',
            'data' => $insert_jadwal
        ],200);
    }

    public function delete_data($id){
        $check_jadwal = JadwalModel::firstWhere('kode_bus',$id);
        if($check_jadwal){
            JadwalModel::destroy($id);
            return response([
                'status' => 'OK',
                'message' => 'Data Dihapus',
            ],200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Kode Bus tidak ditemukan'
            ],404);
        }
    }

    public function update_data(Request $request, $id){
        // Cek terlebih dahulu data yang akan diupdate melalui id
        // Apakah jadwal ada atau tidak , jika tidak return not found

        $check_jadwal = jadwalModel::firstWhere('kode_bus',$id);
        if($check_jadwal){
            $data_jadwal = jadwalModel::find($id);
            $data_jadwal->nama_bus = $request->namaBus;
            $data_jadwal->tujuan = $request->tujuan;
            $data_jadwal->save();
            return response([
                'status' => 'OK',
                'message' => 'Data Berhasil Dirubah',
                'update-data' => $data_jadwal
            ],200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Kode jadwal Tidak Ditemukan'
            ],404);
        }
    }


}
