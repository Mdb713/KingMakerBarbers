
    const reveals = document.querySelectorAll('.reveal');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('opacity-100', 'translate-y-0');
                entry.target.classList.remove('opacity-0', 'translate-y-10');
            } else {
                entry.target.classList.add('opacity-0', 'translate-y-10');
                entry.target.classList.remove('opacity-100', 'translate-y-0');
            }
        });
    }, {
        threshold: 0.2
    });

    reveals.forEach((el) => observer.observe(el));

