<?= view('layout/header') ?>

<h2>Edit Post</h2>

    <form method="post" action="<?= base_url('posts/update/' . $post['id']) ?>">


    <?= csrf_field() ?>

    <div class="mb-3">
        <label>Title</label>
        <input
            type="text"
            name="title"
            value="<?= esc($post['title']) ?>"
            class="form-control"
            required
        >
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea
            name="content"
            class="form-control"
            required
        ><?= esc($post['content']) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Author</label>
        <input
            type="text"
            name="author"
            value="<?= esc($post['author']) ?>"
            class="form-control"
        >
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="<?= base_url('posts') ?>" class="btn btn-secondary">Back</a>

</form>

<?= view('layout/footer') ?>
