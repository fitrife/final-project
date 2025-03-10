<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class DashboardStaffController extends Controller
{
    public function index() {
        $user = User::where('is_admin', '=', '0')->get();
        return view('dashboard.staff.index', [
            'title' => 'Daftar Staff',
        ], compact('user'));
    }

    public function create()
    {
        $status = ['1','0'];
        return view('dashboard.staff.create', [
            'title' => "Tambah Staff",
        ], compact('status'));
    }

    public function store(Request $request) {
        
        $validatedData = $request->validate([
            'name'  => 'required|max:255',
            'username'  => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => ['required','email:dns','unique:users'],
            'password'  => 'required|min:8|max:255',
            'status' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        event(new Registered($user));

        return redirect()->route('verification.notice')->with('success', 'Akun berhasil dibuat, silahkan verifikasi Email Anda');
    }

    public function edit($id)
    {
        $status = ['1','0'];
        $user = User::find($id);
        return view('dashboard.staff.edit', [
            'title' => "Edit Staff",
        ], compact('status', 'user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = $request->input('status');
        $user->update();

        return redirect('/dashboard/staff')->with('success', 'Staff has been updated!');
        // $validatedData = $request->validate([
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->destroy($user->id);

        return redirect('/dashboard/staff')->with('success', 'Staff has been deleted!');
    }
    
}
