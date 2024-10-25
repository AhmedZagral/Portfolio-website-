// Typewriter effect for the paragraph
document.addEventListener("DOMContentLoaded", function() {
    const textElement = document.getElementById('typewriter-text');
    const text = textElement.textContent;
    let index = 0;
    textElement.textContent = ''; // Clear the text

    function typeWriter() {
        if (index < text.length) {
            textElement.textContent += text.charAt(index);
            index++;
            setTimeout(typeWriter, 100); // Adjust the speed (milliseconds)
        }
    }
    typeWriter();
});
