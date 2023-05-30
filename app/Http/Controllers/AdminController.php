<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * Ini Data Admin bagian Super Admin
     * Controller untuk SuperAdmin mengontrol seluruh data Admin(InternalBappeda)
     */
    public function index()
    {
        // $getAdmin = User::whereHas('users', function ($query) {
        //     $query->where('id_role', 2);
        // })->get();

        $adminRole = Role::where('name', 'admin')->first(); // Mendapatkan peran 'admin' dari tabel roles

        $users = User::where('id_role', $adminRole->id_role)->get();

        // return view('pages.SuperAdmin.data_admin', [
        //     'admin' => $users,
        // ]);
        return view('pages.superadmin.data-admin.table-data-admin', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::where('id_role', 2)->get();

        // Tidak menampilkan seluruh wilayah karena id 1 nilainya Internal Bappeda
        // $wilayah = Wilayah::whereNotIn('id_wilayah', [1])->get();
        // $wilayah = Role::find(1);
        $wilayah = Wilayah::where('id_wilayah', 1)->get();

        return view('pages.superadmin.data-admin.create-Admin', [
            'role' => $role,
            'wilayah' => $wilayah,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $admin = "2";

        $data = new User([
            'username' => $request->get('username'),
            'id_role' => "2", // Diisi 2 karena relasi pada Tabel Role, 2 untuk Admin
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'jabatan' => $request->get('jabatan'),
            'no_telp' => $request->get('no_telp'),
            'id_wilayah' => $request->get('wilayah')
        ]);
        $data->save();
        return redirect('/super-admin/admin')->with('success', 'Penyusul berhasil ditambahkan');
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
        $role = Role::where('id_role', 2)->get();
        $user = User::find($id_user);
        // Tidak menampilkan seluruh wilayah karena id 1 nilainya Internal Bappeda
        // $wilayah = Wilayah::whereNotIn('id_wilayah', [1])->get();
        // $wilayah = Role::find(1);
        $wilayah = Wilayah::where('id_wilayah', 1)->get();

        return view('pages.superadmin.data-admin.edit-admin', [
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
        $admin = "2";

        $data->username = $request->get('username');
        $data->id_role = $admin;
        $data->email = $request->get('email');
        $data->password = $request->get('password');
        $data->name = $request->get('name');
        $data->jabatan = $request->get('jabatan');
        $data->no_telp = $request->get('no_telp');
        $data->id_wilayah = $request->get('wilayah');

        $data->update();

        return redirect('super-admin/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_user)
    {
        $hapusDataAdmin = User::findorfail($id_user);

        $hapusDataAdmin->delete();
        return redirect('super-admin/admin');
    }
}
