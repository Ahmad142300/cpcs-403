<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<h2>Personal Trainer Resume</h2>

<p>Our lead trainer has extensive experience and certification in fitness training. View the resume below to learn more about their qualifications and expertise.</p>

<div class="resume-container">
    <!-- Using object tag to embed PDF as required by project specs -->
    <object data="/documents/trainer-resume.pdf" type="application/pdf" width="100%" height="800px">
        <p>It appears your browser doesn't support embedded PDFs. You can <a href="/documents/trainer-resume.pdf">download the resume PDF here</a>.</p>
    </object>
</div>

<div class="trainer-qualifications">
    <h3>Certifications</h3>
    <ul>
        <li>National Academy of Sports Medicine (NASM) Certified Personal Trainer</li>
        <li>American Council on Exercise (ACE) Group Fitness Instructor</li>
        <li>Precision Nutrition Level 1 Coach</li>
        <li>TRX Suspension Training Specialist</li>
        <li>CPR/AED Certified</li>
    </ul>
    
    <h3>Specializations</h3>
    <ul>
        <li>Strength and Conditioning</li>
        <li>Weight Management</li>
        <li>Sports-Specific Training</li>
        <li>Functional Fitness</li>
        <li>Senior Fitness</li>
        <li>Post-Rehabilitation Exercise</li>
    </ul>
</div>

<?php include '../includes/footer.php'; ?>