@if (session('success'))
    <div class="alert alert-success display-6 text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger display-6 text-center">
        {{ session('error') }}
    </div>
@endif
