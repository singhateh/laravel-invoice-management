<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use PDF;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

    public function __construct()
    {
        $this->setting = Setting::first();
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['view' =>view('admin.tableContent', ['users' => User::get()])->render()]);
        }

        if ($request->pdf) {
            $pdf = PDF::loadView('pdf.users', ['users' => User::get(), 'setting' => $this->setting]);
            return $pdf->download('users_list.pdf');
        }

        return view('admin.index', ['users' => User::get()]);
    }

    public function create()
    {
        return view('admin.create');
    }


    public function store(Request $request)
    {
        User::updateOrCreate(['id' => $request->user_id], [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => $request->user_id ? 'User Updated successfully' : 'User Created successfully', 'status' => 'Status 200 ']);
        }else {
            return redirect()->route('user.index')->with('success', $request->user_id ? 'User Updated successfully' : 'User Created successfully');
        }
    }

    public function edit(User $user)
    {
        return view('admin.edit', ['user' => $user]);
    }

    public function destroy(User $user, Request $request)
    {
        if (!Hash::check($request->password, auth()->user()->password)) {
            return response()->json(['not_valid' => 'Password not valid']);
        }
        try {
            $user->delete();
            return response()->json(['success' => 'User Deleted Successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'User Not Deleted Fail']);
        }
    }

    public function export()
    {
        try {
            return Excel::download(new UserExport, 'users_list.xlsx');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
