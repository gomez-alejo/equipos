

        // Mobile menu toggle
        document.querySelector('.mobile-menu-button').addEventListener('click', function() {
            // Add mobile menu functionality here
            console.log('Mobile menu clicked');
        });

        // Counter animation
        function animateCounter(element, start, end, duration) {
            let startTimestamp = null;
            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const current = Math.floor(progress * (end - start) + start);
                element.textContent = current;
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                }
            };
            window.requestAnimationFrame(step);
        }

        // Animate counters when section is visible
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(document.getElementById('teams-count'), 0, 24, 2000);
                    animateCounter(document.getElementById('players-count'), 0, 350, 2500);
                    animateCounter(document.getElementById('matches-count'), 0, 128, 2200);
                    animateCounter(document.getElementById('goals-count'), 0, 452, 2800);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        observer.observe(document.querySelector('#teams-count').closest('section'));

        // Filter buttons functionality
        document.querySelectorAll('button[class*="bg-white bg-opacity"]').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('button[class*="bg-white bg-opacity"]').forEach(btn => {
                    btn.classList.remove('bg-opacity-30');
                    btn.classList.add('bg-opacity-10');
                });
                
                // Add active class to clicked button
                this.classList.remove('bg-opacity-10');
                this.classList.add('bg-opacity-30');
                
                console.log('Filter:', this.textContent);
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navbar
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 100) {
                navbar.classList.add('shadow-2xl');
            } else {
                navbar.classList.remove('shadow-2xl');
            }
        });
    