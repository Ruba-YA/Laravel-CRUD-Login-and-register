@extends('Components.layout')
@section('content')
<link href="/app.css" rel="stylesheet" />
<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="/posts/create">Create Post<i class="fas fa-arrow-right ml-1"></i></a>
<a class="btn-teal btn rounded-pill px-4 ml-lg-4" href="/posts/index">All Post<i class="fas fa-arrow-right ml-1"></i></a>
<table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Descrption</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tfoot>
        </tr>
    </tfoot>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>
                <a href="#">{{ $post->title }}.</a>
            </td>
            <td>{{ $post->description }}</td>
            <td>
            <a href="/posts/edit/{{$post->id}}" >   <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button></a>
            </td>
            <td>
                <form action="/posts/delete/{{ $post->id }}">
                    <button type="submit">Delete</button>
                </form>
                {{--  <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>  --}}
            </td>
        </tr>
@endforeach
    </tbody>
</table>
@endsection
