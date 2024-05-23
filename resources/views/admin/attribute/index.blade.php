@extends('layout.master_admin')
@section('content')
<section class="content-header">
    <h1>
      Attribute
      <small>index</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Attribute</a></li>
      <li class="active">list</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
     @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="{{ route('showaddattribute') }}" class="btn btn-primary">Thêm mới </a></h3>
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
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                    @php
                       $i = 0;
                    @endphp
                    @if(isset($attributeProduct))
                        @foreach ($attributeProduct as $item)
                            <tr>
                                <td>{{ ++$i}}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-primary" onclick="return confirm('Bạn có muốn sửa không?')"><i class="fa fa-pencil"></i> Edit</a>
                                    <a  href="{{ route('deleteattribute',['id'=>$item->id_attribute]) }}" class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn có muốn xoá không?')"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
              {{--  {!! $attribute->links() !!}  --}}
              <div></div>
            </div>
            <!-- /.box -->
          </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
@endsection
