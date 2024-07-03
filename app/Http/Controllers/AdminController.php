<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        Log::info('Memanggil method index()');
        
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $credentials['username'])->first();

        Log::info('Mencoba login dengan kredensial', ['kredensial' => $credentials]);

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Log::info('Password cocok');
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        } else {
            Log::warning('Password tidak cocok atau admin tidak ditemukan');
            return redirect()->back()->withErrors(['username' => 'Username atau password salah.']);
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        Log::info('Memasuki method store()');
    
        // Validasi input
        try {
            $validated = $request->validate([
                'username' => 'required|string|max:255|unique:admins',
                'password' => 'required|string|min:8|confirmed',
            ]);
            Log::info('Validasi berhasil', ['validated' => $validated]);
        } catch (\Exception $e) {
            Log::error('Validasi gagal', ['error' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Validation failed.']);
        }
    
        // Simpan admin ke database
        try {
            $admin = new Admin();
            $admin->username = $request->username;
            $admin->password = Hash::make($request->password);
            $admin->save();
    
            Log::info('Admin berhasil disimpan', ['admin' => $admin]);
    
            return redirect()->route('admin.index')->with('success', 'Admin created successfully.');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan admin', ['error' => $e->getMessage()]);
    
            return redirect()->back()->withErrors(['error' => 'Failed to create admin. Please try again.']);
        }
    }
    

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $admin->username = $request->username;
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Admin deleted successfully.');
    }

    public function __construct()
    {
        $this->middleware('auth.admin')->except(['showLoginForm', 'loginSubmit', 'create', 'store']);
    }
}
