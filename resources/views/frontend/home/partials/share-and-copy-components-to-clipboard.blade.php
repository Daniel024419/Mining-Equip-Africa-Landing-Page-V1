
<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share Component</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="shareDescription">Copy the link below to share this component:</p>
                <div class="input-group">
                    <input type="text" class="form-control" id="componentUrl" readonly>
                    <input type="hidden" id="componentIdCopy" value="">
                    <button class="btn btn-primary" onclick="copyToClipboard('componentUrl')">
                        Copy to Clipboard
                    </button>
                </div>
                <div id="copyStatus" style="margin-top: 6px; display: none;">
                    <small class="text-success">component URL copied successfully!</small>
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
function generateSocialButtons(componentId,componentTitle, componentUrl, componentImage) {
    const componentTitleEncoded = encodeURIComponent(componentTitle);
    const componentUrlEncoded = encodeURIComponent(componentUrl);
    const componentImageEncoded = encodeURIComponent(componentImage);

    return `
        <a href="https://api.whatsapp.com/send?text=${componentTitleEncoded}%0A${componentUrlEncoded}" target="_blank" class="btn btn-success" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://www.facebook.com/sharer.php?u=${componentUrlEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-facebook"></i> Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?text=${componentTitleEncoded}&url=${componentUrlEncoded}" target="_blank" class="btn btn-info" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://telegram.me/share/url?url=${componentUrlEncoded}&text=${componentTitleEncoded}" target="_blank" class="btn btn-secondary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-telegram"></i> Telegram
        </a>
        <a href="https://www.linkedin.com/shareArticle?url=${componentUrlEncoded}&title=${componentTitleEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="https://www.pinterest.com/pin/create/bookmarklet/?url=${componentUrlEncoded}&media=${componentImageEncoded}&description=${componentTitleEncoded}" target="_blank" class="btn btn-danger" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-pinterest"></i> Pinterest
        </a>
    `;
}

// Function to handle the opening of the clipboard modal
function openShareActions(componentId) {
    const componentIdCopy = document.getElementById('componentIdCopy');
    componentIdCopy.value = componentId;
    const url = `{{ route('frontend.home.getComponentDetails', ':component') }}`.replace(':component', componentId);

    // AJAX to fetch component details
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            const componentUrlElement = document.getElementById('componentUrl');
            const shareDescription = document.getElementById('shareDescription');
            const socialShareButtons = document.getElementById('socialShareButtons');

            // Update the component URL
            const componentUrl = response.url; // Ensure the response contains the component URL
            componentUrlElement.value = componentUrl;

            // Update share description with the component title
            shareDescription.textContent = `Share "${response.title}"`;

            // Generate and insert the social share buttons
            const componentTitle = response.title;
            const componentImage = response.image || ''; // Replace with actual image field if exists
            socialShareButtons.innerHTML = generateSocialButtons(componentId,componentTitle, componentUrl, componentImage);

            // Show the modal
            $('#shareModal').modal('show');
        },
        error: function (error) {
            console.error('Error fetching component details:', error);
        }
    });
}

// Function to copy the URL to clipboard
function copyToClipboard(elementId) {
    const inputField = document.getElementById(elementId);
    const copyStatus = document.getElementById('copyStatus');
    const componentIdCopy = document.getElementById('componentIdCopy');
    const componentId = componentIdCopy.value;

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