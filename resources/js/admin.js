
    // Actualizar hora en tiempo real
    function updateTime() {
        const now = new Date();
        const timeString = now.toLocaleTimeString('es-ES', { 
            hour: '2-digit', 
            minute: '2-digit',
            second: '2-digit'
        });
        const timeElement = document.getElementById('current-time');
        if (timeElement) {
            timeElement.textContent = timeString;
        }
    }

    // Actualizar cada segundo
    setInterval(updateTime, 1000);
    updateTime(); // Llamada inicial

    // Animaciones en scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    }, observerOptions);

    // Observar elementos con animación
    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    // Efectos de hover en las barras del gráfico
    document.querySelectorAll('.chart-bar').forEach((bar, index) => {
        bar.addEventListener('mouseenter', function() {
            // Crear tooltip
            const tooltip = document.createElement('div');
            tooltip.className = 'absolute bg-black text-white px-2 py-1 rounded text-xs -top-8 left-1/2 transform -translate-x-1/2';
            tooltip.textContent = `${Math.floor(Math.random() * 100) + 50} partidos`;
            this.parentElement.style.position = 'relative';
            this.parentElement.appendChild(tooltip);
        });
        
        bar.addEventListener('mouseleave', function() {
            const tooltip = this.parentElement.querySelector('.absolute');
            if (tooltip) tooltip.remove();
        });
    });

    // Animación de contador para las estadísticas
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 100;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current).toLocaleString();
        }, 20);
    }

    // Iniciar animaciones de contador cuando sea visible
    const statsCards = document.querySelectorAll('.gradient-card, .gradient-card-2, .gradient-card-3, .gradient-card-4');
    statsCards.forEach(card => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const numberElement = entry.target.querySelector('.text-3xl');
                    const targetNumber = parseInt(numberElement.textContent.replace(/,/g, ''));
                    if (!isNaN(targetNumber)) {
                        animateCounter(numberElement, targetNumber);
                    }
                    observer.unobserve(entry.target);
                }
            });
        });
        observer.observe(card);
    });
