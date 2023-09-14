<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>
<section class=" container my-5">
    <h3 class="text-center">POST</h3>
    <a href="<?= base_url() ?>admin/post/tambah" class="btn btn-primary btn-sm border-radius-5">Tambah</a>
    <?php if (session()->get('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->get('error') ?>
        </div>
    <?php elseif (session()->get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->get('success') ?>
        </div>
    <?php endif ?>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Username</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php if (count($posts) < 1): ?>
                <tr>
                    <td colspan="4" class="text-center">Data tidak ditemukan</td>
                </tr>
            <?php endif ?>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td>
                        <?= $i++ ?>
                    </td>
                    <td>
                        <?= $post['title'] ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/admin/post/' . '/edit' . $post['idpost']) ?>"
                            class="nav-link d-inline px-0">
                            <span class="badge bg-secondary">Edit</span>
                        </a>
                        <button type="button" class="border-0" style="background: transparent;" data-bs-toggle="modal"
                            data-bs-target="#exampleModal<?= $post['id'] ?>">
                            <span class=" badge bg-danger ">Delete</span>
                        </button>
                    </td>
                </tr>

                <div class="modal fade" id="exampleModal<?= $post['id'] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h4 class="h4">
                                    Apakah kamu yakin menghapus data ini ?</h4>
                                <p>Data ini akan hilang selamanya</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="<?= base_url('/admin/post/' . $post['id'] . '/delete') ?>"
                                    class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>




        </tbody>
    </table>




    </div>
</section>
<?= $this->endSection() ?>