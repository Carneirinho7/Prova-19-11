<?php
function e($valor): string {
    return htmlspecialchars((string)$valor, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Funcionários</title>
    <link rel="stylesheet" href="views/style.css">
</head>
<body>
<header class="topo">
    <div><h1>Gestão de Funcionários</h1><p>Sistema de cadastro e gerenciamento</p></div>
    <?php if (!empty($_SESSION["operador"])): ?>
        <div class="operador">
            <span>Olá, <?= e($_SESSION["operador"]) ?>!</span>
            <form method="POST"><input type="hidden" name="acao" value="encerrar_sessao"><button class="btn-secundario">Encerrar sessão</button></form>
        </div>
    <?php endif; ?>
</header>
<main class="container">
    <?php if ($mensagem): ?><div class="mensagem"><?= e($mensagem) ?></div><?php endif; ?>