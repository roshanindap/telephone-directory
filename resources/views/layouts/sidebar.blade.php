
<div id="sidebar" class="bg-dark text-white p-4 min-vh-100 sidebar-expanded">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="/"><i class="fas fa-home"></i><span> Dashboard</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('contacts.index') }}">
                <i class="fas fa-users"></i> <span>Contacts</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('analytics.analytics') }}">
                <i class="fas fa-chart-line"></i><span> Analytics</span>
            </a>
        </li>
    </ul>
</div>
