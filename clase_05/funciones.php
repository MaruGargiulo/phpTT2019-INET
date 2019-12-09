<?php 

// FUNCIÓN PARA VALIDAR CAMPOS DEL FORMULARIO DE REGISTRO

function validar($data) {

    // Creo un array de errores vacío.
    $errores = [];

    // CAMPO NOMBRE
    $nombre = trim($data['name']);
    // si está vacío,
    if($nombre == "") {
      // creo la posición "name" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['name'] = "El nombre es obligatorio";
    }

    // CAMPO EMAIL
    $email = trim($data['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // si está vacío
    if($email == ""){
      // creo la posición "email" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['email'] = "El mail es obligatorio";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errores['email'] = "El email ingresado no es válido";
    }
    
    // CAMPO NOMBRE DE USUARIO
    $userName = trim($data['username']);
    if(strlen($userName) < 5) {
      // creo la posición "username" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['username'] = "El nombre de usuario debe tener al menos 5 caracteres";
    }
    
    // CAMPO AVATAR
    $avatar = $_FILES['avatar'];
    // si no cargaron ningún archivo
    if($avatar['error']) {
      // creo la posición "avatar" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['avatar'] = "Debe subir una foto de perfil";
    } else {
        // obtengo la extensión
        $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
        if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
          $errores['avatar'] = "La extensión del archivo debe ser jpg, png ó jpeg";
        }
    }

    // CAMPO CONTRASEÑA
    $password = trim($data['password']);
    // si está vacío
    if($password == "" ) {
      // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['password'] = "La contraseña es obligatoria";
    }
      // si tiene una longitud menos a 6
      elseif (strlen($password) < 6) {
      // creo la posición "password" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['password'] = "La contraseña debe tener al menos 6 caracteres";
    }
    
    // CAMPO REPETIR CONTRASEÑA
    $cpassword = trim($data['confirm-password']);
    // si está vacío
    if($cpassword == "") {
      // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['repassword'] = "Debe repetir la contraseña para continuar";
    } 
      // si es diferente al password que escribió
      elseif($cpassword != $password) {
      // creo la posición "repassword" en el array de errores y guardo el string con el error que le quiero mostrar al usuario
      $errores['repassword'] = "Las contraseñas no coinciden";
    }

    // devuelvo el array de errores. Si no entró en ninǵun condicional de los declarados arriba, el array de errores va a estar vacío
    return $errores;
  }


// FUNCIÓN PARA GUARGAR IMAGEN

function guardarAvatar() {
    // me guardo la extensión del archivo
    $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

    // me guardo la carpeta temporal en la que se encuentra
    $directorioTemporal = $_FILES['avatar']['tmp_name'];

    // armo el nombre con el que voy a guardar la imagen. La función uniqid() puede recibir un string, que será el prefijo del id aleatorio generado
    $nombreImagen = uniqid('img_') . '.' . $ext;
    
    // armo la ruta final de la imagen, concatenando al final el nombre que creé
    $carpetaFinal = dirname(__FILE__) . '/avatars/' . $nombreImagen;
    
    // muevo el archivo a la carpeta avatars
    move_uploaded_file($directorioTemporal, $carpetaFinal);
    
    // devuelvo el nombre de la imagen que armé, para guardarlo en el array del usuario
    return $nombreImagen;
}


// FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST

function guardarUsuario($data) {
    
    $usuario = [
        "name" => $data["name"],
        "email" => $data["email"],
        "username" => $data["username"],
        "password" => password_hash($data["password"], PASSWORD_DEFAULT),
    ];
    
    return $usuario;
}

?>