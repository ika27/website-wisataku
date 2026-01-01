<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <h4 class="mb-3">Reset Password</h4>

                    <form action="<?= base_url('auth/processReset') ?>" method="post">
                        <input type="hidden" name="token" value="<?= $token ?>">

                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password Baru" required>
                        </div>

                        <div class="mb-3">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
                        </div>

                        <button class="btn btn-primary w-100">Reset Password</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>