@extends('Components.layout')
@section('content')
<link href="/app.css" rel="stylesheet" />
<form action="/posts/create" method="post">
    @csrf
    <div class="form-group">
        <label for="post-title">Post Title:</label>
        <input name="title" class="form-control" id="post-title" type="text" placeholder="Post title ..." />
    </div>

<div class="form-group">
        <label for="post-title">Post Description:</label>
        <input name="description" class="form-control" id="post-title" type="text" placeholder="Post description ..." />
    </div>
    <div class="form-group">
        <label for="select-category">Select Category:</label>
        <select name="category_id" class="form-control" id="select-category">
            @php
                $categories = \App\Models\Category::all();
            @endphp
            @foreach ($categories as $category )
            {
                <option value="{{$category->id}}">{{ $category->name }} </option>
            }
                
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary mr-2 my-1" type="submit">Submit now</button>
</form>
@endsection