<?php



include '../../include/global.php';



if (!session())
  redirect('../');



?>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title><?= site('name'); ?></title>



  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <!-- End fonts -->



  <!-- core:css -->

  <link rel="stylesheet" href="../assets/vendors/core/core.css">

  <!-- endinject -->



  <!-- Plugin css for this page -->

  <link rel="stylesheet" href="../assets/vendors/flatpickr/flatpickr.min.css">

  <!-- End plugin css for this page -->



  <!-- inject:css -->

  <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">

  <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">

  <!-- endinject -->



  <!-- Layout styles -->

  <link rel="stylesheet" href="../assets/css/demo2/style.min.css">

  <!-- End layout styles -->



  <link rel="shortcut icon" href="../assets/images/favicon.png" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <style>
    * {

      box-sizing: border-box;

      -moz-box-sizing: border-box;

      -webkit-box-sizing: border-box;

    }



    .upload-container {

      background-color: #000;

      color: #fff;

      border-radius: 6px;

      padding: 10px;

      text-align: center;

    }



    .border-container {

      border: 5px dashed rgba(198, 198, 198, 0.65);

      /*   border-radius: 4px; */

      padding: 20px;

    }



    .border-container p {

      color: #fff;

      font-weight: 600;

      font-size: 1.1em;

      letter-spacing: -1px;

      margin-top: 30px;

      margin-bottom: 0;

      opacity: 0.65;

    }



    #file-browser {

      text-decoration: none;

      color: rgb(22, 42, 255);

      border-bottom: 3px dotted rgba(22, 22, 255, 0.85);

    }



    #file-browser:hover {

      color: rgb(0, 0, 255);

      border-bottom: 3px dotted rgba(0, 0, 255, 0.85);

    }



    .icons {

      color: #95afc0;

      opacity: 0.55;

    }



    .border-container {

      border: 2px dashed #ccc;

      padding: 20px;

      text-align: center;

      transition: border .3s ease;

    }



    .icons {

      margin-top: 20px;

    }



    #file-name {

      margin-top: 10px;

    }



    #drop-area.drag-over {

      border-color: #007bff;

    }
  </style>
  <style>
    .flash-notification {

      animation: flash 3s infinite;

    }



    @keyframes flash {

      0% {

        background-color: rgba(128, 128, 128, 0.2);

      }

      50% {

        background-color: rgba(128, 128, 128, 1);

      }

      100% {

        background-color: rgba(128, 128, 128, 0.2);

      }

    }
  </style>
  <style type="text/css">
    /* Styles for the image gallery and upload form */


    .image-container {
      position: relative;
      width: 100px;
      height: 100px;
    }

    .image-container img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }



    #uploadForm {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 20px;
    }

    #uploadForm input[type="file"] {
      margin-bottom: 10px;
    }

    #uploadForm button {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    #uploadForm button:hover {
      background-color: #0056b3;
    }

    .table td img {
      width: 106px;
      height: 66px;
      border-radius: 10%;
    }
  </style>
  <style>
    .modal-content2 {
      display: flex;
      flex-direction: column;
      height: 100%;
    }

    .modal-body2 {
      flex: 1 1 auto;
      overflow-y: auto;
    }

    .sortable-list {
      list-style-type: none;
      margin: 0;
      padding: 0;
      width: 100%;
    }

    .sortable-list li {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px 0;
      padding: 10px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      cursor: move;
      transition: background-color 0.2s ease;
    }

    .sortable-list li:hover {
      background-color: #f1f1f1;
    }

    .sortable-list img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .modal-header,
    .modal-footer {
      border: none;
    }

    .modal-header {
      padding: 15px 20px;
      border-bottom: 1px solid #e9ecef;
    }

    .modal-footer {
      padding: 10px 20px;
      border-top: 1px solid #e9ecef;
    }

    .modal-title {
      font-size: 1.5rem;
      font-weight: 600;
    }

    .btn {
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 8px;
      transition: background-color 0.2s ease;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      color: #fff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #004494;
    }

    .btn-secondary {
      background-color: #6c757d;
      border-color: #6c757d;
      color: #fff;
    }

    .btn-secondary:hover {
      background-color: #565e64;
      border-color: #4e555b;
    }

    .close {
      font-size: 1.5rem;
      color: #000;
      opacity: 0.5;
    }

    .close:hover {
      color: #000;
      opacity: 0.75;
    }

    .drag-over {
      border: 2px dashed #007bff;
      background-color: #e9f7ff;
    }
  </style>
  <div class="main-wrapper">



    <!-- partial:partials/_sidebar.html -->

    <?= load('panel/sidebar'); ?>

    <!-- partial -->



    <div class="page-wrapper">



      <?= load('panel/header'); ?>



      <div class="page-content">



        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">

          <div>

            <h4 class="mb-3 mb-md-0" style="color: #000">Available Properties</h4>

          </div>

          <div class="ml-auto">

            <a class="btn btn-primary" href="create/property"><i class="fas fa-plus"></i> Add Property</a>

          </div>

        </div>









        <div class="row">

          <div class="col-12 col-xl-12 stretch-card">

            <div class="row flex-grow-1">

              <div class="col-md-3 grid-margin stretch-card">

                <div class="card" style="border-radius: 18px;">

                  <div class="card-body">

                    <div class="d-flex justify-content-between align-items-baseline">

                      <h6 class="card-title mb-0">total properties</h6>

                    </div>

                    <div class="row">

                      <div class="col-6 col-md-12 col-xl-5">

                        <h3 class="mb-2"><?= countable(fetch("SELECT * FROM property")) ?> Property</h3>

                        <div class="d-flex align-items-baseline">

                          <p class="text-success">

                            <span>+0.<?= countable(fetch("SELECT * FROM property")) ?>%</span>

                            <i data-feather="arrow-up" class="icon-sm mb-1"></i>

                          </p>

                        </div>

                      </div>

                      <div class="col-6 col-md-12 col-xl-7">

                        <div id="customersChart" class="mt-md-3 mt-xl-0"></div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div> <!-- row -->

        <div class="row">

          <div class="col-lg-12 col-xl-12 stretch-card">

            <div class="card">

              <div class="card-body">

                <div class="d-flex justify-content-between align-items-baseline mb-2">

                  <h6 class="card-title mb-0">properties</h6>

                </div>

                <div class="table-responsive">

                  <table class="table table-hover mb-0">

                    <thead>

                      <tr>

                        <th class="pt-0">#</th>

                        <th class="pt-0">Title</th>

                        <th class="pt-0">Accomodate</th>

                        <th class="pt-0">Taxes</th>
                        <th class="pt-0">Images</th>

                        <!-- <th class="pt-0">Created</th> -->

                        <th class="pt-0">Action</th>

                      </tr>

                    </thead>

                    <tbody id="propertyTableBody">



                    </tbody>

                  </table>

                </div>

              </div>

            </div>

          </div>

        </div> <!-- row -->



      </div>



      <?= load('panel/footer'); ?>



    </div>

  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Image Gallery</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


          <form method="POST" id="imageUploadForm" action="upload-multiple-images.php" enctype="multipart/form-data">
            <input type="hidden" value="" name="iddd" id="iddd">


            <div class="row mb-3">

              <label class="col-md-2 col-form-label">Property Images</label>

              <div class="col-md-10 col-lg-4">

                <div class="upload-container">

                  <div id="drop-area" class="border-container">

                    <div class="icons fa-4x">

                      <i class="fas fa-file-image" data-fa-transform="shrink-3 down-2 left-6 rotate--45"></i>

                      <i class="fas fa-file-alt" data-fa-transform="shrink-2 up-4"></i>

                    </div>

                    <p>Drag and drop files here, or <a href="#" id="file-browser">browse</a> your computer.</p>

                    <input type="file" id="file-input" name="files[]" accept="image/jpeg, image/jpg, image/png" multiple
                      style="display: none;">

                    <div id="file-names"></div>

                    <?php if ($property['property_image']) { ?>

                      <p>Uploaded image:</p>

                      <img src="../../assets/image_property/<?= $property['property_image'] ?>" width="250">

                    <?php } ?>

                  </div>

                </div>

                <div id="error-image" class="alert alert-danger" style="display:none;">

                  <i class="fas fa-exclamation-circle" aria-hidden="true"></i> <span id="error-message"></span>

                </div>

              </div>

            </div>

            <input type="submit" id="submitBtn" class="btn btn-info" name="Upload new images" value="Upload new images">
