<?= view('layout/header') ?>

<div class="container mt-4">

    <!-- ✅ SUCCESS MESSAGE -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>All Posts</h2>
        <a href="<?= base_url('posts/create') ?>" class="btn btn-primary">
            + Add New Post
        </a>
    </div>

    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th style="width:60px;">Id</th>
                <th>Title</th>
                <th>Content</th>   <!-- ✅ CONTENT COLUMN -->
                <th>Author</th>
                <th style="width:200px;">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($posts)) : ?>
                <?php $i = 1; ?>
                <?php foreach ($posts as $post) : ?>
                    <tr>
                        <!-- SERIAL NUMBER -->
                        <td><?= $i++ ?></td>

                        <td><?= esc($post['title']) ?></td>

                        <!-- ✅ CONTENT (short preview) -->
                        <td>
                            <?= esc(substr($post['content'], 0, 50)) ?>...
                        </td>

                        <td><?= esc($post['author']) ?></td>

                        <!-- ACTIONS -->
                        <td>
                            <a href="<?= base_url('posts/' . $post['id']) ?>" 
                               class="btn btn-sm btn-info">View</a>

                            <a href="<?= base_url('posts/edit/' . $post['id']) ?>" 
                               class="btn btn-sm btn-warning">Edit</a>

                            <a href="<?= base_url('posts/delete/' . $post['id']) ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Are you sure you want to delete this post?')">
                               Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="5" class="text-center">No posts found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<?= view('layout/footer') ?>
