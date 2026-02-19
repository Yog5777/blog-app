<?= view('layout/header') ?>

<div class="container mt-4">
    <h2><?= esc($post['title']) ?></h2>

    <p class="mt-3"><?= esc($post['content']) ?></p>

    <p><strong>Author:</strong> <?= esc($post['author']) ?></p>

    <!-- ✅ YAHAN BACK BUTTON -->
    <a href="<?= base_url('/posts') ?>" class="btn btn-secondary mt-3">
        ⬅ Back
    </a>
</div>

<?= view('layout/footer') ?>
