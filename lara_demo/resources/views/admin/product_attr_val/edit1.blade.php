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
                                <div class="card-header">Edit Product Attribute value #{{ $product_attr_val->id }}</div>
                                <div class="card-body">
                                    <a href="{{ url('/admin/product_attr_val') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                    <br />
                                    <br />
            
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
            
                                    <form method="POST" action="{{ url('/admin/product_attr_val/' . $product_attr_val->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                        {{ method_field('PATCH') }}
                                        {{ csrf_field() }}
            
                                        @include ('admin.product_attr_val.form', ['formMode' => 'edit'])
            
                                    </form>
            
                                </div>
                            </div>
                    
                </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </section>
            
            
            </div>
            @endsection