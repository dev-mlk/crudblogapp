@extends('layouts.dashboard')

@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Posts list</li>
  </ol>
</nav>

<div class="row">
<p> {{ $message ?? '' }} </p>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Post title</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <th scope="row">#</th>
        <td> {{ $post->title }} </td>
        <td> {{ $post->content }} </td>
        <td>
          <a href="{{ route('edit-form', ['id' => $post->id]) }}">
            <button class="btn btn-sm btn-warning">
              edit
            </button>
          </a>
          <a href="{{ route('delete', ['id' => $post->id]) }}">
            <button class="btn btn-sm btn-danger">
              delete
            </button>
          </a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection