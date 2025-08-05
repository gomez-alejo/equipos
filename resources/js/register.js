
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'blue-primary': '#1e3a8a',
                        'blue-secondary': '#1e40af', 
                        'blue-dark': '#1e293b',
                        'gray-primary': '#64748b',
                        'gray-light': '#f1f5f9',
                        'blue-accent': '#3b82f6'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                        'scale-in': 'scaleIn 0.5s ease-out'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(50px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        scaleIn: {
                            '0%': { opacity: '0', transform: 'scale(0.95)' },
                            '100%': { opacity: '1', transform: 'scale(1)' }
                        }
                    }
                }
            }
        }


        // Toggle password visibility
        function togglePasswordVisibility(toggleId, inputId, iconId) {
            const toggle = document.getElementById(toggleId);
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            toggle.addEventListener('click', function() {
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                
                if (type === 'text') {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                    `;
                } else {
                    icon.innerHTML = `
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    `;
                }
            });
        }

        // Initialize password toggles
        togglePasswordVisibility('togglePassword', 'password', 'eyeIcon');
        togglePasswordVisibility('toggleConfirmPassword', 'password-confirm', 'eyeIconConfirm');

        // Form submission with loading state
        const form = document.getElementById('registerForm');
        const submitBtn = document.getElementById('submitBtn');
        const btnText = document.getElementById('btnText');
        const spinner = document.getElementById('spinner');

        form.addEventListener('submit', function() {
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            btnText.textContent = 'Creando cuenta...';
            spinner.classList.remove('hidden');
        });

        // Password strength indicator
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');

        function checkPasswordMatch() {
            if (confirmPasswordInput.value && passwordInput.value !== confirmPasswordInput.value) {
                confirmPasswordInput.classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                confirmPasswordInput.classList.remove('border-gray-300', 'focus:border-blue-accent', 'focus:ring-blue-accent');
            } else {
                confirmPasswordInput.classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-500');
                confirmPasswordInput.classList.add('border-gray-300', 'focus:border-blue-accent', 'focus:ring-blue-accent');
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmPasswordInput.addEventListener('input', checkPasswordMatch);

        // Input focus animations
        const inputs = document.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.parentElement.classList.add('transform', 'scale-[1.01]');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.parentElement.classList.remove('transform', 'scale-[1.01]');
            });
        });

        // Role selection animation
        const roleSelect = document.getElementById('role');
        roleSelect.addEventListener('change', function() {
            this.parentElement.parentElement.classList.add('animate-pulse');
            setTimeout(() => {
                this.parentElement.parentElement.classList.remove('animate-pulse');
            }, 500);
        });

        // Form validation feedback
        const requiredInputs = document.querySelectorAll('input[required], select[required]');
        requiredInputs.forEach(input => {
            input.addEventListener('blur', function() {
                if (this.value.trim() === '') {
                    this.classList.add('border-red-300', 'bg-red-50');
                    this.classList.remove('border-gray-300');
                } else {
                    this.classList.remove('border-red-300', 'bg-red-50');
                    this.classList.add('border-green-300', 'bg-green-50');
                    setTimeout(() => {
                        this.classList.remove('border-green-300', 'bg-green-50');
                        this.classList.add('border-gray-300');
                    }, 2000);
                }
            });
        });
    