<script>
    function openShareActions(componentId) {
        // Parse the JSON string to get the component ID
        const id = JSON.parse(componentId);

        // Make an AJAX call to get the component details
        fetch(`/api/components/${id}/details`)
            .then(response => response.json())
            .then(data => {
                // Show the SweetAlert modal
                Swal.fire({
                    title: 'Share Component',
                    html: `
                    <div class="text-center">
                        <p class="mb-3">${data.title}</p>
                        <div class="d-flex justify-content-center gap-3 mb-3">
                            <!-- Facebook -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(data.url)}" 
                               target="_blank" class="text-decoration-none">
                                <i class="fab fa-facebook fa-2x text-primary"></i>
                            </a>
                            
                            <!-- Twitter -->
                            <a href="https://twitter.com/intent/tweet?url=${encodeURIComponent(data.url)}&text=${encodeURIComponent(data.title)}" 
                               target="_blank" class="text-decoration-none">
                                <i class="fab fa-twitter fa-2x text-info"></i>
                            </a>
                            
                            <!-- LinkedIn -->
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=${encodeURIComponent(data.url)}&title=${encodeURIComponent(data.title)}" 
                               target="_blank" class="text-decoration-none">
                                <i class="fab fa-linkedin fa-2x text-primary"></i>
                            </a>
                            
                            <!-- WhatsApp -->
                            <a href="https://wa.me/?text=${encodeURIComponent(data.title + ' ' + data.url)}" 
                               target="_blank" class="text-decoration-none">
                                <i class="fab fa-whatsapp fa-2x text-success"></i>
                            </a>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" value="${data.url}" id="shareUrl" readonly>
                            <button class="btn btn-outline-primary" type="button" onclick="copyToClipboard()">
                                <i class="fas fa-copy"></i>
                            </button>
                        </div>
                    </div>
                    `,
                    showConfirmButton: false,
                    showCloseButton: true,
                    customClass: {
                        container: 'share-modal'
                    }
                });
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again later.',
                });
            });
    }

    function copyToClipboard() {
        const shareUrl = document.getElementById('shareUrl');
        shareUrl.select();
        document.execCommand('copy');

        // Show copied message
        const copyButton = shareUrl.nextElementSibling;
        const originalContent = copyButton.innerHTML;
        copyButton.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => {
            copyButton.innerHTML = originalContent;
        }, 2000);
    }
</script>

<style>
    .share-modal .swal2-popup {
        padding: 2rem;
    }

    .share-modal .swal2-content {
        margin-top: 1rem;
    }

    .share-modal a:hover {
        opacity: 0.8;
    }

    .share-modal .input-group {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }
</style>
