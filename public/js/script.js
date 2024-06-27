// Initialize tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

// share profile link
document.getElementById('shareProfile').addEventListener('click', function(event) {
    event.preventDefault();
    
    const url = this.href;

    // copy to clipboard
    navigator.clipboard.writeText(url).then(() => {
        // change tooltip text to "Link copied"
        this.setAttribute('data-bs-title', 'Link copied');
        const tooltip = bootstrap.Tooltip.getInstance(this);
        tooltip.setContent({ '.tooltip-inner' : 'Link copied' });

        // show updated tooltip
        tooltip.show();

        // reset tooltip after delay
        setTimeout(() => {
            tooltip.hide();
            tooltip.setContent({'.tooltip-inner' : 'Copy profile link'});
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy text: ', err);
    });
});