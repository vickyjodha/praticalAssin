@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('user') }}
                    <a href="{{route('user.create')}}" class="btn btn-primary btn-sm  float-right">
                        <b class="h4">+</b> Add
                    </a>
                </div>
                <div class="card-body">
                    @if($useres->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($useres as $user)
                            <tr>
                                <td>{{$user->fname.' '.$user->lname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <form action="{{ route('user.destroy',$user->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm  btn-danger">Delete</button>
                                    </form>
                                    <a href="{{route('user.edit',$user->id)}}" class="btn btn-sm btn-success ml-2">Edit</a>
                                    <a href="{{route('user.show',$user->id)}}" class="btn btn-sm btn-success ml-2">show</a>
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