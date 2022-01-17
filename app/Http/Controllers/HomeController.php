<?php

namespace App\Http\Controllers;
use App\Models\Customer_m;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_customer = Customer_m::tampil_data_customer();

        return view('home',compact('data_customer'));
    }

    function datenow()
	{
		return date('Y-m-d H:i:s');
	}

    public function customer()
    {
        return view('add_customer');
    }

    public function simpan_customer(Request $request)
    {
        $data1 = array(
            'nama'                  => $request->get('nm'),
            'alamat'                => $request->get('almt'),
            'telp'                  => $request->get('tlp'),
            'tanggal_registrasi'    => $request->get('rgstr'),
            'created'               => $this->datenow(),
        );
        Customer_m::simpan_data_customer($data1);
    }

    public function ubah_customer($id)
    {
        $data_customer = Customer_m::ambil_data_customer($id);
        return view('edit_customer',compact('data_customer'));
    }

    public function customer_update(Request $request)
    {
        $id_cus = $request->get('id_e');
        $data2 = array(
            'nama'                  => $request->get('nm_e'),
            'alamat'                => $request->get('almt_e'),
            'telp'                  => $request->get('tlp_e'),
            'tanggal_registrasi'    => $request->get('rgstr_e'),
        );
        Customer_m::ubah_data_customer($data2,$id_cus);
    }

    public function delete_customer($id)
    {
        $data3 = array(
            'active'                => 0,
            'trash'                 => 1,
        );
        Customer_m::hapus_data_customer($data3,$id);
        return redirect('home');
    }
}
