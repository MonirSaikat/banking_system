<nav class="pushy pushy-left">
    <div class="pushy-content">
        <ul>
            <li class="pushy-link">
                <a href="{{ route('dashboard') }}">
                    <i class="fa fa-home me-2"></i>
                    {{ __('Dashboard') }}
                </a>
            </li>

            <li class="pushy-submenu">
                <button>
                    <i class="fa-solid fa-landmark me-2"></i>
                    {{ __('Deposit') }}
                </button>
                <ul>
                    <li class="pushy-link">
                        <a href="{{ route('deposit.index') }}">{{ __('Deposit List') }}</a>
                    </li>
                    <li class="pushy-link">
                        <a href="{{ route('deposit.create') }}">{{ __('New Deposit') }}</a>
                    </li>
                </ul>
            </li>
            <li class="pushy-submenu">
                <button>
                    <i class="fa-solid fa-money-bill me-2"></i>
                    {{ __('Withdrawal') }}
                </button>
                <ul>
                    <li class="pushy-link">
                        <a href="{{ route('withdrawal.index') }}">{{ __('Withdrawal List') }}</a>
                    </li>
                    <li class="pushy-link">
                        <a href="{{ route('withdrawal.create') }}">{{ __('New Withdrawal') }}</a>
                    </li>
                </ul>
            </li>
            <li class="pushy-link">
                <a 
                    onclick="return confirm('Are you sure you want to log out?')"
                    href="{{ route('logout') }}">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>
                        {{ __('Logout') }}
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>
