@extends('layouts.front')

@section('title')
    Selamat Datang 
@endsection

@section('content')
<div class="h-v white row-col">
  <div class="row-cell v-b">
    <div class="container p-y-lg pos-rlt">
      <h1 class="display-3 _700 l-s-n-3x m-t-lg m-b-md">Selamat Datang <span class="text-primary">di</span> Maper</h1>
      <h5 class="text-muted m-b-lg">Solusi pembelajaran <span class="label accent">Digital</span> Maper application</h5>
      <a href="#demos" ui-scroll-to="demos" class="btn btn-lg btn-outline b-primary text-primary b-2x">Lihat Materi</a>
    </div>
  </div>
</div>
<div class="p-y-lg" id="demos">
  <div class="container p-y-lg text-primary-hover">
    <h2 class=" _700 l-s-n-1x m-b-md">Materi <span class="text-primary">Terbaru</span></h2>
    <h5 class="text-muted m-b-lg">Pelajari Sekarang</h5>
    <div class="row m-y-lg">
      @foreach ($materi as $item)
        <div class="col-md-6 col-lg-4">
          <div class="box white box-shadow-z3 text-center">
              <a href="{{ route('landingpage.show', [$item->id]) }}">
                <video controls class="img-responsive b-b m-b" src="{{ asset('storage/'.$item->file_path) }}"></video>
                <span class="_800 p-a block h4 m-a-0">{{ $item->title }}</span>
              </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection