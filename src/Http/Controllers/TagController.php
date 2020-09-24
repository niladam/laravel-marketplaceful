<?php

namespace Marketplaceful\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Marketplaceful\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::withCount('listings')->get();

        return view('marketplaceful::tags.index', [
            'tags' => $tags,
        ]);
    }

    public function create()
    {
        return view('marketplaceful::tags.create');
    }

    public function show(Request $request, $tagId)
    {
        $tag = Tag::findOrFail($tagId);

        return view('marketplaceful::tags.show', [
            'tag' => $tag,
        ]);
    }
}
