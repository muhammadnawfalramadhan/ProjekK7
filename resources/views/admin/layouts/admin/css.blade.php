<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>
<!-- Load Font Inter dari Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<!-- Load Ikon Lucide -->
<script src="https://unpkg.com/lucide@latest"></script>

<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f0fdf4;
    }

    /* Custom Scrollbar Styling */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f0fdf4;
    }

    ::-webkit-scrollbar-thumb {
        background: #15803d;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #16a34a;
    }

    /* Sidebar Link Styling */
    .sidebar-link {
        transition: all 0.2s;
        position: relative;
        display: flex;
        align-items: center;
    }

    /* Gaya untuk menu yang sedang aktif */
    .sidebar-link.active {
        background-color: #166534;
        border-left: 4px solid #fde047;
        padding-left: 16px;
    }

    .sidebar-link:not(.active):hover {
        background-color: #22c55e;
    }
</style>