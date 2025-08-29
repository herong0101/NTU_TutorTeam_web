document.addEventListener('DOMContentLoaded', function () {
    const counter = document.getElementById('counter');

    const animateCounter = (el) => {
        const duration = 1500; // 1.5 seconds
        const end = parseInt(el.getAttribute('data-target'), 10);
        const start = 0;
        let startTime = null;

        function animate(now) {
            if (!startTime) startTime = now;
            const elapsed = now - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            el.textContent = value.toLocaleString(); // Adds commas for thousands
            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                el.textContent = end.toLocaleString();
            }
        }
        requestAnimationFrame(animate);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target); // Animate only once
            }
        });
    }, { threshold: 0.5 }); // Trigger when 50% of the element is visible

    if (counter) {
        observer.observe(counter);
    }
});