<div>
    <style>
        /* Base Sidebar styling (Mobile-safe) */
        .custom-sidebar {
            width: 260px;
            background-color: #ffffff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.04);
            padding: 1.5rem 1rem;
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            z-index: 1000;
            transition: all 0.3s ease-in-out;
        }

        /* Desktop position overrides */
        @media (min-width: 1200px) {
            .custom-sidebar {
                position: fixed;
                top: 60px;
                left: 0;
                height: 100vh;
            }
        }

        /* Nav Menu List */
        .custom-nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }

        .custom-nav-item {
            width: 100%;
        }

        /* Navigation Links Override */
        .custom-nav-link {
            display: flex !important;
            align-items: center;
            gap: 0.85rem;
            padding: 0.75rem 1rem !important;
            color: #495057 !important;
            text-decoration: none !important;
            font-size: 0.95rem;
            font-weight: 500;
            border-radius: 8px;
            transition: all 0.2s ease-in-out;
            background: transparent !important;
            border: none;
            width: 100%;
            cursor: pointer;
            box-sizing: border-box;
        }

        /* Hover & Active States */
        .custom-nav-link:hover {
            background-color: #f1f5f9 !important;
            color: #2563eb !important;
        }

        .custom-nav-link:not(.collapsed),
        .custom-nav-link.active {
            background-color: #eff6ff !important;
            color: #2563eb !important;
            font-weight: 600;
        }

        .custom-nav-link:hover i,
        .custom-nav-link:not(.collapsed) i,
        .custom-nav-link.active i {
            color: #2563eb !important;
        }

        /* Bootstrap Icons Styling */
        .custom-nav-link i {
            font-size: 1.2rem;
            color: #6c757d;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            flex-shrink: 0;
        }

        /* Divider Line */
        .custom-sidebar-divider {
            border: none;
            height: 1px;
            background-color: #e2e8f0;
            margin: 1rem 0;
            opacity: 1;
        }

        /* Logout Wrapper */
        .logout-wrapper {
            padding: 0;
        }
    </style>

    <aside id="sidebar" class="sidebar custom-sidebar">
        <ul class="sidebar-nav custom-nav-menu" id="sidebar-nav">

            <!-- Home -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->routeIs('admin_dashboard') ? '' : 'collapsed' }}"
                    href="{{ route('admin_dashboard') }}" wire:navigate>
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li>

            <!-- Bookings -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->routeIs('admin_bookings') ? '' : 'collapsed' }}"
                    href="{{ route('admin_bookings') }}" wire:navigate>
                    <i class="bi bi-people"></i>
                    <span>Bookings</span>
                </a>
            </li>

            <!-- Admin Wallet -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->routeIs('admin_wallet') ? '' : 'collapsed' }}"
                    href="{{ route('admin_wallet') }}" wire:navigate>
                    <i class="bi bi-coin"></i>
                    <span>Admin Wallet</span>
                </a>
            </li>

            <hr class="custom-sidebar-divider">

            <!-- Sign Out -->
            <li class="nav-item custom-nav-item logout-wrapper">
                <div class="nav-link custom-nav-link collapsed">
                    <livewire:user.logout />
                </div>
            </li>

        </ul>
    </aside>
</div>