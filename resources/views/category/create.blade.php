@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}</div>
                <div class="card-body">
                    <form action="{{isset($category)?route('category.update',$category->id):route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($category))
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$category->title??''}}" aria-describedby="title" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input switch-input @error('status') is-invalid @enderror" value="1" name="status" @if(isset($category)) {{($category->status=="1") ? 'checked' :''}} @endif>
                            <label class="form-check-label" for="status">status</label>
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('category.index')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection