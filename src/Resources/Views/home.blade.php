@extends('lawn.base')
@section('main')
    <section class="lawn_title">
        <h1><img src="{{ asset('img/lawn/logo.png') }}" alt="logo"></h1>
        <h2>Welcome to Lawn!</h2>
    </section>
    <section class="lawn_color">
        <h2>Generated Entities</h2>
        <div class="info_box">
            <p>Lawn generated a ground cover for you. Check the result from here!</p>
        </div>
        <div class="center">
        @foreach ($entities as $entity)
            <a class="lawn_btn btn_white" href="{{ route('lawn.'.$entity.'.index') }}">{{ $entity }}</a>
        @endforeach
        </div>
    </section>
    <section>
        <h2>Documentation</h2>
        <div class="info_box">
            <p>For more details, check our repository!</p>
        </div>
        <a class="lawn_btn" href="https://github.com/tkusa/lawn">Github</a>
        <a class="lawn_btn" href="https://packagist.org/packages/tkusa/lawn">Packagist</a>
    </section>
@endsection
