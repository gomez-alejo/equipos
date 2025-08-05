
    // Elementos del DOM
    const profileButton = document.getElementById('profileButton');
    const profileModal = document.getElementById('profileModal');
    const chevronIcon = document.getElementById('chevronIcon');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuIcon = document.getElementById('mobileMenuIcon');

    // Manejar el modal de perfil
    if (profileButton) {
        profileButton.addEventListener('click', function(e) {
            e.stopPropagation();
            const isActive = profileModal.classList.contains('active');
            
            if (isActive) {
                profileModal.classList.remove('active');
                chevronIcon.style.transform = 'rotate(0deg)';
            } else {
                profileModal.classList.add('active');
                chevronIcon.style.transform = 'rotate(180deg)';
            }
        });
    }

    // Cerrar modal al hacer clic fuera
    document.addEventListener('click', function(e) {
        if (profileModal && profileButton && !profileButton.contains(e.target) && !profileModal.contains(e.target)) {
            profileModal.classList.remove('active');
            if (chevronIcon) chevronIcon.style.transform = 'rotate(0deg)';
        }
    });

    // Manejar menú móvil
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            const isActive = mobileMenu.classList.contains('active');
            
            if (isActive) {
                mobileMenu.classList.remove('active');
                mobileMenuIcon.className = 'fas fa-bars text-2xl';
            } else {
                mobileMenu.classList.add('active');
                mobileMenuIcon.className = 'fas fa-times text-2xl';
            }
        });
    }

    // Cerrar menú móvil al redimensionar ventana
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768 && mobileMenu) {
            mobileMenu.classList.remove('active');
            if (mobileMenuIcon) mobileMenuIcon.className = 'fas fa-bars text-2xl';
        }
    });

    // Efecto de scroll en el navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('nav');
        if (navbar) {
            if (window.scrollY > 10) {
                navbar.style.boxShadow = '0 15px 35px rgba(0, 0, 0, 0.4)';
            } else {
                navbar.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.3)';
            }
        }
    });
