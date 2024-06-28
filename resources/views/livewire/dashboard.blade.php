<div class="dashboard-section">

    @if (Auth::user()->role > 0)
        <div class="auth-log">
            <p>
                Welcome to the dashboard
            </p>
            <p>
                You are logged in as an administrator
            </p>
            <p>
                You have full access to the system
            </p>
        </div>

        <div>
            <canvas id="myChart"></canvas>
        </div>

    @endif

    @if (Auth::user()->role === 0)
        <div class="guest-log">
            <p class="red-text">Your account is unactivated</p>
            <br>

            <p class="red-text">
                In order to activate your account, please go to the profile section and click on the activate button.
                You will enter the provided registration code and your account will be activated.
            </p>
            <br>
            
            <p class="red-text">
                In case you have not received the registration code, please contact the administrator.
            </p>
        </div>
    @endif
</div>
