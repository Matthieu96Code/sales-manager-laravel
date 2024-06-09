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

        
    @keyframes pop-fade-in {
    from {transform: scale(0); opacity: 0;}
    to {transform: scale(1); opacity: 1;}
    }

    @keyframes loading {
    from {transform: rotate(0deg);}
    to {transform: rotate(360deg);}
    }

    /* Loader */

    .loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(50, 57, 72, 0.7);
    transition: opacity 0.75s, visibility 0.75s;
    }

    .loader--hidden {
    opacity: 0;
    visibility: hidden;
    }

    .loader::after {
    content: '';
    width: 75px;
    height: 75px;
    /* border: 15px solid var(--body-background-color); */
    border: 15px solid transparent;
    border-top-color: var(--body-background-color);
    border-radius: 50%;
    animation: loading 0.75s ease infinite;
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