<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="autor-cadastro-container">
    <form action="/autores/store" method="post" class="autor-cadastro-form">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="input-field">
            <?php if (isset($erros_de_validacao['nome'])): ?>
                <span class="error-message"><?= $erros_de_validacao['nome'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="input-field">
            <?php if (isset($erros_de_validacao['data_nascimento'])): ?>
                <span class="error-message"><?= $erros_de_validacao['data_nascimento'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="nacionalidade">Nacionalidade</label>
            <input type="text" name="nacionalidade" id="nacionalidade" class="input-field">
            <?php if (isset($erros_de_validacao['nacionalidade'])): ?>
                <span class="error-message"><?= $erros_de_validacao['nacionalidade'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="biografia">Biografia</label>
            <textarea name="biografia" id="biografia" cols="30" rows="10" class="textarea-field"></textarea>
            <?php if (isset($erros_de_validacao['biografia'])): ?>
                <span class="error-message"><?= $erros_de_validacao['biografia'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <input type="submit" value="Cadastrar" class="btn-submit">
        </div>
    </form>
</main>

<?= view('layouts/footer') ?>
