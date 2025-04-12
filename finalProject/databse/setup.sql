-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS fittrack_db;

-- Use the database
USE fittrack_db;

-- Create the feedback table
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    age INT,
    gender VARCHAR(10),
    city VARCHAR(50),
    experience_level VARCHAR(20) NOT NULL,
    fitness_goals TEXT,
    programs_used VARCHAR(255) NOT NULL,
    feedback_text TEXT NOT NULL,
    submission_date DATETIME NOT NULL,
    INDEX (email)
);

-- Create the exercise_categories table
CREATE TABLE IF NOT EXISTS exercise_categories (
    category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(50) NOT NULL,
    description TEXT,
    image_path VARCHAR(255)
);

-- Create the exercises table with a foreign key to categories
CREATE TABLE IF NOT EXISTS exercises (
    exercise_id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    exercise_name VARCHAR(100) NOT NULL,
    description TEXT,
    difficulty_level VARCHAR(20) NOT NULL,
    instructions TEXT,
    benefits TEXT,
    target_muscles TEXT,
    image_path VARCHAR(255),
    video_path VARCHAR(255),
    FOREIGN KEY (category_id) REFERENCES exercise_categories(category_id)
);

-- Insert sample data into exercise_categories
INSERT INTO exercise_categories (category_name, description, image_path) VALUES
('Strength', 'Exercises focused on building muscle and increasing strength.', '/images/categories/strength.jpg'),
('Cardio', 'Exercises designed to elevate heart rate and improve cardiovascular health.', '/images/categories/cardio.jpg'),
('Flexibility', 'Exercises that improve range of motion and muscle elasticity.', '/images/categories/flexibility.jpg'),
('Balance', 'Exercises that improve stability and body control.', '/images/categories/balance.jpg'),
('Core', 'Exercises focused on strengthening the abdominal and lower back muscles.', '/images/categories/core.jpg');

-- Insert sample data into exercises
INSERT INTO exercises (category_id, exercise_name, description, difficulty_level, instructions, benefits, target_muscles, image_path, video_path) VALUES
(1, 'Squat', 'A compound exercise that works multiple muscle groups in the lower body.', 'Beginner', 'Stand with feet shoulder-width apart. Lower your body as if sitting in a chair. Keep chest up and knees tracking over toes. Return to standing position.', 'Builds lower body strength, improves mobility, increases calorie burn.', 'Quadriceps, Hamstrings, Glutes, Core', '/images/exercises/squat.jpg', '/videos/squat.mp4'),

(1, 'Push-up', 'A bodyweight exercise that targets the chest, shoulders, and triceps.', 'Intermediate', 'Start in a plank position with hands slightly wider than shoulder-width apart. Lower your body until your chest nearly touches the floor, then push back up.', 'Builds upper body strength, improves core stability, requires no equipment.', 'Chest, Shoulders, Triceps, Core', '/images/exercises/pushup.jpg', '/videos/pushup.mp4'),

(1, 'Deadlift', 'A compound exercise that works the entire posterior chain.', 'Advanced', 'Stand with feet hip-width apart, barbell over midfoot. Hinge at hips, grab bar with shoulder-width grip. Keep back flat, lift bar by extending hips and knees.', 'Develops overall strength, improves posture, increases bone density.', 'Hamstrings, Glutes, Lower Back, Traps', '/images/exercises/deadlift.jpg', '/videos/deadlift.mp4'),

(2, 'Running', 'A high-impact cardiovascular exercise.', 'Beginner', 'Start with a warm-up walk. Maintain good posture with slight forward lean. Land midfoot with short strides. Gradually increase duration and intensity.', 'Improves cardiovascular health, burns calories, reduces stress.', 'Quadriceps, Hamstrings, Calves, Core', '/images/exercises/running.jpg', '/videos/running.mp4'),

(2, 'Jumping Jacks', 'A full-body cardio exercise.', 'Beginner', 'Stand with feet together and arms at sides. Jump while spreading legs and raising arms above head. Return to starting position in one fluid motion.', 'Elevates heart rate quickly, works multiple muscle groups, improves coordination.', 'Full Body', '/images/exercises/jumping_jacks.jpg', '/videos/jumping_jacks.mp4'),

(3, 'Hamstring Stretch', 'A static stretch for the back of the thighs.', 'Beginner', 'Sit on the floor with one leg extended and the other bent. Reach toward toes of extended leg while keeping back straight.', 'Improves flexibility, prevents injury, reduces muscle tension.', 'Hamstrings, Lower Back', '/images/exercises/hamstring_stretch.jpg', '/videos/hamstring_stretch.mp4'),

(3, 'Cobra Pose', 'A yoga pose that stretches the front of the body.', 'Beginner', 'Lie face down with hands under shoulders. Press up, lifting chest while keeping hips on the floor. Keep slight bend in elbows.', 'Improves spine flexibility, opens chest, strengthens back muscles.', 'Chest, Shoulders, Abdominals', '/images/exercises/cobra.jpg', '/videos/cobra.mp4'),

(4, 'Single-Leg Stand', 'A simple balance exercise.', 'Beginner', 'Stand on one foot, lifting other foot off the ground. Hold position, using light support if needed. Try to maintain posture and minimize wobbling.', 'Improves stability, strengthens ankle and knee joints, enhances proprioception.', 'Ankles, Core, Hip Stabilizers', '/images/exercises/single_leg_stand.jpg', '/videos/single_leg_stand.mp4'),

(5, 'Plank', 'An isometric core exercise.', 'Intermediate', 'Begin in push-up position but with weight on forearms. Keep body in straight line from head to heels. Engage core and hold position.', 'Strengthens core, improves posture, builds endurance.', 'Abdominals, Lower Back, Shoulders', '/images/exercises/plank.jpg', '/videos/plank.mp4'),

(5, 'Bicycle Crunch', 'A dynamic core exercise.', 'Intermediate', 'Lie on back with hands behind head. Lift shoulders off ground and bring opposite elbow to knee while extending other leg. Alternate sides in pedaling motion.', 'Targets multiple abdominal muscles, improves coordination, builds core strength.', 'Rectus Abdominis, Obliques', '/images/exercises/bicycle_crunch.jpg', '/videos/bicycle_crunch.mp4');