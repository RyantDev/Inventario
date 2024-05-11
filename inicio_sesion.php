<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseño</title>
    <link rel="stylesheet" href="../css/styles_inicio_sesion.css">

<style>
body{
    margin: 0;
    padding: 0;
    font-family: monserrat;
    background-color: #d9d9d9;
    height: 100vh;
}

.formulario{
    position: absolute;
    height: 25rem;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 350px;
    background: white;
    border-radius: 15px;
    -webkit-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    -ms-border-radius: 15px;
    -o-border-radius: 15px;
}

.formulario h1{
    text-align: center;
    padding: 0 0 20px 0;
    border-bottom: 1px solid silver;
}

.formulario form{
    padding: 0 40px;
    box-sizing: border-box;
}

form .username{
    position: relative;
    border-radius: 1px solid #adadad;
    margin: 30px 0;
    -webkit-border-radius: 1px solid #adadad;
    -moz-border-radius: 1px solid #adadad;
    -ms-border-radius: 1px solid #adadad;
    -o-border-radius: 1px solid #adadad;
}

.username input{
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 16px;
    border: none;
    background: none;
    outline: none;
    border-bottom: 1px solid #adadad;
}
.username label{
    position: top;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 16px;
    pointer-events: none;
}

.username span::before{
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 100%;
    height: 2px;
    background: #a9a8a8;
}

.username input:focus ~ label,
.username input:focus ~ label{
    top: -5px;
    color: #a9a8a8;
}


.buttom {
    margin-top: 1rem;
    text-align: center;
}

.buttom {
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #0b1cb6;
    border-radius: 25px;
    font-size: 18px;
    color: white;
    cursor: pointer;
    outline: none;
}

.olvido{
    text-align: center;
    font-size: 30px;
    margin-top: 30%;
    margin-bottom: 10%;
}

.recordar{
    text-decoration: none;
}
.icon{
    position:absolute;
    height: 100%;
    top: -5%;
    right: -3.1rem;
    transform: translate(-50%);
    opacity: 0.3;
    cursor: pointer;
}
.icon :hover{
    opacity: 0.8;
}






</style>


</head>
<body>


    <div class="formulario">
        <h1>INICIO DE SESION</h1>
        <form method="post" action="Vistas/validar_inicio_sesion.php">
            <div class="username">
                <input type="text" name="username" required>
                <label>Nombre de usuario</label>
            </div>
            <div class="username">
                <input type="password" name="password" id="input" required>
                <label>Contraseña</label>
                <img src="imagenes/ojo.png" alt="" class="icon" id="ojo">
            </div>

            <a href="Vistas/olvido_contraseña.html" class="recordar">
                ¿Olvidó su contraseña?
            </a>
            <button type="submit" class="buttom">Iniciar sesión</button>
        </form>
    </div>


    <script src="../javascript/mostrar.js"></script>
    
    <script src="javascript/mostrar.js"></script>
</body>
</html>
