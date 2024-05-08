<style>

    svg.h-5.w-5 {
        display: none;
    }

    /* General */

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    li {
        list-style: none;
    }

    a {
        text-decoration: none;
        color: var(--secondary-text-color);
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    body {
        background-color: #f1f5f9;
    }

    .main-layout {
        display: grid;
        grid-template-columns: 1fr 4fr;
    }
    
    .sidebar {
        background-color: #1C2434;
        color: white;
        padding: 6px;
        min-height: 100vh;
        border-radius: 0px 12px 12px 0px 
    }
    
    .main-section {
        padding: 24px;
    }
    
    .navbar {
        display: flex;
        justify-content: flex-end;
        padding: 6px;
        background-color: #1C2434;
        border-radius: 6px;
        /* padding: 24px; */
    }

    .main-body {
        padding: 12px 0px; 
    }


</style>