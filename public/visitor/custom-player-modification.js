document.addEventListener("DOMContentLoaded", function() {
    // Wait for the player to fully load
    setTimeout(function() {
        // Custom logic to remove or modify elements
        var elements = document.querySelectorAll('.tt.tooltipstered');
        elements.forEach(function(element) {
            element.remove();
        });
    }, 0); // Adjust delay as needed
});
