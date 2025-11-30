<!-- Script Utama (Lucide & Logic Sidebar) -->
<script>
    // Inisialisasi ikon Lucide
    lucide.createIcons();

    // Logika untuk toggle sidebar di tampilan mobile
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('sidebar-toggle');

    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    // Menutup sidebar saat klik di luar (hanya untuk mobile)
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnToggle = toggleButton && toggleButton.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnToggle && window.innerWidth < 768 && sidebar && !sidebar.classList.contains(
                '-translate-x-full')) {
            sidebar.classList.add('-translate-x-full');
        }
    });
</script><?php /**PATH D:\Intanlestari24TIG2\laragon-6.0-minimal\www\ProjekK7\resources\views/admin/layouts/admin/js.blade.php ENDPATH**/ ?>