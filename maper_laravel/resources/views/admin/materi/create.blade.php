@extends('layouts.admin')

@section('title')
Create Materi
@endsection

@section('breadcums')
<small><a href="#">Home</a> / <a href="{{ route('materi.index') }}">Materi</a> / <a href="{{ route('materi.create') }}">Create</a></small>
@endsection

@section('content')

<div class="padding">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header">
            <h2>Create Materi</h2>
            <small>Make HTML tables on smaller devices look awesome.</small>
          </div>
          <div class="box-divider m-0"></div>
          <div class="box-body">
            <form role="form" action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label for="file_path">File input</label>
                <input type="file" id="file_path" name="file_path" class="form-control">
              </div>
              <div class="box m-b-md form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="5" ui-jp="summernote"></textarea>
              </div>
              <div class="form-group">
                <label class="col-sm-2 form-control-label">Publish</label>
                <div class="col-sm-10">
                  <label class="ui-switch ui-switch-md info m-t-xs">
                    <input type="checkbox" checked="" name="type" class="has-value">
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