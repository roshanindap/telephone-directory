<footer class="bg-dark text-white text-center py-3 mt-auto">
    <div class="container">
        &copy; 2025 Dashboard. All Rights Reserved.
    </div>
</footer>

<!-- SCRIPT TOGGLE SIDEBAR -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebar");
        const toggleBtn = document.getElementById("sidebarToggle");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("sidebar-collapsed");
        });
    });
</script>

<!-- STYLES -->
<style>
    #sidebar {
        width: 250px;
        transition: width 0.3s ease-in-out;
    }
    .sidebar-collapsed {
        width: 80px !important;
        padding-left: 0 !important;
    }
    .sidebar-collapsed span{
        display: none;
    }
    .sidebar-collapsed .nav-link {
        text-align: center;
    }
    .sidebar-collapsed .nav-link i {
        margin-right: 0;
    }
    .sidebar-collapsed .nav-link span {
        display: none;
    }
</style>
