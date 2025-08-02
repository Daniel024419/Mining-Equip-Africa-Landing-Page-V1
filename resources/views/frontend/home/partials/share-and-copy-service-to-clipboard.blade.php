<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="shareDescription">Copy the link below to share this service:</p>
                <div class="input-group">
                    <input type="text" class="form-control" id="serviceUrl" readonly>
                    <input type="hidden" id="serviceIdCopy" value="">
                    <button class="btn btn-primary" onclick="copyToClipboard('serviceUrl')">
                        Copy to Clipboard
                    </button>
                </div>
                <div id="copyStatus" style="margin-top: 6px; display: none;">
                    <small class="text-success">Service URL copied successfully!</small>
                </div>
                <hr>
                <p>Or share directly to social media:</p>
                <div class="d-flex justify-content-around" id="socialShareButtons"></div>
            </div>
        </div>
    </div>
</div>


<script>
    // Function to generate social media share buttons HTML
function generateSocialButtons(serviceId,serviceTitle, serviceUrl, serviceImage) {
    const serviceTitleEncoded = encodeURIComponent(serviceTitle);
    const serviceUrlEncoded = encodeURIComponent(serviceUrl);
    const serviceImageEncoded = encodeURIComponent(serviceImage);

    return `
        <a href="https://api.whatsapp.com/send?text=${serviceTitleEncoded}%0A${serviceUrlEncoded}" target="_blank" class="btn btn-success" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://www.facebook.com/sharer.php?u=${serviceUrlEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-facebook"></i> Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?text=${serviceTitleEncoded}&url=${serviceUrlEncoded}" target="_blank" class="btn btn-info" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://telegram.me/share/url?url=${serviceUrlEncoded}&text=${serviceTitleEncoded}" target="_blank" class="btn btn-secondary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-telegram"></i> Telegram
        </a>
        <a href="https://www.linkedin.com/shareArticle?url=${serviceUrlEncoded}&title=${serviceTitleEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="https://www.pinterest.com/pin/create/bookmarklet/?url=${serviceUrlEncoded}&media=${serviceImageEncoded}&description=${serviceTitleEncoded}" target="_blank" class="btn btn-danger" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-pinterest"></i> Pinterest
        </a>
    `;
}

// Function to handle the opening of the clipboard modal
function openShareActions(serviceId) {
    const serviceIdCopy = document.getElementById('serviceIdCopy');
    serviceIdCopy.value = serviceId;
    const url = `{{ route('frontend.home.getServiceDetails', ':service') }}`.replace(':service', serviceId);

    // AJAX to fetch service details
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            const serviceUrlElement = document.getElementById('serviceUrl');
            const shareDescription = document.getElementById('shareDescription');
            const socialShareButtons = document.getElementById('socialShareButtons');

            // Update the service URL
            const serviceUrl = response.url; // Ensure the response contains the service URL
            serviceUrlElement.value = serviceUrl;

            // Update share description with the service title
            shareDescription.textContent = `Share "${response.title}"`;

            // Generate and insert the social share buttons
            const serviceTitle = response.title;
            const serviceImage = response.image || ''; // Replace with actual image field if exists
            socialShareButtons.innerHTML = generateSocialButtons(serviceId,serviceTitle, serviceUrl, serviceImage);

            // Show the modal
            $('#shareModal').modal('show');
        },
        error: function (error) {
            console.error('Error fetching service details:', error);
        }
    });
}

// Function to copy the URL to clipboard
function copyToClipboard(elementId) {
    const inputField = document.getElementById(elementId);
    const copyStatus = document.getElementById('copyStatus');
    const serviceIdCopy = document.getElementById('serviceIdCopy');
    const serviceId = serviceIdCopy.value;

    if (!inputField || !copyStatus) {
        console.error('Failed to get input field or copy status element');
        return;
    }

    inputField.select();
    document.execCommand("copy");

    inputField.style.border = '2px solid #28a745';
    copyStatus.style.display = 'block';

    setTimeout(() => {
        inputField.style.border = '';
        copyStatus.style.display = 'none';
    }, 2000);
}

</script>