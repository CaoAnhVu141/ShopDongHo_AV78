@extends('layout.master_admin')
@section('content')
    <section class="content-header">
        <h1>
            CateGory
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Category</a></li>
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
                    <h3 class="box-title"><a href="{{ route('addcategory') }}" class="btn btn-primary">Thêm mới </a></h3>
                    <div class="box-tools">
                    {{-- <form action="#" method="">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="key" class="form-control pull-right ajax-search-table" placeholder="Search" data-url="" value="{{ $request->input('key') }}">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    </form> --}}
                    <form action="#" method="">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="key" class="form-control pull-right ajax-search-table" placeholder="Search" data-url="" value="{{ request('key') }}">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover ">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Time</th>
                                <th>Check status</th>
                                <th>Action</th>
                            </tr>
                            @if(isset($categoryProducts))
                                @foreach ($categoryProducts as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>

                                            @if ($item->checkstatus == 1)
                                            <a href="{{ route('toggleproduct',['id'=>$item->id_categories]) }}" class="label label-info status-active">Show</a>
                                            @else
                                             <a href="{{ route('toggleproduct',['id'=>$item->id_categories]) }}" class="label label-default status-active">Hide</a>
                                             @endif
                                            </td>
                                            <td>
                                            <a href="{{ route('editcategory',['id' => $item->id_categories]) }}"class="btn btn-xs btn-primary js-delete-confirm" onclick="return confirm('Bạn có muốn sửa không?')"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('deletecategory',['id' => $item->id_categories]) }}" class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{-- {!! $categoryProducts->appends($query ?? [])->links('pagination::bootstrap-4') !!} --}}
                </div>
                
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
    </section>
  <!-- /.content -->
@endsection
@section('script')

@endsection
