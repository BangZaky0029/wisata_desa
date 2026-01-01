</div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
        // Show loading overlay
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
        }

        // Hide loading overlay
        function hideLoading() {
            document.getElementById('loadingOverlay').style.display = 'none';
        }

        // Confirm logout
        function confirmLogout(event) {
            event.preventDefault();
            
            Swal.fire({
                title: 'Logout?',
                text: 'Apakah Anda yakin ingin keluar?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#667eea',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoading();
                    window.location.href = event.target.closest('a').href;
                }
            });
            
            return false;
        }

        // Confirm delete with modern UI
        function confirmDelete(event, itemName = 'item ini') {
            event.preventDefault();
            const url = event.target.closest('a').href;
            
            Swal.fire({
                title: 'Hapus Data?',
                html: `Apakah Anda yakin ingin menghapus <strong>${itemName}</strong>?<br>Data yang dihapus tidak dapat dikembalikan!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '<i class="bi bi-trash"></i> Ya, Hapus!',
                cancelButtonText: '<i class="bi bi-x-circle"></i> Batal',
                showClass: {
                    popup: 'animate__animated animate__zoomIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__zoomOut'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    showLoading();
                    window.location.href = url;
                }
            });
            
            return false;
        }

        // Toast notification
        function showToast(icon, title, timer = 3000) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timer,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.fire({
                icon: icon,
                title: title
            });
        }

        // Auto-dismiss alerts after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });

            // Add fade-in animation to cards
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add hover effect to stat cards
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('click', function() {
                    this.classList.add('animate__animated', 'animate__pulse');
                    setTimeout(() => {
                        this.classList.remove('animate__animated', 'animate__pulse');
                    }, 1000);
                });
            });

            // Animate numbers in stat cards
            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const target = parseInt(stat.textContent);
                let current = 0;
                const increment = target / 50;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        stat.textContent = target;
                        clearInterval(timer);
                    } else {
                        stat.textContent = Math.floor(current);
                    }
                }, 20);
            });

            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });

        // Form validation with animation
        (function() {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                        
                        // Find first invalid field and focus
                        const firstInvalid = form.querySelector(':invalid');
                        if (firstInvalid) {
                            firstInvalid.focus();
                            firstInvalid.classList.add('animate__animated', 'animate__shakeX');
                            setTimeout(() => {
                                firstInvalid.classList.remove('animate__animated', 'animate__shakeX');
                            }, 1000);
                        }
                        
                        showToast('error', 'Mohon lengkapi form dengan benar!');
                    }
                    
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>

    <style>
        /* Ripple Effect */
        .btn {
            position: relative;
            overflow: hidden;
        }

        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple-animation 0.6s ease-out;
            pointer-events: none;
        }

        @keyframes ripple-animation {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    </style>
</body>
</html>