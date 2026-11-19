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
    
    <?php if (empty($_SESSION["operador"])): ?>
    <section class="painel pequeno">
        <h2>Identificação do operador</h2>
        <form method="POST" class="formulario">
            <input type="hidden" name="acao" value="iniciar_sessao">
            <label>Seu nome</label>
            <input type="text" name="operador" required placeholder="Digite seu nome">
            <button type="submit">Entrar no sistema</button>
        </form>
    </section>
    <?php else: ?>
    <section class="painel">
        <h2>Cadastrar funcionário</h2>
        <form method="POST" class="formulario grade">
            <input type="hidden" name="acao" value="cadastrar">
            <div><label>Nome</label><input name="nome" maxlength="100" required></div>
            <div><label>E-mail</label><input type="email" name="email" maxlength="150" required></div>
            <div><label>Salário (R$)</label><input type="number" name="salario" min="0.01" step="0.01" required></div>
            <div><label>Tipo de funcionário</label><select name="tipo" required><option value="">Selecione</option><option value="Comum">Funcionário comum</option><option value="Gerente">Gerente</option></select></div>
            <button type="submit">Cadastrar funcionário</button>
        </form>
    </section>
     <?php if ($excluirId): ?>
    <section class="painel confirmacao">
        <h2>Confirmar exclusão</h2>
        <?php if ($funcionarioExcluir): ?>
            <p>Deseja realmente excluir <strong><?= e($funcionarioExcluir["nome"]) ?></strong>?</p>
            <form method="POST" class="acoes">
                <input type="hidden" name="acao" value="excluir">
                <input type="hidden" name="id" value="<?= (int)$funcionarioExcluir["id"] ?>">
                <button class="perigo" type="submit">Sim, excluir</button>
                <a class="btn-secundario link-botao" href="index.php">Cancelar</a>
            </form>
        <?php else: ?><p>Funcionário não encontrado.</p><a href="index.php">Voltar</a><?php endif; ?>
    </section>
    <?php endif; ?>

    <section class="painel">
        <h2>Funcionários cadastrados</h2>
        <?php if (!$funcionarios): ?><p class="vazio">Nenhum funcionário cadastrado.</p><?php else: ?>
        <div class="tabela-responsiva">
        <table>
            <thead><tr><th>Nome</th><th>E-mail</th><th>Tipo</th><th>Salário</th><th>Bônus</th><th>Ação</th></tr></thead>
            <tbody>
            <?php foreach ($funcionarios as $item):
                $classe = $item["tipo"] === "Gerente" ? "Gerente" : "FuncionarioComum";
                $objeto = new $classe($item["nome"], $item["email"], (float)$item["salario"]);
            ?>