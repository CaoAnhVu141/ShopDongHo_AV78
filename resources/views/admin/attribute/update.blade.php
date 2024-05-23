@extends('layout.master_admin')
@section('content')
<section class="content-header">
    <h1>
      Attribute
      <small>Carete</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Attribute</a></li>
      <li class="active">Create</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">

    <div class="box box-primary">
        <form action="{{ route('updateattribute',['id'=>$attribute->id]) }}" method="POST">
            @csrf
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Names <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" value="{{ $attribute->name }}" name="name" placeholder="Name ......">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="description">Description <span class="text-danger">(*)</span></label>
                        <textarea class="form-control" name="description" placeholder="Description ....." required>{{ $attribute->description }}</textarea>
                    </div>
                </div>
            </div>
            <div class="box-footer" >
                <a href="{{ route('showattribute') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
            </div>
            </div>
        </form>
    </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
@endsection
