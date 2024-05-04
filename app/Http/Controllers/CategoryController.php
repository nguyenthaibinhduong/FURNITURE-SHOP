<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category=$category;
    }
    public function index()
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $category = $recusive->Recusive();
        //dd($category);
         return view('admin.category.index',['category'=>$category]);
    }
    public function create(){
        $option= $this->getcategory($parent_id='');
        return view('admin.category.create',compact('option'));
    }
    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id'=> $request->parent_id
        ]);
        return redirect()->route('category.create');
    }
    public function edit($id){
        $category = $this->category->find($id);
        $option= $this->getcategory($category->parent_id);
        return View('admin.category.edit',['category'=>$category,'option'=>$option]);
    }
    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id'=> $request->parent_id
        ]);
        return redirect()->route('category.index');
    }
    public function getcategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $option = $recusive->categoryRecusive($parent_id);
        return $option;
    }
    // public function delete($id){
    //     $this->category->find($id)->delete();
    //     return redirect()->route('category.index');
    // }
}
