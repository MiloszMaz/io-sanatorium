@if (session()->has('success'))
    <div class="center-box">
        <p class="text-success">{{ session('success') }}</p>
    </div>
@endif
