<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use DB;

class Customer_m
{
    public static function tampil_data_customer()
	{
		return DB::select(DB::raw("select * from customer where active=1 and trash=0 order by nama ASC"));
	}

    public static function simpan_data_customer($data1)
	{
		DB::table('customer')->insert($data1);
	}

    public static function ambil_data_customer($id)
	{
		return DB::select(DB::raw("select * from customer where active=1 and trash=0 and id=$id"));
	}

    public static function ubah_data_customer($data2,$id_cus)
	{
		DB::table('customer')->where('id',$id_cus)->update($data2);
	}

    public static function hapus_data_customer($data3,$id)
	{
		DB::table('customer')->where('id',$id)->update($data3);
	}
}