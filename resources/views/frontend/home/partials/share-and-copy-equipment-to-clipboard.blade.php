<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share Equipment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="shareDescription">Copy the link below to share this equipment:</p>
                <div class="input-group">
                    <input type="text" class="form-control" id="equipmentUrl" readonly>
                    <input type="hidden" id="equipmentIdCopy" value="">
                    <button class="btn btn-primary" onclick="copyToClipboard('equipmentUrl')">
                        Copy to Clipboard
                    </button>
                </div>
                <div id="copyStatus" style="margin-top: 6px; display: none;">
                    <small class="text-success">Equipment URL copied successfully!</small>
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
function generateSocialButtons(equipmentId,equipmentTitle, equipmentUrl, equipmentImage) {
    const equipmentTitleEncoded = encodeURIComponent(equipmentTitle);
    const equipmentUrlEncoded = encodeURIComponent(equipmentUrl);
    const equipmentImageEncoded = encodeURIComponent(equipmentImage);

    return `
        <a href="https://api.whatsapp.com/send?text=${equipmentTitleEncoded}%0A${equipmentUrlEncoded}" target="_blank" class="btn btn-success" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-whatsapp"></i> WhatsApp
        </a>
        <a href="https://www.facebook.com/sharer.php?u=${equipmentUrlEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-facebook"></i> Facebook
        </a>
        <a href="https://twitter.com/intent/tweet?text=${equipmentTitleEncoded}&url=${equipmentUrlEncoded}" target="_blank" class="btn btn-info" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-twitter"></i> Twitter
        </a>
        <a href="https://telegram.me/share/url?url=${equipmentUrlEncoded}&text=${equipmentTitleEncoded}" target="_blank" class="btn btn-secondary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-telegram"></i> Telegram
        </a>
        <a href="https://www.linkedin.com/shareArticle?url=${equipmentUrlEncoded}&title=${equipmentTitleEncoded}" target="_blank" class="btn btn-primary" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-linkedin"></i> LinkedIn
        </a>
        <a href="https://www.pinterest.com/pin/create/bookmarklet/?url=${equipmentUrlEncoded}&media=${equipmentImageEncoded}&description=${equipmentTitleEncoded}" target="_blank" class="btn btn-danger" style="font-size: 12px; padding: 5px 6px; margin: 3px;">
            <i class="fab fa-pinterest"></i> Pinterest
        </a>
    `;
}

// Function to handle the opening of the clipboard modal
function openShareActions(equipmentId) {
    const equipmentIdCopy = document.getElementById('equipmentIdCopy');
    equipmentIdCopy.value = equipmentId;
    const url = `{{ route('frontend.home.getEquipmentsDetails', ':equipment') }}`.replace(':equipment', equipmentId);

    // AJAX to fetch equipment details
    $.ajax({
        url: url,
        method: 'GET',
        success: function (response) {
            const equipmentUrlElement = document.getElementById('equipmentUrl');
            const shareDescription = document.getElementById('shareDescription');
            const socialShareButtons = document.getElementById('socialShareButtons');

            // Update the equipment URL
            const equipmentUrl = response.url; // Ensure the response contains the equipment URL
            equipmentUrlElement.value = equipmentUrl;

            // Update share description with the equipment title
            shareDescription.textContent = `Share "${response.title}"`;

            // Generate and insert the social share buttons
            const equipmentTitle = response.title;
            const equipmentImage = response.image || ''; // Replace with actual image field if exists
            socialShareButtons.innerHTML = generateSocialButtons(equipmentId,equipmentTitle, equipmentUrl, equipmentImage);

            // Show the modal
            $('#shareModal').modal('show');
        },
        error: function (error) {
            console.error('Error fetching equipment details:', error);
        }
    });
}

// Function to copy the URL to clipboard
function copyToClipboard(elementId) {
    const inputField = document.getElementById(elementId);
    const copyStatus = document.getElementById('copyStatus');
    const equipmentIdCopy = document.getElementById('equipmentIdCopy');
    const equipmentId = equipmentIdCopy.value;

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