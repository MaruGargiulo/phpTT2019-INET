<?php 

session_start();

// FUNCIÓN PARA VALIDAR CAMPOS DEL FORMULARIO DE REGISTRO DE REGISTRO

function validarRegistro($data) {

  $errores = [];

  $nombre = trim($data['name']);
  if($nombre == "") {
    $errores['name'] = "El nombre es obligatorio";
  }

  $email = trim($data['email']);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);
  if($email == ""){
    $errores['email'] = "El mail es obligatorio";
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = "El email ingresado no es válido";
  }
  
  $userName = trim($data['username']);
  if(strlen($userName) < 5) {
    $errores['username'] = "El nombre de usuario debe tener al menos 5 caracteres";
  }
  
  $avatar = $_FILES['avatar'];
  if($avatar['error']) {
    $errores['avatar'] = "Debe subir una foto de perfil";
  } else {
      $ext = pathinfo($avatar['name'], PATHINFO_EXTENSION);
      if($ext !== 'jpg' && $ext !== 'jpeg' && $ext !== 'png') {
        $errores['avatar'] = "La extensión del archivo debe ser jpg, png ó jpeg";
      }
  }

  $password = trim($data['password']);
  if($password == "" ) {
    $errores['password'] = "La contraseña es obligatoria";
  } elseif (strlen($password) < 6) {
    $errores['password'] = "La contraseña debe tener al menos 6 caracteres";
  }
  
  $cpassword = trim($data['confirm-password']);
  if($cpassword == "") {
    $errores['repassword'] = "Debe repetir la contraseña para continuar";
  } elseif($cpassword != $password) {
    $errores['repassword'] = "Las contraseñas no coinciden";
  }

  return $errores;
}


// FUNCIÓN PARA GUARGAR IMAGEN

function guardarAvatar() {
  $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
  $directorioTemporal = $_FILES['avatar']['tmp_name'];
  $nombreImagen = uniqid('img_') . '.' . $ext;
  $carpetaFinal = dirname(__FILE__) . '/avatars/' . $nombreImagen;
  move_uploaded_file($directorioTemporal, $carpetaFinal);
  return $nombreImagen;
}


// FUNCIÓN PARA CREAR UN ARRAY ASOCIATIVO CON LOS DATOS QUE ME LLEGAN POR POST

function crearUsuario($data) {
    
  $usuario = [
    "name" => $data["name"],
    "email" => $data["email"],
    "username" => $data["username"],
    "password" => password_hash($data["password"], PASSWORD_DEFAULT),
  ];
  
  return $usuario;
}

// FUNCIÓN PARA LEER LOS USUARIOS DEL JSON - db hace referencia a Data Base. La función devuelve un array de los usuarios registrados

function dbDeUsuarios() {

  $listaDeUsuarios = file_get_contents('usuarios.json');
  return json_decode($listaDeUsuarios, true);

}

// FUNCIÓN PARA GUARDAR USUARIO NUEVO EN EL JSON

function guardarUsuario($usuario) {
  
  $arrayUsuarios = dbDeUsuarios();
  $arrayUsuarios[] = $usuario;
  $todosLosUsuarios = json_encode($arrayUsuarios);
  file_put_contents('usuarios.json', $todosLosUsuarios);

}


// LOGUIN

function validarLoguin() {
  $errores = [];

  $email = trim($_POST['email']);
  $pass = trim($_POST['password']);

  if(empty($email)) {
    $errores['email'] = 'El campo email es obligatorio';
  } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'El formato introducido no es válido';
  } elseif(!buscarUsuarioPorEmail($email)) {
    $errores['email'] = 'Las credenciales no coinciden';
  } else {
    $usuario = buscarUsuarioPorEmail($email);
    if( !password_verify($pass, $usuario['password']) ) {
      $errores['email'] = 'Las credenciales no coinciden';
    }
  }

  if(empty($pass)) {
    $errores['password'] = 'El campo password es obligatorio';
  }

  return $errores;

}

// FUNCIÓN PARA BUSCAR USUARIO POR MAIL

function buscarUsuarioPorEmail($email) {
  $arrayUsuarios = dbDeUsuarios();
  foreach($arrayUsuarios as $usuario) {
    if($usuario['email'] == $email) {
      return $usuario;
    }
  }
}

// FUNCIÓN PARA COMPARAR CONTRASEÑAS

function compararPasswords($pass) {

}

// FUNCIÓN PARA SABER SI ESTÁ LOGUEADO

function estaLogueado() {
  return isset($_SESSION['usuarioLogueado']);
  // Pregunta si está seteado el índice usuario en sesión. Devuelve un booleano
}


// FUCIÓN PARA GUARDAR AL USUARIO EN SESIÓN

function loguearUsuario($usuario) {
  // con esta función borro la posición password del array de usuario que recibo, para no guardar ese dato en sesión
  unset($usuario['password']);
  // creo una posición de usuarioLogueado en la variale sessión
  $_SESSION['usuarioLogueado'] = $usuario;
  // lo redirecciono a la vista de perfil
  header('Location: profile.php');
  // se recomienda hacer un exit después de una redirección
  exit;
}

// FUNCIÓN PARA CREAR LA COOKIE DEL USUARIO Y MANTENERLO LOGUEADO

function recordarUsuario($email) {
  setcookie('emailUsuario', $email , time() + 3000);
}


?>