<style>


    /* 
    :root {
        --color-primary: #1C2434;
        --color-secondary: #333A48;

        --color-background-primary: #ffffff;
        --color-background-secondary: #f1f5f9;

        --color-text-primary: #dee4ee;
        --color-text-primary-title: #ffffff;
        --color-text-primary-muted: #8399AF;

        --color-text-secondary: #1C2434;
        --color-text-secondary-title: #475569;
        --color-text-secondary-muted: #6b7280;
        --color-text-button: #ffffff;

        --color-button-accent: #3C50E0;
        --color-button-accent-hover: #4f61e3;
        --color-button-succes: #10B981;
        --color-button-succes-hover: #27C08D;
        --color-button-dark : #1C2434;
        --color-button-dark-hover: #323948;

        --color-button-muted: #c37d7d;

        --color-border-input: #cbd5e1;
    } */

    :root {
        --primary-background-color: #1C2434;
        --secondary-background-color: #DEE4EE;
        --custom-background-light: white;

        --primary-text-color: #1C2434;
        --secondary-text-color: #475569;
        --custom-text-light: white;

        --primary-button-color: #3C50E0;
        --primary-button-hover-color: #4f61e3;
        --secondary-button-color: #10B981;
        --secondary-button-hover-color: #27C08D;
        --dark-button-color: #1C2434;
        --dark-button-hover-color: #323948;

        --primary-border-color: #E8EAED;

        --tablet-breaking-point: 678px;
        --pc-breaking-point: 1024px;
    }    
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

    /* general */

    .main-title {
        padding-bottom: 24px;
        color: var(--primary-text-color);
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 24px;
    }

    .main-text {
        color: var(--secondary-text-color);
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .red-text {
        color: red;    
    }

    .main-link-text {
        color: var(--primary-button-color ) 
    }

    .main-form {
        width: 100%;
    }

    .main-form-group {
        display: flex;
        flex-direction: column;
    }

    .main-label {
        color: var(--secondary-text-color);
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 16px;
        margin-top: 10px;
    }

    .main-input {
        font-size: 16px;
        color: black;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        padding: 9px 6px;
        border-radius: 6px;
        margin: 10px 0;
        border: 1px solid var(--primary-border-color);
    }

    .main-input:hover {
        border: 1px solid var(--primary-button-color)
    }

    /* Fix the focus on innputs */

    .main-input:focus {
        outline: none;
    }


    /* main card */
    .main-card-list {
        display: flex;
        gap: 24px;
        flex-wrap: wrap;
    }

    .main-card {
        width: 50%;
        max-width: 400px;
        min-width: 300px;
        min-height: 150px;
        background-color: white;
        padding: 16px;
        border-radius: 6px;
        box-shadow: 3px 3px 5px 1px var(--primary-background-color);
    }

    .main-card:hover {
        background-color: beige;
        transform: scale(1.05);
        transition: 1s;
    }


    /* main buttons */

    .main-btn {
        background-color: var(--primary-button-color);
        padding: 9px 0;
        border-radius: 6px;
        border: 1px solid var(--primary-button-color);
        color: var(--custom-text-light);
        margin: 9px 0;
        cursor: pointer;
    }

    .main-btn a {
        color: var(--custom-text-light);
    }

    .main-btn:hover {
        background-color: var(--primary-button-hover-color);
    }

    .main-icon {
        display: block;
        width: 24px;
    }

    .delete-btn {
        background-color: red;
        border: 1px solid red;
        padding: 6px 12px;
    }

    .delete-btn:hover {
        background-color: white;
        color: red;
        border: 1px solid red;
        padding: 6px 12px;
    }

    .add-btn {
        padding: 12px;
    }

    .send-btn {
        border: solid 1px var(--secondary-button-color);
        background-color: var(--secondary-button-color);
        padding: 12px;
    }

    .send-btn:hover {
        background-color: var(--secondary-button-hover-color);
    }

    .del-btn,
    .move-btn {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .yes-btn {
        background-color: var(--primary-button-color);
        border: 1px solid var(--primary-button-color);
    }

    .yes-btn:hover {
        background-color: var(--custom-background-light);
        color: var(--primary-button-color);
    }

    .no-btn {
        background-color: red;
        border: 1px solid red;
    }

    .no-btn:hover {
        background-color: var(--custom-background-light);
        color: red;
    }

    .close-btn {
        float: right;
        align-self: flex-end;
        background-color: red;
        border: 1px solid red;
    }

    .close-btn:hover {
        background-color: var(--custom-background-light);
        color: red;
    }

    .add-icon {
        color: green;
    }

    .add-icon:hover {
        color: white;
        background-color: green;
        border-radius: 6px;
    }

    .edit-icon {
        color: blue;
    }

    .edit-icon:hover {
        color: white;
        background-color: blue;
        border-radius: 6px;
    }

    .del-icon {
        color: red;
    }

    .del-icon:hover {
        color: white;
        background-color: red;
        border-radius: 6px;
    }

    .main-table {
        margin: 12px 0;
        width: 100%;
        background-color: var(--custom-background-light);
        padding: 24px;
    }

    .main-thead,
    .main-tbody {
        width: 100%;
    }

    thead.main-thead .main-tr {
        border-bottom: var(--primary-border-color) solid 1px;
        padding-bottom: 12px;
    }

    .main-tr {
        display: grid;
        grid-template-columns: 1fr 1fr auto;
    }

    .fourth-tr {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
    }

    .main-th {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 21px;
        font-weight: bold;
        text-align: start;
    }

    .main-td {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 18px;
        text-align: start;
        padding: 14px 0;
        color: var(--secondary-text-color);
    }

    .main-tbody td:first-child a {
        color: blue;
    } 

    .main-tbody td:last-child {
        display: flex;
        gap: 16px;
    }


    /* show */

    .main-show {
        background-color: var(--custom-background-light);
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 12px;
        border-radius: 6px;
    }

    /* modal */

    .main-modal {
        position: fixed;
        background-color: rgba(0, 0, 0, 0.7);
        inset: 0;
    }

    .modal-content {
        position: fixed;
        background-color: var(--custom-background-light);
        border-radius: 12px;
        margin: auto;
        /* width: 30%; */
        max-width: 500px;
        max-height: 500px;
        inset: 0;
    }
    
    .modal-header {
        display: flex;
        justify-content: flex-end;
        background-color: var(--primary-background-color);
        border-radius: 12px 12px 0 0;
        padding: 0 12px;
    }
    
    .modal-content .modal-body {
        overflow-y: scroll;
        width: 100%;
        max-height: 420px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .modal-content .question-btns {
        display: flex;
    }

    .modal-content button {
        width: 70px;
    }

    /* .modal-content.invisible {
        display: none;
    } */

    .modal-title,
    .modal-text {
        text-align: center;
    }

    .add-modal .modal-content,
    .edit-modal .modal-content {
        width: 50%;
        max-width: 600px;
    }

    .add-modal form,
    .edit-modal form {
        width: 100%
    }

    .add-modal form button,
    .edit-modal form button{
        width: 100%
    }


    .primary-title {
        font-size: 16px;
    }

</style>