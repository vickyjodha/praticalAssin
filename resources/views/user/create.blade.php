@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User') }}</div>
                <div class="card-body">
                    <form action="{{isset($user)?route('user.update',$user->id):route('user.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($user))
                        @method('PUT')
                        @endif
                        <div class="form-group">
                            <label for="title">First Name</label>
                            <input type="text" name="fname" class="form-control @error('fname') is-invalid @enderror" value="{{$user->fname??''}}" aria-describedby="title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Last Name</label>
                            <input type="text" name="lname" class="form-control @error('lname') is-invalid @enderror" value="{{$user->lname??''}}" aria-describedby="title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email??''}}" aria-describedby="title" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Phone</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$user->phone??''}}" aria-describedby="title" required>
                        </div>
                        @if(empty($user))
                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group ">
                            <label for="password-confirm" class=" col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div> -->
                        @endif
                        <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                        <a href="{{route('user.index')}}" class="btn btn-success">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection