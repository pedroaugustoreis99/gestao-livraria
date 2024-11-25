<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="exclusao-container">
    <form action="/exclusao-confirmada" method="POST" class="exclusao-form">
        <label for="senha">Para excluir seu perfil, confirme sua senha:</label>
        <input type="password" name="senha" id="senha">

        <?php if (isset($erro_de_validacao)): ?>
            <span class="error-message"><?= $erro_de_validacao ?></span>
        <?php endif; ?>

        <button type="submit" class="btn-excluir">
            Excluir Perfil
        </button>
    </form>
</main>

<?= view('layouts/footer') ?>
