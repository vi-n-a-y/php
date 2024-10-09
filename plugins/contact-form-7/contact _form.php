<div class="prayer-contact-form">
    <label for="your-name">Name</label>
    <span class="input-with-icon">
        [text* your-name class:form-control autocomplete:name]
        <i class="fa fa-user"></i> <!-- Font Awesome icon -->
    </span>

    <label for="your-email">Email</label>
    <span class="input-with-icon">
        [email* your-email class:form-control autocomplete:email]
        <i class="fa fa-envelope"></i> <!-- Font Awesome icon -->
    </span>

    <label for="your-subject">Subject</label>
    <span class="input-with-icon">
        [text* your-subject class:form-control]
    </span>

    <label for="your-message">Message</label>
    <span>
        [textarea* your-message class:form-textarea]
    </span>

    [submit class:form-submit "Submit"]
</div>



<style>


.prayer-contact-form {
    max-width: 600px; /* Set the width for the entire form container */
    margin: 0 auto; /* Center the form */
    padding: 20px;
    border: 2px solid #ccc; /* Add border to the container */
    border-radius: 8px;
    background-color: #f9f9f9;
}

.prayer-contact-form label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
}

.prayer-contact-form .input-with-icon {
    position: relative;
    margin-bottom: 20px; /* Add space between fields */
}

.prayer-contact-form input.form-control, 
.prayer-contact-form textarea.form-textarea {
    width: 100%; /* Ensure all input fields and text areas are the same width */
    padding-left: 40px; /* Padding to make space for the icons inside the inputs */
    padding-right: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Icon styling for name, email, and phone */
.prayer-contact-form .input-with-icon i {
    position: absolute;
    top: 50%;
    left: 10px;
    transform: translateY(-50%);
    color: #888; /* Icon color */
    font-size: 18px;
}

/* Adjust error messages to not interfere with the icon */
span.wpcf7-not-valid-tip {
    position: absolute;
    top: 100%;
    left: 0;
    font-size: 12px;
    color: red;
    display: block;
    margin-top: 5px;
}

/* Icon specific styles */
.prayer-contact-form .fa-user { left: 12px; }
.prayer-contact-form .fa-envelope { left: 12px; }
.prayer-contact-form .fa-phone { left: 12px; }

/* Submit button */
.prayer-contact-form .form-submit {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 12px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
}

.prayer-contact-form .form-submit:hover {
    background-color: #218838;
}


</style>