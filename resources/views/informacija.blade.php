<!DOCTYPE html>


<html>
<head>
    <title>CitySeek Events</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
<section id="main">
    <h1>Turnyrinė lentelė</h1>
    <table>
        <tr>
            <td>ID</td>
            <td>Pavadinimas</td>
            <td>Aprasymas</td>
            <td>Pradzios laikas</td>
            <td>Pabaigos laikas</td>
            <td>Likes laikas</td>
        </tr>
        @foreach( $renginys as $id)
            <tr>
                <td>{{$id->id}}</td> <td>{{$id->name}}</td> <td>{{$id->aprasymas}}</td>
                <td>{{$id->pradzios_data}}</td> <td>{{$id->pabaigos_data}}</td> <td>{{$id->likes_laikas}}</td>
            </tr>
        @endforeach

    </table>
</body>
</html>

<!-- Footer -->
<footer id="footer">
    <p>&copy; CitySeek Kaunas </a>.</p>
</footer>