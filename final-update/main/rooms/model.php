<style>
.modal1 {
    position: fixed;
    z-index: 9999;
    height: 100%;
    display: none;
    overflow: auto;
    width: 100%;
    top: 14px;
    padding: 0px 19px 0px 0px;
    left: -22px;
}
    /* Add a new class to hide the scroll */
    .no-scroll {
        overflow: auto; 
    }
    .pswp {
    z-index: 9999; /* Ensure it is on top of other content */
}

.pswp__bg {
    background: rgba(0, 0, 0, 0.8); /* Dark background */
}

.pswp__button--arrow--left, .pswp__button--arrow--right {
    background: 0 0;
    top: 54%;
    margin-top: -50px;
    width: 70px;
    height: 100px;
    right: 45px; /* Positioning */
    border: 1px solid; /* Border styling */
    width: 40px; /* Adjusted width for better visibility */
    height: 40px; /* Set a height to make it circular */
    display: flex; /* Use flex to center the arrow */
    justify-content: center; /* Center the arrow horizontally */
    align-items: center; /* Center the arrow vertically */
    border-radius: 50%; /* Makes the button circular */
    background-color: rgba(255, 255, 255, 0.8); /* Optional: background color for visibility */
    transition: background-color 0.3s; 
}
.pswp__button--arrow--left:before, .pswp__button--arrow--right:before {
    content: '';
    top: 5px;
    background-color: transparent !important;
    height: 30px;
    color: black;
    width: 28px;
    position: absolute;
}

.pswp__top-bar {
 
    width: 98% !important;
}/* Desktop specific styles */
@media (min-width: 1128px) {
    .pswp--open {
    display: block;
}
}
</style>

<section>
    <div id="myModal" class="modal1 modal1" style="background: white;">
        <div class="nnew">
            <div class="pso">
                <div>
                    <span class="close" onclick="closeModal()">
                        <span class="close1 i3tjjh1 atm_mk_h2mmj6 dir dir-ltr">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 4; overflow: visible;margin-left: 10px;">
                                <path fill="none" d="M20 28 8.7 16.7a1 1 0 0 1 0-1.4L20 4"></path>
                            </svg>
                        </span>
                    </span>
                </div>
                <div>
                    <div style="float: right;margin-right: 20px;" aria-hidden="true" class="_5kaapu"><span class="_14tkmhr">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 2; overflow: visible;">
                            <path d="M16 28c7-4.73 14-10 14-17a6.98 6.98 0 0 0-7-7c-1.8 0-3.58.68-4.95 2.05L16 8.1l-2.05-2.05a6.98 6.98 0 0 0-9.9 0A6.98 6.98 0 0 0 2 11c0 7 7 12.27 14 17z"></path>
                        </svg>
                    </span>Save</div>
                    <div class="_5kaapu" style="float: right;margin-right: 20px;"><span class="_14tkmhr">
                        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 2; overflow: visible;">
                            <path d="m27 18v9c0 1.1046-.8954 2-2 2h-18c-1.10457 0-2-.8954-2-2v-9m11-15v21m-10-11 9.2929-9.29289c.3905-.39053 1.0237-.39053 1.4142 0l9.2929 9.29289" fill="none"></path>
                        </svg></span>Share
                    </div>
                </div>
            </div>
            <div class="modal-content">
                <div id="modalTopImage"></div>
                <div class="NNEW">
                    <!-- Image pattern logic goes here -->
                    <?php
                    $imagesCount = count($images);
                    $pattern = [1, 2, 1, 2, 2, 1, 2, 1, 2, 2]; // One big, two small, one big, etc.
                    $patternIndex = 0;

                    // Define specific IDs for the first 5 images
                    $specificIds = ['img0', 'img1', 'img2', 'img3', 'img5'];

                    for ($key = 0; $key < $imagesCount; $key++):
                        $currentPattern = $pattern[$patternIndex % count($pattern)];

                        if ($currentPattern == 1):  // Big image
                            echo '<div class="top-image" style="margin-bottom: 5px; display: flex; width: 101%;">';
                            if (isset($images[$key])) {
                                // Assign specific ID for the first 5 images
                                $id = $key < 5 ? $specificIds[$key] : 'bigImage' . $key; 
                                echo '<img id="' . $id . '" src="' . htmlspecialchars($images[$key], ENT_QUOTES, 'UTF-8') . '" alt="Image ' . $key . '" onclick="openGallery(' . $key . ')">';
                            }
                            echo '</div>';
                        else:  // Small images
                            echo '<div class="bottom-images" style="margin-bottom: 5px; display: flex; width: 100%;">';
                            for ($i = 0; $i < $currentPattern && $key < $imagesCount; $i++, $key++) {
                                if (isset($images[$key])) {
                                    // Assign specific ID for the first 5 images
                                    $id = $key < 5 ? $specificIds[$key] : 'smallImage' . $key;
                                    echo '<img id="' . $id . '" src="' . htmlspecialchars($images[$key], ENT_QUOTES, 'UTF-8') . '" alt="Image ' . $key . '" style="width: calc(100% / ' . $currentPattern . ');" onclick="openGallery(' . $key . ')">';
                                }
                            }
                            $key--;  // Adjust key as loop will increase it unnecessarily
                            echo '</div>';
                        endif;

                        $patternIndex++;
                    endfor;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function openModal() {
    const modal = document.getElementById('myModal');
    if (modal.style.display === 'block') {
        console.log("Modal is already open. No action taken.");
        return; 
    }
    
    modal.style.display = 'block'; // Show modal
    document.body.style.overflow = 'hidden'; // Disable body scroll
    console.log("Modal opened: Body scroll disabled.");
}
function closeModal() {
    const modal = document.getElementById('myModal');
    modal.style.display = 'none'; // Hide modal
    document.body.style.overflow = 'auto'; // Re-enable body scroll
    console.log("Modal closed: Body scroll enabled.");
}

// Close modal if clicking outside of it
window.onclick = function(event) {
    const modal = document.getElementById('myModal');
    if (event.target === modal) {
        closeModal();
    }
};
</script>
<?php include("gallery.php");?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/photoswipe/4.1.3/photoswipe-ui-default.min.js"></script>
<script>
var openGallery = function(index) {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    // Dynamically build the items array from PHP images
    var items = [
        <?php foreach ($images as $img): ?>
        {
            src: '<?= htmlspecialchars($img, ENT_QUOTES, 'UTF-8') ?>',
            w: 1024,
            h: 768
        },
        <?php endforeach; ?>
    ];

    var options = {
        index: index, // Start at clicked image
        bgOpacity: 0.8,
        showHideOpacity: true
    };

    var gallery = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};
</script>
