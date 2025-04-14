<?php
require_once "conexao.php";

$conn = Conexao::conectar();

// Executa as views e pega os totais de cada tipo
$usuarios = $conn->query("SELECT total_usuarios FROM vw_total_usuarios")->fetchColumn();
$adocoes = $conn->query("SELECT total_adocoes FROM vw_total_adocoes")->fetchColumn();
$doacoes = $conn->query("SELECT total_doacoes FROM vw_total_doacoes")->fetchColumn();
$voluntarios = $conn->query("SELECT total_voluntarios FROM vw_total_voluntarios")->fetchColumn();
$visitas = $conn->query("SELECT total_visitas FROM vw_total_visitas")->fetchColumn();

// Total geral do sistema
$total = $usuarios + $adocoes + $doacoes + $voluntarios + $visitas;

// Calcula as porcentagens
$dados = [
    'usuarios' => $total > 0 ? round(($usuarios / $total) * 100) : 0,
    'adocoes' => $total > 0 ? round(($adocoes / $total) * 100) : 0,
    'doacoes' => $total > 0 ? round(($doacoes / $total) * 100) : 0,
    'visitas' => $total > 0 ? round(($visitas / $total) * 100) : 0
];

/// o javascript lê essa merda
echo json_encode($dados);
?>
