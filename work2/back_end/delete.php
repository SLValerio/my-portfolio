<?php
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Use Firebase REST API to delete data
    $data = json_decode(file_get_contents("php://input"));

    // Replace this with your Firebase Realtime Database URL
    $firebaseDatabaseURL = "https://clover-0320-default-rtdb.firebaseio.com/";

    // Construct the endpoint URL for your friends data
    $friendsEndpoint = $firebaseDatabaseURL . "friends.json";

    $response = file_get_contents($friendsEndpoint, false,
        stream_context_create([
        'http' => [
            'method' => 'DELETE',
            'header' => "Content-type: application/json",
            'content' => json_encode($data)
        ]
    ]));

    echo $response;
}
?>
