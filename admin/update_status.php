<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $application_id = $_POST['application_id'];
    $action = $_POST['action'];

    if ($action === 'add_to_members') {
        $status = 'approved';

        // Update the membership application status
        $stmt = $conn->prepare("UPDATE membership_applications SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $application_id);

        if ($stmt->execute()) {
            // Fetch applicant details without email
            $select_query = "SELECT full_name, id_number, postal_address, gender, chief, contact_details_work, contact_details, marital_status, dob, occupation, employment_number, name_of_employer, address_of_employer, savings, residential_address, entrance_fee, shares_capital, laws, nominee, date, signature, contact 
                             FROM membership_applications WHERE id = ?";
            $select_stmt = $conn->prepare($select_query);
            $select_stmt->bind_param("i", $application_id);
            $select_stmt->execute();
            $result = $select_stmt->get_result();
            $application = $result->fetch_assoc();

            if ($application) {
                // Insert new member record without email
                $insert_query = "INSERT INTO members (full_name, id_number, postal_address, gender, chief, contact_details_work, contact_details, marital_status, dob, occupation, employment_number, name_of_employer, address_of_employer, savings, residential_address, entrance_fee, shares_capital, laws, nominee, date, signature, contact, application_id)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $insert_stmt = $conn->prepare($insert_query);
                $insert_stmt->bind_param("ssssssssssssssssssssssi", 
                    $application['full_name'], $application['id_number'], $application['postal_address'],
                    $application['gender'], $application['chief'],
                    $application['contact_details_work'], $application['contact_details'],
                    $application['marital_status'], $application['dob'], $application['occupation'],
                    $application['employment_number'], $application['name_of_employer'],
                    $application['address_of_employer'], $application['savings'],
                    $application['residential_address'], $application['entrance_fee'],
                    $application['shares_capital'], $application['laws'], $application['nominee'],
                    $application['date'], $application['signature'], $application['contact'],
                    $application_id
                );

                
                if ($insert_stmt->execute()) {
                    // Get the auto-generated member ID
                    $member_id = $insert_stmt->insert_id;
                    
                    // Set default password (hashed for security)
                    $default_password = "default123";
                    
                    // Insert into users table without email
                    $user_insert_query = "INSERT INTO users (username, password, role) VALUES (?, ?, 'member')";
                    $user_stmt = $conn->prepare($user_insert_query);
                    $user_stmt->bind_param("ss", $member_id, $default_password);
                    
                    if ($user_stmt->execute()) {
                        echo "Application approved, member added, and user account created.";
                    } else {
                        echo "Member added, but failed to create user account: " . $user_stmt->error;
                    }
                    
                    $user_stmt->close();
                } else {
                    echo "Application approved, but failed to add member: " . $insert_stmt->error;
                }
                
                $insert_stmt->close();
            }
            $select_stmt->close();
        } else {
            echo "Error updating application: " . $stmt->error;
        }
        $stmt->close();
    } elseif ($action === 'delete') {
        // Delete the record from membership applications
        $delete_stmt = $conn->prepare("DELETE FROM membership_applications WHERE id = ?");
        $delete_stmt->bind_param("i", $application_id);

        if ($delete_stmt->execute()) {
            echo "Application deleted successfully.";
        } else {
            echo "Failed to delete application: " . $delete_stmt->error;
        }
        $delete_stmt->close();
    } else {
        echo "Invalid action.";
    }
    
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
