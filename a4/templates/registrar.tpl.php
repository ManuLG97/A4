
<!DOCTYPE html>
<html>
<head>
    <title>Registrar</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
<div class="container">

    <div class="formulario">
        <h1><?=$title; ?></h1>
        <br>
        <br>

        <form action="/registrar/registrar" method="post">
            <label for="nom">Nombre</label>
            <input type="text" name="user" placeholder="Introduce tu nombre"><br><br>
            <label for="pasw">Contraseña</label><input type="password" name="pwd" placeholder="Contraseña nueva"><br><br>
            <input type="submit" name="submit" value="Registrar"><br>




        </form>
    </div>
</div>
</body>
</html>