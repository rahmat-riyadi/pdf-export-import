<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body class="antialiased">
        <form action="/" method="POST" enctype="multipart/form-data" >
            @csrf
            <input type="file" name="file[]" id="" multiple>
            <input type="text" name="kota" placeholder="masukkan kota" >
            <input type="text" name="kecamatan" placeholder="masukkan kecamatan" >
            <button type="submit">simpan</button>
        </form>
        <a href="/download">download</a>
    </body>
</html>
