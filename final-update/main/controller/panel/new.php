<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <title>Notification Dropdown</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="notificationsDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bell"></i>
                <span class="badge badge-danger" id="notificationCount">0</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="notificationsDropdown" id="notificationMenu">
                <h6 class="dropdown-header">Notifications</h6>
                <div id="notificationList"></div>
            </div>
        </li>
    </ul>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function fetchMessages() {
    $.ajax({
        url: 'fetch_messages.php', // URL to your PHP script
        method: 'GET',
        dataType: 'json',
        success: function(messages) {
            updateNotifications(messages);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error fetching messages:', textStatus, errorThrown);
        }
    });
}

// Function to update notifications
function updateNotifications(messages) {
    const notificationCount = document.getElementById("notificationCount");
    const notificationList = document.getElementById("notificationList");

    // Update count
    notificationCount.textContent = messages.length;

    // Clear existing messages
    notificationList.innerHTML = "";

    // Add messages to dropdown
    messages.forEach((msg) => {
        const listItem = document.createElement("div");
        listItem.className = "dropdown-item";
        listItem.textContent = `${msg.name}: ${msg.message}`; // Display name and message
        notificationList.appendChild(listItem);
    });
}

// Event listener for dropdown click
document.getElementById("notificationsDropdown").addEventListener("click", function() {
    fetchMessages(); // Fetch messages on click
});
</script>

</body>
</html>
