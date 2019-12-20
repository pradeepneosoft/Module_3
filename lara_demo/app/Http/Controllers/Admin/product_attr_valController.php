<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product_attr_val;

use App\product_attribute;
use Illuminate\Http\Request;

class product_attr_valController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        // if (!empty($keyword)) {
        //     $product_attr_val = product_attr_val::where('value', 'LIKE', "%$keyword%")
        //         ->orWhere('attribute', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
        //     $product_attr_val = product_attr_val::latest()->paginate($perPage);
        // }
        $product_attr_val = product_attr_val::with('get_attributes')->get();


        return view('admin.product_attr_val.index1', compact('product_attr_val'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {    $attribute=product_attribute::all();   
        return view('admin.product_attr_val.create1',compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    { $request->validate([
        'value'=>'required',
        'product_attributes_id'=>'required',

    ]);
        
        $requestData = $request->all();
        
        product_attr_val::create($requestData);

        return redirect('admin/product_attr_val')->with('flash_message', 'product_attr_val added!');
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
        $product_attr_val = product_attr_val::with('get_attributes')->where('id',$id)->first();
        // dd(compact('product_attr_val'));
        return view('admin.product_attr_val.show1', compact('product_attr_val'));
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
        $product_attr_val = product_attr_val::findOrFail($id);
        $attribute=product_attribute::all();

        return view('admin.product_attr_val.edit1', compact('product_attr_val','attribute'));
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
            'value'=>'required',
            'product_attributes_id'=>'required',

        ]);
        $requestData = $request->all();
        
        $product_attr_val = product_attr_val::findOrFail($id);
        $product_attr_val->update($requestData);

        return redirect('admin/product_attr_val')->with('flash_message', 'product_attr_val updated!');
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
        product_attr_val::destroy($id);

        return redirect('admin/product_attr_val')->with('flash_message', 'product_attr_val deleted!');
    }
}
