<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function view() {
        $category = Category::all();

        return view('admin.category.view', compact('category'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name_category' => 'required|min:6'
        ]);

        Category::create([
            'name_category' => $request->input('name_category')
        ]);

        return redirect()->route('view.category');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'name_category' => 'required'
        ]);

        $category->update([
            'name_category' => $request->input('name_category')
        ]);

        return redirect()->route('view.category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('view.category');
    }
}
