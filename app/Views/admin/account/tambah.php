<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<section class=" container my-5">
    <h3 class="text-center">POST</h3>
    <a href="<?= base_url() ?>admin/post" class="btn btn-primary btn-sm border-radius-5">Kembali</a>
    <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('errors') ?>
        </div>
    <?php elseif (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif ?>
    <form action="<?= base_url() ?>/admin/post/proses/tambah" method="post">

        <div class="form-group py-1">
            <label>Title</label>
            <input class="form-control" type="text" name="title" placeholder="Masukan title">
        </div>
        <div class="form-group py-1">
            <label>Date</label>
            <input class="form-control" type="date" name="date" placeholder="Masukan date">
        </div>
        <div class="form-group py-1">
            <label>Content</label>
            <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>

        <button class="btn btn-primary w-100 mt-3" type="submit">Tambah</button>
    </form>




    </div>
</section>
<?= $this->endSection() ?>