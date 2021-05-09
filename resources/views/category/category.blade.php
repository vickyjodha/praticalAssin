@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') }}
                    <a href="{{route('category.create')}}" class="btn btn-primary btn-sm  float-right">
                        <b class="h4">+</b> Add
                    </a>
                </div>

                <div class="card-body">
                    @if(!empty($categoryes))
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoryes as $category)
                            <tr>
                                <td>{{$category->title}}</td>
                                <td>{{$category->slug}}</td>
                                <td>@if($category->status==1) Active @else Inactive @endif</td>
                                <td>
                                    <form action="{{ route('category.destroy',$category->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-success ml-2">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <h1>no found</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection