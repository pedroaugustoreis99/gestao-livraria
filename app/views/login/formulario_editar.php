<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="perfil-container">
    <form action="/atualizar-perfil" method="post" class="perfil-form">
        <label for="senha_atual">Digite a sua senha atual:</label>
        <input type="password" name="senha_atual" id="senha_atual">
        <?php if (isset($erros_de_validacao['senha_atual'])): ?>
            <span class="error-message"><?= $erros_de_validacao['senha_atual'] ?></span>
        <?php endif; ?>

        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario" value="<?= $usuario ?>">
        <?php if (isset($erros_de_validacao['usuario'])): ?>
            <span class="error-message"><?= $erros_de_validacao['usuario'] ?></span>
        <?php endif; ?>

        <label for="senha">Nova senha:</label>
        <input type="password" name="senha" id="senha">
        <?php if (isset($erros_de_validacao['senha'])): ?>
            <span class="error-message"><?= $erros_de_validacao['senha'] ?></span>
        <?php endif; ?>

        <label for="confirmar_senha">Confirme a nova senha:</label>
        <input type="password" name="confirmar_senha" id="confirmar_senha">
        <?php if (isset($erros_de_validacao['confirmar_senha'])): ?>
            <span class="error-message"><?= $erros_de_validacao['confirmar_senha'] ?></span>
        <?php endif; ?>

        <input type="submit" value="Atualizar">
    </form>

    <p class="perfil-excluir">
        Para excluir o seu perfil <a href="/excluir-perfil" class="excluir-link">clique aqui</a>.
    </p>
</main>

<?= view('layouts/footer') ?>
