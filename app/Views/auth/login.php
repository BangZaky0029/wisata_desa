<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Wisata Desa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            padding: 50px;
            width: 100%;
            max-width: 450px;
        }
        .login-container h2 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 600;
        }
        .login-subtitle {
            text-align: center;
            color: #999;
            margin-bottom: 30px;
            font-size: 14px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            width: 100%;
            margin-top: 10px;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
        .demo-info {
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            padding: 15px;
            border-radius: 5px;
            margin-top: 25px;
            font-size: 13px;
        }
        .demo-info strong {
            color: #667eea;
        }
        .error-message {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .invalid-feedback {
            display: block;
            font-size: 13px;
            margin-top: 5px;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>🌄 Wisata Desa</h2>
        <p class="login-subtitle">Sistem Manajemen Desa Wisata</p>

        <!-- Tampilkan pesan error jika ada -->
        <?php if (isset($error)): ?>
            <div class="error-message">
                <strong>⚠️ Error!</strong> <?= esc($error) ?>
            </div>
        <?php endif; ?>

        <!-- Tampilkan pesan success dari flash -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="success-message">
                ✅ <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <!-- Tampilkan validation errors -->
        <?php if (isset($errors) && !empty($errors)): ?>
            <div class="error-message">
                <strong>⚠️ Validasi Error!</strong>
                <ul style="margin: 10px 0 0 20px; padding: 0;">
                    <?php foreach ($errors as $field => $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Form Login -->
        <form method="post" action="<?= base_url('auth/login') ?>" novalidate>
            <?= csrf_field() ?>

            <div class="mb-3">
                <label class="form-label" for="email">📧 Email</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    class="form-control <?= (isset($errors['email'])) ? 'is-invalid' : '' ?>"
                    value="<?= old('email') ?>"
                    required
                    placeholder="admin@wisatadesa.com"
                    autocomplete="email">
                <?php if (isset($errors['email'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['email'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label class="form-label" for="password">🔐 Password</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    class="form-control <?= (isset($errors['password'])) ? 'is-invalid' : '' ?>"
                    required
                    placeholder="Masukkan password Anda"
                    autocomplete="current-password">
                <?php if (isset($errors['password'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['password'] ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-login">
                🔓 Masuk
            </button>
        </form>

        <!-- Info Demo Account -->
        <div class="demo-info">
            <strong>📝 Akun Demo:</strong><br>
            Email: <strong>admin@wisatadesa.com</strong><br>
            Password: <strong>password123</strong>
            <br><br>
            <small>atau</small><br>
            Email: <strong>user@wisatadesa.com</strong><br>
            Password: <strong>password123</strong>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>