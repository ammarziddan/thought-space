document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('profileInfoModal');
    const cancelButton = document.getElementById('cancelProfileInfo');
    const form = modal.querySelector('form');
    const imagePreview = modal.querySelector('.img-preview');
    const fileInput = document.getElementById('image-preview');
    
    let originalImageSrc;
    let originalFormData;

    modal.addEventListener('show.bs.modal', function() {
        // Simpan nilai awal
        originalImageSrc = imagePreview.src;
        originalFormData = new FormData(form);
    });

    cancelButton.addEventListener('click', function() {
        // Kembalikan gambar preview ke kondisi awal
        imagePreview.src = originalImageSrc;
        
        // Reset file input
        fileInput.value = '';
        
        // Kembalikan nilai form ke kondisi awal
        originalFormData.forEach((value, key) => {
            const input = form.elements[key];
            if (input) {
                if (input.type === 'file') {
                    input.value = ''; // Clear file input
                } else {
                    input.value = value;
                }
            }
        });

        // Reset textarea height jika ada
        const textarea = document.getElementById('short_bio');
        if (textarea) {
            textarea.style.height = 'auto';
        }
    });

    // Fungsi untuk auto-expand textarea
    function autoExpandTextarea() {
        const textarea = document.getElementById('short_bio');
        if (textarea) {
            textarea.addEventListener('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });
            // Initial call to set correct height
            textarea.dispatchEvent(new Event('input'));
        }
    }

    // Panggil fungsi auto-expand
    autoExpandTextarea();
});

// crop image square
function cropImage(file, callback) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const img = new Image();
        img.onload = function() {
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const size = Math.min(img.width, img.height);
            canvas.width = size;
            canvas.height = size;
            
            // Calculate cropping
            const xOffset = (img.width - size) / 2;
            const yOffset = (img.height - size) / 2;
            
            ctx.drawImage(img, xOffset, yOffset, size, size, 0, 0, size, size);
            
            canvas.toBlob(function(blob) {
                callback(blob);
            }, file.type);
        }
        img.src = e.target.result;
    }
    reader.readAsDataURL(file);
}

function handleImageUpload(event) {
    const file = event.target.files[0];
    if (file) {
        cropImage(file, function(croppedBlob) {
            // Create a new File object from the cropped Blob
            const croppedFile = new File([croppedBlob], file.name, { type: file.type });
            
            // Replace the original file in the input
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(croppedFile);
            event.target.files = dataTransfer.files;
            
            // Call the original imagePreview function
            imagePreview();
        });
    }
}


// preview image
function imagePreview() {
    const image = document.querySelector('#image-preview');
    const imgPreview = document.querySelector('.img-preview');

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