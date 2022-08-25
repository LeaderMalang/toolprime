<?php

namespace App\Http\Controllers\Admin\Tool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tools;
use App\Models\Categories;
use Str;
use Illuminate\Support\Facades\File;


class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tools=Tools::with('category')->get();


        // dd($tools);
        return view('admin_panel.tool.index', [
            'tools' => $tools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categories::all();
        return view('admin_panel.tool.create',[
            'categories' => $categories
        ]);
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
            'category_id' => 'required|string'

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
            $path = public_path('assets/admin/tool/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/tool/'.$image_name;

        }
        // dd($data);
        Tools::create($data);

        return redirect()->route('tools.create')
            ->withSuccess(__('Tool created successfully.'));
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
    public function edit(Tools $tool)
    {

        $categories=Categories::all();
        return view('admin_panel.tool.edit', [
            'tool' => $tool,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tools $tool)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:categories,slug',
            'category_id' => 'required|string'

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
            File::delete($tool->image);
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = public_path('assets/admin/tool/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/tool/'.$image_name;

        }
        // dd($data);
        $tool->update($data);

        return redirect()->route('tools.index')
            ->withSuccess(__('Tool Updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tools $tool)
    {
        File::delete($tool->image);
        $tool->delete();

        return redirect()->route('tools.index')
            ->withSuccess(__('Tool deleted successfully.'));
    }
}
