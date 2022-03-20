@extends('master.index')
@section('content')
@section('title')
    | Posts Listing
@endsection

<div class="container">

    <div class="container">

        {{-- info panel content terbaik --}}
        <div class="row justify-content-center">
            <div class="info-panel col-12 ">
                <div class="row">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary"> Create Post </a>


                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        @foreach ($posts as $post)
            <div class="card mt-3">
                <div class="card-header text-center">
                    {{ $post->created_at }}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <div class="text-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary ">read more</a>
                    </div>
                    <div class="card-footer text-center mt-3">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="post" sty>
                            @csrf
                            <a href="{{ route('posts.show', $post->id) }}" title="View"
                                class="btn btn-sm btn-info">View </a>
                            <a href="{{ route('posts.edit', $post->id) }}" title="Edit"
                                class="btn btn-sm btn-success">Edit </a>
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');" title="Delete"
                                class="btn btn-sm btn-danger"> Delete </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
