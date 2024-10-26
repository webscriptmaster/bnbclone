<?php

include '../../include/global.php';

if (!session())
    redirect('../../');





if ($offer) {

} else {
    echo "No offers found for this host.";
}




?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?= site('name'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="../assets/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../assets/vendors/easymde/easymde.min.css">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <link rel="stylesheet" href="style.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo2/style.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- End layout styles -->

    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .navbar {

        top: 0px;

    }



    .online {
        color: green;
    }

    .offline {
        color: red;
    }
</style>

<body>
    <div class="main-wrapper">

        <?= load('panel/sidebar'); ?>

        <div class="page-wrapper">

            <?= load('panel/header'); ?>

            <div class="page-content">

                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0 text-dark"><?= site('name') ?> Panel</h4>
                    </div>
                </div>

                <?= $success ? '<div class="alert alert-success">' . $success . '</div>' : '' ?>

                <div class="container">
                    <div class="row clearfix">
                        <div class="col-lg-12">
                            <div class="card chat-app">
                                <div id="plist" class="people-list">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <!-- <span class="input-group-text"><i class="fa fa-search"></i></span> -->
                                        </div>
                                        <input type="text" class="form-control" id="search-input"
                                            placeholder="Search...">
                                    </div>
                                    <ul class="list-unstyled chat-list chat1 mt-2 mb-0" id="chat-list">
                                        <?php
                                        $hosts = "SELECT hosts.*, 
                                                    (SELECT MAX(messages.timestamp) 
                                                    FROM messages 
                                                    WHERE messages.sender_id = hosts.id) as last_message_time
                                            FROM hosts";
                                        $result = mysqli_query($con, $hosts);

                                        while ($row = mysqli_fetch_array($result)) {
                                            $lastMessageTime = $row['last_message_time']; // Fetch the last message time (if exists)
                                        
                                            // Determine the status based on whether the host has sent a message
                                            $statusClass = $lastMessageTime ? 'online' : 'offline';
                                            $statusText = $lastMessageTime ? 'Last message at ' . date('h:i A', strtotime($lastMessageTime)) : 'Offline';
                                            $statusIcon = $lastMessageTime ? 'fa-circle online' : 'fa-circle offline';
                                            ?>
                                            <li class="clearfix">
                                                <a href="chat?id=<?= htmlspecialchars($row['id']); ?>">
                                                    <img
                                                        src="../assets/profile_pic_hosts/<?= htmlspecialchars($row['profile_image']) ?>">
                                                    <div class="about">
                                                        <div class="name text-white">
                                                            <?= htmlspecialchars($row['first_name']) ?>
                                                            <?= htmlspecialchars($row['last_name']) ?>
                                                            <div class="status">
                                                                <i class="fa <?= $statusIcon ?>"></i> <?= $statusText ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>

                                    </ul>
                                    <script>
                                        $(document).ready(function () {
                                            $('#search-input').on('keyup', function () {
                                                var value = $(this).val().toLowerCase();
                                                $('#chat-list li').filter(function () {
                                                    $(this).toggle($(this).text().toLowerCase()
                                                        .indexOf(value) > -1);
                                                });
                                            });
                                        });
                                    </script>
                                </div>

                                <?php $id = $_GET['id'] ?? null;


                                $hosts = fetch_data("SELECT * FROM hosts WHERE id = '$id'");

                                // if (!$hosts)
                                //     redirect('../../');
                                

                                ?>
                                <div class="chat">
                                    <div class="chat-header clearfix">
                                        <div class="row">
                                            <div class="col-lg-6">

                                                <a href="javascript:void(0);" data-toggle="modal"
                                                    data-target="#view_info">
                                                    <?php
$profileImage = !empty($hosts['profile_image']) ? htmlspecialchars($hosts['profile_image']) : 'no-image.webp';
?>
<img 
    src="../assets/profile_pic_hosts/<?= $profileImage ?>" 
    alt="Profile Image"
>

                                                </a>
                                                <div class="chat-about mt-2">
                                                    <h6 class="m-b-0"><?= htmlspecialchars($hosts['first_name']) ?>
                                                        <?= htmlspecialchars($hosts['last_name']) ?>
                                                    </h6>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-history p-5">
                                        <ul class="m-b-0" id="chat-history">

                                        </ul>
                                    </div>

                                    <div class="chat-message clearfix">
                                        <div class="input-group mb-0">
                                            <div>
                                                <?php
                                                // Check if host is selected
                                                if (isset($id)) {
                                                    $offer = "SELECT id, guest_username FROM offers WHERE host_id = '$id'";
                                                    $result = mysqli_query($con, $offer);

                                                    // Check if there are any offers
                                                    if (mysqli_num_rows($result) > 0) {
                                                        // If offers are found, loop through them
                                                        while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <input type="hidden" id="sender_id" name="sender_id"
                                                                value="<?= htmlspecialchars($hosts['id']) ?>"> <!-- Host ID -->
                                                            <input type="hidden" id="receiver_id" name="receiver_id"
                                                                value="<?= htmlspecialchars($row['id']) ?>"> <!-- Offer ID -->
                                                            <input type="hidden" id="name" name="name"
                                                                value="<?= htmlspecialchars($row['guest_username']) ?>">
                                                            <!-- Guest Username -->
                                                            <input type="hidden" id="status" name="status" value="admin">
                                                            <?php
                                                        }
                                                    } else {
                                                        // If no offers are found, display the message
                                                        echo '<script>
        document.getElementById("chat-history").innerHTML = 
        "<li style=\"text-align: center;color:black;font-size:20px; font-weight: bold;\">No offer for this host</li>";
    </script>';
                                                    }
                                                } else {
                                                    // If no host is selected, display this message
                                                    echo '<script>
    document.getElementById("chat-history").innerHTML = 
    "<li style=\"text-align: center;color:black;font-size:20px; font-weight: bold;\">No host selected</li>";
</script>';
                                                }
                                                ?>
                                            </div>
                                            <input type="text" class="form-control" id="message" name="message"
                                                placeholder="Enter text here...">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" id="sendMessage">Send</button>
                                            </div>
                                            <div>

                                            </div>

                                        </div>
                                        <?php
                                        $offer = "SELECT id, guest_username FROM offers WHERE host_id = '$id'";
                                        $result = mysqli_query($con, $offer);

                                        // Check if there are any offers
                                        if (mysqli_num_rows($result) > 0) {
                                            // Collect all receiver IDs from the offers
                                            $receiverIds = [];
                                            while ($row = mysqli_fetch_array($result)) {
                                                $receiverIds[] = $row['id']; // Store each receiver's ID
                                            }

                                            // Only one delete button is shown, but all receiver IDs are passed
                                            ?>
                                            <div class="mt-3 text-right">
                                                <form id="deleteAllForm" method="POST" action="delete_all_messages.php">
                                                    <input type="hidden" name="sender_id"
                                                        value="<?= htmlspecialchars($hosts['id']) ?>">
                                                    <input type="hidden" name="receiver_ids"
                                                        value="<?= htmlspecialchars(implode(',', $receiverIds)) ?>">
                                                    <!-- Send all receiver IDs as a comma-separated string -->
                                                    <button type="submit" class="btn btn-danger"
                                                        id="deleteAllMessages">Delete All</button>
                                                </form>
                                            </div>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <?= load('panel/footer'); ?>

            </div>
        </div>

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
        <!-- End custom js for this page -->



</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        var senderId = $('#sender_id').val();
        var receiverId = $('#receiver_id').val();

        // Function to load previous messages
        function loadMessages() {
            var getMessagesUrl = '../../rooms/get_messages.php';
            console.log('Getting messages from:', getMessagesUrl);

            $.ajax({
                url: getMessagesUrl,
                method: 'GET',
                data: {
                    sender_id: senderId,
                    receiver_id: receiverId
                },
                success: function (response) {
                    var messages = JSON.parse(response);
                    $('#chat-history').empty(); // Clear existing messages

                    if (messages.length === 0) {
                        $('#chat-history').append(
                            '<li class="clearfix"><div class="msg"><div class="message no-message">No messages found.</div></div></li>'
                        );
                    } else {
                        messages.forEach(function (message) {
                            // Assign message class based on the sender ID
                            var messageClass = (message.sender_id == senderId) ? 'my-message' : 'other-message';

                            // Assign time class based on the sender ID
                            var timeClass = (message.sender_id == senderId) ? 'message-data' : 'message-data2';

                            // Append message with dynamic classes for message and time
                            $('#chat-history').append(
                                '<li class="clearfix">' +
                                '<div class="' + timeClass + '">' + // Time class applied dynamically
                                '<span class="message-data-time">' +
                                new Date(message.timestamp).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) + // Formatted time
                                '</span></div>' +
                                '<div class="message ' + messageClass + '">' + // Message class applied dynamically
                                message.message +
                                '</div></li>'
                            );
                        });

                    }
                },
                error: function () {
                    console.error('Could not load messages. Please try again.');
                }
            });
        }

        // Load messages initially
        loadMessages();

        // Set an interval to refresh messages every 5 seconds
        setInterval(loadMessages, 5000); // Adjust the interval as needed

        // Existing code for sending message
        $('#sendMessage').click(function () {
            var message = $('#message').val();
            var senderId = $('#sender_id').val();
            var receiverId = $('#receiver_id').val();
            var name = $('#name').val();
            var status = $('#status').val();

            if (message.trim() !== '') {
                var sendMessageUrl = '../../rooms/send_message.php';
                console.log('Sending message to:', sendMessageUrl);

                $.ajax({
                    url: sendMessageUrl,
                    method: 'POST',
                    data: {
                        sender_id: senderId,
                        receiver_id: receiverId,
                        message: message,
                        name: name,
                        status: status
                    },
                    success: function (response) {
                        // Add message to chat history
                        $('#chat-history').append(
                            '<li class="clearfix"><div class="message-data"><span class="message-data-time">' +
                            new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }) +
                            '</span></div><div class="message my-message">' +
                            message +
                            '</div></li>'
                        );
                        $('#message').val(''); // Clear input field
                    },
                    error: function () {
                        alert('Message could not be sent. Please try again.');
                    }
                });
            } else {
                alert('Please enter a message.');
            }
        });
    });
</script>

<!-- <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>

</html>