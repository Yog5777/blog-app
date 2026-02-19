<?= view('layout/header') ?>

<h2>Create Post</h2>

<form method="post" action="<?= base_url('posts/store') ?>">
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Author</label>
        <input type="text" name="author" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Save</button>
</form>

<?= view('layout/footer') ?>
