<style>
        
    /* home */

    .home-section {
        display: flex;
        flex-direction: column;
        gap: 40px;
    }

    .home-section .before-home-card {
        display: flex;
        flex-direction: column;
        gap: 24px;
        width: fit-content;
    }

    /* Project */

    .show-project-section {
        background-color: var(--custom-background-light);
        display: flex;
        flex-direction: column;
        gap: 12px;
        padding: 12px;
        border-radius: 6px;
    }

    /* Correction */

    .corrections-header-btns {
        display: flex;
        justify-content: space-between;
    }

    /* Message */

    .message-section {
        display: flex;
        flex-direction: column;
        height: calc(100vh - 150px);
    }

    .message-section .message-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .message-section .message-list {
        flex-grow: 1;
        overflow-y: scroll;
        scroll-behavior: smooth;
        scrollbar-width: none;
        display: flex;
        flex-direction: column;
        gap: 6px;
        align-items: end;
        margin-bottom: 12px;
    }

    .message-section .message-text-item {
        width: fit-content;
        background-color: var(--primary-background-color);
        padding: 9px;
        border-radius: 6px;
        color: var(--custom-text-light);
    }

    .message-form-group {
        /* width: 100%; */
        flex-direction: row;
        gap: 12px;
    }

    .message-form-group .write-message-form-group {
        flex-direction: row;
        flex-grow: 1;
        gap: 12px;
        background-color: white;
        border-radius: 50px;
        padding: 0 24px;
    }

    .message-form-group .message-text-input {
        flex-grow: 1;
        border: none;
    }

    .message-form-group .send-message-btn {
        border-radius: 50%;
        padding: 6px;
    }

    .message-section .add-message-form {
        position: relative;
    }


    .message-section .file-modal.invisible {
        display: none;
    }

    .message-section .file-modal {
        position: absolute;
        top: -80px;
        right: 20px;
    }

    /* img-modal */

    .edit-img-modal .modal-content {
        width: 500px;
        height: 600px;
    }

    .img-modal .modal-content form {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    input::file-selector-button {
        background-color: var(--primary-background-color);
        color: var(--custom-text-light);
        padding: 6px 12px;
        border-radius: 6px;
        cursor: pointer;
    }

    .edit-user-section {
        width: 100%;
        display: flex;
        gap: 30px;
        /* align-items: center; */
        justify-content: center;
    }

    .edit-user-section div {
        width: 80%;
    }

    @media (max-width: 768px) {
        
        .img-modal .modal-content {
            border: solid 1px green;
        }

        .edit-user-section {
            flex-direction: column;
        }

    }

    @media (max-width: 1024px) {
            

    }

</style>