@extends('layouts.app')
@section('content')
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">update your image </div>

                <div class="card-body" style="text-align:center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{route('home.update',Auth::user()->id)}}" enctype="multipart/form-data">
                    @CSRF
                    {{method_field('PATCH')}}
                    @if (Auth::user()->image)
                    <img src="{{asset('img/'.Auth::user()->image)}}" height="200px" width="200px" class="rounded-circle">
                    @endif
                    <img src="{{asset('img/about-03.jpg')}}" height="200px" width="200px" class="rounded-circle">
                    <input class="form-control" type="file" name="image"><br><br>
                    <button class="btn btn-primary">save</button>
                    <a class="btn btn-primary" href="{{url('/')}}">home page</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
