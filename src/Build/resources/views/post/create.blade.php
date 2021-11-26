@extends('lawn.base')
@section('main')
<section class="lawn_title">
    <h2>Create Post</h2>
</section>
<section class="lawn_form">
    <form method="post" action="{{ route('post.store') }}">
        @csrf
        
        <label>title
            <input type="text" name="title" value="{{ old("title")}}">
        @error("title")
            <div class="lawn_error">
                <p><strong>{{ $message }}</strong></p>
            </div>
        @enderror
        
        </label>
        <label>contents
            <textarea name="contents">{{ old("contents")}}</textarea>
        @error("contents")
            <div class="lawn_error">
                <p><strong>{{ $message }}</strong></p>
            </div>
        @enderror
        
        </label>
        
        <label>like
            <input type="text" name="like" value="{{ old("like")}}">
        @error("like")
            <div class="lawn_error">
                <p><strong>{{ $message }}</strong></p>
            </div>
        @enderror
        
        </label>
        <button type="submit" class="lawn_btn">Submit</button>
    </form>
</section>

@endsection
