@extends('admin.layouts.app')
{{-- @section('header_section')
  <link rel="stylesheet" href={{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}>

@endsection --}}
@section('main_content')
<div class="content-wrapper">
        <section class="content">
                <div class="row">
                  <div class="col-12"> 
<div class="card">
        <div class="card-header">product {{ $product->id }}</div>
        <div class="card-body">

            <a href="{{ url('/admin/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
            <a href="{{ url('/admin/product/' . $product->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

            <form method="POST" action="{{ url('admin/product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
            </form>
            <br/>
            <br/>

            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>ID</th><td>{{ $product->id }}</td>
                        </tr>
                        <tr><th> Name </th><td> {{ $product->name }} </td></tr>
                        <tr><th> Category </th><td> {{ $product->category['name'] }} </td></tr>
                        {{-- <tr><th> Sku </th><td> {{ $product->sku }} </td></tr> --}}
                        <tr><th> Short Description </th><td> {{ $product->short_desc }} </td></tr>
                        {{-- <tr><th> Long Description </th><td> {{ $product->long_desc }} </td></tr> --}}
                        <tr><th> Price </th><td> {{ $product->price }} </td></tr>
                        {{-- <tr><th> Spacial Price </th><td> {{ $product->special_price }} </td></tr>
                        <tr><th> Special Price From </th><td> {{ $product->special_price_from }} </td></tr>
                        <tr><th> Special Price To</th><td> {{ $product->special_price_to }} </td></tr> --}}
                        <tr><th> Quantity</th><td> {{ $product->quantity }} </td></tr>
                        <tr><th> Images</th>
                            <td> 
                                @foreach($product->product_images as $data)
                                <img src="{{ URL::to('/') }}/storage/{{ $data['image_name'] }}" width="100" hieght="100">
                                @endforeach 
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>


</div>
@endsection