<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Web Sawit - Tukang Timbang</title>

<!-- Bootstrap & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    body { font-family: 'Segoe UI', sans-serif; margin: 0; background: #f0f8f0; }

    /* --- SIDEBAR GLOBAL --- */
    .sidebar {
        height: 100vh; width: 260px; position: fixed; top: 0; left: 0;
        background: linear-gradient(180deg, #3ca374 0%, #2e7d57 100%);
        color: white; padding-top: 2rem; z-index: 1000; display: flex; flex-direction: column;
    }
    .sidebar h4 { text-align: center; margin-bottom: 2rem; font-weight: 700; }
    .sidebar a {
        color: white; text-decoration: none; padding: 15px 25px; display: flex; align-items: center; gap: 10px;
        margin: 5px 15px; border-radius: 10px; transition: 0.3s;
    }
    .sidebar a:hover, .sidebar a.active { background: rgba(255,255,255,0.2); }
    .sidebar a i { font-size: 1.2rem; }

    /* --- CONTENT GLOBAL --- */
    .main-content { margin-left: 260px; padding: 30px; }

    /* --- FOOTER GLOBAL --- */
    footer { margin-top: 50px; text-align: center; color: #666; font-size: 0.9rem; padding-bottom: 20px; }

    @media(max-width:768px){
        .sidebar { width: 70px; } .sidebar h4, .sidebar span { display: none; }
        .sidebar a { justify-content: center; } .main-content { margin-left: 70px; }
    }
</style>
