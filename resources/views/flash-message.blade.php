@if(session()->has('success'))
    <div class="alert alert-success">{{ session()->get('success') }}</div>
@endif

@if(session()->has('user-verify'))
    <div class="alert alert-danger">Please, confirm your email</div>
@endif
