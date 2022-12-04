<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function create(Request $request)
    {
        $data['editSetting'] = Setting::first();
        return view('pages.setting.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $setting = new Setting();
        $setting->title = $request->title;
        $setting->welcome_title = $request->welcome_title;
        $setting->copyright_name = $request->copyright_name;
        $setting->copyright_url = $request->copyright_url;
        $setting->copyright_year = $request->copyright_year;
        if ($request->has('logo')) {
            $fileName = 'logo' . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $fileName);
            $setting->logo = $fileName;
        }
        if ($request->has('favicon')) {
            $fileName = 'favicon' . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $fileName);
            $setting->favicon = $fileName;
        }
        $setting->save();
        return redirect()->back()->with('success', 'Settings Created Successfully !!');
    }


    public function update(Request $request)
    {
       
        // $request->validate([
        //     'logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //     'favicon' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        // ]);
        $id = Setting::first()->id;
        $setting = Setting::find($id);
        $setting->title = $request->title;
        $setting->welcome_title = $request->welcome_title;
        $setting->copyright_name = $request->copyright_name;
        $setting->copyright_url = $request->copyright_url;
        $setting->copyright_year = $request->copyright_year;
        // For logo Request
        if ($request->has('logo')) {
            $logo = 'logo' . '.' . $request->logo->extension();
            $request->logo->move(public_path('uploads'), $logo);

            if ($setting->logo) {
                $file_path = public_path() . "/uploads" . $setting->logo;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $setting->logo = $logo;
            }
        }
        // For favicon Request
        if ($request->has('favicon')) {
            $favicon = 'favicon' . '.' . $request->favicon->extension();
            $request->favicon->move(public_path('uploads'), $favicon);

            if ($setting->favicon) {
                $file_path = public_path() . "/uploads" . $setting->favicon;
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $setting->favicon = $favicon;
            }
        }
        $setting->update();
        return redirect()->back()->with('success', 'Settings Updated Successfully !!');
    }
}
