<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\file;

class categoryController extends Controller
{
    public function show(){
        $category = category::all();
        return view('category.index' , compact('category'));
    }
    public function index(){
        return view('category.addcategory');
    }

    public function store(Request $req){
        $category = new category();
        $category->name = $req->name;
        $category->slug = $req->slug;
        $category->status = $req->status == True ? '1' : '0';
        $category->popular = $req->popular == True ? '1' : '0';
        $category->meta_title = $req->meta_title;
        $category->meta_keywords = $req->meta_keywords;
        $category->description = $req->description;
        if($req->hasFile('image')){
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/category' , $filename);
            $category->image = $filename;
        }
        $category->save();
        return redirect('showcate')->with('status' , 'Category added SuccessFully');
    }

    public function delete($id){
        $category = category::find($id);
        $destnitation = 'assets/uploads/category/'.$category->image;
        if(file::exists($destnitation)){
            file::delete($destnitation);
        }
        $category->delete();
        return redirect('showcate')->with('status' , 'Category deleted SuccessFully');
    }

    public function edit($id){
        $category = category::find($id);
        return view('category.edit' , compact('category'));
    }

    public function update(Request $req , $id){
        $category = category::find($id);
        $category->name = $req->name;
        $category->slug = $req->slug;
        $category->status = $req->status == True ? '1' : '0';
        $category->popular = $req->popular == True ? '1' : '0';
        $category->meta_title = $req->meta_title;
        $category->meta_keywords = $req->meta_keywords;
        $category->description = $req->description;
        if($req->hasFile('image')){
            $destnitation = 'assets/uploads/category/'.$category->image;
            if(file::exists($destnitation)){
                file::delete($destnitation);
            }
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/uploads/category' , $filename);
            $category->image = $filename;
        }
        $category->update();
        return redirect('showcate')->with('status' , 'Category updated SuccessFully');
    }
}
