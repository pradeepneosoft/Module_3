@extends('admin.layouts.app')
@section('header_section')
  <link rel="stylesheet" href={{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}>

@endsection
@section('main_content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> --}}
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
            @if($message=Session::get('flash_message'))
            <div class="alert alert-success">
              <p>
                {{ $message }}
              </p>
            </div>
            
            @endif
            <div class="card">
                <div class="card-header">Product</div>
                <div class="card-body">
                    <a href="{{ url('/admin/product/create') }}" class="btn btn-success btn-sm" title="Add New product">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>

                    {{-- <form method="GET" action="{{ url('/admin/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form> --}}

                    <br/>
                    <br/>
                    {{-- <div class="table-responsive"> --}}
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th><th>Name</th><th>Category</th><th>Short Desc</th><th>Price</th><th>Quantity</th><th>Size AND Color</th><th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($product as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td><td>{{ ($item->category['name'] ? $item->category['name']: 'Root') }}</td><td>{{ $item->short_desc }}</td><td>{{ $item->price }}</td><td>{{ $item->quantity }}</td>
                                    <td>
                                        {{-- <a href="{{ url('/admin/product/' . $item->id) }}" title="View product"><button class="btn btn-info btn-sm"><i class="fa fa-images" aria-hidden="true"></i> Images</button></a> --}}
                                        <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-tasks" aria-hidden="true"></i> Size and Color</button></a>

                                    </td>
                                    
                                    
                                    <td>
                                        <a href="{{ url('/admin/product/' . $item->id) }}" title="View product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        <a href="{{ url('/admin/product/' . $item->id . '/edit') }}" title="Edit product"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i></button></a>

                                        <form method="POST" action="{{ url('/admin/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-alt" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th><th>Name</th><th>Category</th><th>Short Desc</th><th>Price</th><th>Quantity</th><th>Size AND Color</th><th>Actions</th>
                
                                </tr>
                            </tfoot>
                        </table>
                    {{-- </div> --}}

                </div>
            </div>










        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection





    

@section('footer_section')
{{-- **************************--}}
<script src="{{ asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
@endsection