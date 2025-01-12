<style>
    
    /* users-ection */
    .main-layout { 
        /* display: grid; */
        /* grid-template-columns: 1fr 4fr; */
        display: flex;
    }
    
    .sidebar {
        background-color: var(--sidebar-background-color);
        color: white;
        position: fixed;
        width: 21%;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        border-radius: 0px 12px 12px 0px;
        padding: 0 30px;
        min-height: 100vh;
    }
    
    .sidebar .profile-link {
        padding-top: 30px;
        display: flex;
        gap: 24px;
        margin-bottom: 50px;
        align-items: center;
    }

    .sidebar .profile-link .user-icon {
        width: 42px;
    }

    .sidebar .profile-link h1 {
        color: white;
    }

    .sidebar .menu-title {
        width: 8px;
    }

    .sidebar .menu-list {
        display: flex;
        flex-direction: column;
        gap: 25px;
        padding: 35px 0;
        flex-grow: 1;
    }

    .sidebar .menu-list-link {
        display: flex;
        gap: 16px;
        color: white;
    }

    .sidebar .logout-form {
        margin-bottom: 20px;
        flex-shrink: 1;
    }

    .sidebar .logout-form .logout-btn {
        display: flex;
        border: none;
        background-color: transparent;
        color: white;
        align-items: center;
        gap: 16px;
        cursor: pointer;
    }


    /* main content */

    .main-section {
        margin-left: 21%; 
        width: 79%;
        padding: 36px;
        min-height: 100vh;
    }
    
    .main-section .navbar {
        /* margin: 30px 0; */
        display: flex;
        justify-content: space-between;
        background-color: var(--sidebar-background-color);
        border-radius: 9px;
        padding: 9px 8%;
    }

    .main-body {
        padding: 24px 0px; 
    }

    @media (max-width: 768px) {

        .main-layout {
            flex-direction: column; 
            grid-template-rows: 1fr 4fr;
            grid-template-columns: 1fr;
        }

        .sidebar {
            display: grid;
            grid-template-columns: 1fr auto;
            width: 100%;
            color : white;
            padding: 0 30px;
            border-radius: 0;
            min-height: auto;
        }

        .sidebar .profile-link {
            height: 50px;
        }

        .sidebar .menu-title {
            display: none;
        }

        .sidebar .menu-list {
            border-top: 1px solid var(--body-background-color);
            flex-direction: row;
            overflow-x: scroll;
            scroll-behavior:smooth;
            grid-area: 2 / 1 / 3 / 3;
        }

        .sidebar .logout-form {
            grid-area: 1 / 2 / 1 / 2;
            display: flex;
        }   

        .sidebar .menu-list li  {
            text-wrap: nowrap;
            background-color: white;
            padding: 6px 12px;
            border-radius: 12px;
        }

        .sidebar .menu-list a  {
            text-wrap: nowrap;
            color: var(--primary-text-color);
        }

        .main-section {
            width: 100%;
            margin-left: 0;
            margin-top: 210px;
        }

    }

    @media (max-width: 1024px) {

    }

</style>