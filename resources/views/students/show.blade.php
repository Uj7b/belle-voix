<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Belle Voix – {{ $student->user->fullname }}</title>
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

  /* SIDEBAR */
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

  /* MAIN */
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

  /* CONTENT */
  .content { padding:30px 28px; flex:1; }

  /* BREADCRUMB */
  .breadcrumb { display:flex; align-items:center; gap:8px; margin-bottom:22px; font-size:13px; }
  .breadcrumb a { color:var(--text-muted); text-decoration:none; cursor:pointer; transition:color .15s; }
  .breadcrumb a:hover { color:var(--brand); }
  .breadcrumb .sep { color: black; }
  .breadcrumb .current { color:var(--text-primary); font-weight:600; }

  /* PROFILE HERO */
  .profile-hero { background:var(--card-bg); border:1px solid var(--border); border-radius:var(--radius); box-shadow:var(--shadow-sm); padding:28px; margin-bottom:22px; display:flex; gap:24px; align-items:flex-start; flex-wrap:wrap; }
  .hero-avatar-wrap { position:relative; flex-shrink:0; }
  .hero-avatar { width:90px; height:90px; border-radius:18px; display:flex; align-items:center; justify-content:center; font-size:28px; font-weight:800; color:#fff; background:#3b6ef8; }
  .hero-status-dot { width:14px; height:14px; border-radius:50%; border:2.5px solid #fff; position:absolute; bottom:4px; right:4px; }
  .dot-active { background:var(--active-green); }
  .dot-inactive { background:var(--inactive-red); }
  .dot-withdrawn { background:var(--leave-amber); }
  .hero-info { flex:1; min-width:200px; }
  .hero-name { font-size:22px; font-weight:800; letter-spacing:-.3px; margin-bottom:4px; }
  .hero-meta { display:flex; align-items:center; gap:10px; flex-wrap:wrap; margin-bottom:16px; }
  .hero-id { font-size:12.5px; color:var(--text-muted); font-family:'Courier New',monospace; background:var(--main-bg); padding:3px 9px; border-radius:6px; border:1px solid var(--border); }
  .status-badge { display:inline-flex; align-items:center; gap:5px; font-size:12px; font-weight:600; padding:4px 11px; border-radius:20px; }
  .status-badge::before { content:''; width:6px; height:6px; border-radius:50%; flex-shrink:0; }
  .s-active { background:#dcfce7; color:var(--active-green); }
  .s-active::before { background:var(--active-green); }
  .s-inactive { background:#fee2e2; color:var(--inactive-red); }
  .s-inactive::before { background:var(--inactive-red); }
  .s-withdrawn { background:#fef9c3; color:var(--leave-amber); }
  .s-withdrawn::before { background:var(--leave-amber); }
  .hero-stats { display:flex; gap:24px; flex-wrap:wrap; }
  .hstat { text-align:center; }
  .hstat-val { font-size:20px; font-weight:800; color:var(--brand); line-height:1.2; }
  .hstat-label { font-size:11px; color:var(--text-muted); font-weight:500; margin-top:2px; }
  .hero-actions { display:flex; flex-direction:column; gap:8px; align-items:flex-end; margin-left:auto; }
  .btn-edit { background:var(--brand); color:#fff; border:none; padding:9px 18px; border-radius:9px; font-size:13px; font-weight:700; font-family:inherit; cursor:pointer; box-shadow:var(--shadow-md); transition:background .15s,transform .1s; display:flex; align-items:center; gap:6px; }
  .btn-edit:hover { background:var(--brand-dark); transform:translateY(-1px); }
  .btn-outline { background:#fff; color:var(--text-label); border:1px solid var(--border); padding:9px 18px; border-radius:9px; font-size:13px; font-weight:600; font-family:inherit; cursor:pointer; transition:background .15s,border-color .15s,color .15s; display:flex; align-items:center; gap:6px; }
  .btn-outline:hover { border-color:var(--brand); color:var(--brand); background:var(--brand-light); }

  /* TWO-COLUMN LAYOUT */
  .profile-grid { display:grid; grid-template-columns:340px 1fr; gap:22px; align-items:start; }
  @media (max-width: 900px) { .profile-grid { grid-template-columns:1fr; } }

  /* INFO CARD */
  .card { background:var(--card-bg); border:1px solid var(--border); border-radius:var(--radius); box-shadow:var(--shadow-sm); overflow:hidden; }
  .card-header { padding:18px 20px 14px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between; }
  .card-title { font-size:15px; font-weight:700; }
  .card-badge { font-size:11px; font-weight:700; background:var(--brand-light); color:var(--brand); padding:3px 10px; border-radius:20px; }
  .info-list { padding:8px 0; }
  .info-row { display:flex; align-items:center; padding:10px 20px; gap:12px; transition:background .12s; }
  .info-row:hover { background:var(--row-hover); }
  .info-icon { width:32px; height:32px; background:var(--brand-light); border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
  .info-icon svg { width:15px; height:15px; stroke:var(--brand); fill:none; stroke-width:2; }
  .info-label { font-size:11px; color:var(--text-muted); font-weight:600; text-transform:uppercase; letter-spacing:.06em; margin-bottom:1px; }
  .info-value { font-size:13.5px; font-weight:600; color:var(--text-primary); }
  .class-badge { display:inline-flex; align-items:center; justify-content:center; background:var(--brand-light); color:var(--brand); font-size:12px; font-weight:700; padding:3px 10px; border-radius:20px; }
  .gender-badge { display:inline-flex; align-items:center; gap:4px; font-size:12px; font-weight:600; padding:3px 9px; border-radius:20px; }
  .gender-male { background:#eff6ff; color:#1d4ed8; }
  .gender-female { background:#fdf2f8; color:#be185d; }

  /* PAYMENT SUMMARY */
  .pay-summary { display:grid; grid-template-columns:repeat(2,1fr); gap:12px; padding:16px 20px; border-bottom:1px solid var(--border); }
  .pay-stat { background:var(--main-bg); border-radius:10px; padding:14px; text-align:center; }
  .pay-stat-val { font-size:18px; font-weight:800; margin-bottom:3px; }
  .pay-stat-label { font-size:11px; color:var(--text-muted); font-weight:500; }
  .green { color:var(--active-green); }
  .red { color:var(--inactive-red); }
  .blue { color:var(--brand); }

  /* PAYMENT TABLE */
  .table-toolbar { display:flex; align-items:center; gap:10px; padding:14px 20px; border-bottom:1px solid var(--border); flex-wrap:wrap; }
  .filter-select { border:1px solid var(--border); border-radius:8px; padding:7px 28px 7px 12px; font-size:12.5px; font-family:inherit; color:var(--text-primary); background:var(--main-bg); cursor:pointer; outline:none; appearance:none; -webkit-appearance:none; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238c93a8' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E"); background-repeat:no-repeat; background-position:right 8px center; transition:border-color .15s; }
  .filter-select:focus { border-color:var(--brand); }
  .tb-label { font-size:13px; color:var(--text-muted); margin-left:auto; }
  .table-wrap { overflow-x:auto; }
  table { width:100%; border-collapse:collapse; min-width:600px; }
  thead tr { border-bottom:1px solid var(--border); }
  thead th { padding:11px 16px; font-size:11px; font-weight:700; letter-spacing:.07em; color:var(--text-muted); text-transform:uppercase; text-align:left; white-space:nowrap; background:#fafbff; }
  tbody tr { border-bottom:1px solid var(--border); transition:background .12s; animation:fadeIn .25s ease both; }
  tbody tr:last-child { border-bottom:none; }
  tbody tr:hover { background:var(--row-hover); }
  tbody td { padding:12px 16px; font-size:13.5px; vertical-align:middle; }
  @keyframes fadeIn { from{opacity:0;transform:translateY(4px)} to{opacity:1;transform:translateY(0)} }
  .pay-type { display:inline-flex; align-items:center; gap:6px; font-size:12.5px; font-weight:600; }
  .type-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
  .pay-amount { font-size:14px; font-weight:700; }
  .pay-paid { color:var(--active-green); }
  .pay-pending { color:var(--leave-amber); }
  .pay-failed { color:var(--inactive-red); }
  .pay-badge { font-size:11.5px; font-weight:600; padding:3px 10px; border-radius:20px; display:inline-block; }
  .pb-paid { background:#dcfce7; color:var(--active-green); }
  .pb-pending { background:#fef9c3; color:var(--leave-amber); }
  .pb-failed { background:#fee2e2; color:var(--inactive-red); }
  .pay-method { font-size:12px; color:var(--text-muted); display:flex; align-items:center; gap:5px; }
  .method-icon { width:22px; height:22px; border-radius:5px; background:var(--main-bg); border:1px solid var(--border); display:inline-flex; align-items:center; justify-content:center; }
  .method-icon svg { width:12px; height:12px; stroke:var(--text-label); fill:none; stroke-width:2; }
  .invoice-link { font-size:12.5px; color:var(--brand); font-weight:600; text-decoration:none; cursor:pointer; padding:5px 10px; border-radius:7px; transition:background .12s; }
  .invoice-link:hover { background:var(--brand-light); }
  .table-footer { display:flex; align-items:center; justify-content:space-between; padding:13px 20px; border-top:1px solid var(--border); background:#fafbff; flex-wrap:wrap; gap:8px; }
  .tf-info { font-size:13px; color:var(--text-muted); }
  .btn-add-pay { background:var(--brand); color:#fff; border:none; padding:8px 16px; border-radius:8px; font-size:12.5px; font-weight:700; font-family:inherit; cursor:pointer; display:flex; align-items:center; gap:6px; box-shadow:var(--shadow-md); transition:background .15s; }
  .btn-add-pay:hover { background:var(--brand-dark); }

  /* TOAST */
  .toast { position:fixed; bottom:24px; right:24px; background:#1a1d2e; color:#fff; padding:12px 18px; border-radius:10px; font-size:13.5px; font-weight:500; display:flex; align-items:center; gap:8px; box-shadow:0 8px 24px rgba(0,0,0,.2); transform:translateY(60px); opacity:0; transition:all .3s ease; z-index:999; }
  .toast.show { transform:translateY(0); opacity:1; }

  /* MODAL */
  .overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,.35); backdrop-filter:blur(3px); z-index:50; align-items:center; justify-content:center; }
  .overlay.open { display:flex; }
  .modal { background:#fff; border-radius:16px; padding:28px; width:100%; max-width:460px; box-shadow:0 20px 60px rgba(0,0,0,.2); animation:slideUp .2s ease; margin:16px; overflow: hidden; max-height: 90vh; overflow-y: auto;}
  @keyframes slideUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
  .modal-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:22px; }
  .modal-header h2 { font-size:18px; font-weight:800; }
  .close-btn { width:32px; height:32px; border:1px solid var(--border); background:var(--main-bg); border-radius:8px; cursor:pointer; font-size:16px; display:flex; align-items:center; justify-content:center; color:var(--text-muted); transition:background .15s; }
  .close-btn:hover { background:#fee2e2; color:#ef4444; border-color:#fca5a5; }
  .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
  .form-group { display:flex; flex-direction:column; gap:5px; }
  .form-group.full { grid-column:1/-1; }
  .form-group label { font-size:11px; font-weight:700; color:var(--text-label); letter-spacing:.06em; text-transform:uppercase; }
  .form-group input, .form-group select { border:1px solid var(--border); border-radius:8px; padding:9px 12px; font-size:13.5px; font-family:inherit; color:var(--text-primary); outline:none; transition:border-color .15s; background:var(--main-bg); min-width: 0; width: 100%;}
  .form-group input:focus, .form-group select:focus { border-color:var(--brand); background:#fff; }
  .modal-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:22px; }
  .btn-cancel { padding:10px 20px; border-radius:9px; border:1px solid var(--border); background:#fff; font-size:13.5px; font-weight:600; font-family:inherit; color:var(--text-label); cursor:pointer; transition:background .15s; }
  .btn-cancel:hover { background:var(--main-bg); }
  .btn-submit { padding:10px 22px; border-radius:9px; border:none; background:var(--brand); font-size:13.5px; font-weight:700; font-family:inherit; color:#fff; cursor:pointer; box-shadow:var(--shadow-md); transition:background .15s; }
  .btn-submit:hover { background:var(--brand-dark); }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
    </div>
    Belle voix
  </div>
  <div class="sidebar-section-label">Menu</div>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Teachers</a>
  <a class="nav-item active" href="{{ route('students.index') }}"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Students</a>
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

<!-- MAIN -->
<div class="main">
  <header class="topbar">
    <div class="search-wrap">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" placeholder="Search anything…"/>
    </div>
    <div class="topbar-actions">
      <div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="notif-dot"></span></div>
      <div class="user-chip">
        <div class="avatar">LA</div>
        <div class="user-info"><div class="name">Linda Adora</div><div class="role">Admin</div></div>
      </div>
    </div>
  </header>

  <div class="content">
    <!-- BREADCRUMB -->
    <div class="breadcrumb">
      <a href="{{ route("students.index") }}">Students</a>
      <span class="sep">›</span>
      <span class="current" id="bc-name">{{$student->user->fullname}}</span>
    </div>

    <!-- HERO -->
    <div class="profile-hero">
      <div class="hero-avatar-wrap">
        <div class="hero-avatar" id="heroAvatar" style="background:#3b6ef8"></div>
        <span class="hero-status-dot dot-{{ $student->status }}" id="heroDot"></span>
      </div>
      <div class="hero-info">
        <div class="hero-name" id="heroName">{{$student->user->fullname}}</div>
        <div class="hero-meta">
          <span class="hero-id" id="heroId">{{ $student->user->cin }}</span>
          <span class="status-badge s-{{ $student->status }}" id="heroStatus">{{ $student->status }}</span>
          <span class="class-badge" id="heroClass">{{ $student->schoolClass->name }}</span>
        </div>
        <div class="hero-stats">
          <div class="hstat"><div class="hstat-val" id="sTotalPay">$2,400</div><div class="hstat-label">Total Paid</div></div>
          <div class="hstat"><div class="hstat-val" id="sPending" style="color:var(--leave-amber)">$300</div><div class="hstat-label">Pending</div></div>
          <div class="hstat"><div class="hstat-val" id="sPayCount">8</div><div class="hstat-label">Transactions</div></div>
          <div class="hstat"><div class="hstat-val" id="sAttend">jjj%</div><div class="hstat-label">Attendance</div></div>
        </div>
      </div>
      <div class="hero-actions">
        <button class="btn-edit" onclick="openEditModal()">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          Edit Profile
        </button>
        <button class="btn-outline" onclick="showToast('📄 Generating report…')">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
          Export Report
        </button>
        <button class="btn-outline" onclick="showToast('📨 Message sent.')">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
          Send Message
        </button>
        <button class="btn-outline" style="color:#dc2626;border-color:#fca5a5;" onmouseover="this.style.background='#fee2e2'" onmouseout="this.style.background='#fff'" onclick="document.getElementById('deleteOverlay').classList.add('open')">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6M14 11v6"/><path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/></svg>
          Delete Student
        </button>
      </div>
    </div>

    <!-- GRID -->
    <div class="profile-grid">

      <!-- LEFT: INFO CARD -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Personal Information</span>
          <span class="card-badge">Details</span>
        </div>
        <div class="info-list">
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
            <div><div class="info-label">Full Name</div><div class="info-value" id="iName">{{ $student->user->fullname }}</div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div><div class="info-label">Email</div><div class="info-value" id="iEmail">{{ $student->user->email }}</div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <div><div class="info-label">Date of Birth</div><div class="info-value" id="iDob">{{ \Carbon\Carbon::parse($student->user->date_of_birth)->format('M d, Y') }}</div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg></div>
            <div><div class="info-label">Gender</div><div id="iGender"><span class="gender-badge gender-{{ $student->user->gender }}">{{ $student->user->gender }}</span></div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
            <div><div class="info-label">Class</div><div id="iClass"><span class="class-badge">{{ $student->schoolClass->name }}</span></div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div>
            <div><div class="info-label">Teacher</div><div class="info-value" id="iTeacher">{{ $student->schoolClass->teacher->user->fullname }}</div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.65 3.18 2 2 0 0 1 3.62 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.6a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 15.92z"/></svg></div>
            <div><div class="info-label">Phone Number</div><div class="info-value" id="iPhone">{{ $student->user->phone_number}}</div></div>
          </div>
          <div class="info-row">
            <div class="info-icon"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
            <div><div class="info-label">Enrolled Since</div><div class="info-value" id="iEnroll">{{ \Carbon\Carbon::parse($student->created_at)->format('M d, Y') }}</div></div>
          </div>
        </div>
      </div>

      <!-- RIGHT: PAYMENTS -->
      <div class="card">
        <div class="card-header">
          <span class="card-title">Payment History</span>
          <span class="card-badge" id="payCountBadge">8 records</span>
        </div>

        <div class="pay-summary">
          <div class="pay-stat">
            <div class="pay-stat-val green" id="sumPaid">$2,400</div>
            <div class="pay-stat-label">Paid</div>
          </div>
          <div class="pay-stat">
            <div class="pay-stat-val" style="color:var(--leave-amber)" id="sumPending">$300</div>
            <div class="pay-stat-label">Pending</div>
          </div>
        </div>

        <div class="table-toolbar">
          <select class="filter-select" id="payFilter" onchange="renderPayments()">
            <option value="">All Status</option>
            <option value="paid">Paid</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
          </select>
          <select class="filter-select" id="monthFilter" onchange="renderPayments()">
            <option value="">All Years</option>
            <option value="2024">2024</option>
            <option value="2023">2023</option>
          </select>
          <span class="tb-label" id="payCountLabel">8 transactions</span>
        </div>

        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th>Paid At</th>
                <th>Due Date</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Invoice</th>
              </tr>
            </thead>
            <tbody id="payTableBody"></tbody>
          </table>
        </div>

        <div class="table-footer">
          <span class="tf-info" id="payFooterInfo">Showing 8 of 8 payments</span>
          <button class="btn-add-pay" onclick="openPayModal()">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Add Payment
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ADD PAYMENT MODAL -->
<div class="overlay" id="payOverlay" onclick="closePayOnOverlay(event)">
  <div class="modal">
    <div class="modal-header">
      <h2>Add Payment</h2>
      <button class="close-btn" onclick="closePayModal()">✕</button>
    </div>
    <div class="form-grid">
      <div class="form-group full">
        <label>Description</label>
        <input type="text" id="p-desc" placeholder="e.g. Tuition Fee – Term 3"/>
      </div>
      <div class="form-group">
        <label>Amount ($)</label>
        <input type="number" id="p-amount" placeholder="e.g. 450"/>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" id="p-date"/>
      </div>
      <div class="form-group">
        <label>Method</label>
        <select id="p-method">
          <option value="">Select method</option>
          <option>Bank Transfer</option>
          <option>Cash</option>
          <option>Credit Card</option>
          <option>Online Portal</option>
        </select>
      </div>
      <div class="form-group">
        <label>Status</label>
        <select id="p-status">
          <option value="paid">Paid</option>
          <option value="pending">Pending</option>
          <option value="failed">Failed</option>
        </select>
      </div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closePayModal()">Cancel</button>
      <button class="btn-submit" onclick="addPayment()">Add Payment</button>
    </div>
  </div>
</div>
<!-- EDIT STUDENT MODAL -->
<div class="overlay" id="editOverlay" onclick="closeEditOnOverlay(event)">
  <div class="modal">
    <div class="modal-header">
      <h2>Edit Student</h2>
      <button type="button" class="close-btn" onclick="closeEditModal()">✕</button>
    </div>
    <form action="{{ route('students.update',$student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-grid">
      <div class="form-group full">
        <label>Full Name</label>
        <input type="text" id="e-name" name="fullname"/>
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" id="e-email" name="email"/>
      </div>
      <div class="form-group">
        <label>Phone number</label>
        <input type="text" id="e-phone_number" name="phone_number" placeholder="e.g. 0612345678"/>
      </div>
      <div class="form-group">
        <label>Class</label>
        {{-- INFO options are fetched from DB --}}
        <select id="e-class" name="class_id" '>
          <option value="">Select class</option>
          @foreach($classes as $class)
          <option value="{{ $class->id }}" data-teacher="{{ $class->teacher?->user?->fullname }}">{{ $class->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Teacher</label>
        <input type="text" id="e-teacher" disabled placeholder="Teacher will appear here">
      </div>
      <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" id="e-dob" name="dob"/>
      </div>
      <div class="form-group">
        <label>Gender</label>
        <select id="e-gender" name="gender">
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group full">
        <label>CIN</label>
        <input type="text" id="e-cin" name="cin" placeholder="e.g. X123456" required>
      </div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closeEditModal()">Cancel</button>
      <button class="btn-submit" type="submit">Save Changes</button>
    </div>
    </form>
  </div>
</div>
<div class="overlay" id="deleteOverlay" onclick="if(event.target===this)this.classList.remove('open')">
  <div class="modal" style="max-width:380px">
    <form action="{{ route('students.destroy', $student->id) }}" method="POST">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h2>Delete Student</h2>
        <button type="button" class="close-btn" onclick="document.getElementById('deleteOverlay').classList.remove('open')">✕</button>
      </div>
      <p style="color:var(--text-label);font-size:14px;line-height:1.7;margin-bottom:22px">
        Are you sure you want to delete <strong>{{ $student->user->fullname }}</strong>?<br>This action cannot be undone.
      </p>
      <div class="modal-actions">
        <button type="button" class="btn-cancel" onclick="document.getElementById('deleteOverlay').classList.remove('open')">Cancel</button>
        <button type="submit" class="btn-submit" style="background:#dc2626">Delete Student</button>
      </div>
    </form>
  </div>
</div>
<!-- TOAST -->
@if(session('success'))
<script>
window.addEventListener('DOMContentLoaded', () => {
    showToast(@json(session('success')));
});
</script>
@endif

@if ($errors->any())
<script>
window.addEventListener('DOMContentLoaded', () => {
    showToast(@json(implode("\n", $errors->all())));
});
</script>
@endif
<div class="toast" id="toast"><span id="toastMsg"></span></div>

<script>
function updateTeacherFromClass(e) {
  const select = e?.target || document.getElementById('e-class');

  const selected = select.options[select.selectedIndex];
  const teacher = selected?.getAttribute('data-teacher');

  document.getElementById('e-teacher').value = teacher || '';
}
document.getElementById('e-class').addEventListener('change', updateTeacherFromClass);

  let avatar = document.getElementById('heroAvatar');
  let student = @json($student);
const COLORS = ['#3b6ef8','#8b5cf6','#10b981','#f59e0b','#ef4444','#06b6d4','#ec4899','#84cc16','#f97316','#6366f1','#14b8a6','#a855f7','#0ea5e9','#d946ef','#22c55e'];
function initials(n){ return n.split(' ').map(w=>w[0]).join('').slice(0,2).toUpperCase(); }
function colorFor(n){ let h=0; for(let c of n) h=(h*31+c.charCodeAt(0))&0xffff; return COLORS[h%COLORS.length]; }
avatar.textContent = initials(student.user?.fullname)
avatar.style.backgroundColor = colorFor(student.user?.fullname)
const studentx ={
  id:'STU-001',name:'Lucas Johnson',email:'lucas.j@school.edu',
  cls:'10A',teacher:'Mr. Harrison',gender:'male',dob:'2008-03-15',
  status:'active',phone:'+1 (555) 342-8810',addr:'142 Maple St, Springfield',enrolled:'2022-09-03',
  attendance:94
};

window.payments = @json($payments) 

function fmtDate(d){
  const [y,m,day]=d.split('-');
  return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][+m-1]+' '+parseInt(day)+', '+y;
}

function methodIcon(m){
  const icons={
    'Bank Transfer':'<svg viewBox="0 0 24 24"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/></svg>',
    'Cash':'<svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>',
    'Credit Card':'<svg viewBox="0 0 24 24"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>',
    'Online Portal':'<svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>',
  };
  return icons[m]||icons['Online Portal'];
}

function renderPayments(){
  const yf=document.getElementById('monthFilter').value;
  const filtered=payments.filter(p=>
  (!yf||p.due_date.startsWith(yf))
  );
  document.getElementById('payCountLabel').textContent=filtered.length+' transactions';
  document.getElementById('payFooterInfo').textContent=`Showing ${filtered.length} of ${payments.length} payments`;
  document.getElementById('payTableBody').innerHTML=filtered.map((p,i)=>`
    <tr style="animation-delay:${i*.03}s">
      <td style="font-size:12.5px;color:var(--text-label)">${fmtDate(p.paid_at)}</td>
      <td style="font-size:12.5px;color:var(--text-label)">${fmtDate(p.due_date)}</td>
      <td><span class="pay-amount pay-${(p.paid_at ? 'paid' : 'unpaid')}">${p.amount.toLocaleString()} DH</span></td>
      <td><span class="pay-badge pb-${(p.paid_at ? 'paid' : 'unpaid')}">${(p.paid_at ? 'paid' : 'unpaid').charAt(0).toUpperCase() + (p.paid_at ? 'paid' : 'unpaid').slice(1)}</span></td>
      <td><a class="invoice-link" onclick="showToast('📄 Opening ${p.id}…')">${p.id}</a></td>
    </tr>
  `).join('');
}

function updateSummary(){
  const totalPaid = payments.reduce((sum, p) => sum + (Number(p.amount) || 0), 0);
  console.log(totalPaid);
  document.getElementById('sumPaid').textContent= totalPaid.toLocaleString() + ' MAD';
  document.getElementById('sTotalPay').textContent='$'+totalPaid.toLocaleString();
  document.getElementById('sPayCount').textContent=payments.length;
  document.getElementById('payCountBadge').textContent=payments.length+' records';
}

function openPayModal(){document.getElementById('payOverlay').classList.add('open');}
function closePayModal(){document.getElementById('payOverlay').classList.remove('open');}
function closePayOnOverlay(e){if(e.target===e.currentTarget)closePayModal();}

let nextInv=1200;
function addPayment(){
  const desc=document.getElementById('p-desc').value.trim();
  const amount=parseFloat(document.getElementById('p-amount').value);
  const date=document.getElementById('p-date').value;
  const method=document.getElementById('p-method').value;
  const status=document.getElementById('p-status').value;
  if(!desc||!amount||!date||!method){showToast('⚠️ Please fill in all fields.');return;}
  const id='INV-'+String(nextInv++);
  payments.unshift({id,desc,date,amount,method,status});
  ['p-desc','p-amount','p-date'].forEach(i=>document.getElementById(i).value='');
  document.getElementById('p-method').value='';document.getElementById('p-status').value='paid';
  updateSummary();renderPayments();closePayModal();
  showToast('✅ Payment '+id+' added!');
}

let toastTimer;
function showToast(msg){
  const t=document.getElementById('toast');
  document.getElementById('toastMsg').textContent=msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer=setTimeout(()=>t.classList.remove('show'),3200);
}

// init
document.getElementById('sAttend').textContent=studentx.attendance+'%';
updateSummary();renderPayments();

// edit student
function openEditModal() {
  // Pre-fill from DOM
  document.getElementById('e-name').value   = document.getElementById('iName').textContent.trim();
  document.getElementById('e-email').value  = document.getElementById('iEmail').textContent.trim();
  document.getElementById('e-phone_number').value  = student?.user?.phone_number;
  document.getElementById('e-class').value  = student.school_class.id;
  updateTeacherFromClass();
  document.getElementById('e-gender').value = student.user?.gender || 'male';
  document.getElementById('e-cin').value = student.user?.cin || '';
  // dob: convert "Mar 15, 2008" back to input-friendly format
  const dobRaw = student.user?.date_of_birth; // e.g. "2008-03-15"
  if (dobRaw) document.getElementById('e-dob').value = dobRaw.slice(0, 10);
  document.getElementById('editOverlay').classList.add('open');
}

function closeEditModal()         { document.getElementById('editOverlay').classList.remove('open'); }
function closeEditOnOverlay(e)    { if (e.target === e.currentTarget) closeEditModal(); }

function saveEdit() {
  const name   = document.getElementById('e-name').value.trim();
  const email  = document.getElementById('e-email').value.trim();
  const phone  = document.getElementById('e-phone').value.trim();
  const addr   = document.getElementById('e-addr').value.trim();
  const status = document.getElementById('e-status').value;
  if (!name || !email) { showToast('⚠️ Name and email are required.'); return; }

  // Update visible DOM fields
  document.getElementById('iName').textContent  = name;
  document.getElementById('iEmail').textContent = email;
  document.getElementById('iPhone').textContent = phone;
  document.getElementById('iAddr').textContent  = addr;
  document.getElementById('heroName').textContent = name;
  document.getElementById('bc-name').textContent  = name;

  // Update status badge & dot
  const heroDot    = document.getElementById('heroDot');
  const heroStatus = document.getElementById('heroStatus');
  heroDot.className    = `hero-status-dot dot-${status}`;
  heroStatus.className = `status-badge s-${status}`;
  heroStatus.textContent = status;

  // Sync avatar initials/color
  avatar.textContent = initials(name);
  avatar.style.backgroundColor = colorFor(name);

  closeEditModal();
  showToast('✅ Profile updated!');
}
</script>
</body>
</html>
