@extends('lawn.base')
@section('main')
<section class="lawn_title">
    <h2>Index of posts</h2>
</section>
<section class="lawn_index">
    <div class="lawn_table">
        <table>
            <thead>
                <tr>
                    <th>title</th>
        <th>contents</th>
        <th>like</th>
        <th>published_at</th>
        
                </tr>
            </thead>
            <tbody>
                @foreach
                    <tr>
                        <td>{{ $post->title }}</td>
        <td>{{ $post->contents }}</td>
        <td>{{ $post->like }}</td>
        <td>{{ $post->published_at }}</td>
        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="lawn_paginate">
            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection
