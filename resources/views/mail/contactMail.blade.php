<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $mailData['title'] }}</title>
</head>

<body>
    <h4>Nama Pengirim : {{ $mailData['name'] }}</h4>
    <h4>Alamat Email : {{ $mailData['email'] }}</h4>
    <h4>No. Handphone : {{ $mailData['phone'] }}</h4>
    <h4>Judul : {{ $mailData['subject'] }}</h4>
    <h4>Pesan</h4>
    <p>{{ $mailData['message'] }}</p>
    <hr>
    <p>Jangan Lupa Untuk Membalas Pesan Tersebut Melalui Email Atau No. Handphone.</p>
    <p>Jika membalas lewat email, buat email baru dengan target email yang tertera di atas.</p>
</body>

</html>
