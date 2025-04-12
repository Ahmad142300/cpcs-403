document.addEventListener('DOMContentLoaded', function() {
    // Scramble and display email address
    displayEmail();
});

function displayEmail() {
    // Email parts scrambled to prevent scraping
    const emailUser = ['i', 'n', 'f', 'o'].reverse().join('');
    const emailDomain = ['f', 'i', 't', 't', 'r', 'a', 'c', 'k'].join('');
    const emailTLD = ['c', 'o', 'm'].join('');
    
    // Reassemble the email with additional obfuscation
    let scrambledEmail = '';
    
    // Add user part
    for (let i = 0; i < emailUser.length; i++) {
        scrambledEmail += emailUser.charAt(i);
    }
    
    // Add @ symbol
    scrambledEmail += String.fromCharCode(64);
    
    // Add domain part
    for (let i = 0; i < emailDomain.length; i++) {
        scrambledEmail += emailDomain.charAt(i);
    }
    
    // Add dot and TLD
    scrambledEmail += String.fromCharCode(46);
    for (let i = 0; i < emailTLD.length; i++) {
        scrambledEmail += emailTLD.charAt(i);
    }
    
    // Create a clickable mailto link
    const emailElement = document.getElementById('contact-email');
    if (emailElement) {
        // Create a mailto link element
        const emailLink = document.createElement('a');
        emailLink.href = 'mailto:' + scrambledEmail;
        emailLink.textContent = scrambledEmail;
        
        // Replace the placeholder text with the actual email link
        emailElement.innerHTML = '';
        emailElement.appendChild(emailLink);
    }
}