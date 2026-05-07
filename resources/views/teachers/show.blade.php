<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Belle Voix – {{ $teacher->user->fullname }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  :root {
    --brand:       #3b6ef8;
    --brand-dark:  #2a56d6;
    --brand-light: #eef2ff;
    --sidebar-bg:  #ffffff;
    --main-bg:     #f4f6fb;
    --card-bg:     #ffffff;
    --text-primary:#1a1d2e;
    --text-muted:  #8c93a8;
    --text-label:  #5b6278;
    --border:      #e8eaf2;
    --active-green:#16a34a;
    --inactive-red:#dc2626;
    --leave-amber: #d97706;
    --row-hover:   #f8f9ff;
    --shadow-sm: 0 1px 4px rgba(0,0,0,.06);
    --shadow-md: 0 4px 20px rgba(59,110,248,.12);
    --radius: 12px;
  }
  body { font-family:'Plus Jakarta Sans',sans-serif; background:var(--main-bg); color:var(--text-primary); display:flex; min-height:100vh; }

  /* ── SIDEBAR ── */
  .sidebar { width:240px; min-height:100vh; background:var(--sidebar-bg); border-right:1px solid var(--border); display:flex; flex-direction:column; position:fixed; top:0; left:0; bottom:0; z-index:10; overflow-y:auto; }
  .sidebar-logo { display:flex; align-items:center; gap:10px; padding:22px 20px 18px; font-weight:800; font-size:18px; color:var(--brand); border-bottom:1px solid var(--border); flex-shrink:0; }
  .logo-icon { width:34px; height:34px; background:var(--brand); border-radius:9px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:16px; }
  .sidebar-section-label { font-size:10px; font-weight:700; letter-spacing:.1em; color:var(--text-muted); padding:18px 20px 6px; text-transform:uppercase; }
  .nav-item { display:flex; align-items:center; gap:10px; padding:10px 16px; margin:2px 10px; border-radius:9px; font-size:14px; font-weight:500; color:var(--text-label); cursor:pointer; text-decoration:none; transition:background .15s,color .15s; }
  .nav-item:hover { background:var(--brand-light); color:var(--brand); }
  .nav-item.active { background:var(--brand); color:#fff; font-weight:600; }
  .nav-item svg { width:18px; height:18px; stroke:currentColor; fill:none; stroke-width:2; flex-shrink:0; }
  .badge { margin-left:auto; background:#ef4444; color:#fff; font-size:10px; font-weight:700; padding:1px 6px; border-radius:20px; min-width:18px; text-align:center; }
  .sidebar-promo { margin:auto 14px 18px; background:linear-gradient(135deg,#3b6ef8 0%,#6c63ff 100%); border-radius:var(--radius); padding:18px; color:#fff; flex-shrink:0; }
  .sidebar-promo h4 { font-size:14px; font-weight:700; margin-bottom:6px; }
  .sidebar-promo p { font-size:12px; opacity:.85; line-height:1.5; margin-bottom:12px; }
  .promo-btn { background:rgba(255,255,255,.2); border:1px solid rgba(255,255,255,.35); color:#fff; font-size:12px; font-weight:600; padding:7px 14px; border-radius:7px; cursor:pointer; width:100%; transition:background .15s; }
  .promo-btn:hover { background:rgba(255,255,255,.3); }

  /* ── MAIN ── */
  .main { margin-left:240px; flex:1; display:flex; flex-direction:column; }
  .topbar { background:#fff; border-bottom:1px solid var(--border); display:flex; align-items:center; gap:14px; padding:0 28px; height:64px; position:sticky; top:0; z-index:5; }
  .search-wrap { flex:1; max-width:440px; position:relative; }
  .search-wrap svg { position:absolute; left:12px; top:50%; transform:translateY(-50%); width:16px; height:16px; stroke:var(--text-muted); fill:none; stroke-width:2; }
  .search-wrap input { width:100%; background:var(--main-bg); border:1px solid var(--border); border-radius:9px; padding:9px 12px 9px 36px; font-size:13.5px; font-family:inherit; color:var(--text-primary); outline:none; transition:border-color .15s; }
  .search-wrap input:focus { border-color:var(--brand); }
  .topbar-actions { margin-left:auto; display:flex; align-items:center; gap:10px; }
  .icon-btn { width:36px; height:36px; border:1px solid var(--border); border-radius:9px; display:flex; align-items:center; justify-content:center; cursor:pointer; background:#fff; position:relative; transition:background .15s; }
  .icon-btn:hover { background:var(--main-bg); }
  .icon-btn svg { width:18px; height:18px; stroke:var(--text-label); fill:none; stroke-width:2; }
  .notif-dot { width:7px; height:7px; background:#ef4444; border-radius:50%; border:1.5px solid #fff; position:absolute; top:5px; right:5px; }
  .user-chip { display:flex; align-items:center; gap:9px; padding:5px 10px 5px 5px; border:1px solid var(--border); border-radius:11px; cursor:pointer; transition:background .15s; }
  .user-chip:hover { background:var(--main-bg); }
  .avatar { width:30px; height:30px; background:var(--brand); border-radius:8px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:11px; font-weight:700; }
  .user-info .name { font-size:13px; font-weight:600; line-height:1.3; }
  .user-info .role { font-size:11px; color:var(--text-muted); }

  /* ── CONTENT ── */
  .content { padding:30px 28px; flex:1; }

  /* ── BREADCRUMB ── */
  .breadcrumb { display:flex; align-items:center; gap:8px; margin-bottom:22px; font-size:13px; }
  .breadcrumb a { color:var(--text-muted); text-decoration:none; cursor:pointer; transition:color .15s; }
  .breadcrumb a:hover { color:var(--brand); }
  .breadcrumb .sep { color:black; }
  .breadcrumb .current { color:var(--text-primary); font-weight:600; }

  /* ── PROFILE HERO ── */
  .profile-hero { background:var(--card-bg); border:1px solid var(--border); border-radius:var(--radius); box-shadow:var(--shadow-sm); padding:28px; margin-bottom:22px; display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap; }
  .hero-avatar-wrap { position:relative; flex-shrink:0; }
  .hero-avatar { width:90px; height:90px; border-radius:18px; display:flex; align-items:center; justify-content:center; font-size:28px; font-weight:800; color:#fff; background:#3b6ef8; }
  .hero-status-dot { width:14px; height:14px; border-radius:50%; border:2.5px solid #fff; position:absolute; bottom:4px; right:4px; }
  .dot-active   { background:var(--active-green); }
  .dot-inactive { background:var(--inactive-red); }
  .hero-info { flex:1; min-width:200px; }
  .hero-name { font-size:22px; font-weight:800; letter-spacing:-.3px; margin-bottom:4px; }
  .hero-meta { display:flex; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:16px; }
  .hero-id { font-size:12.5px; color:var(--text-muted); font-family:'Courier New',monospace; background:var(--main-bg); padding:3px 9px; border-radius:6px; border:1px solid var(--border); }
  .status-badge { display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; padding:4px 11px; border-radius:20px; }
  .status-badge::before { content:''; width:6px; height:6px; border-radius:50%; flex-shrink:0; }
  .s-active   { background:#dcfce7; color:var(--active-green); }
  .s-active::before   { background:var(--active-green); }
  .s-inactive { background:#fee2e2; color:var(--inactive-red); }
  .s-inactive::before { background:var(--inactive-red); }
  .hero-stats { display:flex; gap:24px; flex-wrap:wrap; }
  .hstat { text-align:center; }
  .hstat-val { font-size:20px; font-weight:800; color:var(--brand); line-height:1.2; }
  .hstat-label { font-size:11px; color:var(--text-muted); font-weight:500; margin-top:2px; }
  .hero-actions { display:flex; flex-direction:column; gap:8px; align-items:flex-end; margin-left:auto; }
  .btn-edit { background:var(--brand); color:#fff; border:none; padding:9px 18px; border-radius:9px; font-size:13px; font-weight:700; font-family:inherit; cursor:pointer; box-shadow:var(--shadow-md); transition:background .15s,transform .1s; display:flex; align-items:center; gap:6px; }
  .btn-edit:hover { background:var(--brand-dark); transform:translateY(-1px); }
  .btn-outline { background:#fff; color:var(--text-label); border:1px solid var(--border); padding:9px 18px; border-radius:9px; font-size:13px; font-weight:600; font-family:inherit; cursor:pointer; transition:background .15s,border-color .15s,color .15s; display:flex; align-items:center; gap:6px; }
  .btn-outline:hover { border-color:var(--brand); color:var(--brand); background:var(--brand-light); }

  /* ── TWO-COLUMN LAYOUT ── */
  .profile-grid { display:grid; grid-template-columns:340px 1fr; gap:22px; align-items:start; }
  @media (max-width:900px) { .profile-grid { grid-template-columns:1fr; } }

  /* ── CARD ── */
  .card { background:var(--card-bg); border:1px solid var(--border); border-radius:var(--radius); box-shadow:var(--shadow-sm); overflow:hidden; }
  .card-header { padding:18px 20px 14px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between; }
  .card-title { font-size:15px; font-weight:700; }
  .card-badge { font-size:11px; font-weight:700; background:var(--brand-light); color:var(--brand); padding:3px 10px; border-radius:20px; }

  /* ── INFO LIST ── */
  .info-list { padding:8px 0; }
  .info-row { display:flex; align-items:center; padding:10px 20px; gap:12px; transition:background .12s; }
  .info-row:hover { background:var(--row-hover); }
  .info-icon { width:32px; height:32px; background:var(--brand-light); border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
  .info-icon svg { width:15px; height:15px; stroke:var(--brand); fill:none; stroke-width:2; }
  .info-label { font-size:11px; color:var(--text-muted); font-weight:600; text-transform:uppercase; letter-spacing:.06em; margin-bottom:1px; }
  .info-value { font-size:13.5px; font-weight:600; color:var(--text-primary); }
  .gender-badge { display:inline-flex; align-items:center; gap:4px; font-size:12px; font-weight:600; padding:3px 9px; border-radius:20px; }
  .gender-male   { background:#eff6ff; color:#1d4ed8; }
  .gender-female { background:#fdf2f8; color:#be185d; }

  /* ── TABS ── */
  .tabs-bar { display:flex; align-items:center; gap:6px; padding:14px 20px 0; flex-wrap:wrap; border-bottom:1px solid var(--border); }
  .tab-btn { font-size:13px; font-weight:600; font-family:inherit; padding:8px 16px; border-radius:9px 9px 0 0; border:1px solid transparent; border-bottom:none; background:transparent; color:var(--text-muted); cursor:pointer; transition:background .15s,color .15s; position:relative; top:1px; }
  .tab-btn:hover { color:var(--text-primary); background:var(--main-bg); }
  .tab-btn.active { background:var(--card-bg); border-color:var(--border); color:var(--brand); font-weight:700; }
  .tab-panel { display:none; }
  .tab-panel.active { display:block; }

  /* ── STUDENTS TABLE ── */
  .table-toolbar { display:flex; align-items:center; gap:10px; padding:14px 20px; flex-wrap:wrap; }
  .search-inline { flex:1; max-width:260px; position:relative; }
  .search-inline svg { position:absolute; left:10px; top:50%; transform:translateY(-50%); width:14px; height:14px; stroke:var(--text-muted); fill:none; stroke-width:2; }
  .search-inline input { width:100%; background:var(--main-bg); border:1px solid var(--border); border-radius:8px; padding:7px 10px 7px 30px; font-size:13px; font-family:inherit; color:var(--text-primary); outline:none; transition:border-color .15s; }
  .search-inline input:focus { border-color:var(--brand); }
  .tb-label { font-size:13px; color:var(--text-muted); margin-left:auto; }
  .table-wrap { overflow-x:auto; }
  table { width:100%; border-collapse:collapse; min-width:480px; }
  thead tr { border-bottom:1px solid var(--border); }
  thead th { padding:10px 16px; font-size:11px; font-weight:700; letter-spacing:.07em; color:var(--text-muted); text-transform:uppercase; text-align:left; white-space:nowrap; background:#fafbff; }
  tbody tr { border-bottom:1px solid var(--border); transition:background .12s; animation:fadeIn .22s ease both; }
  tbody tr:last-child { border-bottom:none; }
  tbody tr:hover { background:var(--row-hover); }
  tbody td { padding:11px 16px; font-size:13.5px; vertical-align:middle; }
  @keyframes fadeIn { from{opacity:0;transform:translateY(4px)} to{opacity:1;transform:translateY(0)} }

  .stu-avatar { width:30px; height:30px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:11px; font-weight:700; color:#fff; flex-shrink:0; }
  .stu-cell { display:flex; align-items:center; gap:10px; }
  .stu-name { font-size:13.5px; font-weight:600; }
  .stu-email { font-size:11.5px; color:var(--text-muted); }

  .empty-state { padding:40px 20px; text-align:center; color:var(--text-muted); font-size:13.5px; }
  .empty-state svg { width:36px; height:36px; stroke:var(--border); fill:none; stroke-width:1.5; margin:0 auto 12px; display:block; }

  /* ── TABLE FOOTER + PAGINATION ── */
  .table-footer { display:flex; align-items:center; justify-content:space-between; padding:12px 20px; border-top:1px solid var(--border); background:#fafbff; flex-wrap:wrap; gap:8px; }
  .tf-info { font-size:13px; color:var(--text-muted); }
  .pager { display:flex; align-items:center; gap:4px; }
  .pg-btn { width:30px; height:30px; border:1px solid var(--border); border-radius:7px; background:#fff; color:var(--text-label); font-size:13px; font-weight:600; font-family:inherit; cursor:pointer; display:flex; align-items:center; justify-content:center; transition:background .12s,border-color .12s,color .12s; padding:0; }
  .pg-btn:hover:not(:disabled) { border-color:var(--brand); color:var(--brand); background:var(--brand-light); }
  .pg-btn:disabled { opacity:.35; cursor:default; }
  .pg-btn.active { background:var(--brand); border-color:var(--brand); color:#fff; }
  .pg-ellipsis { font-size:13px; color:var(--text-muted); padding:0 4px; line-height:30px; }

  /* ── MODAL ── */
  .overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.35); backdrop-filter:blur(3px); z-index:50; align-items:center; justify-content:center; }
  .overlay.open { display:flex; }
  .modal { background:#fff; border-radius:16px; padding:28px; width:100%; max-width:460px; box-shadow:0 20px 60px rgba(0,0,0,.2); animation:slideUp .2s ease; margin:16px; max-height:90vh; overflow-y:auto; }
  @keyframes slideUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
  .modal-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:22px; }
  .modal-header h2 { font-size:18px; font-weight:800; }
  .close-btn { width:32px; height:32px; border:1px solid var(--border); background:var(--main-bg); border-radius:8px; cursor:pointer; font-size:16px; display:flex; align-items:center; justify-content:center; color:var(--text-muted); transition:background .15s; }
  .close-btn:hover { background:#fee2e2; color:#ef4444; border-color:#fca5a5; }
  .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
  .form-group { display:flex; flex-direction:column; gap:5px; }
  .form-group.full { grid-column:1/-1; }
  .form-group label { font-size:11px; font-weight:700; color:var(--text-label); letter-spacing:.06em; text-transform:uppercase; }
  .form-group input, .form-group select { border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:13.5px; font-family:inherit; color:var(--text-primary); outline:none; transition:border-color .15s; background:var(--main-bg); min-width:0; width:100%; }
  .form-group input:focus, .form-group select:focus { border-color:var(--brand); background:#fff; }
  .modal-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:22px; }
  .btn-cancel { padding:10px 20px; border-radius:9px; border:1px solid var(--border); background:#fff; font-size:13.5px; font-weight:600; font-family:inherit; color:var(--text-label); cursor:pointer; transition:background .15s; }
  .btn-cancel:hover { background:var(--main-bg); }
  .btn-submit { padding:10px 22px; border-radius:9px; border:none; background:var(--brand); font-size:13.5px; font-weight:700; font-family:inherit; color:#fff; cursor:pointer; box-shadow:var(--shadow-md); transition:background .15s; }
  .btn-submit:hover { background:var(--brand-dark); }

  /* ── TOAST ── */
  .toast { position:fixed; bottom:24px; right:24px; background:#1a1d2e; color:#fff; padding:12px 18px; border-radius:10px; font-size:13.5px; font-weight:500; display:flex; align-items:center; gap:8px; box-shadow:0 8px 24px rgba(0,0,0,.2); transform:translateY(60px); opacity:0; transition:all .3s ease; z-index:999; }
  .toast.show { transform:translateY(0); opacity:1; }
</style>
</head>
<body>

<!-- ═══════════════ SIDEBAR ═══════════════ -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
    </div>
    Belle voix
  </div>
  <div class="sidebar-section-label">Menu</div>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
  <a class="nav-item active" href="{{ route('teachers.index') }}"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Teachers</a>
  <a class="nav-item" href="{{ route('students.index') }}"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Students</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Attendance</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>Finance</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>Notice<span class="badge">5</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>Calendar</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>Library</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>Messages<span class="badge">3</span></a>
  <div class="sidebar-section-label">Other</div>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Profile</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>Setting</a>
  <div class="sidebar-promo">
    <h4>Manage Smarter</h4>
    <p>Keep all your school data in one place, anytime.</p>
    <button class="promo-btn">Download the App</button>
  </div>
</aside>

<!-- ═══════════════ MAIN ═══════════════ -->
<div class="main">
  <header class="topbar">
    <div class="search-wrap">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" placeholder="Search anything…"/>
    </div>
    <div class="topbar-actions">
      <div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <div class="icon-btn">
        <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <span class="notif-dot"></span>
      </div>
      <div class="user-chip">
        <div class="avatar">LA</div>
        <div class="user-info"><div class="name">Linda Adora</div><div class="role">Admin</div></div>
      </div>
    </div>
  </header>

  <div class="content">

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
      <a href="{{ route('teachers.index') }}">Teachers</a>
      <span class="sep">›</span>
      <span class="current">{{ $teacher->user->fullname }}</span>
    </div>

    <!-- HERO -->
    <div class="profile-hero">
      <div class="hero-avatar-wrap">
        <div class="hero-avatar" id="heroAvatar"></div>
        <span class="hero-status-dot dot-{{ $teacher->status ?? 'active' }}"></span>
      </div>
      <div class="hero-info">
        <div class="hero-name">{{ $teacher->user->fullname }}</div>
        <div class="hero-meta">
          <span class="hero-id">{{ $teacher->user->cin }}</span>
          <span class="status-badge s-{{ $teacher->status ?? 'active' }}">{{ ucfirst($teacher->status ?? 'active') }}</span>
        </div>
        <div class="hero-stats">
          <div class="hstat">
            <div class="hstat-val">{{ $teacher->school_classes->count() }}</div>
            <div class="hstat-label">Classes</div>
          </div>
          <div class="hstat">
            <div class="hstat-val">{{ $teacher->school_classes->sum(fn($c) => $c->students->count()) }}</div>
            <div class="hstat-label">Students</div>
          </div>
          <div class="hstat">
            <div class="hstat-val">{{ \Carbon\Carbon::parse($teacher->created_at)->format('Y') }}</div>
            <div class="hstat-label">Joined</div>
          </div>
        </div>
      </div>
      <div class="hero-actions">
        <button class="btn-edit" onclick="openEditModal()">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          Edit Profile
        </button>
        <button class="btn-outline" onclick="showToast('📨 Message sent.')">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          Send Message
        </button>
        <button class="btn-outline"
          style="color:#dc2626;border-color:#fca5a5;"
          onmouseover="this.style.background='#fee2e2'"
          onmouseout="this.style.background='#fff'"
          onclick="document.getElementById('deleteOverlay').classList.add('open')">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
          Delete Teacher
        </button>
      </div>
    </div>

    <!-- PROFILE GRID -->
    <div class="profile-grid">

      <!-- LEFT: PERSONAL INFO -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Personal Information</span>
          <span class="card-badge">Details</span>
        </div>
        <div class="info-list">
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <div>
              <div class="info-label">Full Name</div>
              <div class="info-value">{{ $teacher->user->fullname }}</div>
            </div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div>
              <div class="info-label">Email</div>
              <div class="info-value">{{ $teacher->user->email }}</div>
            </div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.18 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 15.92z"/></svg></div>
            <div>
              <div class="info-label">Phone Number</div>
              <div class="info-value">{{ $teacher->user->phone_number }}</div>
            </div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <div>
              <div class="info-label">Date of Birth</div>
              <div class="info-value">{{ \Carbon\Carbon::parse($teacher->user->date_of_birth)->format('M d, Y') }}</div>
            </div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg></div>
            <div>
              <div class="info-label">Gender</div>
              <div><span class="gender-badge gender-{{ $teacher->user->gender }}">{{ ucfirst($teacher->user->gender) }}</span></div>
            </div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
            <div>
              <div class="info-label">Member Since</div>
              <div class="info-value">{{ \Carbon\Carbon::parse($teacher->created_at)->format('M d, Y') }}</div>
            </div>
          </div>
        </div>
      </div>

      <!-- RIGHT: CLASSES + STUDENTS -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Classes & Students</span>
          <span class="card-badge">{{ $teacher->school_classes->count() }} classes</span>
        </div>

        @if($teacher->school_classes->isEmpty())
          <div class="empty-state">
            <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            No classes assigned to this teacher yet.
          </div>
        @else

          {{-- ── TABS ── --}}
          <div class="tabs-bar" id="tabsBar">
            @foreach($teacher->school_classes as $i => $class)
              <button
                class="tab-btn {{ $i === 0 ? 'active' : '' }}"
                data-tab="class-{{ $class->id }}"
                onclick="switchTab(this)">
                {{ $class->name }}
                <span style="margin-left:5px;font-size:11px;font-weight:500;color:inherit;opacity:.7">({{ $class->students->count() }})</span>
              </button>
            @endforeach
          </div>

          {{-- ── PANELS ── --}}
          @foreach($teacher->school_classes as $i => $class)
            <div class="tab-panel {{ $i === 0 ? 'active' : '' }}"
                 id="class-{{ $class->id }}"
                 data-classid="{{ $class->id }}">

              {{-- Toolbar --}}
              <div class="table-toolbar">
                <div class="search-inline">
                  <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                  <input
                    type="text"
                    placeholder="Filter students…"
                    oninput="filterTable(this, {{ $class->id }})"
                  />
                </div>
                <span class="tb-label" id="count-{{ $class->id }}">{{ $class->students->count() }} students</span>
              </div>

              {{-- Table --}}
              <div class="table-wrap">
                <table id="tbl-{{ $class->id }}">
                  <thead>
                    <tr>
                      <th>Student</th>
                      <th>CIN</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($class->students as $student)
                      <tr>
                        <td>
                          <div class="stu-cell">
                            <div class="stu-avatar" data-name="{{ $student->user->fullname }}"></div>
                            <div>
                              <div class="stu-name">{{ $student->user->fullname }}</div>
                              <div class="stu-email">{{ $student->user->email }}</div>
                            </div>
                          </div>
                        </td>
                        <td style="font-size:12.5px;color:var(--text-muted);font-family:'Courier New',monospace">{{ $student->user->cin }}</td>
                        <td>
                          <a href="{{ route('students.show', $student->id) }}"
                             title="View profile"
                             style="display:inline-flex;align-items:center;justify-content:center;width:32px;height:32px;border-radius:8px;border:1px solid var(--border);color:var(--brand);transition:background .12s;text-decoration:none;"
                             onmouseover="this.style.background='var(--brand-light)'"
                             onmouseout="this.style.background='transparent'">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                          </a>
                        </td>
                      </tr>
                    @empty
                      <tr class="empty-row">
                        <td colspan="3" style="padding:28px;text-align:center;color:var(--text-muted);font-size:13px;">No students in this class.</td>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
              </div>

              {{-- ── FOOTER with pagination ── --}}
              <div class="table-footer">
                <span class="tf-info" id="tf-info-{{ $class->id }}">
                  {{ $class->students->count() }} student{{ $class->students->count() !== 1 ? 's' : '' }} in {{ $class->name }}
                </span>
                <div class="pager" id="pager-{{ $class->id }}"></div>
              </div>

            </div>{{-- end panel --}}
          @endforeach

        @endif
      </div>{{-- end right card --}}

    </div>{{-- end grid --}}
  </div>{{-- end content --}}
</div>{{-- end main --}}

<!-- ═══════════════ EDIT MODAL ═══════════════ -->
<div class="overlay" id="editOverlay" onclick="if(event.target===this)closeEditModal()">
  <div class="modal">
    <div class="modal-header">
      <h2>Edit Teacher</h2>
      <button type="button" class="close-btn" onclick="closeEditModal()">✕</button>
    </div>
    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-grid">
        <div class="form-group full">
          <label>Full Name</label>
          <input type="text" name="fullname" value="{{ $teacher->user->fullname }}" required/>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ $teacher->user->email }}" required/>
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone_number" value="{{ $teacher->user->phone_number }}" placeholder="e.g. 0612345678"/>
        </div>
        <div class="form-group">
          <label>Date of Birth</label>
          <input type="date" name="dob" value="{{ optional($teacher->user->date_of_birth)->format('Y-m-d') ?? substr($teacher->user->date_of_birth, 0, 10) }}"/>
        </div>
        <div class="form-group">
          <label>Gender</label>
          <select name="gender">
            <option value="male"   {{ $teacher->user->gender === 'male'   ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $teacher->user->gender === 'female' ? 'selected' : '' }}>Female</option>
          </select>
        </div>
        <div class="form-group full">
          <label>CIN</label>
          <input type="text" name="cin" value="{{ $teacher->user->cin }}" placeholder="e.g. X123456" required/>
        </div>
      </div>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
        <button type="submit" class="btn-submit">Save Changes</button>
      </div>
    </form>
  </div>
</div>

<!-- ═══════════════ DELETE MODAL ═══════════════ -->
<div class="overlay" id="deleteOverlay" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="modal" style="max-width:380px">
    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h2>Delete Teacher</h2>
        <button type="button" class="close-btn" onclick="document.getElementById('deleteOverlay').classList.remove('open')">✕</button>
      </div>
      <p style="color:var(--text-label);font-size:14px;line-height:1.7;margin-bottom:22px">
        Are you sure you want to delete <strong>{{ $teacher->user->fullname }}</strong>?<br>
        All associated class assignments will also be removed. This action cannot be undone.
      </p>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="document.getElementById('deleteOverlay').classList.remove('open')">Cancel</button>
        <button type="submit" class="btn-submit" style="background:#dc2626">Delete Teacher</button>
      </div>
    </form>
  </div>
</div>

<!-- ═══════════════ TOAST ═══════════════ -->
@if(session('success'))
<script>window.addEventListener('DOMContentLoaded',()=>showToast(@json(session('success'))));</script>
@endif
@if($errors->any())
<script>window.addEventListener('DOMContentLoaded',()=>showToast(@json(implode(' ', $errors->all()))));</script>
@endif
<div class="toast" id="toast"><span id="toastMsg"></span></div>

<!-- ═══════════════ SCRIPTS ═══════════════ -->
<script>
/* ── Avatar helpers ── */
const COLORS = ['#3b6ef8','#8b5cf6','#10b981','#f59e0b','#ef4444','#06b6d4','#ec4899','#84cc16','#f97316','#6366f1','#14b8a6','#a855f7','#0ea5e9','#d946ef','#22c55e'];
function initials(n){ return n.split(' ').filter(Boolean).map(w=>w[0]).join('').slice(0,2).toUpperCase(); }
function colorFor(n){ let h=0; for(let c of n) h=(h*31+c.charCodeAt(0))&0xffff; return COLORS[h%COLORS.length]; }

/* Hero avatar */
const heroName = @json($teacher->user->fullname);
const heroAv   = document.getElementById('heroAvatar');
heroAv.textContent      = initials(heroName);
heroAv.style.background = colorFor(heroName);

/* Student row avatars */
document.querySelectorAll('.stu-avatar[data-name]').forEach(el => {
  el.textContent      = initials(el.dataset.name);
  el.style.background = colorFor(el.dataset.name);
});

/* ── Tabs ── */
function switchTab(btn) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
  document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById(btn.dataset.tab).classList.add('active');
}

/* ════════════════════════════════════════════
   PAGINATION ENGINE
   ════════════════════════════════════════════ */
const PER_PAGE = 5;

/* state[classId] = { page: Number, query: String } */
const pagerState = {};

function initState(classId) {
  if (!pagerState[classId]) pagerState[classId] = { page: 1, query: '' };
}

/* Returns all <tr> rows that match the current search query.
   Empty rows (no-students placeholder) are excluded from pagination. */
function getMatchingRows(classId) {
  const tbl = document.getElementById('tbl-' + classId);
  if (!tbl) return [];
  const q = (pagerState[classId]?.query || '').toLowerCase();
  return Array.from(tbl.querySelectorAll('tbody tr:not(.empty-row)')).filter(row =>
    !q || row.textContent.toLowerCase().includes(q)
  );
}

/* Core render – shows the right slice and rebuilds the pager buttons */
function renderPage(classId) {
  initState(classId);

  const allRows  = getMatchingRows(classId);
  const total    = allRows.length;
  const pages    = Math.max(1, Math.ceil(total / PER_PAGE));
  let   page     = Math.min(Math.max(1, pagerState[classId].page), pages);
  pagerState[classId].page = page;

  const start = (page - 1) * PER_PAGE;
  const end   = start + PER_PAGE;

  /* Hide every data row first, then show only the current page slice */
  const tbl = document.getElementById('tbl-' + classId);
  tbl.querySelectorAll('tbody tr:not(.empty-row)').forEach(r => r.style.display = 'none');
  allRows.forEach((r, i) => { r.style.display = (i >= start && i < end) ? '' : 'none'; });

  /* Update count label */
  const countEl = document.getElementById('count-' + classId);
  if (countEl) countEl.textContent = total + ' student' + (total !== 1 ? 's' : '');

  /* Update footer info */
  const infoEl = document.getElementById('tf-info-' + classId);
  if (infoEl) {
    if (total === 0) {
      infoEl.textContent = 'No students found';
    } else {
      const showing = Math.min(end, total) - start;
      infoEl.textContent = 'Showing ' + (start + 1) + '–' + Math.min(end, total) + ' of ' + total + ' student' + (total !== 1 ? 's' : '');
    }
  }

  /* ── Build pager ── */
  const pagerEl = document.getElementById('pager-' + classId);
  if (!pagerEl) return;
  pagerEl.innerHTML = '';

  if (pages <= 1) return; /* nothing to paginate */

  /* Helper: create a page button */
  function makeBtn(label, targetPage, isActive, isDisabled, isIcon) {
    const b = document.createElement('button');
    b.className = 'pg-btn' + (isActive ? ' active' : '');
    b.disabled  = !!isDisabled;
    if (isIcon) b.innerHTML = label;
    else        b.textContent = label;
    if (!isDisabled) b.onclick = () => { pagerState[classId].page = targetPage; renderPage(classId); };
    return b;
  }

  /* ‹ Prev */
  pagerEl.appendChild(makeBtn(
    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg>',
    page - 1, false, page === 1, true
  ));

  /* Page number range with ellipsis */
  const range = buildRange(page, pages);
  range.forEach(item => {
    if (item === '…') {
      const dot = document.createElement('span');
      dot.className   = 'pg-ellipsis';
      dot.textContent = '…';
      pagerEl.appendChild(dot);
    } else {
      pagerEl.appendChild(makeBtn(item, item, item === page, false, false));
    }
  });

  /* › Next */
  pagerEl.appendChild(makeBtn(
    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>',
    page + 1, false, page === pages, true
  ));
}

/* Builds a compact page-number array, e.g. [1, '…', 4, 5, 6, '…', 12] */
function buildRange(current, total) {
  if (total <= 7) return Array.from({ length: total }, (_, i) => i + 1);
  const delta  = 1; // pages around current
  const left   = current - delta;
  const right  = current + delta;
  const range  = [];
  let   last;
  for (let p = 1; p <= total; p++) {
    if (p === 1 || p === total || (p >= left && p <= right)) {
      if (last && p - last > 1) range.push('…');
      range.push(p);
      last = p;
    }
  }
  return range;
}

/* Called by the search input inside each tab panel */
function filterTable(input, classId) {
  initState(classId);
  pagerState[classId].query = input.value.trim();
  pagerState[classId].page  = 1;
  renderPage(classId);
}

/* Initialise all pagers on page load */
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.tab-panel[data-classid]').forEach(panel => {
    renderPage(panel.dataset.classid);
  });
});

/* ── Modals ── */
function openEditModal()  { document.getElementById('editOverlay').classList.add('open'); }
function closeEditModal() { document.getElementById('editOverlay').classList.remove('open'); }

/* ── Toast ── */
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
}
</script>
</body>
</html>