<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Str;

use Illuminate\Support\Facades\File;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Categories::all();
        return view('admin_panel.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:categories,slug',
            'des' => 'required|string'

        ]);
        $data= $request->all();
        $slug = Str::slug($request->title);
        $data['slug']= $slug;
        if(is_string($request->status)) {
            $data['status']=true;
        }
        else {
            $data['status']=false;
        }

        if($request->hasFile('image')){

            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = public_path('assets/admin/category/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/category/'.$image_name;

        }
        // dd($data);
        Categories::create($data);

        return redirect()->route('categories.create')
            ->withSuccess(__('Category created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {

        return view('admin_panel.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:categories,slug,'.$category->id,
            'des' => 'required|string'
        ]);
        $data= $request->all();
        $slug = Str::slug($request->title);
        $data['slug']= $slug;
        if(is_string($request->status)) {
            $data['status']=true;
        }
        else {
            $data['status']=false;
        }

        if($request->hasFile('image')){
            File::delete($category->image);
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = public_path('assets/admin/category/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/category/'.$image_name;

        }

        $category->update($data);

        return redirect()->route('categories.index')
            ->withSuccess(__('Category updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        File::delete($category->image);
        $category->delete();

        return redirect()->route('categories.index')
            ->withSuccess(__('Category deleted successfully.'));
    }
}
