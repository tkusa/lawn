@if (session('status'))
    <div class="flash alert alert-success">
        {{ session('status') }}
    </div>
@endif

@if (session('danger'))
    <div class="flash alert alert-danger">
        {{ session('danger') }}
    </div>
@endif
