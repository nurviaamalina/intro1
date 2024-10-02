<?php

// $url='https://jsonplaceholder.typicode.com/posts';
// $ch = curl_init($url);

// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);

// $data = json_decode($response, true);
// $firstFivePosts = array_slice($data, 0,5);
// print_r ($firstFivePosts);

?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Post</h1>
        <ul class="list-group">
            <?php
            // URL API
            $url = 'https://jsonplaceholder.typicode.com/posts';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Decode JSON menjadi array PHP
            $data = json_decode($response, true);

            // Cek jika $data tidak null
            if ($data !== null) {
                // Ambil 5 data pertama
                $firstFivePosts = array_slice($data, 0, 5);
                foreach ($firstFivePosts as $post) {
                    echo "<li class='list-group-item'>";
                    echo "<h5>" . htmlspecialchars($post['title']) . "</h5>";
                    echo "<p>" . htmlspecialchars($post['body']) . "</p>";
                    echo "</li>";
                }
            } else {
                echo "<li class='list-group-item'>Tidak ada data yang diterima.</li>";
            }
            ?>
        </ul>
    </div>
</body>
</html>
