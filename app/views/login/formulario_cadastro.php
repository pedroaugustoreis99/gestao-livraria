<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="cadastro-container">
    <form action="/cadastrar-usuario-submit" method="post" class="cadastro-form">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario">
        <?php if (isset($erros_de_validacao['usuario'])): ?>
            <span class="error-message"><?= $erros_de_validacao['usuario'] ?></span>
        <?php endif; ?>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">
        <?php if (isset($erros_de_validacao['senha'])): ?>
            <span class="error-message"><?= $erros_de_validacao['senha'] ?></span>
        <?php endif; ?>

        <label for="confirmar_senha">Confirme a senha</label>
        <input type="password" name="confirmar_senha" id="confirmar_senha">
        <?php if (isset($erros_de_validacao['confirmar_senha'])): ?>
            <span class="error-message"><?= $erros_de_validacao['confirmar_senha'] ?></span>
        <?php endif; ?>
        
        <input type="submit" value="Cadastrar">
    </form>
</main>

<?= view('layouts/footer') ?>
