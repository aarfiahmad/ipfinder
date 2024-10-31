<?php
// Get the user's IP address
$user_ip = '';
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $user_ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $user_ip = $_SERVER['REMOTE_ADDR'];
}



// Display IP address
echo "User's IP Address: " . $user_ip;

// Optional: Get location data using an IP Geolocation API
$api_key = 'd8509dc52e4b16'; // Replace with your API key
$response = file_get_contents("http://ipinfo.io/{$user_ip}?token={$api_key}");
$location_data = json_decode($response, true);

// Display location information
if ($location_data) {
    echo "<br>Location: " . $location_data['city'] . ", " . $location_data['region'] . ", " . $location_data['country'];
    echo "<br>Coordinates: " . $location_data['loc'];
}
?> 
