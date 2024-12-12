<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::all();
        return view('category.list', compact('categories'));
    }
    public function create(){
        return view('category.create');
    }
    public function add(CategoryRequest $request){
        $category = Category::create([
            'name' => $request->name
        ]);
        Alert::toast('Berhasil Tambah Data Kategori', 'success');
        return redirect()->route('category');
        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

    }
    public function edit(Category $category){
        $category = Category::findOrFail($category->id);
        return view('category.edit', ['category' => $category]);
    }
    public function update(CategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name
        ]);
        Alert::toast('Berhasil Ubah Data Kategori', 'success');
        return redirect()->route('category');
        $validator = $request->validated();
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Alert::toast('Berhasil Hapus Data Kategori', 'success');
        return redirect()->back();

    }
}
