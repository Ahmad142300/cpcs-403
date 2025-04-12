<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<h2>Workout Tutorial Videos</h2>

<div class="video-container">
    <h3>Full Body HIIT Workout</h3>
    <p>This high-intensity interval training workout targets your entire body with no equipment needed. Perfect for burning calories and building strength in just 20 minutes.</p>
    
    <div class="video-player">
        <!-- Embed YouTube video using object tag as required -->
        <object width="800" height="450">
            <param name="movie" value="https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=0"></param>
            <param name="allowFullScreen" value="true"></param>
            <param name="allowscriptaccess" value="always"></param>
            <embed src="https://www.youtube.com/embed/YOUR_VIDEO_ID?autoplay=0" 
                   type="application/x-shockwave-flash" 
                   allowscriptaccess="always" 
                   allowfullscreen="true" 
                   width="800" 
                   height="450">
            </embed>
        </object>
        
        <!-- Note: In a real implementation, replace YOUR_VIDEO_ID with an actual YouTube video ID -->
        <!-- For modern browsers, this iframe alternative would also work, but the project requires object tag -->
        <!-- <iframe width="800" height="450" src="https://www.youtube.com/embed/YOUR_VIDEO_ID" frameborder="0" allowfullscreen></iframe> -->
    </div>
</div>

<div class="video-description">
    <h3>What You'll Learn in This Video</h3>
    <ul>
        <li>Proper form for bodyweight exercises</li>
        <li>How to adjust intensity based on your fitness level</li>
        <li>Effective interval timing for maximum calorie burn</li>
        <li>Modifications for beginners and advanced athletes</li>
        <li>Post-workout stretching routine</li>
    </ul>
    
    <h3>Workout Structure</h3>
    <ol>
        <li>Warm-up (2 minutes)</li>
        <li>Circuit 1: Lower Body Focus (5 minutes)</li>
        <li>Active Recovery (1 minute)</li>
        <li>Circuit 2: Upper Body Focus (5 minutes)</li>
        <li>Active Recovery (1 minute)</li>
        <li>Circuit 3: Core and Cardio (5 minutes)</li>
        <li>Cool Down and Stretch (3 minutes)</li>
    </ol>
</div>

<div class="more-videos">
    <h3>More Workout Videos Coming Soon</h3>
    <ul>
        <li>Beginner-Friendly Strength Training</li>
        <li>Core Workout for Defined Abs</li>
        <li>Mobility Training for Improved Flexibility</li>
        <li>Bodyweight Exercises for Home Workouts</li>
    </ul>
</div>

<?php include '../includes/footer.php'; ?>