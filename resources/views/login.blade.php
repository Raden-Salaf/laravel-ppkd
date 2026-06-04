<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* =========================
   BASE
========================= */

        body {
            margin: 0;
            background: #020617;
            overflow: hidden;
            font-family: ui-sans-serif, system-ui;
        }

        /* =========================
   BACKGROUND AURORA
========================= */

        .aurora {
            position: absolute;
            filter: blur(120px);
            opacity: .25;
            border-radius: 999px;
            animation: float 10s ease-in-out infinite;
        }

        .aurora1 {
            width: 500px;
            height: 500px;
            background: #3b82f6;
            top: -120px;
            left: -120px;
        }

        .aurora2 {
            width: 450px;
            height: 450px;
            background: #06b6d4;
            bottom: -150px;
            right: -150px;
            animation-delay: 3s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-40px);
            }
        }

        /* =========================
   STARS (static subtle)
========================= */

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: white;
            border-radius: 50%;
            opacity: .4;
            animation: blink 2s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: .2;
            }

            50% {
                opacity: .8;
            }
        }

        /* =========================
   SHOOTING STAR (RARE)
========================= */

        .shooting {
            position: absolute;
            width: 180px;
            height: 2px;
            background: linear-gradient(90deg, white, transparent);
            transform: rotate(25deg);
            opacity: 0;
        }

        @keyframes shoot {
            0% {
                transform: translate(0, 0) rotate(25deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            100% {
                transform: translate(1600px, 700px) rotate(25deg);
                opacity: 0;
            }
        }

        /* =========================
   MOUSE SPOTLIGHT
========================= */

        .spotlight {
            position: fixed;
            inset: 0;
            background: radial-gradient(600px circle at var(--x) var(--y),
                    rgba(59, 130, 246, .12),
                    transparent 40%);
            pointer-events: none;
        }

        /* =========================
   GLASS CARD
========================= */

        .glass {
            background: rgba(15, 23, 42, .65);
            border: 1px solid rgba(255, 255, 255, .08);
            backdrop-filter: blur(14px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, .4);
        }

        /* =========================
   INPUT
========================= */

        .input {
            background: rgba(255, 255, 255, .04);
            border: 1px solid rgba(255, 255, 255, .08);
            color: white;
        }

        .input:focus {
            outline: none;
            border-color: #06b6d4;
            box-shadow: 0 0 0 4px rgba(6, 182, 212, .15);
        }

        /* =========================
   BUTTON
========================= */

        .btn {
            background: linear-gradient(135deg, #3b82f6, #06b6d4);
            transition: .3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(6, 182, 212, .3);
        }

        /* =========================
   FLOAT ANIMATION CARD
========================= */

        .float {
            animation: floatCard 6s ease-in-out infinite;
        }

        @keyframes floatCard {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>

    <!-- BACKGROUND -->
    <div class="fixed inset-0">

        <div class="aurora aurora1"></div>
        <div class="aurora aurora2"></div>

        <!-- stars -->
        <div class="star" style="top:10%;left:20%"></div>
        <div class="star" style="top:20%;left:70%"></div>
        <div class="star" style="top:35%;left:40%"></div>
        <div class="star" style="top:50%;left:80%"></div>
        <div class="star" style="top:15%;left:60%"></div>

    </div>

    <!-- spotlight -->
    <div class="spotlight"></div>

    <!-- MAIN -->
    <div class="relative z-10 min-h-screen flex items-center justify-center px-6">

        <div class="grid lg:grid-cols-2 gap-10 max-w-6xl w-full items-center">

            <!-- LEFT HERO -->
            <div class="hidden lg:block text-white">

                <img src="{{ asset('template/dist/assets/images/logo/logo.png') }}" class="h-12 mb-8">

                <h1 class="text-5xl font-bold leading-tight">
                    Build & Manage<br>
                    Your System <span class="text-cyan-400">Effortlessly.</span>
                </h1>

                <p class="text-slate-400 mt-5 max-w-md">
                    A modern dashboard experience with real-time analytics,
                    clean UI, and powerful control panel.
                </p>

                <!-- dashboard mock -->
                <div class="mt-10 glass rounded-2xl p-5 float">

                    <div class="text-sm text-slate-400 mb-3">Quick Overview</div>

                    <div class="grid grid-cols-3 gap-3">

                        <div class="bg-slate-900/60 p-3 rounded-xl">
                            <div class="text-xs text-slate-400">Users</div>
                            <div class="text-white font-bold">2.4k</div>
                        </div>

                        <div class="bg-slate-900/60 p-3 rounded-xl">
                            <div class="text-xs text-slate-400">Sales</div>
                            <div class="text-white font-bold">$12k</div>
                        </div>

                        <div class="bg-slate-900/60 p-3 rounded-xl">
                            <div class="text-xs text-slate-400">Growth</div>
                            <div class="text-cyan-400 font-bold">+18%</div>
                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT LOGIN -->
            <div class="glass rounded-3xl p-10 w-full max-w-md mx-auto">

                <h2 class="text-3xl font-bold text-white mb-2">
                    Welcome Back
                </h2>

                <p class="text-slate-400 mb-8">
                    Sign in to continue
                </p>

                <!-- FORM (KEEP FUNCTION) -->
                <form action="{{ route('action-login') }}" method="POST">
                    @csrf
                    <input type="email" placeholder="Email" name="email" class="input w-full p-4 rounded-xl mb-4">

                    <input type="password" placeholder="Password" name="password"
                        class="input w-full p-4 rounded-xl mb-4">

                    <div class="flex items-center justify-between mb-6 text-sm text-slate-400">

                        <label>
                            <input type="checkbox" class="mr-2">
                            Remember me
                        </label>

                        <a href="#" class="text-cyan-400">
                            Forgot?
                        </a>

                    </div>

                    <button type="submit" class="btn w-full py-4 rounded-xl text-white font-semibold">
                        Login
                    </button>

                </form>

                <p class="text-center text-slate-400 mt-6 text-sm">
                    Don’t have account?
                    <a class="text-cyan-400">Sign up</a>
                </p>

            </div>

        </div>

    </div>

    <!-- SHOOTING STAR SCRIPT -->
    <script>

        function createStar() {

            const star = document.createElement('div');

            star.className = 'shooting';

            star.style.top = Math.random() * 40 + '%';
            star.style.left = '-10%';

            document.body.appendChild(star);

            star.style.animation = 'shoot 2s linear forwards';

            setTimeout(() => star.remove(), 2000);
        }

        // rare spawn (sesuai request A)
        setInterval(() => {

            if (Math.random() < 0.3) {
                createStar();
            }

        }, 4000);

        // spotlight mouse
        document.addEventListener('mousemove', e => {

            document.documentElement.style.setProperty('--x', e.clientX + 'px');
            document.documentElement.style.setProperty('--y', e.clientY + 'px');

        });

    </script>

</body>

</html>