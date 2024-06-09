<div class="dashboard-section">

    @if (Auth::user()->role === 1)
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
    @endif

    @if (Auth::user()->role === 0)
       <div class="guest-log">
         <p>
             Your account is unactivated
         </p>
         <p>
             In order to activate your account, please go to the profile section and click on the activate button.
             You will enter the provided registration code and your account will be activated.
         </p>
         <p>
             In case you have not received the registration code, please contact the administrator.
         </p>
       </div>
    @endif
</div>
