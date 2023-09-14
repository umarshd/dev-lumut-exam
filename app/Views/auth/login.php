<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dev Lumut Exam</title>
</head>

<body>
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-6">
            <div class="card p-3">
                <h1>Selamat Datang</h1>
                <h4>Silahkan Login Untuk Mengakses Sistem</h4>
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger mt-3" role="alert">
                        <?= session()->getFlashdata('errors') ?>
                    </div>
                <?php endif; ?>
                <form action="<?= base_url() ?>/proses/login" class="mt-4" method="post">
                    <div class="form-group py-1">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="masukan username">
                    </div>
                    <div class="form-group py-1">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="masukan password">
                    </div>
                    <button class="mt-4 btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>