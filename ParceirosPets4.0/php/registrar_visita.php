<?php
require_once "conexao.php";

$conn = Conexao::conectar();

$ip = $_SERVER['REMOTE_ADDR'];
$pagina = basename($_SERVER['SCRIPT_NAME']);

// Registrar a visita sem o usuário_id
$query = "INSERT INTO visitas (ip_usuario, pagina_visitada) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->execute([$ip, $pagina]);
?>
