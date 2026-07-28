particlesJS("bgDoted", {
    particles: {
        number: {
            value: 800,
            density: {
                enable: true,
                value_area: 900
            }
        },
        color: {
            value: "#ffffff"
        },
        shape: {
            type: "circle"
        },
        opacity: {
            value: .6
        },
        size: {
            value: 3,
            random: true
        },
        line_linked: {
            enable: true,
            distance: 140,
            color: "#ffffff",
            opacity: .2,
            width: 1
        },
        move: {
            enable: true,
            speed: 2
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: {
                enable: true,
                mode: "repulse"
            },
            onclick: {
                enable: true,
                mode: "push"
            }
        },
        modes: {
            repulse: {
                distance: 150,
                duration: .4
            },
            push: {
                particles_nb: 6
            }
        }
    },
    retina_detect: true
});

const menuToggle = document.getElementById("menuToggle");
const mobileMenu = document.getElementById("mobileMenu");

menuToggle.addEventListener("click", function () {
    mobileMenu.classList.toggle("active");
});
// Login Scripts ...
// انیمیشن ورودی‌ها
document.querySelectorAll('.form-input').forEach(input => {
    input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
    });
    
    input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
    });
});

// انیمیشن دکمه‌ها
document.querySelectorAll('button').forEach(button => {
    button.addEventListener('mousedown', function() {
        this.style.transform = 'scale(0.95)';
    });
    
    button.addEventListener('mouseup', function() {
        this.style.transform = 'scale(1)';
    });
    
    button.addEventListener('mouseleave', function() {
        this.style.transform = 'scale(1)';
    });
});
