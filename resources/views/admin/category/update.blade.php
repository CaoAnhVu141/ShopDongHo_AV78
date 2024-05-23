@extends('layout.master_admin')
@section('content')
<section class="content-header">
    <h1>
        CateGory
        <small>Edit</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="">Category</a></li>
        <li class="active">Create</li>
      </ol>
  </section>
  <!-- Main content -->
  <section class="content">
  <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="box box-primary">
              <form action="{{ route('updatecategory',['id'=>$categoryProducts->id_categories]) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="box-body">
                      <div class="col-sm-8">
                          <div class="form-group">
                              <label for="name">Name <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" name="name" placeholder="Name ......" required value="{{ $categoryProducts->name }}">
                              @error('name')
                              <div class="text-danger">{{ $message }}</div>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label for="description">Description <span class="text-danger">(*)</span></label>
                            <textarea class="form-control" name="description" placeholder="Description ....." required>{{ old('description', $categoryProducts->description) }} </textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                      </div>
                  </div>
                  <div class="box-footer">
                      <a href="{{ route('showcategory') }}" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                      <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                  </div>
                  </div>
              </form>
          </div>
      </div>
  </section>
@endsection
@section('script')
    <script>
        $(function(){
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                $('#image_preview_container').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });

    </script>
@endsection
