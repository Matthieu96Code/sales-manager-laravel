<style>
    /* Auth */  

    .auth-section {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background-color: var(--body-background-color);
    }

    .auth-section .auth-container {
        width: 100%;
        display: flex;
        gap: 16px;
        padding: 0 10%;
        height: 100%;
    }

    .auth-section .auth-layout {
        display: flex;
        flex-direction: column;
        display: none;
        background-color: var(--custom-text-light);
        width: 50%;
        padding: 40px;
    }

    .auth-section .auth-layout .auth-title,
    .auth-section .auth-layout .auth-text {
        text-align: center;
        padding-top: 20px;
    }

    /* Login *//* register */

    .auth-section .login-section,
    .auth-section .register-section {
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: var(--custom-text-light);
        width: 100%;
        padding: 40px;
    }

    .auth-section .register-redirection,
    .auth-section .login-redirection {
        text-align: center;
        color: var(--secondary-text-color);
    }

    @media (min-width: 678px) {

    }

    @media (min-width: 1024px) {
        
        .auth-section .auth-layout {
            display: block;
        }

        .auth-section .login-section,
        .auth-section .register-section {
            width: 50%;
        }
        
        .auth-section .auth-layout img {
            width: 100%;
        }

    }

</style>