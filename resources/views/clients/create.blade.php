<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "/clients/store" method = "POST">
        @csrf
        <input name = "name" placeholder = "Nome">
        <br><br>
        <input name = "email" placeholder = "Email">
        <br><br>
        <input name = "phone" placeholder = "Telefone">
        <br><br>
        <input name = "id_number" placeholder = "CPF">
        <br><br>
        <button type = "submit" style = "width: 175px; height: 40px">Enviar</button>
    </form>
</body>
</html>