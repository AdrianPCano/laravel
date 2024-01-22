<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Esta línea para la codificación de carácteres -->
  <meta charset="utf-8">
  <!-- Esta línea es para garantizar un diseño responsive que se adapte a todas las pantallas -->
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="shortcut icon" href="https://www.youtube.com/s/desktop/12d6b690/img/favicon.ico">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <title>Login</title>
  <meta name="description" content="descripción de la web, se recomienda 90 caracteres">
  <meta name="keywords" 	 content="palabras clave, separadas, por comas">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  @vite(['resources/sass/auth-app.scss'])

</head>

<body>
    <div class="login-container">
        <form class="login-form">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <div class="button-container">
                <a href="" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                <button type="submit">iniciar sesión</button>
            </div>
        </form>
    </div>

</body>

</html>
