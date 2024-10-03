<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Post</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya untuk tabel dengan garis tepi hitam */
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black; /* Garis tepi hitam */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; /* Warna latar belakang untuk header */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Post</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Konten</th>
                </tr>
            </thead>
            <tbody>
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
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($post['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($post['title']) . "</td>";
                        echo "<td>" . htmlspecialchars($post['body']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tidak ada data yang diterima.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

