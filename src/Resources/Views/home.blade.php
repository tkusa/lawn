@extends('lawn.base')
@section('main')
    <section class="lawn_title">
        <h1>Lawn</h1>
    </section>
    <section>
        <h2>Welcome to Lawn!</h2>

        @foreach ($entities as $entity)
            <a href="{{ route('lawn.'.$entity.'.index') }}">{{ $entity }}</a>
        @endforeach
    </section>
@endsection
