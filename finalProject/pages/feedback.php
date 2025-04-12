<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<h2>Feedback Form</h2>

<p>We value your input! Please take a moment to share your thoughts, suggestions, or experiences with our fitness programs. Your feedback helps us improve our services.</p>

<?php
// Check if there's an error message from server-side validation
if(isset($_GET['error'])) {
    echo '<div class="error-message">' . htmlspecialchars($_GET['error']) . '</div>';
}

// Check if there's a success message
if(isset($_GET['success'])) {
    echo '<div class="success-message">Thank you for your feedback! We appreciate your input.</div>';
}
?>

<div class="form-container">
    <form id="feedbackForm" action="process_feedback.php" method="post" onsubmit="return validateForm()">
        <fieldset>
            <legend>Personal Information</legend>
            
            <div class="form-group">
                <label for="firstName">First Name: <span class="required">*</span></label>
                <input type="text" id="firstName" name="firstName">
                <div id="firstNameError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="lastName">Last Name: <span class="required">*</span></label>
                <input type="text" id="lastName" name="lastName">
                <div id="lastNameError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="email">Email Address: <span class="required">*</span></label>
                <input type="email" id="email" name="email">
                <div id="emailError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone">
                <div id="phoneError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" id="age" name="age">
                <div id="ageError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label>Gender:</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>
                    
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                    
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
                <div id="genderError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="city">City:</label>
                <select id="city" name="city">
                    <option value="">Select your city</option>
                    <option value="new york">New York</option>
                    <option value="los angeles">Los Angeles</option>
                    <option value="chicago">Chicago</option>
                    <option value="houston">Houston</option>
                    <option value="phoenix">Phoenix</option>
                    <option value="philadelphia">Philadelphia</option>
                    <option value="san antonio">San Antonio</option>
                    <option value="san diego">San Diego</option>
                    <option value="dallas">Dallas</option>
                    <option value="other">Other</option>
                </select>
                <div id="cityError" class="error"></div>
            </div>
        </fieldset>
        
        <fieldset>
            <legend>Fitness Information</legend>
            
            <div class="form-group">
                <label for="experienceLevel">Experience Level: <span class="required">*</span></label>
                <select id="experienceLevel" name="experienceLevel">
                    <option value="">Select your experience level</option>
                    <option value="beginner">Beginner</option>
                    <option value="intermediate">Intermediate</option>
                    <option value="advanced">Advanced</option>
                    <option value="professional">Professional</option>
                </select>
                <div id="experienceLevelError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label>Fitness Goals (check all that apply):</label>
                <div class="checkbox-group">
                    <input type="checkbox" id="goalStrength" name="fitnessGoals[]" value="strength">
                    <label for="goalStrength">Build Strength</label>
                    
                    <input type="checkbox" id="goalEndurance" name="fitnessGoals[]" value="endurance">
                    <label for="goalEndurance">Improve Endurance</label>
                    
                    <input type="checkbox" id="goalWeightLoss" name="fitnessGoals[]" value="weightLoss">
                    <label for="goalWeightLoss">Weight Loss</label>
                    
                    <input type="checkbox" id="goalFlexibility" name="fitnessGoals[]" value="flexibility">
                    <label for="goalFlexibility">Increase Flexibility</label>
                    
                    <input type="checkbox" id="goalHealth" name="fitnessGoals[]" value="health">
                    <label for="goalHealth">Overall Health</label>
                </div>
                <div id="fitnessGoalsError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="programsUsed">Programs Used: <span class="required">*</span></label>
                <input type="text" id="programsUsed" name="programsUsed" placeholder="e.g., Strength Builder, Cardio Crusher">
                <div id="programsUsedError" class="error"></div>
            </div>
            
            <div class="form-group">
                <label for="feedback">Your Feedback: <span class="required">*</span></label>
                <textarea id="feedback" name="feedback" rows="6" placeholder="Please share your thoughts, suggestions, or experiences with our programs..."></textarea>
                <div id="feedbackError" class="error"></div>
            </div>
        </fieldset>
        
        <div class="form-actions">
            <input type="submit" value="Submit Feedback">
            <input type="reset" value="Clear Form">
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>