
<html>
<head>
<link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>

<div class="container">


    <div class="formulario">
        <h1><?=$title; ?></h1>
        <br>
        <br>


        <form action="login/login" method="post">
            <label for="nom">Nombre</label>
            <input type="text" name="user" placeholder="Introduce tu nombre.."><br><br>
            <label for="pasw">Contraseña</label><input type="password" name="pwd" placeholder="Introduce la contraseña.."><br><br>
            <input type="submit" name="submit" value="Entra"><br>

            <p><br>No tienes una cuenta?<a href="/registrar">Registrate aqui!</p>


        </form>
    </div>
</div>
</body>

</html>