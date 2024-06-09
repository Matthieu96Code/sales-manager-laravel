<div class="login-section">

    <h1 class="main-title login-title">Login</h1>

    <form class="main-form" wire:submit="loginUser" action="">

        <div class="main-form-group">
            <label class="main-label" for="">username</label>
            <input class="main-input" wire:model="name" type="text" placeholder="username">
            @error('name')
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

        <div wire:loading.delay class="main-form-group">
            <div class="loader"></div>
        </div>

        <div class="main-form-group">
            <button class="main-btn">login</button>
        </div>

        <div class="main-form-group">
            <p class="register-redirection">Don't have an account?<a class="main-link main-link-text resgister-link" href="{{ route('register') }}"> Register</a></p>
        </div>
    </form>
</div>
