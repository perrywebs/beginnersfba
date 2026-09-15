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

        .custom-nav-link:hover .nav-icon,
        .custom-nav-link:not(.collapsed) .nav-icon,
        .custom-nav-link.active .nav-icon {
            stroke: #2563eb;
        }

        /* Icons */
        .nav-icon {
            width: 20px;
            height: 20px;
            stroke: #6c757d;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            transition: stroke 0.2s ease;
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

        /* Logout Container */
        .logout-wrapper {
            padding: 0;
        }
    </style>

    <aside id="sidebar" class="sidebar custom-sidebar">
        <ul class="sidebar-nav custom-nav-menu">

            <!-- Home -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->is('users*') ? '' : 'collapsed' }}" href="/users">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg>
                    <span>Home</span>
                </a>
            </li>

            <!-- Recharge -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->routeIs('recharge.*') ? '' : 'collapsed' }}"
                    href="{{ route('recharge.index') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                    <span>Recharge</span>
                </a>
            </li>

            <!-- Transfer -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link {{ request()->routeIs('withdrawal') ? '' : 'collapsed' }}"
                    href="{{ route('withdrawal') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8"></path>
                        <line x1="12" y1="6" x2="12" y2="18"></line>
                    </svg>
                    <span>Transfer</span>
                </a>
            </li>

            <!-- Hunt Product -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link collapsed" href="https://google.com" target="_blank"
                    rel="noopener noreferrer">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                    <span>Hunt Product</span>
                </a>
            </li>

            <!-- Build Brand -->
            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link collapsed" href="mailto:support@fbabeginners.live">
                    <svg class="nav-icon" viewBox="0 0 24 24">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                    <span>Build Brand</span>
                </a>
            </li>

            <hr class="custom-sidebar-divider">

            <li class="nav-item custom-nav-item">
                <a class="nav-link custom-nav-link collapsed" href="{{ route('user.profile') }}">
                    <svg class="nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <!-- Head -->
                        <circle cx="12" cy="8" r="4"></circle>
                        <!-- Shoulders -->
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"></path>
                    </svg>
                    <span>Profile Setting</span>
                </a>
            </li>

            <!-- Sign Out -->
            <li class="nav-item custom-nav-item logout-wrapper">
                <div class="nav-link custom-nav-link collapsed">
                    <livewire:user.logout />
                </div>
            </li>

        </ul>
    </aside>
</div>
