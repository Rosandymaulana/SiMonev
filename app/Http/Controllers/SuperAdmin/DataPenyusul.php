<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InputPenyusul;
use Illuminate\Http\Request;
use App\Models\Penyusul;
use App\Models\Role;
use App\Models\User;
use App\Models\Wilayah;

class DataPenyusul extends Controller
{
    /**
     * Display a listing of the resource.
     * Ini Data Penyusul bagian Super Admin
     * Controller untuk SuperAdmin mengontrol seluruh data Penyusul 
     */
    public function index()
    {

        $adminRole = Role::where('name', 'penyusul')->first(); // Mendapatkan peran 'admin' dari tabel roles

        $users = User::where('id_role', $adminRole->id_role)->get();

        // return view('pages.SuperAdmin.data_admin', [
        //     'admin' => $users,
        // ]);
        return view('pages.superadmin.data-penyusul.table-data-penyusul', compact('users'));
        // $penyusul = Penyusul::all();

        // $penyusul = Penyusul::whereHas('user', function ($query) {
        //     $query->where('role', 'penyusul');
        // })->get();


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $role = Role::all();
        $role = Role::where('id_role', 3)->get();

        // Tidak menampilkan seluruh wilayah karena id 1 nilainya Internal Bappeda
        $wilayah = Wilayah::whereNotIn('id_wilayah', [1])->get();

        return view('pages.superadmin.data-penyusul.create-penyusul', [
            'role' => $role,
            'wilayah' => $wilayah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // INSERT INTO `users` (`id_user`, `id_role`, `id_wilayah`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `name`, `jabatan`, `no_telp`, `created_at`, `updated_at`) VALUES (NULL, '3', '54', 'ojokjo', 'joo', NULL, '', NULL, '', '', NULL, NULL, NULL);

        $penyusul = "3";

        $data = new User([
            'username' => $request->get('username'),
            'id_role' => $penyusul,
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'name' => $request->get('name'),
            'jabatan' => $request->get('jabatan'),
            'no_telp' => $request->get('no_telp'),
            'id_wilayah' => $request->get('wilayah')
        ]);
        $data->save();
        return redirect('/super-admin/penyusul')->with('success', 'Penyusul berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_user)
    {
        $role = Role::where('id_role', 3)->get();
        $user = User::find($id_user);
        // Tidak menampilkan seluruh wilayah karena id 1 nilainya Internal Bappeda
        // $wilayah = Wilayah::whereNotIn('id_wilayah', [1])->get();
        // $wilayah = Role::find(1);
        $wilayah = Wilayah::where('id_wilayah', 1)->get();

        return view('pages.superadmin.data-penyusul.edit-penyusul', [
            'role' => $role,
            'wilayah' => $wilayah,
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_user)
    {
        $data = User::find($id_user);
        $admin = "";

        $data->username = $request->get('username');
        $data->id_role = $admin;
        $data->email = $request->get('email');
        $data->password = $request->get('password');
        $data->name = $request->get('name');
        $data->jabatan = $request->get('jabatan');
        $data->no_telp = $request->get('no_telp');
        $data->id_wilayah = $request->get('wilayah');

        $data->update();

        return redirect('super-admin/penyusul');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_user)
    {
        $hapusDataPenyusul = User::findorfail($id_user);

        $hapusDataPenyusul->delete();
        return redirect('super-admin/penyusul');
    }
}
