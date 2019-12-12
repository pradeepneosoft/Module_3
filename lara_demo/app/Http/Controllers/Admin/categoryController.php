<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;


use App\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $keyword = $request->get('search');
        // $perPage = 25;

        // if (!empty($keyword)) {
        //     $category = category::where('name', 'LIKE', "%$keyword%")
        //         ->orWhere('parent_id', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $category = category::latest()->get_parent()->paginate($perPage);
        // }
        $category = category::with('get_parent')->get();
        
        // $data=compact('category');
        // $data1=$data->get_parent;
        // $category = DB::table('categories as a')
        // ->leftJoin('categories as b', 'a.id', '=', 'b.parent_id')
        // ->get();

        return view('admin.category.index1', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $parent=category::all();
        return view('admin.category.create1',compact('parent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>"required",
        ]);
    //    $data= $this->get($request->parent_id);
    //    dd($request->parent_id);
       $requestData = $request->all();
        
        category::create($requestData);

        return redirect('admin/category')->with('flash_message', 'Category added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        
        $category = category::with('get_parent')->where('id',$id)->first();
    //    $userProfile = $user->user_profile;
        
        // $parent_name= $this->get($category->parent_id);
    // dd(compact('category'));
        return view('admin.category.show1', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $category = category::findOrFail($id);
        $parent=category::all();


        return view('admin.category.edit1', compact('Category','parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>"required",
        ]);
        $requestData = $request->all();
        
        $category = category::findOrFail($id);
        $category->update($requestData);

        return redirect('admin/category')->with('flash_message', 'Category updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        category::destroy($id);

        return redirect('admin/category')->with('flash_message', 'Category deleted!');
    }
    public function get($id,$stream="")
    {
      $data=category::findorfail($id);
      $stream=$data->name.">".$stream;
      if($data->parent_id==0)
      {
      
        return $stream;
      }
      else {
        

        $this->get($data->parent_id,$stream);
      }   
      
    }
}
