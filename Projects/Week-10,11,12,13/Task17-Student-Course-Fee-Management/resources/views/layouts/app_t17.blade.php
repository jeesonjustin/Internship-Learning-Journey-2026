
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') | Ledger Campus</title>

    <link rel="stylesheet" href="{{ asset('css/style_t17.css') }}">
</head>

<body>

    <div class="app-layout">

        <!-- Sidebar -->
        <aside class="sidebar">

            <a href="{{ route('dashboard') }}" class="brand">
                <span class="brand-mark">L</span>

                <span class="brand-text">
                    <strong>LEDGER</strong>
                    <small>CAMPUS</small>
                </span>
            </a>

            <div class="sidebar-label">WORKSPACE</div>

            <nav class="sidebar-nav">

                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <span class="nav-icon">◫</span>
                    Dashboard
                </a>

                <a href="{{ route('students.index') }}"
                   class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    <span class="nav-icon">♙</span>
                    Students
                </a>

                <a href="{{ route('courses.index') }}"
                   class="nav-link {{ request()->routeIs('courses.*') ? 'active' : '' }}">
                    <span class="nav-icon">▤</span>
                    Courses
                </a>

                <a href="{{ route('fees.index') }}"
                   class="nav-link {{ request()->routeIs('fees.*') ? 'active' : '' }}">
                    <span class="nav-icon">₹</span>
                    Fee Management
                </a>

            </nav>

            <div class="sidebar-footer">
                <span class="status-dot"></span>
                <span>Management System</span>
            </div>

        </aside>

        <!-- Main area -->
        <main class="main-area">

            <header class="topbar">
                <div>
                    <p class="topbar-eyebrow">STUDENT MANAGEMENT</p>
                    <p class="topbar-title">@yield('page-heading', 'Overview')</p>
                </div>

                <!-- <div class="topbar-tag">
                    Task 17
                </div> -->
            </header>

            
            <section class="page-content">

                @if (session('success'))
                <div class="success-message-wrap">
                    <div class="alert alert-success success-message">
                        {{ session('success') }}
                    </div>
                </div>
                @endif

                @yield('content')

            </section>

            <footer class="app-footer">
                Student Course &amp; Fee Management
            </footer>

        </main>

    </div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const message = document.querySelector('.success-message-wrap');

    if (!message) return;

    setTimeout(function () {
        message.classList.add('fade-out');

        setTimeout(function () {
            message.remove();
        }, 550);
    }, 3000);
});
</script>
</body>
</html>

