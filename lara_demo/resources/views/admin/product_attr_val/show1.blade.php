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
                                <div class="card-header">Product Attribute Value {{ $product_attr_val->id }}</div>
                                <div class="card-body">
            
                                    <a href="{{ url('/admin/product_attr_val') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                    <a href="{{ url('/admin/product_attr_val/' . $product_attr_val->id . '/edit') }}" title="Edit product_attr_val"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
            
                                    <form method="POST" action="{{ url('admin/product_attr_val' . '/' . $product_attr_val->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete product_attr_val" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form>
                                    <br/>
                                    <br/>
            
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th>ID</th><td>{{ $product_attr_val->id }}</td>
                                                </tr>
                                                <tr><th> Value </th><td> {{ $product_attr_val->value }} </td></tr><tr><th> Attribute </th><td> {{ $product_attr_val->get_attributes['name'] }} </td></tr>
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