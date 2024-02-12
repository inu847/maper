@extends('layouts.front')

@section('title')
    Selamat Datang 
@endsection

@section('content')
<div class="p-y-lg" id="demos">
  <div class="container p-y-lg text-primary-hover">
    <h2 class=" _700 l-s-n-1x m-b-md">Materi <span class="text-primary">Terbaru</span></h2>
    <h5 class="text-muted m-b-lg">Pelajari Sekarang</h5>
    
    <h1>{{ $materi->title }}</h1>
    <video width="500" controls src="{{ asset('storage/'.$materi->file_path) }}"></video>
    <p>{!! $materi->description !!}</p>

  </div>
</div>
<div class="h-v white row-col">
  <div class="row-cell v-b">
    <div class="container p-y-lg pos-rlt">
      <h1 class="display-3 _700 l-s-n-3x m-t-lg m-b-md">Selamat Datang <span class="text-primary">di</span> Maper</h1>
      <h5 class="text-muted m-b-lg">Solusi pembelajaran <span class="label accent">Digital</span> Maper application</h5>
      <a href="#demos" ui-scroll-to="demos" class="btn btn-lg btn-outline b-primary text-primary b-2x">Lihat Materi</a>
    </div>
  </div>
</div>
@endsection