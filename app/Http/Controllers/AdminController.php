<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $perPage = $request->input('per_page', 5); // Nilai default 5 jika tidak ada query parameter
        // $search = $request->get('search');
        $search = $request->input('search');
        $data = Admin::orderBy('id')
            ->where('id', $search)
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->orWhere('username', 'like', '%' . $search . '%')
            ->orWhere('role', 'like', '%' . $search . '%')
            ->paginate(2);

        return view('admin.index', ['data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|alpha_dash|unique:admins|lowercase',
            'password' => 'required|min:4|confirmed',
        ]);

        Admin::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'receptionist'
        ]);

        return redirect()->route('userAdmin')->with('status', 'store')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $username)
    {
        $user = Admin::where('username', $username)->firstOrFail();
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($user, Request $request)
    {
        $admin = Admin::where('username', $user)->firstOrFail();
        $validateUser = $request->validate([
            'nama' => 'required',
            'username' => "required|alpha_dash|lowercase|unique:admins,username,{$admin->id}",
            'password' => 'nullable|min:4|confirmed',
        ]);

        if (isset($validateUser['password'])) {
            $validateUser['password'] = bcrypt($validateUser['password']);
        } else {
            // Menghapus password dari array jika nilainya null
            unset($validateUser['password']);
        }

        $admin->update($validateUser);

        return redirect()->route('userAdmin')->with('status', 'update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        $admin = Admin::where('username', $username)->firstOrFail();

        $admin->delete();

        return redirect()->route('userAdmin')->with('status', 'destroy');
    }

    public function account()
    {
        $admin = Auth::user();
        return view('admin.my-account', ['user' => $admin]);
    }

    public function updateAccount(Request $request)
    {
        // $admin = Admin::where('username', $user)->firstOrFail();
        $user = Auth::user();

        $validateUser = $request->validate([
            'nama' => 'required',
            'username' => "required|alpha_dash|lowercase|unique:admins,username,{$user->id}",
            'password' => 'nullable|min:4|confirmed',
        ]);

        if (isset($validateUser['password'])) {
            $validateUser['password'] = bcrypt($validateUser['password']);
        } else {
            unset($validateUser['password']);
        }

        $admin = Admin::where('username', $user->username)->firstOrFail(); // Menggunakan model Admin dan cari berdasarkan username
        $admin->update($validateUser);

        return back()->with('status', 'update');
    }
}
