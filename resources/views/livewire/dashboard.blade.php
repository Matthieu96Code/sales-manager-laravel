<div>
    @if (Auth::user()->role === 0)
        <p>
            Your account is unactivated
        </p>
    @endif
</div>
