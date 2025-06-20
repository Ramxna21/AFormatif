<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                    </div>

                                    <!-- Flash messages -->
                                    <?php if ($this->session->flashdata('error')): ?>
                                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('success')): ?>
                                        <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
                                    <?php endif; ?>

                                    <!-- Reset Password Form -->
                                    <form class="user" method="post" action="<?= site_url('auth/reset_password_action'); ?>">

                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" placeholder="Enter Username..." required>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password" class="form-control form-control-user" id="newPassword" placeholder="New Password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggleNewPassword" style="cursor: pointer;">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="confirm_password" class="form-control form-control-user" id="confirmPassword" placeholder="Confirm New Password" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="toggleConfirmPassword" style="cursor: pointer;">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>

                                        <div class="text-center mt-3">
                                            <a href="<?= base_url('auth') ?>">Back to Login</a>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Scripts -->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>

    <!-- Show/Hide Password Toggle -->
    <script>
        function setupTogglePassword(toggleId, inputId) {
            const toggle = document.querySelector(`#${toggleId}`);
            const input = document.querySelector(`#${inputId}`);

            toggle.addEventListener('click', function () {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye');
                this.querySelector('i').classList.toggle('fa-eye-slash');
            });
        }

        setupTogglePassword('toggleNewPassword', 'newPassword');
        setupTogglePassword('toggleConfirmPassword', 'confirmPassword');
    </script>

</body>

</html>
