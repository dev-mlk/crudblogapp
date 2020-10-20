
@extends('layouts.dashboard')

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
    </ol>
</nav>
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
    <form method="post" action="{{ route('edit-post') }}">
        <div class="form-group">
            <label>Post title</label>
            <input hidden value="{{$post->id}}" name="id" >
            <input type="text" class="form-control" name="title" placeholder="Post caption" value="{{ $post->title }}">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label>Post content</label>
            <textarea class="form-control" name="content"  rows="10">{{ $post->content }}</textarea>
        </div>
        <div class="form-group mt-2">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection