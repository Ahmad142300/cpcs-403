// Function to validate email format
function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}

// Function to validate phone number format
function isValidPhone(phone) {
    // Accept formats like (123) 456-7890, 123-456-7890, 123.456.7890, 1234567890
    const phonePattern = /^(\+\d{1,2}\s?)?(\(\d{3}\)|\d{3})[\s.-]?\d{3}[\s.-]?\d{4}$/;
    return phone === '' || phonePattern.test(phone); // Optional field
}

// Function to validate age as a number between 10 and 120
function isValidAge(age) {
    if (age === '') return true; // Optional field
    const ageNum = parseInt(age);
    return !isNaN(ageNum) && ageNum >= 10 && ageNum <= 120;
}

// Function to reset all error messages
function resetErrors() {
    const errorElements = document.querySelectorAll('.error');
    errorElements.forEach(element => {
        element.textContent = '';
    });
}

// Main form validation function
function validateForm() {
    let isValid = true;
    resetErrors();
    
    // Get form elements
    const firstName = document.getElementById('firstName').value.trim();
    const lastName = document.getElementById('lastName').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const age = document.getElementById('age').value.trim();
    const genderElements = document.getElementsByName('gender');
    const city = document.getElementById('city').value;
    const experienceLevel = document.getElementById('experienceLevel').value;
    const fitnessGoalsElements = document.querySelectorAll('input[name="fitnessGoals[]"]:checked');
    const programsUsed = document.getElementById('programsUsed').value.trim();
    const feedback = document.getElementById('feedback').value.trim();
    
    // Validate first name (required)
    if (firstName === '') {
        document.getElementById('firstNameError').textContent = 'First name is required';
        isValid = false;
    } else if (firstName.length < 2) {
        document.getElementById('firstNameError').textContent = 'First name must be at least 2 characters';
        isValid = false;
    }
    
    // Validate last name (required)
    if (lastName === '') {
        document.getElementById('lastNameError').textContent = 'Last name is required';
        isValid = false;
    } else if (lastName.length < 2) {
        document.getElementById('lastNameError').textContent = 'Last name must be at least 2 characters';
        isValid = false;
    }
    
    // Validate email (required and format)
    if (email === '') {
        document.getElementById('emailError').textContent = 'Email address is required';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address';
        isValid = false;
    }
    
    // Validate phone (optional but format if provided)
    if (phone !== '' && !isValidPhone(phone)) {
        document.getElementById('phoneError').textContent = 'Please enter a valid phone number';
        isValid = false;
    }
    
    // Validate age (optional but range if provided)
    if (age !== '' && !isValidAge(age)) {
        document.getElementById('ageError').textContent = 'Age must be between 10 and 120';
        isValid = false;
    }
    
    // Validate gender (optional)
    let genderSelected = false;
    for (let i = 0; i < genderElements.length; i++) {
        if (genderElements[i].checked) {
            genderSelected = true;
            break;
        }
    }
    
    // Validate experience level (required)
    if (experienceLevel === '') {
        document.getElementById('experienceLevelError').textContent = 'Please select your experience level';
        isValid = false;
    }
    
    // Validate fitness goals (optional)
    // This is optional but we could enforce it if needed
    
    // Validate programs used (required)
    if (programsUsed === '') {
        document.getElementById('programsUsedError').textContent = 'Please enter the programs you have used';
        isValid = false;
    }
    
    // Validate feedback (required)
    if (feedback === '') {
        document.getElementById('feedbackError').textContent = 'Please provide your feedback';
        isValid = false;
    } else if (feedback.length < 10) {
        document.getElementById('feedbackError').textContent = 'Feedback must be at least 10 characters long';
        isValid = false;
    }
    
    // If the form is not valid, set focus to the first error field
    if (!isValid) {
        const firstErrorField = document.querySelector('.error:not(:empty)').parentNode.querySelector('input, select, textarea');
        if (firstErrorField) {
            firstErrorField.focus();
        }
    }
    
    return isValid;
}

// Add event listeners when the DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('feedbackForm');
    
    // Add input validation on blur for instant feedback
    document.getElementById('firstName').addEventListener('blur', function() {
        const value = this.value.trim();
        if (value === '') {
            document.getElementById('firstNameError').textContent = 'First name is required';
        } else if (value.length < 2) {
            document.getElementById('firstNameError').textContent = 'First name must be at least 2 characters';
        } else {
            document.getElementById('firstNameError').textContent = '';
        }
    });
    
    document.getElementById('lastName').addEventListener('blur', function() {
        const value = this.value.trim();
        if (value === '') {
            document.getElementById('lastNameError').textContent = 'Last name is required';
        } else if (value.length < 2) {
            document.getElementById('lastNameError').textContent = 'Last name must be at least 2 characters';
        } else {
            document.getElementById('lastNameError').textContent = '';
        }
    });
    
    document.getElementById('email').addEventListener('blur', function() {
        const value = this.value.trim();
        if (value === '') {
            document.getElementById('emailError').textContent = 'Email address is required';
        } else if (!isValidEmail(value)) {
            document.getElementById('emailError').textContent = 'Please enter a valid email address';
        } else {
            document.getElementById('emailError').textContent = '';
        }
    });
    
    document.getElementById('phone').addEventListener('blur', function() {
        const value = this.value.trim();
        if (value !== '' && !isValidPhone(value)) {
            document.getElementById('phoneError').textContent = 'Please enter a valid phone number';
        } else {
            document.getElementById('phoneError').textContent = '';
        }
    });
    
    document.getElementById('age').addEventListener('blur', function() {
        const value = this.value.trim();
        if (value !== '' && !isValidAge(value)) {
            document.getElementById('ageError').textContent = 'Age must be between 10 and 120';
        } else {
            document.getElementById('ageError').textContent = '';
        }
    });
});