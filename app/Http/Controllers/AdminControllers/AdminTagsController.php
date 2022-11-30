<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class AdminTagsController extends Controller
{
    public function index()
    {
        $page_section_title = "Tags";
        $main_section_title = "Todas as Tags";
        return view('admin_dashboard.tags.index', [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'tags' => Tag::paginate(15),
        ]);
    }

    public function show(Tag $tag)
    {
        $page_section_title = "$tag->nome";
        $main_section_title = "Tag: $tag->nome";
        return view('admin_dashboard.tags.show',  [
            'page_section_title' => $page_section_title,
            'main_section_title' => $main_section_title,
            'tag' => $tag,
        ]);
    }

    public function destroy(Tag $tag)
    {
        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deletada com sucesso!');
    }

}
