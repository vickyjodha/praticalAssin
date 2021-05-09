@extends('layouts.app')
@section('style')
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product') }}</div>
                <div class="card-body">
                    <form action="{{isset($product)?route('product.update',$product->id):route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($product))
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{$product->title??''}}" class="form-control @error('title') is-invalid @enderror" placeholder="title">
                        </div>
                        <label for="image">Gallery</label>
                        <div class="custom-file mb-3 form-group">
                            <input type="file" name="gallery" value="{{$product->gallery??''}}" class="custom-file-input @error('gallery') is-invalid @enderror">
                            <label class="custom-file-label" for="gallery">{{$product->gallery??'Choose file...'}}</label>
                        </div>
                        <div class="form-group">
                            <label for="categorie_id">Category</label>
                            <select name="categories[]" class="form-control multiple @error('categories') is-invalid @enderror" multiple="multiple">
                                @foreach($categories as $category)
                                <option value="{{$category->id}}" @if(isset($product)) @if($product->hascategory($category->id))
                                    selected
                                    @endif
                                    @endif>
                                    {{$category->title}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <label for="image">Image</label>
                        <div class="custom-file mb-3 form-group">
                            <input type="file" name="image" value="{{$product->image??''}}" class="custom-file-input @error('image') is-invalid @enderror">
                            <label class="custom-file-label" for="image">{{$product->image??'Choose file...'}}</label>
                        </div>

                        <div class="form-group">
                            <label><strong>Description :</strong></label>
                            <textarea class="summernote" name="description">@if(isset($product)){!!$product->description !!} @endif</textarea>
                        </div>
                        <div class=" form-group form-check">
                            <input type="checkbox" class="form-check-input switch-input @error('status') is-invalid @enderror" value="1" name="status" @if(isset($product)) {{($product->status=="1") ? 'checked' :''}} @endif>
                            <label class="form-check-label" for="status">status</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input switch-input @error('featured') is-invalid @enderror" value="1" name="featured" @if(isset($product)) {{($product->featured=="1") ? 'checked' :''}} @endif>
                            <label class="form-check-label" for="featured">featured</label>
                        </div>
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('product.index')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.summernote').summernote();
    });
</script>
@endsection