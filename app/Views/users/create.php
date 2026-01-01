<?= view('layout/header', ['title' => 'Tambah User']) ?>

<style>
    .form-wrapper {
        max-width: 800px;
        margin: 0 auto;
    }

    .page-title {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        animation: slideInDown 0.5s ease-out;
    }

    .page-title h2 {
        margin: 0;
        font-size: 28px;
        font-weight: 700;
    }

    .form-card {
        animation: fadeInUp 0.6s ease-out;
    }

    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
        transform: translateY(-2px);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
        animation: shakeX 0.5s;
    }

    .form-control.is-valid {
        border-color: #28a745;
    }

    @keyframes shakeX {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
        20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .password-strength {
        height: 4px;
        background: #e0e0e0;
        border-radius: 2px;
        margin-top: 8px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .password-strength-bar {
        height: 100%;
        width: 0;
        transition: all 0.3s ease;
    }

    .password-strength-text {
        font-size: 12px;
        margin-top: 5px;
        font-weight: 600;
    }

    .password-toggle-btn {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        font-size: 18px;
        transition: color 0.3s;
    }

    .password-toggle-btn:hover {
        color: #667eea;
    }

    .submit-btn-wrapper {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .btn-submit {
        flex: 1;
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }

    .requirements-list {
        font-size: 13px;
        margin-top: 8px;
        padding-left: 20px;
    }

    .requirements-list li {
        color: #666;
        margin: 5px 0;
        transition: color 0.3s;
    }

    .requirements-list li.met {
        color: #28a745;
        font-weight: 600;
    }

    .requirements-list li i {
        margin-right: 5px;
    }
</style>

<div class="form-wrapper">
    <div class="page-title animate__animated animate__fadeInDown">
        <h2>
            <i class="bi bi-person-plus-fill"></i>
            Tambah User Baru
        </h2>
    </div>

    <div class="card form-card">
        <div class="card-header">
            <h5 class="mb-0">Form Data User</h5>
        </div>
        <div class="card-body p-4">
            <form action="<?= base_url('user/store') ?>" method="post" class="needs-validation" novalidate id="userForm">
                <?= csrf_field() ?>

                <!-- Name Field -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-person"></i> Nama Lengkap
                    </label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" 
                        value="<?= old('name') ?>" 
                        required
                        minlength="3"
                        placeholder="Masukkan nama lengkap">
                    <?php if (isset($errors['name'])): ?>
                        <div class="invalid-feedback"><?= $errors['name'] ?></div>
                    <?php endif; ?>
                    <div class="valid-feedback">
                        <i class="bi bi-check-circle"></i> Nama terlihat bagus!
                    </div>
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-envelope"></i> Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                        value="<?= old('email') ?>" 
                        required
                        placeholder="nama@email.com">
                    <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback"><?= $errors['email'] ?></div>
                    <?php endif; ?>
                    <div class="valid-feedback">
                        <i class="bi bi-check-circle"></i> Email valid!
                    </div>
                </div>

                <!-- Password Field -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-lock"></i> Password
                    </label>
                    <div style="position: relative;">
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                            required
                            minlength="6"
                            placeholder="Minimal 6 karakter">
                        <button type="button" class="password-toggle-btn" onclick="togglePassword('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="strengthBar"></div>
                    </div>
                    <div class="password-strength-text" id="strengthText"></div>
                    
                    <ul class="requirements-list" id="passwordRequirements">
                        <li id="req-length"><i class="bi bi-x-circle"></i> Minimal 6 karakter</li>
                        <li id="req-letter"><i class="bi bi-x-circle"></i> Mengandung huruf</li>
                        <li id="req-number"><i class="bi bi-x-circle"></i> Mengandung angka</li>
                    </ul>
                    
                    <?php if (isset($errors['password'])): ?>
                        <div class="invalid-feedback d-block"><?= $errors['password'] ?></div>
                    <?php endif; ?>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-lock-fill"></i> Konfirmasi Password
                    </label>
                    <div style="position: relative;">
                        <input 
                            type="password" 
                            name="password_confirm" 
                            id="password_confirm"
                            class="form-control" 
                            required
                            placeholder="Ketik ulang password">
                        <button type="button" class="password-toggle-btn" onclick="togglePassword('password_confirm', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="invalid-feedback">Password tidak cocok!</div>
                    <div class="valid-feedback">
                        <i class="bi bi-check-circle"></i> Password cocok!
                    </div>
                </div>

                <!-- Role Field -->
                <div class="mb-4">
                    <label class="form-label">
                        <i class="bi bi-shield-check"></i> Role
                    </label>
                    <select name="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                    <div class="invalid-feedback">Pilih role user!</div>
                </div>

                <!-- Submit Buttons -->
                <div class="submit-btn-wrapper">
                    <button type="submit" class="btn btn-primary btn-submit">
                        <i class="bi bi-save"></i> Simpan Data
                    </button>
                    <a href="<?= base_url('user') ?>" class="btn btn-secondary btn-submit">
                        <i class="bi bi-x-circle"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Password toggle
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');
        
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }

    // Password strength checker
    const passwordInput = document.getElementById('password');
    const strengthBar = document.getElementById('strengthBar');
    const strengthText = document.getElementById('strengthText');
    const requirements = {
        length: document.getElementById('req-length'),
        letter: document.getElementById('req-letter'),
        number: document.getElementById('req-number')
    };

    passwordInput.addEventListener('input', function() {
        const password = this.value;
        let strength = 0;
        
        // Check requirements
        const hasLength = password.length >= 6;
        const hasLetter = /[a-zA-Z]/.test(password);
        const hasNumber = /[0-9]/.test(password);
        
        // Update requirement indicators
        updateRequirement(requirements.length, hasLength);
        updateRequirement(requirements.letter, hasLetter);
        updateRequirement(requirements.number, hasNumber);
        
        // Calculate strength
        if (hasLength) strength += 33;
        if (hasLetter) strength += 33;
        if (hasNumber) strength += 34;
        
        // Update strength bar
        strengthBar.style.width = strength + '%';
        
        if (strength <= 33) {
            strengthBar.style.backgroundColor = '#dc3545';
            strengthText.textContent = 'Lemah';
            strengthText.style.color = '#dc3545';
        } else if (strength <= 66) {
            strengthBar.style.backgroundColor = '#ffc107';
            strengthText.textContent = 'Sedang';
            strengthText.style.color = '#ffc107';
        } else {
            strengthBar.style.backgroundColor = '#28a745';
            strengthText.textContent = 'Kuat';
            strengthText.style.color = '#28a745';
        }
    });

    function updateRequirement(element, isMet) {
        const icon = element.querySelector('i');
        if (isMet) {
            element.classList.add('met');
            icon.classList.remove('bi-x-circle');
            icon.classList.add('bi-check-circle');
        } else {
            element.classList.remove('met');
            icon.classList.remove('bi-check-circle');
            icon.classList.add('bi-x-circle');
        }
    }

    // Confirm password validation
    const confirmPassword = document.getElementById('password_confirm');
    confirmPassword.addEventListener('input', function() {
        if (this.value === passwordInput.value) {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
        } else {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
        }
    });

    // Form submission with loading
    document.getElementById('userForm').addEventListener('submit', function(e) {
        if (this.checkValidity()) {
            showLoading();
        }
    });

    // Show validation errors if exists
    <?php if (isset($errors) && !empty($errors)): ?>
        Swal.fire({
            icon: 'error',
            title: 'Validasi Error!',
            html: '<?php foreach ($errors as $error): ?><?= $error ?><br><?php endforeach; ?>',
            confirmButtonColor: '#667eea'
        });
    <?php endif; ?>
</script>

<?= view('layout/footer') ?>