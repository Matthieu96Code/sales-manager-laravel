<div class="register-section">

    <h1 class="main-title register-title">Register</h1>

    <form class="main-form" wire:submit="create" action="">

        <div class="main-form-group">
            <label class="main-label" for="">username</label>
            <input class="main-input" wire:model="name" type="text" placeholder="username">
            @error('name')
                <span class="red-text">{{$message}}</span>
            @enderror
        </div>
        
        <div class="main-form-group">
            <label class="main-label" for="">email</label>
            <input class="main-input" wire:model="email" type="text" placeholder="email">
            @error('email')
                <span class="red-text">{{$message}}</span>
            @enderror
        </div>
        
        <div class="main-form-group">
            <label class="main-label" for="">password</label>
            <input class="main-input" wire:model="password" type="password" placeholder="password">
            @error('password')
                <span class="red-text">{{$message}}</span>
            @enderror
        </div>
        
        <div class="main-form-group">
            <label class="main-label" for="">confirm password</label>
            <input class="main-input" wire:model="password_confirmation" type="password" placeholder="confirm password">
            @error('password_confirmation')
                <span class="red-text">{{$message}}</span>
            @enderror
        </div>

        <div wire:loading.delay class="main-form-group">
            <div class="loader"></div>
        </div>

        <div class="main-form-group">
            <button class="main-btn">register</button>
        </div>

        <div class="main-form-group login-redirection">
            <p class="login-redirection">Already have an account? <a class="main-link main-link-text login-link" href="{{ route('login') }}">login</a></p>
        </div>
    </form>
</div>
