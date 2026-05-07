<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Belle Voix – Students</title>
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

  body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: var(--main-bg);
    color: var(--text-primary);
    display: flex;
    min-height: 100vh;
  }

  /* ── SIDEBAR ── */
  .sidebar {
    width: 240px;
    min-height: 100vh;
    background: var(--sidebar-bg);
    border-right: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0; left: 0; bottom: 0;
    z-index: 10;
    overflow-y: auto;
  }
  .sidebar-logo {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 22px 20px 18px;
    font-weight: 800;
    font-size: 18px;
    color: var(--brand);
    border-bottom: 1px solid var(--border);
    flex-shrink: 0;
  }
  .logo-icon {
    width: 34px; height: 34px;
    background: var(--brand);
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    color: #fff; font-size: 16px;
  }
  .sidebar-section-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: .1em;
    color: var(--text-muted);
    padding: 18px 20px 6px;
    text-transform: uppercase;
  }
  .nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    margin: 2px 10px;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 500;
    color: var(--text-label);
    cursor: pointer;
    position: relative;
    transition: background .15s, color .15s;
    text-decoration: none;
  }
  .nav-item:hover { background: var(--brand-light); color: var(--brand); }
  .nav-item.active { background: var(--brand); color: #fff; font-weight: 600; }
  .nav-item svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; flex-shrink: 0; }
  .badge {
    margin-left: auto;
    background: #ef4444;
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 1px 6px;
    border-radius: 20px;
    min-width: 18px;
    text-align: center;
  }
  .sidebar-promo {
    margin: auto 14px 18px;
    background: linear-gradient(135deg, #3b6ef8 0%, #6c63ff 100%);
    border-radius: var(--radius);
    padding: 18px;
    color: #fff;
    flex-shrink: 0;
  }
  .sidebar-promo h4 { font-size: 14px; font-weight: 700; margin-bottom: 6px; }
  .sidebar-promo p  { font-size: 12px; opacity: .85; line-height: 1.5; margin-bottom: 12px; }
  .promo-btn {
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.35);
    color: #fff;
    font-size: 12px;
    font-weight: 600;
    padding: 7px 14px;
    border-radius: 7px;
    cursor: pointer;
    width: 100%;
    transition: background .15s;
  }
  .promo-btn:hover { background: rgba(255,255,255,.3); }

  /* ── MAIN ── */
  .main { margin-left: 240px; flex: 1; display: flex; flex-direction: column; }

  /* ── TOPBAR ── */
  .topbar {
    background: #fff;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 0 28px;
    height: 64px;
    position: sticky; top: 0; z-index: 5;
  }
  .search-wrap { flex: 1; max-width: 440px; position: relative; }
  .search-wrap svg { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 16px; height: 16px; stroke: var(--text-muted); fill: none; stroke-width: 2; }
  .search-wrap input {
    width: 100%;
    background: var(--main-bg);
    border: 1px solid var(--border);
    border-radius: 9px;
    padding: 9px 12px 9px 36px;
    font-size: 13.5px;
    font-family: inherit;
    color: var(--text-primary);
    outline: none;
    transition: border-color .15s;
  }
  .search-wrap input:focus { border-color: var(--brand); }
  .topbar-actions { margin-left: auto; display: flex; align-items: center; gap: 10px; }
  .icon-btn {
    width: 36px; height: 36px;
    border: 1px solid var(--border);
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; background: #fff; position: relative;
    transition: background .15s;
  }
  .icon-btn:hover { background: var(--main-bg); }
  .icon-btn svg { width: 18px; height: 18px; stroke: var(--text-label); fill: none; stroke-width: 2; }
  .notif-dot { width: 7px; height: 7px; background: #ef4444; border-radius: 50%; border: 1.5px solid #fff; position: absolute; top: 5px; right: 5px; }
  .user-chip {
    display: flex; align-items: center; gap: 9px;
    padding: 5px 10px 5px 5px;
    border: 1px solid var(--border);
    border-radius: 11px;
    cursor: pointer;
    transition: background .15s;
  }
  .user-chip:hover { background: var(--main-bg); }
  .avatar { width: 30px; height: 30px; background: var(--brand); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 11px; font-weight: 700; }
  .user-info .name { font-size: 13px; font-weight: 600; line-height: 1.3; }
  .user-info .role { font-size: 11px; color: var(--text-muted); }

  /* ── CONTENT ── */
  .content { padding: 30px 28px; flex: 1; }
  .page-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; }
  .page-header h1 { font-size: 24px; font-weight: 800; letter-spacing: -.3px; }
  .page-header .sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }
  .enroll-btn {
    background: var(--brand);
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 13.5px;
    font-weight: 700;
    font-family: inherit;
    cursor: pointer;
    display: flex; align-items: center; gap: 7px;
    box-shadow: var(--shadow-md);
    transition: background .15s, transform .1s;
  }
  .enroll-btn:hover { background: var(--brand-dark); transform: translateY(-1px); }
  .enroll-btn:active { transform: translateY(0); }


  .badge{
  display:inline-flex;align-items:center;justify-content:center;
  font-size:11.5px;font-weight:700;padding:3px 10px;border-radius:20px;
}
  .badge-retard-0 { background:#DCFCE7; color: #166534; }
  .badge-retard-1 { background:#FEF3C7; color:#92400E; }
  .badge-retard-2 { background:#FED7AA; color:#9A3412; }
  .badge-retard-3 { background:#FEE2E2; color:#991B1B; }
  .badge-retard::before { content: ''; width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
  /* ── TABLE CARD ── */
  .card { background: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm); }
  .table-toolbar { display: flex; align-items: center; gap: 10px; padding: 16px 20px; border-bottom: 1px solid var(--border); flex-wrap: wrap; }
  .tb-search { position: relative; flex: 1; min-width: 180px; max-width: 280px; }
  .tb-search svg { position: absolute; left: 10px; top: 50%; transform: translateY(-50%); width: 15px; height: 15px; stroke: var(--text-muted); fill: none; stroke-width: 2; }
  .tb-search input { width: 100%; border: 1px solid var(--border); border-radius: 8px; padding: 8px 10px 8px 30px; font-size: 13px; font-family: inherit; outline: none; color: var(--text-primary); transition: border-color .15s; background: var(--main-bg); }
  .tb-search input:focus { border-color: var(--brand); }
  .filter-select {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 28px 8px 12px;
    font-size: 13px;
    font-family: inherit;
    color: var(--text-primary);
    background: var(--main-bg);
    cursor: pointer;
    outline: none;
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238c93a8' stroke-width='2.5'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 8px center;
    transition: border-color .15s;
  }
  .filter-select:focus { border-color: var(--brand); }
  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; min-width: 900px; }
  thead tr { border-bottom: 1px solid var(--border); }
  thead th { padding: 12px 16px; font-size: 11px; font-weight: 700; letter-spacing: .07em; color: var(--text-muted); text-transform: uppercase; text-align: left; white-space: nowrap; background: #fafbff; }
  tbody tr { border-bottom: 1px solid var(--border); transition: background .12s; animation: fadeIn .25s ease both; }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: var(--row-hover); }
  tbody td { padding: 13px 16px; font-size: 13.5px; vertical-align: middle; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }

  .student-cell { display: flex; align-items: center; gap: 10px; }
  .stu-avatar { width: 34px; height: 34px; border-radius: 9px; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700; color: #fff; flex-shrink: 0; }
  .stu-name { font-weight: 600; font-size: 14px; }
  .stu-email { font-size: 11.5px; color: var(--text-muted); }
  .stu-id { color: var(--text-muted); font-size: 13px; font-family: 'Courier New', monospace; }
  .class-badge { display: inline-flex; align-items: center; justify-content: center; background: var(--brand-light); color: var(--brand); font-size: 12px; font-weight: 700; padding: 3px 10px; border-radius: 20px; min-width: 42px; }
  .gender-badge { display: inline-flex; align-items: center; gap: 4px; font-size: 12px; font-weight: 600; padding: 3px 9px; border-radius: 20px; }
  .gender-male   { background: #eff6ff; color: #1d4ed8; }
  .gender-female { background: #fdf2f8; color: #be185d; }
  .dob { color: var(--text-label); font-size: 13px; }
  .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
  .status-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
  .s-paid    { background: #dcfce7; color: var(--active-green); }
  .s-paid::before { background: var(--active-green); }
  .s-unpaid  { background: #fee2e2; color: var(--inactive-red); }
  .s-unpaid::before { background: var(--inactive-red); }
  .action-btn { border: 1px solid var(--border); background: #fff; border-radius: 7px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; transition: border-color .15s, color .15s, background .15s; }
  .action-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }

  .table-footer { display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; border-top: 1px solid var(--border); background: #fafbff; flex-wrap: wrap; gap: 10px; }
  .tf-info { font-size: 13px; color: var(--text-muted); }
  .pagination { display: flex; gap: 4px; }
  .pg-btn { width: 30px; height: 30px; border: 1px solid var(--border); background: #fff; border-radius: 7px; font-size: 13px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all .15s; }
  .pg-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }
  .pg-btn.active { background: var(--brand); border-color: var(--brand); color: #fff; }

  /* ── MODAL ── */
  .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.35); backdrop-filter: blur(3px); z-index: 50; align-items: center; justify-content: center; }
  .overlay.open { display: flex; }
  .modal { background: #fff; border-radius: 16px; padding: 28px; width: 100%; max-width: 500px; box-shadow: 0 20px 60px rgba(0,0,0,.2); animation: slideUp .2s ease; margin: 16px; }
  @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
  .modal-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; }
  .modal-header h2 { font-size: 18px; font-weight: 800; }
  .close-btn { width: 32px; height: 32px; border: 1px solid var(--border); background: var(--main-bg); border-radius: 8px; cursor: pointer; font-size: 16px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); transition: background .15s; }
  .close-btn:hover { background: #fee2e2; color: #ef4444; border-color: #fca5a5; }
  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
  .form-group { display: flex; flex-direction: column; gap: 5px; }
  .form-group.full { grid-column: 1/-1; }
  .form-group label { font-size: 11px; font-weight: 700; color: var(--text-label); letter-spacing: .06em; text-transform: uppercase; }
  .form-group input, .form-group select { border: 1px solid var(--border); border-radius: 8px; padding: 9px 12px; font-size: 13.5px; font-family: inherit; color: var(--text-primary); outline: none; transition: border-color .15s; background: var(--main-bg); }
  .form-group input:focus, .form-group select:focus { border-color: var(--brand); background: #fff; }
  .modal-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; }
  .btn-cancel { padding: 10px 20px; border-radius: 9px; border: 1px solid var(--border); background: #fff; font-size: 13.5px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; transition: background .15s; }
  .btn-cancel:hover { background: var(--main-bg); }
  .btn-submit { padding: 10px 22px; border-radius: 9px; border: none; background: var(--brand); font-size: 13.5px; font-weight: 700; font-family: inherit; color: #fff; cursor: pointer; box-shadow: var(--shadow-md); transition: background .15s; }
  .btn-submit:hover { background: var(--brand-dark); }

  /* ── TOAST ── */
  .toast { position: fixed; bottom: 24px; right: 24px; background: #1a1d2e; color: #fff; padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 500; display: flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(0,0,0,.2); transform: translateY(60px); opacity: 0; transition: all .3s ease; z-index: 999; }
  .toast.show { transform: translateY(0); opacity: 1; }
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
  <a class="nav-item" href="{{ route('dashboard.index') }}"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Dashboard</a>
  <a class="nav-item" href={{ route('teachers.index') }}><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Teachers</a>
  <a class="nav-item active" href="{{ route('students.index') }}"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Students</a>
  <a class="nav-item" href="{{ route('attendances.index') }}"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>Attendance</a>
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
    {{-- ! hidden --}}
    <div class="search-wrap" hidden>
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" placeholder="Search anything…"/>
    </div>
    <div class="topbar-actions">
      <div class="icon-btn"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div>
      <div class="icon-btn"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span class="notif-dot"></span></div>
      <div class="user-chip">
        <div class="avatar">AX</div>
        <div class="user-info"><div class="name">Adila XYZ</div><div class="role">Admin</div></div>
      </div>
    </div>
  </header>

  <div class="content">
    <div class="page-header">
      <div>
        <h1>Students</h1>
        <div class="sub" id="enrollCount">{{ $studentCount }} enrolled students</div>
      </div>
      <button class="enroll-btn" onclick="openModal()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Enroll Student
      </button>
    </div>

    <div class="card">
      <div class="table-toolbar">
        <div class="tb-search">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" id="searchInput" placeholder="Search students…" oninput="filterTable()"/>
        </div>
        <select class="filter-select" id="classFilter" onchange="filterTable()">
          {{-- INFO options are fetched from DB --}}
          <option value="">Select class</option>
          @foreach($classes as $class)
          <option value="{{ $class->id }}">{{ $class->name }}</option>
          @endforeach
        </select>
        <select class="filter-select" id="statusFilter" onchange="filterTable()">
          <option value="">All Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
          <option value="withdrawn">Withdrawn</option>
        </select>
        <select class="filter-select" id="genderFilter" onchange="filterTable()">
          <option value="">All Genders</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
        <select class="filter-select" id="sortBy" onchange="sortTable()">
          <option value="oldest">Oldest first</option>
          <option value="newest">Newest first</option>
          <option value="name_asc">Name (A → Z)</option>
          <option value="name_desc">Name (Z → A)</option>
        </select>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Fullname</th>
              <th>Cin</th>
              <th>Class</th>
              <th>Amount</th>
              <th>Due date</th>
              <th>Paid At</th>
              <th>Overdue</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="tableBody"></tbody>
        </table>
      </div>

      <div class="table-footer">
        <div class="tf-info" id="tfInfo"></div>
        <div class="pagination" id="pagination"></div>
      </div>
    </div>
  </div>
</div>

<!-- ENROLL MODAL -->
<div class="overlay" id="overlay" onclick="closeOnOverlay(event)">
  <form class="modal" method="POST" action="{{ route('students.store') }}">
    @csrf
    <div class="modal-header">
      <h2>Enroll New Student</h2>
      <button class="close-btn" onclick="closeModal()">✕</button>
    </div>
    <div class="form-grid">
      <div class="form-group full">
        <label>Full Name</label>
        <input name="fullname" type="text" id="f-name" placeholder="e.g. Emma Watson" required/>
      </div>
      <div class="form-group full">
        <label>Email</label>
        <input name="email" type="email" id="f-email" placeholder="e.g. student@gmail.com"/>
      </div>
      <div class="form-group">
        <label>Class</label>
        {{-- INFO options are fetched from DB --}}
        <select id="f-class" name="class_id">
          <option value="">Select class</option>
          @foreach($classes as $class)
          <option value="{{ $class->id }}" data-teacher="{{ $class->teacher?->user?->fullname }}">{{ $class->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Teacher</label>
        <input type="text" id="f-teacher" disabled placeholder="Teacher will appear here">
      </div>
      <div class="form-group">
        <label>Gender</label>
        <select id="f-gender" name="gender">
          <option value="">Select gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" id="f-dob" name="date_of_birth"/>
      </div>
      <div class="form-group full">
        <label>CIN</label>
        <input type="text" name="cin" placeholder="e.g. X123456" required>
      </div>
    </div>
    <div class="modal-actions">
      <button class="btn-cancel" onclick="closeModal()">Cancel</button>
      <button class="btn-submit" type="submit">Enroll Student</button>
    </div>
  </form>
</div>
<!-- TOAST -->
<div class="toast" id="toast"><span id="toastMsg"></span></div>
<script>
  // show teacher automatically
document.getElementById('f-class').addEventListener('change', function () {
    const selected = this.options[this.selectedIndex];
    const teacher = selected.getAttribute('data-teacher');

    document.getElementById('f-teacher').value = teacher || '';
});

 //
const COLORS = ['#3b6ef8','#8b5cf6','#10b981','#f59e0b','#ef4444','#06b6d4','#ec4899','#84cc16','#f97316','#6366f1','#14b8a6','#a855f7','#0ea5e9','#d946ef','#22c55e'];
window.payments = @json($payments);
console.log(@json($payments));
console.log(payments);
let filtered = [...payments];
let page = 1;
const PER = 10;

function initials(n){ return n.split(' ').map(w=>w[0]).join('').slice(0,2).toUpperCase(); }
function colorFor(n){ let h=0; for(let c of n) h=(h*31+c.charCodeAt(0))&0xffff; return COLORS[h%COLORS.length]; }
function fmtDob(d){
  if(!d) return '—';
  const [y,m,day]=d.split('-');
  return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][+m-1]+' '+parseInt(day)+', '+y;
}
const sClass = s => s === 'Paid' ? 's-paid' : 's-unpaid';
const sLabel = s => s === 'Paid' ? 'Paid' : 'Unpaid';

function render(){
  const total=filtered.length, pages=Math.max(1,Math.ceil(total/PER));
  if(page>pages) page=pages;
  const start=(page-1)*PER, slice=filtered.slice(start,start+PER);

  document.getElementById('tableBody').innerHTML = slice.map((p,i)=>`
    <tr style="animation-delay:${i*.03}s">
      <td><div class="student-cell">
        <div class="stu-avatar" style="background:${colorFor(p.student?.user?.fullname)}">${initials(p.student?.user?.fullname)}</div>
        <div><div class="stu-name">${p.student?.user?.fullname}</div><div class="stu-email">${p.student?.user?.email}</div></div>
      </div></td>
      <td><span class="stu-id">${p.student?.user?.cin}</span></td>
      <td><span class="class-badge">${p.student?.school_class?.name}</span></td>
      <td style="font-size:13px;color:var(--text-label)">${p.amount} DH</td>
      <td><span class="dob">${p.due_date}</span></td>
      <td><span class="dob">${p.paid_at}</span></td>
      <td><span class="badge badge-retard-${(d => d === 0 ? '0' : d <= 3 ? '1' : d <= 7 ? '2' : '3')(Math.max(0, Math.floor(((p.paid_at ? new Date(p.paid_at) : new Date()) - new Date(p.due_date)) / 86400000)))}">${(d => d > 0 ? `${d} days late` : 'On time')(Math.max(0, Math.floor(((p.paid_at ? new Date(p.paid_at) : new Date()) - new Date(p.due_date)) / 86400000)))}</span></td>
      <td><button class="action-btn" onclick="viewProfile('${p.student?.id}')">Profile</button></td>
    </tr>
  `).join('');

  const end=Math.min(start+PER,total);
  document.getElementById('tfInfo').textContent = total===0?'No payments found':`Showing ${start+1}–${end} of ${total} student${total!==1?'s':''}`;

  const pg=document.getElementById('pagination'); pg.innerHTML='';
  const btn=(label,p,active=false)=>{const b=document.createElement('button');b.className='pg-btn'+(active?' active':'');b.textContent=label;b.onclick=()=>{page=p;render();};return b;};
  if(page>1) pg.appendChild(btn('‹',page-1));
  for(let p2=1;p2<=pages;p2++){
    if(pages<=6||p2===1||p2===pages||Math.abs(p2-page)<=1) pg.appendChild(btn(p2,p2,p2===page));
    else if(p2===2||p2===pages-1){const s2=document.createElement('span');s2.className='pg-btn';s2.textContent='…';s2.style.pointerEvents='none';pg.appendChild(s2);}
  }
  if(page<pages) pg.appendChild(btn('›',page+1));
}

function filterTable() {
  const q = document.getElementById('searchInput').value.toLowerCase();
  const cls = document.getElementById('classFilter').value;
  const st = document.getElementById('statusFilter').value;
  const gn = document.getElementById('genderFilter').value;
  filtered = (payments || []).filter(p =>
    (!q ||
      p.student?.user?.fullname?.toLowerCase().includes(q) ||
      String(p.id).toLowerCase().includes(q) ||
      p.teacher?.user?.fname?.toLowerCase().includes(q) ||
      p.user?.cin?.toLowerCase().includes(q)
    ) &&
    (!cls || s.school_class?.name == cls || s.school_class?.id == cls) &&
    (!st || s.status == st) &&
    (!gn || s.user?.gender == gn)
  );

  page = 1;
  render();
}
function sortTable() {
  const value = document.getElementById('sortBy').value;

  if (value === "name_asc") {
    filtered.sort((a, b) =>
      (a.user?.fullname || "").localeCompare(b.user?.fullname || "")
    );
  }

  if (value === "name_desc") {
    filtered.sort((a, b) =>
      (b.user?.fullname || "").localeCompare(a.user?.fullname || "")
    );
  }

  if (value === "newest") {
    filtered.sort((a, b) => b.id - a.id);
  }

  if (value === "oldest") {
    filtered.sort((a, b) => a.id - b.id);
  }

  page = 1;
  render();
}
function openModal(){ document.getElementById('overlay').classList.add('open'); }
function closeModal(){ document.getElementById('overlay').classList.remove('open'); }
function closeOnOverlay(e){ if(e.target===e.currentTarget) closeModal(); }

function viewProfile(id){
  console.log("hi");
  const s=students.find(x=>x.id == id);
  if(s) showToast('👤 Opening profile for '+s.user?.fname+'…');
  setTimeout(() => {
    window.location.href = `/students/${id}`;
  }, 2000); // 2 seconds
}

let toastTimer;
function showToast(msg){
  const t=document.getElementById('toast');
  document.getElementById('toastMsg').textContent=msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer=setTimeout(()=>t.classList.remove('show'),3200);
}

render();
</script>
</body>
</html>