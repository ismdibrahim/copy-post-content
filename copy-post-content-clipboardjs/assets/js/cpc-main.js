document.addEventListener('DOMContentLoaded', function() {

    // Check if the ClipboardJS library is loaded
    if (typeof ClipboardJS === 'undefined') {
        console.error('ClipboardJS is not loaded.');
        return;
    }
    // Initialize ClipboardJS
    var clipboard = new ClipboardJS('.cpc-button');

    clipboard.on('success', function(e) {

        // Show a success message
        alert('Text copied to clipboard!');

        // change the button text to "Copied!"
        var button = e.trigger;
        button.innerHTML = 'Copied!';

        // Clear the selection
        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        
        console.error('Action:', e.action);
        console.error('Trigger:', e.trigger);

        // Show an error message
        alert('Failed to copy text to clipboard.');
    });

});
