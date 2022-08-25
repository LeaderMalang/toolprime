<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use Str;

use Illuminate\Support\Facades\File;
class PackageController extends Controller
{
    public function index()
    {
        $packages=Package::all();
        return view('admin_panel.package.index', [
            'packages' => $packages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_panel.package.create');
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
            'slug' => 'required|string|unique:packages,slug',
            'des' => 'required|string',
            'price'=>'required|numeric'

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
            $path = public_path('assets/admin/package/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/package/'.$image_name;

        }
        // dd($data);
        Package::create($data);

        return redirect()->route('packeges.create')
            ->withSuccess(__('Package created successfully.'));
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
    public function edit($id)
    {

        $package=Package::find($id);
        return view('admin_panel.package.edit', [
            'package' => $package
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package=Package::find($id);
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:packages,slug,'.$package->id,
            'des' => 'required|string',
            'price'=>'required|numeric'
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
            File::delete($package->image);
            $image = $request->file('image');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = public_path('assets/admin/package/');
            $image->move($path,$image_name);

            $data['image'] = '/assets/admin/package/'.$image_name;

        }

        $package->update($data);

        return redirect()->route('packeges.index')
            ->withSuccess(__('Package updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $package=Package::find($id);
        File::delete($package->image);
        $package->delete();

        return redirect()->route('packeges.index')
            ->withSuccess(__('Package deleted successfully.'));
    }
}
