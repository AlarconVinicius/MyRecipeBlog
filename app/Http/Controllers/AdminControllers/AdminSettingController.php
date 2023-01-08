<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSettingController extends Controller
{
    public function edit()
    {
        $page_section_title = "Sobre";
        $main_section_title = "Sobre";
        // dd(Setting::find(1));
        return view('admin_dashboard.about.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'setting' => Setting::find(1),
        ]);
    }

    public function update()
    {
        $validated = request()->validate([
            'sobre_resumo' => 'nullable|min:50,max:500',
            'sobre_quem_somos' => 'nullable|min:50,max:500',
            'sobre_image' => 'nullable|image',
        ]);

        if(request()->has('sobre_image'))
        {
            $sobre_image = request()->file('sobre_image');
            $path = $sobre_image->store('setting', 'public');
            $validated['sobre_image'] = $path;
        }

        Setting::find(1)->update($validated);
        return redirect()->route('admin.setting.edit')->with('success', 'Página Sobre atualizada com sucesso!');
    }
}
