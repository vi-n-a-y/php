function validateName() {
    const name = document.getElementById('name').value.trim();
    const nameError = document.getElementById('nameError');
    if (!name) {
        nameError.innerHTML = '<span class="error-icon"></span>Name is required.';
        return false;
    } else {
        nameError.textContent = '';
        return true;
    }
}

function validateLastName() {
    const lastName = document.getElementById('lastName').value.trim();
    const lastNameError = document.getElementById('lastNameError');
    if (!lastName) {
        lastNameError.innerHTML = '<span class="error-icon"></span>Last Name is required.';
        return false;
    } else {
        lastNameError.textContent = '';
        return true;
    }
}

function validateDob() {
    const dob = document.getElementById('dob').value;
    const dobDate = new Date(dob);
    const today = new Date();
    const dobError = document.getElementById('dobError');
    if (!dob || dobDate > today) {
        dobError.innerHTML = '<span class="error-icon"></span>Date of Birth is required and must not be in the future.';
        return false;
    } else {
        dobError.textContent = '';
        return true;
    }
}

function validateEmail() {
    const email = document.getElementById('email').value.trim();
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const emailError = document.getElementById('emailError');
    if (!email || !emailPattern.test(email)) {
        emailError.innerHTML = '<span class="error-icon"></span>Enter a valid email address.';
        return false;
    } else {
        emailError.textContent = '';
        return true;
    }
}

function validatePhoneNumber() {
    const phoneNumber = document.querySelector('input[name="number"]').value.trim();
    const phoneNumberPattern = /^\d+$/;
    const phoneError = document.getElementById('phoneError');

    if (phoneNumber.length!==10) {
        phoneError.innerHTML = '<span class="error-icon"></span>Phone must contain 10 digits.';
        return false;
    }
    if (!phoneNumber || !phoneNumberPattern.test(phoneNumber)) {
        phoneError.innerHTML = '<span class="error-icon"></span>Phone Number is required and must be numeric.';
        return false;
    } else {
        phoneError.textContent = '';
        return true;
    }
}

function validatePassword() {
    const password = document.getElementById('password').value;
    const passwordError = document.getElementById('passwordError');
    let errors = [];

    // Check for minimum length
    if (password.length < 6) {
        errors.push('Password must be at least 6 characters long.');
    }

    // Check for at least one uppercase letter
    if (!/[A-Z]/.test(password)) {
        errors.push('Password must contain at least one uppercase letter.');
    }

    // Check for at least one lowercase letter
    if (!/[a-z]/.test(password)) {
        errors.push('Password must contain at least one lowercase letter.');
    }

    // Check for at least one number
    if (!/[0-9]/.test(password)) {
        errors.push('Password must contain at least one number.');
    }

    // Check for at least one special character
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
        errors.push('Password must contain at least one special character.');
    }

    // Update the error message
    if (errors.length > 0) {
        passwordError.innerHTML = errors.map(error => `<span class="error-icon"></span>${error}`).join('<br>');
        return false;
    } else {
        passwordError.textContent = '';
        return true;
    }
}

function validateConfirmPassword() {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    if (password !== confirmPassword) {
        confirmPasswordError.innerHTML = '<span class="error-icon"></span>Passwords do not match.';
        return false;
    } else {
        confirmPasswordError.textContent = '';
        return true;
    }
}

function validateFile() {
    const fileInput = document.getElementById('file');
    const fileError = document.getElementById('fileError');
    if (fileInput.files.length === 0) {
        fileError.innerHTML = '<span class="error-icon"></span>File is required.';
        return false;
    } else {
        fileError.textContent = '';
        return true;
    }
}

function validateForm(event) {
    let isValid = true;
    // Perform validation on all fields
    isValid &= validateName();
    isValid &= validateLastName();
    isValid &= validateDob();
    isValid &= validateEmail();
    isValid &= validatePhoneNumber();
    isValid &= validatePassword();
    isValid &= validateConfirmPassword();
    isValid &= validateFile();

    if (!isValid) {
        event.preventDefault(); // Prevent form submission
    }
}

function addEventListeners() {
    // Add input event listeners for real-time validation
    document.getElementById('name').addEventListener('input', validateName);
    document.getElementById('lastName').addEventListener('input', validateLastName);
    document.getElementById('dob').addEventListener('input', validateDob);
    document.getElementById('email').addEventListener('input', validateEmail);
    document.querySelector('input[name="number"]').addEventListener('input', validatePhoneNumber);
    document.getElementById('password').addEventListener('input', validatePassword);
    document.getElementById('confirmPassword').addEventListener('input', validateConfirmPassword);
    document.getElementById('file').addEventListener('change', validateFile);

    // Form validation on submit
    document.getElementById('signup-form').addEventListener('submit', validateForm);

    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
        confirmPasswordInput.type = type;
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
}

// Initialize event listeners
addEventListeners();