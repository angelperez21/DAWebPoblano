<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="css/stylesSignIn.css">
    <link rel="shortcut icon" href="images/logo.ico">
</head>
<body>
    <h1>Bienvenido</h1>
    <div class="container" id="container">
    	<div class="form-container sign-up-container">
    		<form action="API/users/user/new" method="POST">
                <h1>Crea tu cuenta</h1>
    			<span>utilizando tu correo electronico</span>
    			<input type="text" name="name" placeholder="Nombre" required/>
    			<input type="email" name="email" placeholder="Correo Electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required />
    			<input type="password" name="passwd" placeholder="Contraseña" required />
    			<button>Registrate</button>

    		</form>
    	</div>
    	<div class="form-container sign-in-container">
    		<form action="API/users/user/exists" method="POST">
    			<h1>Iniciar sesión</h1>
    			<span>con su cuenta</span>
    			<input type="email" name="email" placeholder="Correo Electronico" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}"  required/>
    			<input type="password" name="passwd" placeholder="Contraseña" required />
    			<button>Iniciar sesión</button>
    		</form>
    	</div>
    	<div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-left">
    				<h1>Bienvenido nuevamente</h1>
    				<p>Ingresa los datos con los que te registrate y comienza la diversión</p>
    				<button class="ghost" id="signIn">Iniciar sesión    </button>
    			</div>
    			<div class="overlay-panel overlay-right">
                    <?php
                        if(isset($_GET["failedadd"]) && $_GET["failedadd"] == 'true'){
                            echo '<h1>¡Hola!</h1>';
            				echo '<p>
                                        <strong>Atención</strong>
                                        Error al registrarte, el correo ingresado ya se encuentra registrado
                                  </p>';
            				echo '<button class="ghost" id="signUp">Registrate</button>';
                        }else if(isset($_GET["failed"]) && $_GET["failed"] == 'true'){
                            echo '<h1>¡Hola!</h1>';
            				echo '<p>
                                        <strong>Atención</strong>
                                        Verifica los datos ingresados
                                  </p>';
            				echo '<button class="ghost" id="signUp">Registrate</button>';
                        }else{
<<<<<<< HEAD
                            echo '<h1>¡Hola!</h1>';
=======
                            echo '<h1>¡Amigo!</h1>';
>>>>>>> 64c9bbbdbd3c217c4cebcdc8b3222bfd55e4477e
            				echo '<p>Si no cuentas con una cuenta ingresea tus datos y unete a nosotros</p>';
            				echo '<button class="ghost" id="signUp">Registrate</button>';
                        }
                    ?>
    			</div>
    		</div>
    	</div>

    </div>
    <script type="text/javascript">
        const signUpButton = document.getElementById("signUp");
        const signInButton = document.getElementById("signIn");
        const container = document.getElementById("container");

        signUpButton.addEventListener("click", () => {
        container.classList.add("right-panel-active");
        });

        signInButton.addEventListener("click", () => {
        container.classList.remove("right-panel-active");
        });
    </script>
</body>
</html>
