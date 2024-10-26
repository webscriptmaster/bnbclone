
<style>
.modal3 {
    display: none; /* Initially hidden */
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000; /* Ensure it is on top */
    background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
    overflow: auto; /* Enable scrolling if needed */
}

.modal-content2 {
    background-color: #fff;
    margin: 15% auto; /* Center the modal */
    padding: 20px;
    width: 90%; /* Adjust the width as needed */
}

.close2 {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close2:hover,
.close2:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
.iimage{
    object-fit: cover;
}
.pswp {
    z-index: 9999;
    background: black;
}
</style>
<section>
    <div id="myModal22" class="modal3" style="display: none; background: white; position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 1000;">
        <div class="nnew">
            <div class="pso">
                <div>
                    <span class="close2" onclick="closeModal22()"> <!-- Close Modal Button -->
                    <span class="close1 i3tjjh1 atm_mk_h2mmj6 dir dir-ltr">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 16px; width: 16px; stroke: currentcolor; stroke-width: 4; overflow: visible;margin-left: 10px;">
                                <path fill="none" d="M20 28 8.7 16.7a1 1 0 0 1 0-1.4L20 4"></path>
                            </svg>
                        </span>
                    </span>
                </div>
                <div>
                    <div style="float: right;margin-right: 20px;">Save</div>
                    <div style="float: right;margin-right: 20px;">Share</div>
                </div>
            </div>
            <div class="modal-content2">
                <div class="NNEW">
                    <!-- Your images are being displayed here dynamically from PHP -->
                    <?php
                    // Dynamically generate image elements
                    $imagesCount = count($images);
                    $pattern = [1, 2, 1, 2, 2, 1, 2, 1, 2, 2]; // Image layout pattern
                    $patternIndex = 0;
                    $specificIds = ['img0', 'img1', 'img2', 'img3', 'img4'];

                    for ($key = 0; $key < $imagesCount; $key++):
                        $currentPattern = $pattern[$patternIndex % count($pattern)];

                        if ($currentPattern == 1):  // Big image layout
                            echo '<div class="top-image" style="margin-bottom: 5px; display: flex; width: 101%;">';
                            if (isset($images[$key])) {
                                $id = $key < 5 ? $specificIds[$key] : 'bigImage' . $key; 
                                echo '<img class="iimage" id="' . $id . '" src="' . htmlspecialchars($images[$key], ENT_QUOTES, 'UTF-8') . '" alt="Image ' . $key . '" onclick="openGallery(' . $key . ')">';
                            }
                            echo '</div>';
                        else:  // Small image layout
                            echo '<div class="bottom-images" style="margin-bottom: 5px; display: flex; width: 100%; height: 128px;">';
                            for ($i = 0; $i < $currentPattern && $key < $imagesCount; $i++, $key++) {
                                if (isset($images[$key])) {
                                    $id = $key < 5 ? $specificIds[$key] : 'smallImage' . $key;
                                    echo '<img class="iimage" id="' . $id . '" src="' . htmlspecialchars($images[$key], ENT_QUOTES, 'UTF-8') . '" alt="Image ' . $key . '" style="width: calc(100% / ' . $currentPattern . ');" onclick="openGallery(' . $key . ')">';
                                }
                            }
                            $key--;
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
  // Function to open modal
function openModal22(key) {
    var modal = document.getElementById("myModal22");
    if (modal) {
        modal.style.display = "block";  // Show the modal by setting display to block
        updateImageIDsForMobile();  // Optional: if you have functionality for mobile-specific IDs
    }
}

// Function to close modal
function closeModal22() {
    var modal = document.getElementById("myModal22");
    if (modal) {
        modal.style.display = "none";  // Hide the modal by setting display to none
    }
}
function openModal24(key) {
    var modal = document.getElementById("myModal24");
    if (modal) {
        modal.style.display = "block";  // Show the modal by setting display to block
        updateImageIDsForMobile();  // Optional: if you have functionality for mobile-specific IDs
    }
}

// Function to close modal
function closeModal24() {
    var modal = document.getElementById("myModal24");
    if (modal) {
        modal.style.display = "none";  // Hide the modal by setting display to none
    }
}


</script>

