<?php
// Database connection parameters
$host = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "fittrack_db";

// Function to validate email format
function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Initialize error message
$errorMessage = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize and validate required fields
    $firstName = isset($_POST['firstName']) ? sanitizeInput($_POST['firstName']) : '';
    $lastName = isset($_POST['lastName']) ? sanitizeInput($_POST['lastName']) : '';
    $email = isset($_POST['email']) ? sanitizeInput($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitizeInput($_POST['phone']) : '';
    $age = isset($_POST['age']) ? sanitizeInput($_POST['age']) : '';
    $gender = isset($_POST['gender']) ? sanitizeInput($_POST['gender']) : '';
    $city = isset($_POST['city']) ? sanitizeInput($_POST['city']) : '';
    $experienceLevel = isset($_POST['experienceLevel']) ? sanitizeInput($_POST['experienceLevel']) : '';
    $programsUsed = isset($_POST['programsUsed']) ? sanitizeInput($_POST['programsUsed']) : '';
    $feedback = isset($_POST['feedback']) ? sanitizeInput($_POST['feedback']) : '';
    
    // Handle fitness goals array
    $fitnessGoals = isset($_POST['fitnessGoals']) ? $_POST['fitnessGoals'] : array();
    $fitnessGoalsStr = implode(", ", array_map('sanitizeInput', $fitnessGoals));
    
    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($experienceLevel) || empty($programsUsed) || empty($feedback)) {
        $errorMessage = "All required fields must be filled out";
    }
    // Validate email format
    elseif (!isValidEmail($email)) {
        $errorMessage = "Invalid email format";
    }
    // Validate age if provided
    elseif (!empty($age) && (!is_numeric($age) || $age < 10 || $age > 120)) {
        $errorMessage = "Age must be between 10 and 120";
    }
    
    // If no validation errors, proceed with database operations
    if (empty($errorMessage)) {
        try {
            // Create connection
            $conn = new mysqli($host, $username, $password, $database);
            
            // Check connection
            if ($conn->connect_error) {
                throw new Exception("Connection failed: " . $conn->connect_error);
            }
            
            // Check if email already exists in the database
            $stmt = $conn->prepare("SELECT email FROM feedback WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                // Email already exists, send error message
                $errorMessage = "You have already submitted feedback. Thank you for your contribution!";
            } else {
                // Email doesn't exist, insert new feedback
                $stmt = $conn->prepare("INSERT INTO feedback (first_name, last_name, email, phone, age, gender, city, experience_level, fitness_goals, programs_used, feedback_text, submission_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                
                $stmt->bind_param("ssssissssss", 
                    $firstName, 
                    $lastName, 
                    $email, 
                    $phone, 
                    $age, 
                    $gender, 
                    $city, 
                    $experienceLevel, 
                    $fitnessGoalsStr, 
                    $programsUsed, 
                    $feedback
                );
                
                if ($stmt->execute()) {
                    // Redirect with success message
                    header("Location: feedback.php?success=1");
                    exit();
                } else {
                    throw new Exception("Error inserting data: " . $stmt->error);
                }
            }
            
            // Close connection
            $stmt->close();
            $conn->close();
            
        } catch (Exception $e) {
            $errorMessage = "Database error: " . $e->getMessage();
        }
    }
    
    // If there's an error, redirect back to the form with the error message
    if (!empty($errorMessage)) {
        header("Location: feedback.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    // Not a POST request, redirect to the form
    header("Location: feedback.php");
    exit();
}
?>