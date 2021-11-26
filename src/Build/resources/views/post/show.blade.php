@extends('lawn.base')
@section('main')
<section class="lawn_title">
    <h2>Info of Post</h2>
</section>
<section class="lawn_show">
    <div class="lawn_info">
        <dl>
            
            <dt>title</dt>
            <dd>{{ $post->title }}</dd>
        
            <dt>contents</dt>
            <dd>{{ $post->contents }}</dd>
        
            <dt>like</dt>
            <dd>{{ $post->like }}</dd>
        
            <dt>published_at</dt>
            <dd>{{ $post->published_at }}</dd>
        
        </dl>
    </div>
</section>

@endsection
