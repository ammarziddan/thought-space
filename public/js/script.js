// preview image create story
function imagePreview() {
    const image = document.querySelector('#thumbnail');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.classList.add('border','img-fluid');
    // imgPreview.classList.add('border');
    imgPreview.style.display = 'block';
    imgPreview.style.width = '100%';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
    };
}

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Initialize tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // share profile link
    const shareProfileLink = document.getElementById('shareProfile');
    if (shareProfileLink) {
        shareProfileLink.addEventListener('click', function(event) {
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
    } else {
        console.warn("Element with id 'shareProfile' not found");
    }

    // text area height
    const textarea = document.getElementById('title');
    if (textarea) {
        function autoExpand() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        }
        
        textarea.addEventListener('input', autoExpand);
        
        // Initial call to set correct height
        autoExpand.call(textarea);
    }

    // choices.js
    new Choices('#topics', {
        removeItemButton: true,
        maxItemCount: 4,
        searchResultLimit: 5,
        renderChoiceLimit: 5
    });
});