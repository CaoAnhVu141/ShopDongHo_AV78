@extends('layout.master_admin')
@section('content')
<section class="content-header">
    <h1>
      TyPe
      <small>index</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">TyPe</a></li>
      <li class="active">list</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
         @endif
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="{{ route('addaccessory') }}" class="btn btn-primary">Thêm mới </a></h3>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              {{-- <div id="js-data">
                    @include('admin.typeproduct.data')
                </div> --}}

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody>
                      
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Check status</th>
                        <th>Time</th>
                        <th>Action</th>
                      </tr>
                   
                      @if(isset($accessory))
                          @foreach ($accessory as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>{{ $item->description }}</td>
                                 
                                  <td>
                                      @if ($item->checkaccessory==1)
                                          <a href="{{ route('showhideaccessory',['id'=>$item->id]) }}" class="label label-info status-active">Show</a>
                                      @else
                                           <a href="{{ route('showhideaccessory',['id'=>$item->id]) }}" class="label label-default status-active">Hide</a>
                                      @endif
                                  </td>
                                 
                                  <td>{{ $item->created_at }}</td>
                                  <td>
                                      <a href="{{ route('editaccessory',['id'=>$item->id]) }}" class="btn btn-xs btn-primary" onclick="return confirm('Bạn có muốn sửa không')"><i class="fa fa-pencil"></i> Edit</a>
                                      <a href="{{ route('deleteaccessory',['id'=>$item->id]) }}" class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn có muốn xoá không')"><i class="fa fa-trash"></i> Delete</a>
                                  </td>
                              </tr>
                          @endforeach
                      @endif
                    </tbody>
                  </table>
                  {{-- {!! $type_products->appends($query ?? [])->links() !!} --}}
                </div>
              
              <!-- /.box-body -->

            </div>
            <!-- /.box -->
          </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->

  @section('script')
  
</script>
  
  @endsection
@endsection
