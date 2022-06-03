@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content-header">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
              <h4>Selamat datang {{Auth::user()->name}}</h4>
              <a href="{{ route('admin.logout') }}" class="btn btn-primary">Logout</a>
          </div>
        </div>
    </section>
</div>
@endsection
