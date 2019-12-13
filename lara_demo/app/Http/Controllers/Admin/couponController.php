<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\coupon;
use Illuminate\Http\Request;

class couponController extends Controller
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
            $coupon = coupon::where('code', 'LIKE', "%$keyword%")
                ->orWhere('percent_off', 'LIKE', "%$keyword%")
                ->orWhere('created_by', 'LIKE', "%$keyword%")
                ->orWhere('updated_by', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $coupon = coupon::latest()->paginate($perPage);
        }

        return view('admin.coupon.index1', compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.coupon.create1');
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
            'code'=>'required|unique:coupons|max:10|min:3',
            'percent_off'=>'required|numeric|max:99|min:0',
            'no_of_uses'=>'required|numeric',

        ]);
        $requestData = $request->all();
        
        coupon::create($requestData);

        return redirect('admin/coupon')->with('flash_message', 'coupon added!');
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
        $coupon = coupon::findOrFail($id);

        return view('admin.coupon.show1', compact('coupon'));
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
        $coupon = coupon::findOrFail($id);

        return view('admin.coupon.edit1', compact('coupon'));
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
    {  $request->validate([
        'code'=>'required|max:10|min:3|unique:coupons,code,'.$id,
        'percent_off'=>'required|numeric|max:99|min:0',
        'no_of_uses'=>'required|numeric',
    ]);
        
        $requestData = $request->all();
        
        $coupon = coupon::findOrFail($id);
        $coupon->update($requestData);

        return redirect('admin/coupon')->with('flash_message', 'coupon updated!');
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
        coupon::destroy($id);

        return redirect('admin/coupon')->with('flash_message', 'coupon deleted!');
    }
}
