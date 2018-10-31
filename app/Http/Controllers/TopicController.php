<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Topic;
use App\Model\Category;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view() {
        $topic = Topic::with('category')->get();

        return view('admin.topic.view', compact('topic'));
    }

    public function create() {
        $category = Category::all();

        return view('admin.topic.create', compact('category'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_topic' => 'required',
            'tag_name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);
        
        $slug_name = str_slug($request->input('name_topic'), '-');
        
        Topic::create([
            'name_topic' => $request->input('name_topic'),
            'category_id' => $request->input('category_id'),
            'tag_name' => $request->input('tag_name'),
            'description' => $request->input('description'),
            'slug_name' => $slug_name
        ]);

        return redirect()->route('view.topic');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::all();
        $topic = Topic::find($id);

        return view('admin.topic.edit', compact('topic', 'category'));
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);

        $this->validate($request, [
            'name_topic' => 'required',
            'tag_name' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $topic->update([
            'name_topic' => $request->input('name_topic'),
            'category_id' => $request->input('category_id'),
            'tag_name' => $request->input('tag_name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('view.topic');
    }

    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();

        return redirect()->route('view.topic');
    }
}
