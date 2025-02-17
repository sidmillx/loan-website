<?php
// Database connection
require('../config/db.php');

require('../lib/TCPDF-main/tcpdf.php'); // Include TCPDF for PDF generation

// Function to generate PDF
function generatePDF($data) {

    // Get the current date and time
    $currentDate = date('Y-m-d H:i:s');


    $pdf = new TCPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Loan Website');
    $pdf->SetTitle('Loan Application Form');
    $pdf->SetHeaderData('', 0, 'Online Loan Application Form', "Generated at: " . $currentDate);
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 11);

    $html = '<h2>Loan Application Form</h2><table border="1" cellpadding="3">';
    foreach ($data as $key => $value) {
        $html .= '<tr><td><b>' . ucfirst(str_replace('_', ' ', $key)) . '</b></td><td>' . htmlspecialchars($value) . '</td></tr>';
    }
    $html .= '</table>';

    $pdf->writeHTML($html, true, false, true, false, '');
    // $pdf->Output('member_application.pdf', 'D');
    // exit;

    // Set the file name using the 'full_name' field
    $fileName = 'Loan_application-' . sanitizeFileName($data['full_name']) . '.pdf';

    // Output the PDF to the browser or download it
    $pdf->Output($fileName, 'D');
    exit;
}

// Function to sanitize the filename by removing invalid characters
function sanitizeFileName($fileName) {
    // Remove any invalid characters for a filename (e.g., slashes, colons, etc.)
    return preg_replace('/[^\w\s-]/', '', $fileName);
}

// Fetch data from the database based on member ID
if (isset($_GET['id'])) {
    $member_id = $_GET['id']; // Assuming you're passing the member ID in the URL like ?id=1

    // Query the database for the member data
    $sql = "SELECT * FROM loans WHERE loan_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a result is returned
    if ($result->num_rows > 0) {
        // Fetch the data
        $data = $result->fetch_assoc();
        generatePDF($data);
    } else {
        echo "No record found.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Member Application</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Member Application Form</h2>
        <form method="post" action="details.php">
            <?php
            $fields = [
                'loan_id', 'member_id', 'loan_type', 'pb_number', 'savings_balance', 'loan_balance','postal_address', 'contact_details_work',
                'contact_details_cell', 'contact_details_home', 'number_of_dependents', 'gross_salary', 'net_salary', 'loan_amount', 'loan_period',
                'installment_date', 'installment', 'loan_purpose', 'signature', 'date', 'name_of_bank', 'account_number',
                'branch', 'surety_offered', 'surety_value', 'existing_loan', 'existing_loan_details', 'status',
                'created_at', 'due_date'
            ];
            foreach ($fields as $field) {
                echo "<div class='mb-3'>";
                echo "<label class='form-label'>" . ucfirst(str_replace('_', ' ', $field)) . "</label>";
                echo "<input type='text' name='$field' class='form-control' required>";
                echo "</div>";
            }
            ?>
            <button type="submit" class="btn btn-primary">Generate PDF</button>
        </form>
    </div>
</body>
</html>
