@if(session('success'))
<div id="alert" class="alert">
    {{ session('success') }}
</div>
@endif