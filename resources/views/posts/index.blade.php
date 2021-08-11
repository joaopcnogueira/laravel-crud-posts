@extends('layouts.app')

@section('content')

    <div id="header-container" class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('posts.create') }}" class="btn btn-sucess">Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('sucess'))
        <div class="alert alert-sucess">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>  
                    <td>{{ $post->description }}</td> 
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>         
                </tr>
            @endforeach
        </tbody>

    </table>
    
@endsection