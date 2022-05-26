@extends('layouts.admin')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Menu {{$menu->name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('menu') }}">Menu</a></li>
                        <li class="breadcrumb-item active mr-2">Edit Menu</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        {{-- Show Error --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Default box -->
        <div class="card">
            <form action="{{ route('menu.edit', $menu->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Menu" value="{{$menu->name}}">
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" class="form-control" name="price" id="price" placeholder="Harga Menu" value="{{$menu->price}}">
                    </div>
                    <div class="form-group">
                        <label for="available_color">Available Color</label>
                        <input type="text" class="form-control" name="available_color" id="available_color" placeholder="Contoh: Black / White" value="{{$menu->available_color}}">
                    </div>
                    <div class="form-group">
                        <label for="specification">Specification</label>
                        <textarea class="form-control" name="specification" id="specification" rows="3" placeholder="Spesifikasi">{{$menu->specification}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Deskripsi">{{$menu->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Foto</label></br>
                        <img src="{{$menu->image}}" width="200">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
