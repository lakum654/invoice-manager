@extends('master')


@section('content')
<section class="content-header">
    <h1>
        {{ ucfirst($moduleName) }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">{{ ucfirst($moduleName) }}</a></li>
        <li><a href="#" active>Add</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Edit {{ ucfirst($moduleName) }}</h3>
        </div>
        <div class="box-body">
            <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf()
                @method('PUT')
                <input type="hidden" name="id" value="{{ $category->id }}">
                <div class="form-group">
                    <div class="row">

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="name">Name: *</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="category Name" value="{{ old('name',$category->name) }}">
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="status">Status: *</label><br>
                                <span class="py-5"><input type="radio" name="status" value="1" {{ ($category->is_active == 1) ? 'checked' : ''}}> Active</span>
                                <span class="py-34"><input type="radio" name="status" value="0" {{ ($category->is_active == 0) ? 'checked' : ''}}> In
                                    Active</span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{ route('category') }}" class="btn btn-sm btn-default">Cancel</a>
                    <input type="submit" value="Submit" class="btn btn-sm btn-info">
                </div>
            </form>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

</section>
<!-- /.content -->
@endsection