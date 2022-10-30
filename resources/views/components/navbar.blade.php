<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div 
            class="collapse navbar-collapse" 
            id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a 
                        class="nav-link {{ Route::is('home') ? 'active' : '' }}" 
                        aria-current="page" 
                        href="{{ route('home') }}">
                        {{ __('navbar.home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        class="nav-link {{ Route::is('order.*') ? 'active' : '' }}" 
                        aria-current="page" 
                        href="{{ route('order.index') }}">
                        {{ __('navbar.order') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        class="nav-link {{ Route::is('plan.*') ? 'active' : '' }}" 
                        aria-current="page" 
                        href="{{ route('plan.index') }}">
                        {{ __('navbar.price') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a 
                        class="nav-link {{ Route::is('customer.*') ? 'active' : '' }}" 
                        aria-current="page" 
                        href="{{ route('customer.index') }}">
                        {{ __('navbar.customer') }}
                    </a>
                </li>
            </ul>
            <div class="dropdown">
                <span 
                    class="dropdown-toggle" 
                    role="button" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    {{ Auth::user()?->name }}
                </span>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a
                            class="dropdown-item"
                            href="{{ route('setting.edit') }}">
                            {{ __('navbar.setting') }}
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button class="dropdown-item">
                                {{ __('navbar.logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>