<nav class="pushy pushy-left">
    <div class="pushy-content">
        <ul>
            <li class="pushy-link"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
            <li class="pushy-submenu">
                <button>{{ __('Deposit') }}</button>
                <ul>
                    <li class="pushy-link"><a href="{{ route('deposit.index') }}">{{ __('Deposit List') }}</a></li>
                    <li class="pushy-link"><a href="{{ route('deposit.create') }}">{{ __('New Deposit') }}</a></li>
                </ul>
            </li>
            <li class="pushy-submenu">
                <button>{{ __('Withdrawal') }}</button>
                <ul>
                    <li class="pushy-link"><a href="{{ route('withdrawal.index') }}">{{ __('Withdrawal List') }}</a>
                    </li>
                    <li class="pushy-link"><a href="{{ route('withdrawal.create') }}">{{ __('New Withdrawal') }}</a>
                    </li>
                </ul>
            </li>
            <li class="pushy-link"><a onclick="return confirm('Are you sure you want to log out?')"
                    href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
        </ul>
    </div>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>
