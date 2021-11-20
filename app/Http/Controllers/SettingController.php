<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function index()
    {
       return view('settings.index', ['setting' => Setting::first()]);
    }

    public function store(Request $request)
    {
       Setting::updateOrCreate(['id' => $request->setting_id],
        $request->except('setting_id')
       );

       return redirect()->route('setting.index')->with('success', 'Setting Created or Updated Successfully');
    }
}
