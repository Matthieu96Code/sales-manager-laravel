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
        --sidebar-background-color: #1C2434;
        --body-background-color: #DEE4EE;
        --sections-background-color: white;
        --table-header-color: #F9FAFB;
        
        --primary-text-color: #1C2434;
        --secondary-text-color: #475569;
        /* 647496 */
        --input-muted-text: #9CA3B2;
        --sidebar-menu-text: #DEE4EE;
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
        color: var(--primary-text-color);
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
        box-shadow: 3px 3px 5px 1px var(--sidebar-background-color);
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
        background-color: var(--sections-background-color);
        color: var(--primary-button-color);
    }

    .no-btn {
        background-color: red;
        border: 1px solid red;
    }

    .no-btn:hover {
        background-color: var(--sections-background-color);
        color: red;
    }

    .close-btn {
        float: right;
        align-self: flex-end;
        background-color: red;
        border: 1px solid red;
    }

    .close-btn:hover {
        background-color: var(--sections-background-color);
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

    .main-table-section {
        background-color: var(--sections-background-color);
        padding: 24px;
        border-radius: 3px;
        box-shadow: 1px 1px 5px var(--sidebar-background-color);
    }

    .main-table {
        margin: 12px 0;
        width: 100%;
        background-color: var(--sections-background-color);
        /* padding: 24px; */
    }

    .main-thead,
    .main-tbody {
        width: 100%;
    }

    .main-thead .main-tr {
        background-color: var(--table-header-color);
        padding: 24px;
        /* padding-bottom: 12px; */
    }

    .main-tbody .main-tr {
        padding: 0 24px;
    }

    .main-tr {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr auto;
        border-bottom: var(--primary-border-color) solid 1px;
    }

    .fourth-tr {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr auto;
    }

    .main-th {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 18px;
        font-weight: bold;
        text-align: start;
    }

    .main-table-sort-btn {
        display: flex;
        gap: 12px;
        align-items: center;
        border: none;
        background-color: transparent;
    }

    .main-table-title {
        
    }

    .main-table-sort-icon {
        width: 15px
    }

    .main-td {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 16px;
        text-align: start;
        padding: 9px 0;
        color: var(--secondary-text-color);
        margin: auto 0;
    }

    .main-tbody td:first-child a {
        color: blue;
    } 

    .main-tbody td:last-child {
        display: flex;
        gap: 16px;
    }

    /* Table Pagination */

    nav[role="navigation"] {
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;

        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 16px;
    }

    nav[role="navigation"] button {
        padding: 6px 12px;
        border-radius: 6px;
        border: 1px solid var(--primary-border-color);
        background-color: var(--sections-background-color);
        cursor: pointer;
    }

    /* show */

    .main-show {
        background-color: var(--sections-background-color);
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
        background-color: var(--sections-background-color);
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
        background-color: var(--table-header-color);
        border-radius: 12px 12px 0 0;
        padding: 0 12px;
        box-shadow: 1px 1px 3px var(--sidebar-background-color);
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