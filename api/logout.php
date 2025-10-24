<?php
// api/logout.php
session_start();      // Inicia para acceder a la sesión.
session_unset();      // Libera todas las variables de sesión.
session_destroy();    // Destruye toda la información registrada de una sesión.

http_response_code(200);
echo json_encode(['message' => 'Sesión cerrada exitosamente.']);
?>