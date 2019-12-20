<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product_attribute;
use Illuminate\Http\Request;

class product_attributesController extends Controller
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

        if (!empty($keyword)) {
            $product_attributes = product_attribute::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product_attributes = product_attribute::latest()->paginate($perPage);
        }

        return view('admin.product_attributes.index1', compact('product_attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        return view('admin.product_attributes.create1');
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
            'name'=>'required'
        ]);
        $requestData = $request->all();
        
        product_attribute::create($requestData);

        return redirect('admin/product_attributes')->with('flash_message', 'Product_attribute added!');
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
        $product_attribute = product_attribute::findOrFail($id);

        return view('admin.product_attributes.show1', compact('product_attribute'));
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
        $product_attribute = product_attribute::findOrFail($id);

        return view('admin.product_attributes.edit1', compact('product_attribute'));
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
            'name'=>'required'
        ]);
        $requestData = $request->all();
        
        $product_attribute = product_attribute::findOrFail($id);
        $product_attribute->update($requestData);

        return redirect('admin/product_attributes')->with('flash_message', 'Product_attribute updated!');
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
        product_attribute::destroy($id);

        return redirect('admin/product_attributes')->with('flash_message', 'Product_attribute deleted!');
    }
}
