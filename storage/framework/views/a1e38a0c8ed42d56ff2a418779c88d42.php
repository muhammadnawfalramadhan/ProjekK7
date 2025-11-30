<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #b2f0c0 0%, #ffffff 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .register-card {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
            border-radius: 16px;
            overflow: hidden;
            background: #ffffff;
            max-width: 420px;
        }

        .register-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: linear-gradient(90deg, #3ca374, #2e7d57);
            color: white;
            text-align: center;
            padding: 2rem 1rem;
        }

        .card-header h3 {
            margin: 0;
            font-weight: 700;
        }

        .card-header p {
            margin: 0.5rem 0 0;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #c7e6d0;
            background-color: #f6fff8;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #3ca374;
            box-shadow: 0 0 8px rgba(60, 163, 116, 0.4);
            background-color: #ffffff;
        }

        textarea.form-control {
            resize: none;
        }

        .btn-primary {
            border-radius: 10px;
            background-color: #3ca374;
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2e7d57;
            transform: translateY(-2px);
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding: 1rem;
        }

        @media(max-width:576px) {
            .register-card {
                margin: 1rem;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-sm-10">
                <div class="card register-card">
                    <div class="card-header">
                        <h3>Create Account</h3>
                        <p>Please fill the form to register</p>
                    </div>

                    <div class="card-body">
                        
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger py-2">
                            <ul class="mb-0 ps-3">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>

                        <?php if(session('error')): ?>
                        <div class="alert alert-danger text-center py-2">
                            <?php echo e(session('error')); ?>

                        </div>
                        <?php endif; ?>

                        <?php if(session('success')): ?>
                        <div class="alert alert-success text-center py-2">
                            <?php echo e(session('success')); ?>

                        </div>
                        <?php endif; ?>

                        <form action="<?php echo e(route('auth.register')); ?>" method="POST" autocomplete="on">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    placeholder="Masukkan username" value="<?php echo e(old('username')); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="2"
                                    placeholder="Masukkan alamat lengkap" required><?php echo e(old('alamat')); ?></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir"
                                    value="<?php echo e(old('tanggal_lahir')); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Masukkan password" required>
                            </div>

                            <div class="mb-4">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control"
                                    id="confirm_password" placeholder="Konfirmasi password" required>
                            </div>

                            <div class="d-grid mb-2">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <p class="mb-0">Sudah punya akun?
                            <a href="<?php echo e(route('auth.loginForm')); ?>" class="text-success fw-semibold">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/TukangTimbang/register-form.blade.php ENDPATH**/ ?>