<!-- finalProject\pages\schedule.php -->
<?php include '../includes/header.php'; ?>
<?php include '../includes/navigation.php'; ?>

<h2>Weekly Workout Schedule</h2>

<div class="schedule-info">
    <p>This comprehensive training schedule is designed to help you achieve maximum results by balancing different workout types throughout the week. The schedule includes cardio, strength training, and flexibility work, ensuring a well-rounded fitness approach.</p>
    
    <p>Use the print button below to print just the schedule for easy reference during your workouts.</p>
    
    <button onclick="window.print();" class="print-button">Print Schedule</button>
</div>

<table class="schedule-table">
    <caption>FitTrack 7-Day Training Program</caption>
    <thead>
        <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
            <th colspan="2">Weekend</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td rowspan="2">Morning<br>(6am-8am)</td>
            <td class="cardio">Cardio Warm-up<br>20 min</td>
            <td class="rest">Rest or<br>Light Stretch</td>
            <td class="cardio">HIIT Session<br>30 min</td>
            <td class="rest">Rest or<br>Light Stretch</td>
            <td class="cardio">Endurance Run<br>45 min</td>
            <td class="flexibility">Yoga<br>60 min</td>
            <td class="rest" rowspan="4">Recovery Day<br><span class="beginner">Focus on proper<br>nutrition, hydration,<br>and rest</span></td>
        </tr>
        <tr>
            <td class="strength">Upper Body<br><span class="intermediate">Push exercises</span></td>
            <td class="strength">Lower Body<br><span class="intermediate">Squat focus</span></td>
            <td class="strength">Core Focus<br><span class="beginner">Basic movements</span></td>
            <td class="strength">Full Body<br><span class="intermediate">Compound moves</span></td>
            <td class="strength">Upper Body<br><span class="intermediate">Pull exercises</span></td>
            <td class="cardio">Outdoor Activity<br><span class="beginner">Hiking/Cycling</span></td>
        </tr>
        <tr>
            <td>Afternoon<br>(12pm-2pm)</td>
            <td class="rest">Rest Period</td>
            <td class="cardio">Light Cardio<br>20 min</td>
            <td class="rest">Rest Period</td>
            <td class="cardio">Interval Training<br>25 min</td>
            <td class="rest">Rest Period</td>
            <td colspan="1" rowspan="2" class="strength">Strength Circuit<br><span class="advanced">High intensity<br>Full body workout<br>45 min total</span></td>
        </tr>
        <tr>
            <td>Evening<br>(6pm-8pm)</td>
            <td class="flexibility">Stretching<br>15 min</td>
            <td class="flexibility">Mobility Work<br>20 min</td>
            <td class="flexibility">Foam Rolling<br>15 min</td>
            <td class="flexibility">Balance Work<br>20 min</td>
            <td class="cardio intense">High Intensity<br>Sprint Intervals<br>30 min</td>
        </tr>
        <tr>
            <td colspan="8"><strong>Notes:</strong> Adjust intensity based on your fitness level. Beginners should focus on proper form and may reduce duration. Advanced trainees may add additional sets or increase resistance.</td>
        </tr>
    </tbody>
</table>

<div class="schedule-details">
    <h3>Program Details</h3>
    
    <div class="workout-type">
        <h4>Cardio Training</h4>
        <p>Improves heart health, burns calories, and builds endurance. Includes activities like running, cycling, rowing, and high-intensity interval training (HIIT).</p>
    </div>
    
    <div class="workout-type">
        <h4>Strength Training</h4>
        <p>Builds muscle, increases metabolism, and enhances overall functional fitness. Focuses on resistance exercises using bodyweight, free weights, or machines.</p>
    </div>
    
    <div class="workout-type">
        <h4>Flexibility & Mobility</h4>
        <p>Improves range of motion, reduces injury risk, and enhances recovery. Includes stretching, yoga, foam rolling, and mobility exercises.</p>
    </div>
    
    <div class="workout-type">
        <h4>Recovery</h4>
        <p>Essential for muscle repair and growth. Includes rest days, light activity, proper nutrition, and adequate sleep.</p>
    </div>
</div>

<?php include '../includes/footer.php'; ?>