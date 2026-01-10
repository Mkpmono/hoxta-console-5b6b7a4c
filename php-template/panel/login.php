<?php
/**
 * Panel Login
 */
session_start();
require_once __DIR__ . '/../partials/head.php';

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: ' . $BASE_URL . '/panel/login.php');
    exit;
}

// If already logged in, redirect to dashboard
if (isset($_SESSION['demo_user'])) {
    header('Location: ' . $BASE_URL . '/panel/');
    exit;
}

// Handle demo login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['demo_login'])) {
    $role = $_POST['demo_login'];
    $users = [
        'client' => ['id' => '1', 'name' => 'Demo Client', 'email' => 'client@demo.hoxta', 'role' => 'client'],
        'admin' => ['id' => '2', 'name' => 'Demo Admin', 'email' => 'admin@demo.hoxta', 'role' => 'admin'],
        'owner' => ['id' => '3', 'name' => 'Demo Owner', 'email' => 'owner@demo.hoxta', 'role' => 'owner'],
    ];
    if (isset($users[$role])) {
        $_SESSION['demo_user'] = $users[$role];
        header('Location: ' . $BASE_URL . '/panel/');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo getHeadContent('Login - Control Panel', 'Sign in to manage your services'); ?>
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>/assets/css/panel.css">
    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            padding: 1rem;
        }
        .login-card {
            width: 100%;
            max-width: 28rem;
            position: relative;
            z-index: 10;
        }
        .login-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 700;
        }
        .login-logo span:nth-child(2) { color: var(--primary); }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-header h1 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }
        .login-header p {
            color: var(--muted-foreground);
            font-size: 0.875rem;
        }
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        .login-field label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.375rem;
        }
        .login-input-wrap {
            position: relative;
        }
        .login-input-wrap svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            color: var(--muted-foreground);
        }
        .login-input {
            width: 100%;
            padding: 0.625rem 0.75rem 0.625rem 2.5rem;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--border);
            border-radius: 0.5rem;
            color: var(--foreground);
            font-size: 0.875rem;
        }
        .login-input:focus {
            border-color: var(--primary);
            outline: none;
        }
        .login-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.875rem;
        }
        .login-remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--muted-foreground);
        }
        .login-forgot {
            color: var(--primary);
        }
        .demo-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
        .demo-title {
            font-size: 0.75rem;
            color: var(--muted-foreground);
            text-align: center;
            margin-bottom: 1rem;
        }
        .demo-buttons {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.5rem;
        }
        .demo-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            padding: 0.625rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--border);
            color: var(--foreground);
            font-size: 0.75rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .demo-btn:hover {
            border-color: rgba(25, 195, 255, 0.5);
            background: rgba(25, 195, 255, 0.05);
        }
        .demo-btn svg {
            width: 1rem;
            height: 1rem;
            color: var(--primary);
        }
        .demo-btn.owner svg {
            color: #eab308;
        }
        .demo-notice {
            margin-top: 1.5rem;
            padding: 0.75rem;
            border-radius: 0.5rem;
            background: rgba(25, 195, 255, 0.05);
            border: 1px solid rgba(25, 195, 255, 0.1);
            text-align: center;
            font-size: 0.75rem;
            color: var(--muted-foreground);
        }
        .demo-notice strong {
            color: var(--primary);
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: var(--muted-foreground);
        }
        .back-link:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="wave-background">
            <svg class="wave-svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
                <path class="wave-path wave-1" d="M0,192L48,186.7C96,181,192,171,288,186.7C384,203,480,245,576,245.3C672,245,768,203,864,176C960,149,1056,139,1152,149.3C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>

        <div class="login-card">
            <a href="<?php echo $BASE_URL; ?>/" class="login-logo">
                <span>Ho</span><span>x</span><span>ta</span>
            </a>

            <div class="glass-card p-8">
                <div class="login-header">
                    <h1>Control Panel</h1>
                    <p>Sign in to manage your services</p>
                </div>

                <form class="login-form" method="post" action="">
                    <div class="login-field">
                        <label>Email</label>
                        <div class="login-input-wrap">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <input type="email" name="email" class="login-input" placeholder="you@example.com" />
                        </div>
                    </div>

                    <div class="login-field">
                        <label>Password</label>
                        <div class="login-input-wrap">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            <input type="password" name="password" class="login-input" placeholder="••••••••" />
                        </div>
                    </div>

                    <div class="login-options">
                        <label class="login-remember">
                            <input type="checkbox" name="remember" />
                            <span>Remember me</span>
                        </label>
                        <a href="#" class="login-forgot">Forgot password?</a>
                    </div>

                    <button type="submit" name="login" class="btn-glow w-full">Sign in</button>
                </form>

                <div class="demo-section">
                    <p class="demo-title">Quick demo access</p>
                    <div class="demo-buttons">
                        <button type="button" class="demo-btn" onclick="demoLogin('client')">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <span>Client</span>
                        </button>
                        <button type="button" class="demo-btn" onclick="demoLogin('admin')">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                            <span>Admin</span>
                        </button>
                        <button type="button" class="demo-btn owner" onclick="demoLogin('owner')">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                            <span>Owner</span>
                        </button>
                    </div>
                </div>

                <div class="demo-notice">
                    <strong>Demo mode only.</strong> Replace with real authentication later.
                </div>
            </div>

            <a href="<?php echo $BASE_URL; ?>/" class="back-link">← Back to website</a>
        </div>
    </div>

    <script>
        function demoLogin(role) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '';
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'demo_login';
            input.value = role;
            form.appendChild(input);
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</body>
</html>
