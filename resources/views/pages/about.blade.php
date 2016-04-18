<!DOCTYPE html>
<html>
<head>
<title>About us</title>
</head>
<body>
    <h1>This is the about page </h1>
    <p> {{$companyName}} </p>
    @if($isUserRegistered == true)
        Hello mate!
    @else
          <p> Please register!</p>
    @endif

    @for ($i = 0; $i < 10; $i++)
       <p> The current value is {{ $i }} </p>
    @endfor

    @foreach($users as $data)
        {{ $data }} <br>
    @endforeach
</body>

</html>


