<div class="sidebar">
    <h4>🌴 Pekerja</h4>

    <a href="{{ route('tukang.dashboard') }}" class="{{ Request::routeIs('tukang.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door-fill"></i> <span>Dashboard</span>
    </a>

    <a href="{{ route('tukang.input') }}" class="{{ Request::routeIs('tukang.input') ? 'active' : '' }}">
        <i class="bi bi-plus-square-fill"></i> <span>Input Timbangan</span>
    </a>

    <a href="{{ route('tukang.data') }}" class="{{ Request::routeIs('tukang.data') ? 'active' : '' }}">
        <i class="bi bi-file-earmark-text"></i> <span>Data Timbangan</span>
    </a>

    <a href="{{ route('auth.logout') }}">
        <i class="bi bi-box-arrow-right"></i> <span>Logout</span>
    </a>
</div>