<div id="loader" style="display:none;">
  <i class="fas fa-spinner fa-spin"></i> Uploading...
</div>

          </form>
          <br>
          <button id="deleteSelectedButton" class="btn btn-danger mb-3">Delete Selected</button>
          <br>
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>Images</th>
                <th>Delete</th>
                <th>Change</th>
              </tr>
            </thead>
            <tbody class="image-gallery">

            </tbody>
          </table>
        </div>
        <div class="modal-footer w-100">
          <button type="button" class="btn btn-secondary w-100" data-dismiss="modal">Back</button>
          <!-- <button type="hidden" type="button" class="btn btn-primary" id="savePositions">Save Changes</button> -->
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content modal-content2">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Change Image Position</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-body2">
          <input type="hidden" value="" id="pr_id" name="">
          <ul id="sortable" class="sortable-list"></ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="savePositions">Save Changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Change Image Modal -->
  <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="changeImageModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changeImageModalLabel">Change Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="file" id="newImageInput" class="form-control">
          <input type="hidden" id="currentImage" value="">
          <input type="hidden" id="propertyid" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="saveNewImageButton" class="btn btn-primary">Save changes</button>
        </div>
      </div>

    </div>
  </div>



  <!-- Modal Structure -->




  <!-- core:js -->

  <script src="../assets/vendors/core/core.js"></script>

  <!-- endinject -->



  <!-- Plugin js for this page -->

  <script src="../assets/vendors/flatpickr/flatpickr.min.js"></script>

  <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>

  <!-- End plugin js for this page -->



  <!-- inject:js -->

  <script src="../assets/vendors/feather-icons/feather.min.js"></script>

  <script src="../assets/js/template.js"></script>

  <!-- endinject -->



  <!-- Custom js for this page -->

  <script src="../assets/js/dashboard-dark.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- End custom js for this page -->

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script>



    updateproperty();



    function updateproperty() {

      $.ajax({

        url: '../../api/property',

        method: 'GET',

        data: {

          page: 'property'

        },

        success: function (response) {

          $('#propertyTableBody').html(response);

          var tables = $(response).find('#propertyTableBody');

          var tableCount = tables.length;



        },

        error: function (xhr, status, error) {

          console.error(error);

        }

      });

    }



    setInterval(updateproperty, 10000);



  </script>

  <script>

    
   
    $(document).ready(function () {
      // Show the modal and load images
      $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var images = button.data('value');
        var propertyId = button.data('property-id');
        var modal = $(this);

        $('#iddd').val(propertyId)
        var imageHtml = "";
        var gallery = modal.find('.image-gallery');
        gallery.empty(); // Clear previous images

        if (images.length == 0) {

        } else {
          // Deserialize the images array
          var imagesArray = images.trim().split(',');

          // Populate the modal with images


          imagesArray.forEach(function (image) {
            imageHtml += `
         <tr class="ui-state-default" data-image="${image}">
            <td><input type="checkbox" class="select-image" data-image="${image}"></td>
            <td><img width="100px" src="${image}" alt="Image"></td>
            <td><button class="delete-button btn btn-danger" data-image="${image}">Delete</button></td>
            <td><button class="change-button btn btn-info" data-image="${image}" data-id="${propertyId}">Change</button></td>
          </tr>`;
          });
        }
        gallery.html(imageHtml);

// Make the image rows sortable
gallery.sortable({
  placeholder: "ui-state-highlight",
  items: "> tr", // Ensure only table rows are sortable
  update: function(event, ui) {
    var sortedImages = gallery.sortable('toArray', { attribute: 'data-image' });
    var propertyId = $('#iddd').val();  // Make sure this references the correct input field

    // AJAX request to update the image order
    $.ajax({
        type: 'POST',
        url: 'update-image-positions.php',
        data: { images: sortedImages, property_id: propertyId, iddd: propertyId },
        success: function(response) {
            if (response.status === 'success') {
                alert('Image positions updated successfully.');
                $('#myModal').modal('hide');
                location.reload();  // Reload the page after updating
            } else {
                alert('Failed to update image positions: ' + response.message);
            }
        },
        error: function(xhr, status, error) {
            alert('An error occurred: ' + error);
        }
    });
  }
});



        // Handle individual image deletion
        $('.delete-button').click(function () {
          var images = $(this).data('image');
          var $button = $(this);

          $.ajax({
            type: "POST",
            url: "delete-image.php",
            data: { images: images, property_id: propertyId },
            success: function (response) {
              alert(response)
              if (response === 'success') {
                $button.closest('tr').remove();
              } else {
                alert('Failed to delete image');
              }
            }
          });
        });

        // Handle image selection
        $('#selectAll').click(function () {
          $('.select-image').prop('checked', this.checked);
          $('#deleteSelectedButton').toggle($('.select-image:checked').length > 0);
        });

        $('.select-image').change(function () {
          $('#deleteSelectedButton').toggle($('.select-image:checked').length > 0);
          if ($('.select-image:checked').length === $('.select-image').length) {
            $('#selectAll').prop('checked', true);
          } else {
            $('#selectAll').prop('checked', false);
          }
        });

        // Handle deletion of selected images
        $('#deleteSelectedButton').click(function () {
          var selectedImages = $('.select-image:checked').map(function () {
            return $(this).data('image');
          }).get();

          $.ajax({
            type: "POST",
            url: "delete-image.php",
            data: { images: selectedImages, property_id: propertyId },
            success: function (response) {
              alert(response)
              if (response === 'success') {
                $('.select-image:checked').closest('tr').remove();
                $('#deleteSelectedButton').hide();
                location.reload()
              } else {
                alert('Failed to delete selected images');
              }
            }
          });
        });

        $('.change-button').click(function () {
          var image = $(this).data('image');
          var id = $(this).data('id');
          // alert(id)
          $('#currentImage').val(image);
          $('#propertyid').val(id);
          $('#changeImageModal').modal('show');
        });

        $('#saveNewImageButton').click(function () {
          var newImageFile = $('#newImageInput')[0].files[0];
          var currentImage = $('#currentImage').val();
          var propertyId = $('#propertyid').val();;

          if (!newImageFile) {
            alert('Please select a new image');
            return;
          }
          // alert(propertyId)
          var formData = new FormData();
          formData.append('new_image', newImageFile);
          formData.append('current_image', currentImage);
          formData.append('property_id', propertyId);

          $.ajax({
            type: 'POST',
            url: '/controller/panel/image-update.php',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {

              alert('Image changed successfully');
              location.reload(); // Reload the page to reflect the changes
              // } else {
              //   alert('Failed to change image');
              // }
            }
          });
        });
      });
    });




    $(document).ready(function () {
  // Handle upload more images button click
  $('#uploadMoreImagesButton').click(function () {
    $('#uploadMoreImagesInput').click();
  });

  // Handle file input change
  $('#uploadMoreImagesInput').change(async function () {
    const files = this.files;
    const propertyId = $('#iddd').val();

    if (files.length > 0) {
      // First, handle the image upload to ImageKit
      await uploadImage();

      // Now, handle form data submission
      var formData = new FormData();
      formData.append('property_id', propertyId);
      for (var i = 0; i < files.length; i++) {
        formData.append('new_images[]', files[i]);
      }

      // Debugging: Log the formData content
      for (var pair of formData.entries()) {
        console.log(pair[0] + ', ' + pair[1]);
      }

      // Disable the submit button and show the loader
      $('#submitBtn').prop('disabled', true);
      $('#loader').show();

      $.ajax({
        type: 'POST',
        url: 'upload-multiple-images.php',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
          console.log(response);
          if (response.status === 'success') {
            alert('Images uploaded successfully');
            location.reload();
          } else {
            alert('Failed to upload images: ' + response.message);
          }
        },
        error: function (xhr, status, error) {
          console.error('Upload failed:', error);
        },
        complete: function () {
          // Re-enable the submit button and hide the loader
          $('#submitBtn').prop('disabled', false);
          $('#loader').hide();
        }
      });
    } else {
      alert('No files selected');
    }
  });

  // Handle form submission and show loader
  $('#imageUploadForm').on('submit', function (e) {
    e.preventDefault();

    // Disable the submit button and show the loader
    $('#submitBtn').prop('disabled', true);
    $('#loader').show();

    // Perform form submission logic here (if needed)
    $(this).off('submit').submit();
  });
});


  </script>
  <script src="https://unpkg.com/imagekit-javascript-sdk/dist/imagekit.min.js"></script>


  <script>
    $(document).ready(function () {
      // When the modal is about to be shown
      $('#myModal2').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);  // Button that triggered the modal
        var imagesString = button.data('value');  // Get the image string
        var propertyId = button.data('pro-id');  // Get the property ID
        var images = imagesString.split(',');  // Split the image string into an array

        $("#pr_id").val(propertyId);  // Set the property ID in the hidden input field

        var sortableList = $('#sortable');  // Reference to the sortable list
        sortableList.empty();  // Clear the list before appending new items

        // Append each image to the sortable list
        images.forEach(function (image) {
          sortableList.append('<li class="ui-state-default" data-image="' + image + '"><img src="' + image + '" width="100"></li>');
        });

        // Initialize jQuery UI sortable
        sortableList.sortable();
      });

      // When the save button is clicked
      $('#savePositions').click(function () {
        var sortedImages = $('#sortable').sortable('toArray', { attribute: 'data-image' });  // Get the sorted images
        var propertyId = $('#pr_id').val();  // Get the property ID

        // AJAX request to update the image positions
        $.ajax({
          type: 'POST',
          url: 'update-image-positions.php',
          data: { images: sortedImages, property_id: propertyId },
          success: function (response) {
            // Handle successful response
            if (response.status === 'success') {
              alert('Image positions updated successfully.');

              // Hide the modal after saving
              $('#myModal2').modal('hide');

              // Optional: Redirect to a new page after successful update
              window.location.href = "properties.php";
            } else {
              // Show error if the update fails
              alert('Failed to update image positions: ' + response.message);
            }
          },
          error: function (xhr, status, error) {
            // Handle any errors that occur during the AJAX request
            alert('An error occurred: ' + error);
          }
        });
      });
    });

  </script>
  


  <script>

