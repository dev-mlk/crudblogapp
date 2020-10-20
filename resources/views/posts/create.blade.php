@extends('layouts.dashboard')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Posts</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Post</li>
    </ol>
</nav>
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3"> Set a New Post</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @method('PATCH')
            @csrf
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <form method="post" action="{{ route('post-form') }}">
        <div class="form-group">
            <label>Post title</label>
            <input type="text" class="form-control" name="title" placeholder="Post caption">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label>Post content</label>
            <textarea class="form-control" name="content"  rows="10"></textarea>
        </div>
        <div class="form-group mt-2">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection