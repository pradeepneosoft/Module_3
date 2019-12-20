<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\product;
use App\category;
use App\product_image;

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

        // if (!empty($keyword)) {
        //     $product = product::where('name', 'LIKE', "%$keyword%")
        //         ->orWhere('sku', 'LIKE', "%$keyword%")
        //         ->orWhere('short_desc', 'LIKE', "%$keyword%")
        //         ->orWhere('long_desc', 'LIKE', "%$keyword%")
        //         ->orWhere('price', 'LIKE', "%$keyword%")
        //         ->orWhere('special_price', 'LIKE', "%$keyword%")
        //         ->orWhere('special_price_from', 'LIKE', "%$keyword%")
        //         ->orWhere('special_price_to', 'LIKE', "%$keyword%")
        //         ->orWhere('status', 'LIKE', "%$keyword%")
        //         ->orWhere('quantity', 'LIKE', "%$keyword%")
        //         ->orWhere('meta_title', 'LIKE', "%$keyword%")
        //         ->orWhere('meta_description', 'LIKE', "%$keyword%")
        //         ->orWhere('meta_keywords', 'LIKE', "%$keyword%")
        //         ->orWhere('created_by', 'LIKE', "%$keyword%")
        //         ->orWhere('updated_by', 'LIKE', "%$keyword%")
        //         ->latest()->paginate($perPage);
        // } else {
            // $product = product::latest()->paginate($perPage);
        // }
          $product=product::with('category')->get();
        return view('admin.product.index1', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    { $category=category::all()->where('parent_id',0);
        return view('admin.product.create1',compact('category'));
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
             'name'=>'required',
             'category_id'=>'required',
             'short_desc'=>'required',
             'price'=>'required',
            //  'special_price'=>'required',
            //  'special_price_from'=>'required|date|after:tomorrow',
            // 'special_price_to'=>'required|date|after:special_price_from',
             'quantity'=>'required',
             'product_images'=>'required',

         ]);         
        $requestData = $request->all();
        $data=product::create($requestData);    

        $product = product::find($data->id);



        $files = $request->file('product_images');
            if($request->hasFile('product_images'))
            {
                foreach ($files as $file) {
                   $path= $file->store('uploads', 'public');
                    $arr=new product_image(['product_id'=>$data->id,'image_name'=>$path]);

                    $product->product_images()->save($arr);
                }
            }
           
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
        // $product = product::findOrFail($id);
        $product=product::with('category','product_images')->where('id',$id)->first();


        return view('admin.product.show1', compact('product'));
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
        $product = product::with('product_images')->where('id',$id)->first();
        // dd(compact('product'));


        $category=category::all();

        return view('admin.product.edit1', compact('product','category'));
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

            'name'=>'required',
            'category_id'=>'required',
            'short_desc'=>'required',
            'price'=>'required',
            // 'special_price'=>'required',
            // 'special_price_from'=>'required|date|after:tomorrow',
            // 'special_price_to'=>'required|date|after:special_price_from',
            'quantity'=>'required',

        ]);          
        $requestData = $request->all();
        $product = product::findOrFail($id);
        $product->update($requestData);
        if($request->hasFile('product_images'))
        {        $files = $request->file('product_images');
                 $status_update=product_image::where('product_id',$id);
                $data['status']='0';
                 $status_update->update($data);  


            foreach ($files as $file) {
               $path= $file->store('uploads', 'public');
                $arr=new product_image(['product_id'=>$id,'image_name'=>$path]);

                $product->product_images()->save($arr);
            }
        }

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
    public function images()
    { 
        // return view('admin.product.image_upload');
    }
}