function handleFileSelect(files) {

  const fileNamesDiv = document.getElementById('file-names');

  fileNamesDiv.innerHTML = '';



  for (const file of files) {

    if (['image/jpeg', 'image/jpg', 'image/png'].indexOf(file.type) === -1) {

      document.getElementById('error-message').textContent = 'Unsupported file type! Please select JPG, JPEG or PNG images.';

      document.getElementById('error-image').style.display = 'block';

      return;

    }



    const fileNameElement = document.createElement('p');

    fileNameElement.textContent = `File uploading: ${file.name}`;

    fileNamesDiv.appendChild(fileNameElement);



    // Simulate upload time

    setTimeout(() => {

      fileNameElement.textContent = `Uploaded image: ${file.name}`;

      fileNameElement.style.color = 'green';

    }, 2000);

  }

}



document.getElementById('file-input').addEventListener('change', function (event) {

  const files = event.target.files;

  document.getElementById('error-image').style.display = 'none';

  handleFileSelect(files);

});



document.getElementById('file-browser').addEventListener('click', function (event) {

  event.preventDefault();

  document.getElementById('file-input').click();

});



const dropArea = document.getElementById('drop-area');



['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {

  dropArea.addEventListener(eventName, preventDefaults, false);

});



function preventDefaults(event) {

  event.preventDefault();

  event.stopPropagation();

}



dropArea.addEventListener('dragenter', highlight, false);

dropArea.addEventListener('dragover', highlight, false);

dropArea.addEventListener('dragleave', unhighlight, false);

dropArea.addEventListener('drop', handleDrop, false);



function highlight() {

  dropArea.classList.add('drag-over');

}



function unhighlight() {

  dropArea.classList.remove('drag-over');

}



function handleDrop(event) {

  document.getElementById('error-image').style.display = 'none';

  const dt = event.dataTransfer;

  const files = dt.files;



  if (files.length > 0) {

    handleFileSelect(files);

    document.getElementById('file-input').files = files;

  }

}

</script>
</body>

</html>