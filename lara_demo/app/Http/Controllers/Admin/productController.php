<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product;
use Illuminate\Http\Request;

class productController extends Controller
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
            $product = product::where('name', 'LIKE', "%$keyword%")
                ->orWhere('sku', 'LIKE', "%$keyword%")
                ->orWhere('short_desc', 'LIKE', "%$keyword%")
                ->orWhere('long_desc', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('special_price', 'LIKE', "%$keyword%")
                ->orWhere('special_price_from', 'LIKE', "%$keyword%")
                ->orWhere('special_price_to', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('meta_title', 'LIKE', "%$keyword%")
                ->orWhere('meta_description', 'LIKE', "%$keyword%")
                ->orWhere('meta_keywords', 'LIKE', "%$keyword%")
                ->orWhere('created_by', 'LIKE', "%$keyword%")
                ->orWhere('updated_by', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = product::latest()->paginate($perPage);
        }

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
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
        
        $requestData = $request->all();
        
        product::create($requestData);

        return redirect('admin/product')->with('flash_message', 'product added!');
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
        $product = product::findOrFail($id);

        return view('admin.product.show', compact('product'));
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
        $product = product::findOrFail($id);

        return view('admin.product.edit', compact('product'));
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
        
        $requestData = $request->all();
        
        $product = product::findOrFail($id);
        $product->update($requestData);

        return redirect('admin/product')->with('flash_message', 'product updated!');
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
        product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'product deleted!');
    }
}
