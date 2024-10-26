<?php
include '../../include/global.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if sender_id and receiver_ids are set
    if (isset($_POST['sender_id']) && !empty($_POST['sender_id']) && isset($_POST['receiver_ids']) && !empty($_POST['receiver_ids'])) {
        
        $sender_id = $_POST['sender_id'];
        // Split the comma-separated receiver IDs into an array
        $receiverIds = explode(',', $_POST['receiver_ids']);
        
        // Debugging - Check if sender_id and receiver_ids are set
        echo "Sender ID: " . htmlspecialchars($sender_id) . "<br>";
        echo "Receiver IDs: " . htmlspecialchars(implode(', ', $receiverIds)) . "<br>";
        
        // Start a transaction
        $con->begin_transaction();
        
        try {
            // Prepare the delete query
            $query = "DELETE FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?)";
            $stmt = $con->prepare($query);
            if (!$stmt) {
                throw new Exception("Error preparing statement: " . $con->error);
            }

            // Loop through each receiver_id and delete messages
            foreach ($receiverIds as $receiver_id) {
                // Bind parameters for both combinations of sender_id and receiver_id
                $stmt->bind_param("iiii", $sender_id, $receiver_id, $receiver_id, $sender_id);

                // Execute the statement
                if (!$stmt->execute()) {
                    throw new Exception("Error executing query: " . $stmt->error);
                }
            }

            // Commit the transaction
            $con->commit();

            // Redirect with success message
            header("Location: chat.php?success=Messages deleted");
            exit;

        } catch (Exception $e) {
            // Rollback transaction if any error occurs
            $con->rollback();
            echo $e->getMessage();
        }

    } else {
        echo "Sender ID or Receiver IDs are not set or empty.";
    }
}
?>
