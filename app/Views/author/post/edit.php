<?= $this->extend('layouts/author_layout') ?>
<?= $this->section('content') ?>
<section class=" container my-5">
    <h3 class="text-center">POST</h3>
    <a href="<?= base_url() ?>author/post" class="btn btn-primary btn-sm border-radius-5">Kembali</a>
    <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('errors') ?>
        </div>
    <?php elseif (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif ?>
    <form action="<?= base_url() ?>/author/post/edit/proses" method="post">

        <div class="form-group py-1">
            <label>Title</label>
            <input class="form-control" type="text" name="title" placeholder="Masukan title"
                value="<?= $post['title'] ?>">
            <input class=" form-control" type="text" name="id" placeholder="Masukan title"
                value="<?= $post['idpost'] ?>" hidden>
        </div>
        <div class="form-group py-1">
            <label>Date</label>
            <input class="form-control" type="date" name="date" placeholder="Masukan date"
                value="<?= date('Y-m-d', strtotime($post['date'])) ?>">
        </div>
        <div class="form-group py-1">
            <label>Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10"><?= $post['content'] ?></textarea>
        </div>

        <button class="btn btn-primary w-100 mt-3" type="submit">Simpan</button>
    </form>




    </div>
</section>
<?= $this->endSection() ?>