<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Nexus AI | Secure Access</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* KEEP ALL YOUR CSS EXACTLY AS IS */
        {!! file_get_contents(resource_path('css/inline-login.css')) !!}
    </style>
</head>

<body>

    <canvas id="neural-canvas"></canvas>
    <div id="toast-container"></div>

    <div class="container" id="container">

        <div class="forms-container">

            {{-- LOGIN --}}
            <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                @csrf
                <h2 class="title">Welcome Back</h2>

                <div class="input-group">
                    <input type="email" name="email" class="input-field" placeholder=" " required>
                    <label class="input-label">Email Address</label>
                    <i class="fa-solid fa-envelope input-icon"></i>
                </div>

                <div class="input-group">
                    <input type="password" name="password" class="input-field" placeholder=" " required>
                    <label class="input-label">Password</label>
                    <i class="fa-solid fa-eye input-icon toggle-password"></i>
                </div>

                <button type="submit" class="btn btn-primary">Sign In</button>
            </form>

            {{-- REGISTER --}}
            <form method="POST" action="{{ route('register') }}" class="sign-up-form">
                @csrf
                <h2 class="title">Create Account</h2>

                <div class="input-group">
                    <input type="text" name="name" class="input-field" placeholder=" " required>
                    <label class="input-label">Full Name</label>
                    <i class="fa-solid fa-user input-icon"></i>
                </div>

                <div class="input-group">
                    <input type="email" name="email" class="input-field" placeholder=" " required>
                    <label class="input-label">Email Address</label>
                    <i class="fa-solid fa-envelope input-icon"></i>
                </div>

                <div class="input-group">
                    <input type="password" name="password" class="input-field" placeholder=" " required>
                    <label class="input-label">Password</label>
                    <i class="fa-solid fa-eye input-icon toggle-password"></i>
                </div>

                <div class="input-group">
                    <input type="password" name="password_confirmation" class="input-field" placeholder=" " required>
                    <label class="input-label">Confirm Password</label>
                </div>

                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>

        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h3>Already One of Us?</h3>
                    <button class="ghost-btn" id="signIn">Sign In</button>
                </div>

                <div class="overlay-panel overlay-right">
                    <h3>New Here?</h3>
                    <button class="ghost-btn" id="signUp">Sign Up</button>

                </div>
            </div>
        </div>
    </div>

    <script>
        const canvas = document.getElementById('neural-canvas');
        const ctx = canvas.getContext('2d');

        let width, height;
        let particles = [];

        // Configuration
        const particleCount = window.innerWidth < 768 ? 40 : 80; // Fewer particles on mobile
        const connectionDistance = 150;
        const mouseDistance = 200;

        let mouse = {
            x: null,
            y: null
        };

        // Handle Resize
        function resize() {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resize);
        resize();

        // Track Mouse
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.x;
            mouse.y = e.y;
        });

        window.addEventListener('mouseleave', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class Particle {
            constructor() {
                this.x = Math.random() * width;
                this.y = Math.random() * height;
                this.vx = (Math.random() - 0.5) * 1; // Velocity X
                this.vy = (Math.random() - 0.5) * 1; // Velocity Y
                this.size = Math.random() * 2 + 1;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;

                // Bounce off edges
                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;

                // Mouse Interaction
                if (mouse.x != null) {
                    let dx = mouse.x - this.x;
                    let dy = mouse.y - this.y;
                    let distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < mouseDistance) {
                        const forceDirectionX = dx / distance;
                        const forceDirectionY = dy / distance;
                        const force = (mouseDistance - distance) / mouseDistance;
                        const directionX = forceDirectionX * force * 2; // Push strength
                        const directionY = forceDirectionY * force * 2;
                        this.x -= directionX;
                        this.y -= directionY;
                    }
                }
            }

            draw() {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fillStyle = '#06b6d4'; // Accent Cyan
                ctx.fill();
            }
        }

        function initParticles() {
            particles = [];
            for (let i = 0; i < particleCount; i++) {
                particles.push(new Particle());
            }
        }

        function animate() {
            ctx.clearRect(0, 0, width, height);

            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();

                // Draw Connections
                for (let j = i; j < particles.length; j++) {
                    let dx = particles[i].x - particles[j].x;
                    let dy = particles[i].y - particles[j].y;
                    let distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < connectionDistance) {
                        ctx.beginPath();
                        // Opacity based on distance
                        let opacity = 1 - (distance / connectionDistance);
                        ctx.strokeStyle = `rgba(6, 182, 212, ${opacity * 0.4})`;
                        ctx.lineWidth = 1;
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
            requestAnimationFrame(animate);
        }

        initParticles();
        animate();

        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.onclick = () => container.classList.add("sign-up-mode");
        signInButton.onclick = () => container.classList.remove("sign-up-mode");

        document.querySelectorAll('.toggle-password').forEach(icon => {
            icon.onclick = function() {
                const input = this.previousElementSibling.previousElementSibling;
                input.type = input.type === 'password' ? 'text' : 'password';
                this.classList.toggle('fa-eye-slash');
            };
        });
    </script>

</body>

</html>
