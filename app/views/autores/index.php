<?= view('layouts/header', ['titulo' => $titulo]) ?>

<main class="autores-container">
    <header class="autores-header">
        <a href="/autores/create" class="btn-cadastrar">Cadastrar Autor</a>
    </header>

    <section class="autores-listagem">
        <?php foreach ($autores as $autor): ?>
            <div class="autor-card">
                <h3><?= $autor->nome ?></h3>
                <p><strong>Data de Nascimento:</strong> <?= $autor->data_nascimento ?></p>
                <p><strong>Nacionalidade:</strong> <?= $autor->nacionalidade ?></p>
                <p><strong>Biografia:</strong> <?= $autor->biografia ?></p>
                <div class="autor-acoes">
                    <a href="/autores/edit?code=<?= aes_encrypt($autor->id) ?>" class="btn-editar">Editar</a>
                    <a href="/autores/delete?code=<?= aes_encrypt($autor->id) ?>" class="btn-excluir">Excluir</a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>

<?= view('layouts/footer') ?>
