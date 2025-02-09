<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];
    $action = $_POST['action'];
    $admin_id = 1; // Replace this with the actual admin ID from the session if available
    

    if ($action === 'approve') {
        $status = 'approved';
        $rejection_reason = NULL;
    } elseif ($action === 'reject') {
        $status = 'rejected';
        $rejection_reason = $_POST['rejection_reason'] ?? 'No reason provided';
    } else {
        echo "Invalid action.";
        exit;
    }

    $decision_date = date('Y-m-d H:i:s');

    // Update the membership application status
    $stmt = $conn->prepare("UPDATE membership_applications 
                            SET status = ?, rejection_reason = ?, decision_date = ?, admin_id = ? 
                            WHERE id = ?");
    $stmt->bind_param("sssii", $status, $rejection_reason, $decision_date, $admin_id, $application_id);

    if ($stmt->execute()) {
        // ✅ Insert into the members table if approved
        if ($status === 'approved') {
            $select_query = "SELECT full_name, email, contact_details, id_number, dob, residential_address 
                             FROM membership_applications 
                             WHERE id = ?";
            $select_stmt = $conn->prepare($select_query);
            $select_stmt->bind_param("i", $application_id);
            $select_stmt->execute();
            $result = $select_stmt->get_result();
            $application = $result->fetch_assoc();

            if ($application) {
                $insert_query = "INSERT INTO members (full_name, email, contact_details, id_number, dob, residential_address, application_id) 
                                 VALUES (?, ?, ?, ?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_query);
                $insert_stmt->bind_param(
                    "ssssssi",
                    $application['full_name'],
                    $application['email'],
                    $application['contact_details'],
                    $application['id_number'],
                    $application['dob'],
                    $application['residential_address'],
                    $application_id
                );

                if ($insert_stmt->execute()) {
                    echo "Application has been $status successfully, and member added.";
                } else {
                    echo "Application approved, but failed to add member: " . $insert_stmt->error;
                }
                $insert_stmt->close();
            }
            $select_stmt->close();
        } else {
            echo "Application has been $status successfully.";
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
