<?php
session_start();
require_once __DIR__ . "/config/conexao.php";
require_once __DIR__ . "/models/Funcionario.php";
require_once __DIR__ . "/models/FuncionarioComum.php";
require_once __DIR__ . "/models/Gerente.php";
require_once __DIR__ . "/controllers/FuncionarioController.php";

$controller = new FuncionarioController($pdo);
$mensagem = $_SESSION["mensagem"] ?? "";
unset($_SESSION["mensagem"]);

if ($_SERVER["REQUEST_METHOD"] === "POST" && ($_POST["acao"] ?? "") === "iniciar_sessao") {
    $nomeOperador = trim($_POST["operador"] ?? "");
    if ($nomeOperador !== "") {
        $_SESSION["operador"] = $nomeOperador;
        $_SESSION["mensagem"] = "Bem-vindo(a), " . $nomeOperador . "!";
    } else {
        $_SESSION["mensagem"] = "Informe o nome do operador.";
    }
    header("Location: index.php");
    exit;
}
