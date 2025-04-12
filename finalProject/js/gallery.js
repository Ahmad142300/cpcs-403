document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const mainImage = document.getElementById('main-gallery-image');
    const exerciseTitle = document.getElementById('exercise-title');
    const exerciseDescription = document.getElementById('exercise-description');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const prevBtn = document.getElementById('prev-btn');
    const nextBtn = document.getElementById('next-btn');
    
    // Set current index
    let currentIndex = 0;
    const maxIndex = thumbnails.length - 1;
    
    // Function to update main image and description
    function updateMainImage(index) {
        // Get the selected thumbnail
        const selectedThumb = thumbnails[index].querySelector('img');
        
        // Update main image
        mainImage.src = selectedThumb.getAttribute('data-full');
        mainImage.alt = selectedThumb.alt;
        
        // Update title and description
        exerciseTitle.textContent = selectedThumb.getAttribute('data-title');
        exerciseDescription.textContent = selectedThumb.getAttribute('data-description');
        
        // Update current index
        currentIndex = index;
        
        // Highlight the current thumbnail
        thumbnails.forEach(thumb => {
            thumb.style.borderColor = '#ddd';
        });
        thumbnails[index].style.borderColor = '#e74c3c';
    }
    
    // Add click event to thumbnails
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            updateMainImage(index);
        });
    });
    
    // Add click event to previous button
    prevBtn.addEventListener('click', function() {
        let newIndex = currentIndex - 1;
        if (newIndex < 0) {
            newIndex = maxIndex; // Loop back to the last image
        }
        updateMainImage(newIndex);
    });
    
    // Add click event to next button
    nextBtn.addEventListener('click', function() {
        let newIndex = currentIndex + 1;
        if (newIndex > maxIndex) {
            newIndex = 0; // Loop back to the first image
        }
        updateMainImage(newIndex);
    });
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            prevBtn.click();
        } else if (e.key === 'ArrowRight') {
            nextBtn.click();
        }
    });
    
    // Initialize the gallery
    updateMainImage(0);
});