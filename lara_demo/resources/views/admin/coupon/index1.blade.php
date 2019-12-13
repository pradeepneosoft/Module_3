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
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
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
                    <div class="card-header">
                      <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                            <a href="{{ url('/admin/coupon/create') }}" class="btn btn-success btn-sm" title="Add New coupon">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            {{-- <form method="GET" action="{{ url('/admin/coupon') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                    <span class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </form> --}}
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                                <th>#</th><th>Code</th><th>Percent Off</th><th>No of Uses</th><th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
        
                                @foreach($coupon as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->code }}</td><td>{{ $item->percent_off }}</td><td>{{ $item->no_of_uses }}</td>
                                        <td>
                                            <a href="{{ url('/admin/coupon/' . $item->id) }}" title="View coupon"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/coupon/' . $item->id . '/edit') }}" title="Edit coupon"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/coupon' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete coupon" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
        
        
        
        
                        
                        </tbody>
                        <tfoot>
                        <tr>
                                <th>#</th><th>Code</th><th>Percent Off</th><th>No of Uses</th><th>Actions</th>
        
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
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
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>
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