<?php

// Function to check URL status
function checkURLStatus($url) {
    // Initialize cURL session
    $ch = curl_init($url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10); // Timeout in seconds
    
    // Execute cURL request
    curl_exec($ch);
    
    // Get HTTP response code
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Close cURL session
    curl_close($ch);
    
    // Return HTTP status code
    return $httpStatus;
}

// Main API endpoint
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if URL parameter is set
    if (isset($_POST['url'])) {
        $url = $_POST['url'];
        
        // Call function to check URL status
        $status = checkURLStatus($url);
        
        // Prepare response
        $response = array();
        
        if ($status == 200) {
            // URL is loading fine
            $response['status'] = 'success';
            $response['message'] = 'URL is loading fine';
        } else {
            // URL is not loading
            $response['status'] = 'error';
            $response['message'] = 'URL is not loading';
        }
        
        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // URL parameter is not set
        http_response_code(400); // Bad request
        echo json_encode(array('error' => 'URL parameter is required'));
    }
} else {
    // Invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('error' => 'Only POST method is allowed'));
}

?>
