<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="login-container">
    <form action="/login-submit" method="post" class="login-form">
        <label for="usuario">Usuário</label>
        <input type="text" name="usuario" id="usuario">

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha">

        <?php if (isset($erros_de_validacao)): ?>
            <span class="error-message"><?= $erros_de_validacao ?></span>
        <?php endif; ?>

        <input type="submit" value="Login">
    </form>
</main>

<?= view('layouts/footer') ?>
