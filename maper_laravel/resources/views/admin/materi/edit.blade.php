@extends('layouts.admin')

@section('title')
Edit Materi
@endsection

@section('breadcums')
<small class="text-muted"><a href="#">Home</a> / <a href="{{ route('materi.index') }}">Materi</a> / <a href="{{ route('materi.edit', [$data->id]) }}">Edit</a> <a href="#" class="hidden"></a></small>
@endsection

@section('content')

<div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h2>Edit Materi</h2>
          </div>
          <div class="box-divider m-0"></div>
          <div class="box-body">
            <form role="form" action="{{ route('materi.update', [$data->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $data->title }}" placeholder="Enter title">
              </div>
              <video width="500" controls src="{{ asset('storage/'.$data->file_path) }}"> Your browser does not support the video tag. </video>
              <div class="form-group">
                <label for="file_path">File input</label>
                <input type="file" id="file_path" name="file_path" class="form-control">
              </div>
              <div class="box m-b-md form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" ui-jp="summernote">{{ $data->description }}</textarea>
              </div>
              <div class="form-group">
                <label class="col-sm-2 form-control-label">Publish</label>
                <div class="col-sm-10">
                  <label class="ui-switch ui-switch-md info m-t-xs">
                    <input type="checkbox" name="type" {{ ($data->type == 1) ? 'checked' : '' }} class="has-value">
                    <i></i>
                  </label>
                </div>
              </div>
              <button type="submit" class="btn white m-b">Submit</button>
            </form>
          </div>
        </div>
      </div>
  </div>
@endsection