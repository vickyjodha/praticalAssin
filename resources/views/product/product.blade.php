@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Product') }}
                    <a href="{{route('product.create')}}" class="btn btn-primary btn-sm  float-right">
                        <b class="h4">+</b> Add
                    </a>
                </div>
                <div class="card-body">
                    @if ($productes->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($productes as $product)
                            <tr>
                                <td><img src="{{asset('storage')}}/{{$product->image}}" class="rounded-circle border"></td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->slug}}</td>
                                <td>
                                    @foreach($product->categoryes as $category)
                                    {{$category->title}},
                                    @endforeach
                                </td>
                                <td>@if($product->status==1) Active @else Inactive @endif</td>
                                <td>@if($product->featured==1) Active @else Inactive @endif</td>
                                <td>
                                    <form action="{{ route('product.destroy',$product->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('product.edit',$product->id)}}" class="btn btn-sm btn-success ml-2">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h1 class="text-center text-danger">Empty</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection