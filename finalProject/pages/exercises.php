<!-- finalProject\pages\exercises.php -->
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<h2>Exercise Database</h2>

<p>Browse our comprehensive collection of exercises organized by category. Each exercise includes detailed instructions, benefits, and target muscle groups to help you get the most out of your workouts.</p>

<?php
// Database connection parameters
$host = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$database = "fittrack_db";

try {
    // Create connection
    $conn = new mysqli($host, $username, $password, $database);
    
    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }
    
    // Get the category filter if provided
    $categoryFilter = isset($_GET['category']) ? intval($_GET['category']) : 0;
    
    // Get the difficulty filter if provided
    $difficultyFilter = isset($_GET['difficulty']) ? $_GET['difficulty'] : '';
    
    // Get all categories for the filter dropdown
    $categoryQuery = "SELECT * FROM exercise_categories ORDER BY category_name";
    $categoryResult = $conn->query($categoryQuery);
    
    // Display filter options
    echo '<div class="filter-container">';
    echo '<form method="get" action="exercises.php" class="filter-form">';
    
    // Category filter dropdown
    echo '<div class="filter-group">';
    echo '<label for="category">Filter by Category:</label>';
    echo '<select name="category" id="category">';
    echo '<option value="0">All Categories</option>';
    
    while ($category = $categoryResult->fetch_assoc()) {
        $selected = ($categoryFilter == $category['category_id']) ? 'selected' : '';
        echo '<option value="' . $category['category_id'] . '" ' . $selected . '>' . $category['category_name'] . '</option>';
    }
    
    echo '</select>';
    echo '</div>';
    
    // Difficulty filter dropdown
    echo '<div class="filter-group">';
    echo '<label for="difficulty">Filter by Difficulty:</label>';
    echo '<select name="difficulty" id="difficulty">';
    echo '<option value="">All Levels</option>';
    
    $difficulties = ['Beginner', 'Intermediate', 'Advanced'];
    foreach ($difficulties as $difficulty) {
        $selected = ($difficultyFilter == $difficulty) ? 'selected' : '';
        echo '<option value="' . $difficulty . '" ' . $selected . '>' . $difficulty . '</option>';
    }
    
    echo '</select>';
    echo '</div>';
    
    echo '<button type="submit" class="filter-button">Apply Filters</button>';
    echo '</form>';
    echo '</div>';
    
    // Build the SQL query based on filters
    $sql = "SELECT e.*, c.category_name 
            FROM exercises e
            JOIN exercise_categories c ON e.category_id = c.category_id";
    
    $whereConditions = [];
    
    if ($categoryFilter > 0) {
        $whereConditions[] = "e.category_id = " . $categoryFilter;
    }
    
    if (!empty($difficultyFilter)) {
        $whereConditions[] = "e.difficulty_level = '" . $conn->real_escape_string($difficultyFilter) . "'";
    }
    
    if (!empty($whereConditions)) {
        $sql .= " WHERE " . implode(" AND ", $whereConditions);
    }
    
    $sql .= " ORDER BY c.category_name, e.exercise_name";
    
    // Execute the query
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Display exercise categories and exercises
        $currentCategory = '';
        
        echo '<div class="exercise-list">';
        
        while ($row = $result->fetch_assoc()) {
            // If we've moved to a new category, display the category header
            if ($currentCategory != $row['category_name']) {
                if ($currentCategory != '') {
                    echo '</div>'; // Close previous category div
                }
                
                $currentCategory = $row['category_name'];
                echo '<div class="exercise-category">';
                echo '<h3>' . $currentCategory . ' Exercises</h3>';
            }
            
            // Display exercise
            echo '<div class="exercise-card">';
            echo '<h4>' . $row['exercise_name'] . ' <span class="difficulty-badge ' . strtolower($row['difficulty_level']) . '">' . $row['difficulty_level'] . '</span></h4>';
            
            echo '<div class="exercise-details">';
            if (!empty($row['image_path'])) {
                echo '<div class="exercise-image">';
                echo '<img src="' . $row['image_path'] . '" alt="' . $row['exercise_name'] . '">';
                echo '</div>';
            }
            
            echo '<div class="exercise-info">';
            echo '<p>' . $row['description'] . '</p>';
            
            echo '<div class="exercise-instructions">';
            echo '<h5>Instructions:</h5>';
            echo '<p>' . $row['instructions'] . '</p>';
            echo '</div>';
            
            echo '<div class="exercise-benefits">';
            echo '<h5>Benefits:</h5>';
            echo '<p>' . $row['benefits'] . '</p>';
            echo '</div>';
            
            echo '<div class="exercise-muscles">';
            echo '<h5>Target Muscles:</h5>';
            echo '<p>' . $row['target_muscles'] . '</p>';
            echo '</div>';
            
            if (!empty($row['video_path'])) {
                echo '<div class="exercise-video-link">';
                echo '<a href="video.php?id=' . $row['exercise_id'] . '">Watch Video Demo</a>';
                echo '</div>';
            }
            
            echo '</div>'; // Close exercise-info
            echo '</div>'; // Close exercise-details
            echo '</div>'; // Close exercise-card
        }
        
        // Close the last category div
        if ($currentCategory != '') {
            echo '</div>';
        }
        
        echo '</div>'; // Close exercise-list
    } else {
        echo '<div class="no-results">No exercises found matching your criteria. Please try different filters.</div>';
    }
    
    // Close the database connection
    $conn->close();
    
} catch (Exception $e) {
    echo '<div class="error-message">Database error: ' . $e->getMessage() . '</div>';
}
?>

<div class="exercise-tips">
    <h3>Tips for Effective Workouts</h3>
    <ul>
        <li>Always warm up before starting your workout session</li>
        <li>Focus on proper form rather than lifting heavier weights</li>
        <li>Progress gradually to avoid injury and plateau</li>
        <li>Include exercises from different categories for a balanced routine</li>
        <li>Allow adequate rest between workout sessions for muscle recovery</li>
        <li>Stay hydrated before, during, and after your workout</li>
        <li>Listen to your body and avoid pushing through pain</li>
    </ul>
</div>

<?php include '../includes/footer.php'; ?>