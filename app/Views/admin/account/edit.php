<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<section class=" container my-5">
    <h3 class="text-center">POST</h3>
    <a href="<?= base_url() ?>admin/account" class="btn btn-primary btn-sm border-radius-5">Kembali</a>
    <?php if (session()->get('errors')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('errors') ?>
        </div>
    <?php elseif (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif ?>
    <form action="<?= base_url() ?>/admin/account/edit/proses" method="post">

        <div class="form-group py-1">
            <label>Name</label>
            <input class="form-control" type="text" name="name" placeholder="Masukan nama"
                value="<?= $account['name'] ?>">
        </div>
        <div class="form-group py-1">
            <label>Username</label>
            <input class="form-control" type="text" name="username" placeholder="Masukan username"
                value="<?= $account['username'] ?>">
            <input class="form-control" type="text" name="username_lama" placeholder="Masukan username"
                value="<?= $account['username'] ?>" hidden>
        </div>
        <div class="form-group py-1">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Masukan password">
        </div>
        <div class="form-group py-1">
            <label>Password Konfirmasi</label>
            <input class="form-control" type="password" name="password_konfirmasi"
                placeholder="Masukan password konfirmasi">
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role">
                <option disabled selected>Pilih role</option>
                <option <?= ($account['role'] == 'admin' ? 'selected' : '') ?> value="admin">Admin</option>
                <option <?= ($account['role'] == 'author' ? 'selected' : '') ?> value="author">Author</option>
            </select>
        </div>

        <button class="btn btn-primary w-100 mt-3" type="submit">Simpan</button>
    </form>




    </div>
</section>
<?= $this->endSection() ?>