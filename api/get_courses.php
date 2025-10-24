<?php
// api/get_courses.php

header('Content-Type: application/json'); // Indica que la respuesta será en formato JSON
require 'db_connect.php'; // Reutilizamos la conexión a la base de datos

$courses = []; // Creamos un array vacío para almacenar los cursos

// Preparamos y ejecutamos la consulta a la base de datos
$sql = "SELECT id, title, instructor, avatar, category, price, rating, students, duration, image, description FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si se encontraron cursos, los recorremos y los añadimos a nuestro array
    while($row = $result->fetch_assoc()) {
        // Aseguramos que los números sean tratados como números en JSON
        $row['id'] = (int)$row['id'];
        $row['price'] = (int)$row['price'];
        $row['rating'] = (float)$row['rating'];
        $row['students'] = (int)$row['students'];
        $courses[] = $row;
    }
}

// Cerramos la conexión a la base de datos
$conn->close();

// Devolvemos el array de cursos codificado en formato JSON
echo json_encode($courses);
?>