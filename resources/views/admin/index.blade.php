@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body">
              <h4>Selamat datang {{Auth::user()->name}}</h4>
          </div>
        </div>
    </section>
</div>
@endsection
