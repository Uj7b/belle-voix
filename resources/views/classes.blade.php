<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Belle Voix – Classes</title>
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
    --teaching-green:#16a34a;
    --pending-amber: #d97706;
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

  /* ── STAT CARDS ── */
  .stats-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
  .stat-card {
    background: var(--card-bg);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 20px 22px;
    box-shadow: var(--shadow-sm);
    display: flex;
    align-items: center;
    gap: 16px;
  }
  .stat-icon {
    width: 46px; height: 46px;
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
  }
  .stat-icon svg { width: 22px; height: 22px; stroke: currentColor; fill: none; stroke-width: 2; }
  .stat-icon.blue  { background: var(--brand-light); color: var(--brand); }
  .stat-icon.green { background: #dcfce7; color: var(--teaching-green); }
  .stat-icon.amber { background: #fef3c7; color: var(--pending-amber); }
  .stat-label { font-size: 12px; color: var(--text-muted); font-weight: 500; margin-bottom: 4px; }
  .stat-value { font-size: 26px; font-weight: 800; letter-spacing: -.5px; line-height: 1; }

  /* ── CONTENT ── */
  .content { padding: 30px 28px; flex: 1; }
  .page-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; }
  .page-header h1 { font-size: 24px; font-weight: 800; letter-spacing: -.3px; }
  .page-header .sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }
  .create-btn {
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
  .create-btn:hover { background: var(--brand-dark); transform: translateY(-1px); }
  .create-btn:active { transform: translateY(0); }

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
  table { width: 100%; border-collapse: collapse; min-width: 700px; }
  thead tr { border-bottom: 1px solid var(--border); }
  thead th { padding: 12px 16px; font-size: 11px; font-weight: 700; letter-spacing: .07em; color: var(--text-muted); text-transform: uppercase; text-align: left; white-space: nowrap; background: #fafbff; }
  tbody tr { border-bottom: 1px solid var(--border); transition: background .12s; animation: fadeIn .25s ease both; }
  tbody tr:last-child { border-bottom: none; }
  tbody tr:hover { background: var(--row-hover); }
  tbody td { padding: 13px 16px; font-size: 13.5px; vertical-align: middle; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: translateY(0); } }

  .class-name-cell { display: flex; align-items: center; gap: 10px; }
  .class-icon {
    width: 38px; height: 38px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    font-weight: 800;
    color: #fff;
    flex-shrink: 0;
    letter-spacing: -.5px;
  }
  .class-label { font-weight: 700; font-size: 14px; }
  .class-id { font-size: 11.5px; color: var(--text-muted); font-family: 'Courier New', monospace; }

  .teacher-cell { display: flex; align-items: center; gap: 8px; }
  .teacher-avatar {
    width: 30px; height: 30px;
    border-radius: 8px;
    background: var(--brand-light);
    color: var(--brand);
    display: flex; align-items: center; justify-content: center;
    font-size: 11px;
    font-weight: 700;
    flex-shrink: 0;
  }
  .teacher-name { font-size: 13.5px; font-weight: 600; }
  .teacher-unassigned { font-size: 13px; color: var(--text-muted); font-style: italic; }

  .student-count {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 13px; font-weight: 600;
    color: var(--text-label);
  }
  .student-count svg { width: 13px; height: 13px; stroke: var(--text-muted); fill: none; stroke-width: 2; }

  .status-badge { display: inline-flex; align-items: center; gap: 5px; font-size: 12px; font-weight: 600; padding: 4px 11px; border-radius: 20px; }
  .status-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
  .s-teaching { background: #dcfce7; color: var(--teaching-green); }
  .s-teaching::before { background: var(--teaching-green); }
  .s-pending  { background: #fef3c7; color: var(--pending-amber); }
  .s-pending::before  { background: var(--pending-amber); }

  .action-btn { border: 1px solid var(--border); background: #fff; border-radius: 7px; padding: 6px 14px; font-size: 12.5px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; transition: border-color .15s, color .15s, background .15s; margin-right: 4px; }
  .action-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }
  .action-btn.danger:hover { border-color: #ef4444; color: #ef4444; background: #fee2e2; }

  .table-footer { display: flex; align-items: center; justify-content: space-between; padding: 14px 20px; border-top: 1px solid var(--border); background: #fafbff; flex-wrap: wrap; gap: 10px; }
  .tf-info { font-size: 13px; color: var(--text-muted); }
  .pagination { display: flex; gap: 4px; }
  .pg-btn { width: 30px; height: 30px; border: 1px solid var(--border); background: #fff; border-radius: 7px; font-size: 13px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all .15s; }
  .pg-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }
  .pg-btn.active { background: var(--brand); border-color: var(--brand); color: #fff; }

  /* ── MODAL ── */
  .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.35); backdrop-filter: blur(3px); z-index: 50; align-items: center; justify-content: center; }
  .overlay.open { display: flex; }
  .modal { background: #fff; border-radius: 16px; padding: 28px; width: 100%; max-width: 460px; box-shadow: 0 20px 60px rgba(0,0,0,.2); animation: slideUp .2s ease; margin: 16px; }
  @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
  .modal-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 22px; }
  .modal-header h2 { font-size: 18px; font-weight: 800; }
  .close-btn { width: 32px; height: 32px; border: 1px solid var(--border); background: var(--main-bg); border-radius: 8px; cursor: pointer; font-size: 16px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); transition: background .15s; }
  .close-btn:hover { background: #fee2e2; color: #ef4444; border-color: #fca5a5; }
  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
  .form-group { display: flex; flex-direction: column; gap: 5px; }
  .form-group.full { grid-column: 1/-1; }
  .form-group label { font-size: 11px; font-weight: 700; color: var(--text-label); letter-spacing: .06em; text-transform: uppercase; }
  .form-group input, .form-group select {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 9px 12px;
    font-size: 13.5px;
    font-family: inherit;
    color: var(--text-primary);
    outline: none;
    transition: border-color .15s;
    background: var(--main-bg);
  }
  .form-group input:focus, .form-group select:focus { border-color: var(--brand); background: #fff; }
  .modal-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 22px; }
  .btn-cancel { padding: 10px 20px; border-radius: 9px; border: 1px solid var(--border); background: #fff; font-size: 13.5px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; transition: background .15s; }
  .btn-cancel:hover { background: var(--main-bg); }
  .btn-submit { padding: 10px 22px; border-radius: 9px; border: none; background: var(--brand); font-size: 13.5px; font-weight: 700; font-family: inherit; color: #fff; cursor: pointer; box-shadow: var(--shadow-md); transition: background .15s; }
  .btn-submit:hover { background: var(--brand-dark); }

  /* ── DELETE MODAL ── */
  .delete-modal { background: #fff; border-radius: 16px; padding: 28px; width: 100%; max-width: 400px; box-shadow: 0 20px 60px rgba(0,0,0,.2); animation: slideUp .2s ease; margin: 16px; text-align: center; }
  .delete-icon { width: 56px; height: 56px; background: #fee2e2; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; }
  .delete-icon svg { width: 26px; height: 26px; stroke: #ef4444; fill: none; stroke-width: 2; }
  .delete-modal h2 { font-size: 18px; font-weight: 800; margin-bottom: 8px; }
  .delete-modal p { font-size: 13.5px; color: var(--text-muted); line-height: 1.6; margin-bottom: 22px; }
  .btn-delete { padding: 10px 22px; border-radius: 9px; border: none; background: #ef4444; font-size: 13.5px; font-weight: 700; font-family: inherit; color: #fff; cursor: pointer; transition: background .15s; }
  .btn-delete:hover { background: #dc2626; }

  /* ── TOAST ── */
  .toast { position: fixed; bottom: 24px; right: 24px; background: #1a1d2e; color: #fff; padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 500; display: flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(0,0,0,.2); transform: translateY(60px); opacity: 0; transition: all .3s ease; z-index: 999; }
  .toast.show { transform: translateY(0); opacity: 1; }

  .empty-state { padding: 60px 20px; text-align: center; color: var(--text-muted); }
  .empty-state svg { width: 48px; height: 48px; stroke: var(--border); fill: none; stroke-width: 1.5; margin-bottom: 12px; }
  .empty-state p { font-size: 14px; }
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
  <a class="nav-item" href="{{ route('teachers.index') }}"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>Teachers</a>
  <a class="nav-item" href="{{ route('students.index') }}"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>Students</a>
  <a class="nav-item active" href="{{ route('classes.index') }}"><svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>Classes</a>
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
        <h1>Classes</h1>
        <div class="sub">{{ $classCount }} total classes</div>
      </div>
      <button class="create-btn" onclick="openModal()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Create Class
      </button>
    </div>

    <!-- STAT CARDS -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-icon blue">
          <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
        </div>
        <div>
          <div class="stat-label">Total Classes</div>
          <div class="stat-value">{{ $classCount }}</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon green">
          <svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
        </div>
        <div>
          <div class="stat-label">Teaching</div>
          <div class="stat-value">{{ $teachingCount }}</div>
        </div>
      </div>
      <div class="stat-card">
        <div class="stat-icon amber">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
        </div>
        <div>
          <div class="stat-label">Pending</div>
          <div class="stat-value">{{ $pendingCount }}</div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="table-toolbar">
        <div class="tb-search">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <input type="text" id="searchInput" placeholder="Search classes…" oninput="filterTable()"/>
        </div>
        <select class="filter-select" id="statusFilter" onchange="filterTable()">
          <option value="">All Status</option>
          <option value="teaching">Teaching</option>
          <option value="pending">Pending</option>
        </select>
        <select class="filter-select" id="teacherFilter" onchange="filterTable()">
          <option value="">All Teachers</option>
          @foreach($teachers as $teacher)
          <option value="{{ $teacher->id }}">{{ $teacher->user->fullname }}</option>
          @endforeach
        </select>
        <select class="filter-select" id="sortBy" onchange="sortTable()">
          <option value="oldest">Oldest first</option>
          <option value="newest">Newest first</option>
          <option value="name_asc">Name (A → Z)</option>
          <option value="name_desc">Name (Z → A)</option>
          <option value="students_asc">Students (Low → High)</option>
          <option value="students_desc">Students (High → Low)</option>
        </select>
      </div>

      <div class="table-wrap">
        <table>
          <thead>
            <tr>
              <th>Class Name</th>
              <th>Teacher</th>
              <th>Students</th>
              <th>Status</th>
              <th>Created</th>
              <th>Actions</th>
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

<!-- CREATE / EDIT CLASS MODAL -->
<div class="overlay" id="overlay" onclick="closeOnOverlay(event)">
  <form class="modal" id="classForm" method="POST" action="{{ route('classes.store') }}">
    @csrf
    <input type="hidden" id="formMethod" name="_method" value="POST"/>
    <div class="modal-header">
      <h2 id="modalTitle">Create New Class</h2>
      <button type="button" class="close-btn" onclick="closeModal()">✕</button>
    </div>
    <div class="form-grid">
      <div class="form-group full">
        <label>Class Name</label>
        <input name="name" type="text" id="f-name" placeholder="e.g. Class A1" required/>
      </div>
      <div class="form-group full">
        <label>Assign Teacher <span style="color:var(--text-muted);font-weight:400;text-transform:none;letter-spacing:0">(optional)</span></label>
        <select name="teacher_id" id="f-teacher">
          <option value="">— No teacher assigned —</option>
          @foreach($teachers as $teacher)
          <option value="{{ $teacher->id }}" data-assigned="{{ $teacher->school_class ? 'yes' : 'no' }}">
            {{ $teacher->user->fullname }}
            @if($teacher->school_class) (already assigned) @endif
          </option>
          @endforeach
        </select>
      </div>
      <div class="form-group full">
        <label>Status</label>
        <select name="status" id="f-status">
          <option value="pending">Pending</option>
          <option value="teaching">Teaching</option>
        </select>
      </div>
    </div>
    <div class="modal-actions">
      <button type="button" class="btn-cancel" onclick="closeModal()">Cancel</button>
      <button class="btn-submit" type="submit" id="submitBtn">Create Class</button>
    </div>
  </form>
</div>

<!-- DELETE CONFIRM MODAL -->
<div class="overlay" id="deleteOverlay" onclick="if(event.target===this)closeDeleteModal()">
  <form class="modal" id="deleteForm" method="POST" style="max-width:380px">
    @csrf
    @method('DELETE')

    <div class="modal-header">
      <h2>Delete Class</h2>
      <button type="button" class="close-btn" onclick="closeDeleteModal()">✕</button>
    </div>

    <p id="deleteMsg" style="color:var(--text-label);font-size:14px;margin-bottom:22px;line-height:1.6">
      Are you sure you want to delete this class? This action cannot be undone.
    </p>

    <div class="modal-actions">
      <button type="button" class="btn-cancel" onclick="closeDeleteModal()">
        Cancel
      </button>

      <button type="submit" class="btn-submit" style="background:#dc2626">
        Delete
      </button>
    </div>
  </form>
</div>

<!-- TOAST -->
<div class="toast" id="toast"><span id="toastMsg"></span></div>

<script>
const COLORS = ['#3b6ef8','#8b5cf6','#10b981','#f59e0b','#ef4444','#06b6d4','#ec4899','#84cc16','#f97316','#6366f1','#14b8a6','#a855f7','#0ea5e9','#d946ef','#22c55e'];
window.classes = @json($classes);
console.log(classes);
let filtered = [...classes];
let page = 1;
const PER = 10;

function colorFor(n) {
  if (!n) return COLORS[0];
  let h = 0;
  for (let c of n) h = (h * 31 + c.charCodeAt(0)) & 0xffff;
  return COLORS[h % COLORS.length];
}
function initials(n) {
  if (!n) return '?';
  return n.split(' ').map(w => w[0]).join('').slice(0, 2).toUpperCase();
}
function fmtDate(d) {
  if (!d) return '—';
  const dt = new Date(d);
  return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][dt.getMonth()] + ' ' + dt.getDate() + ', ' + dt.getFullYear();
}
const sClass = s => ({ teaching: 's-teaching', pending: 's-pending' }[s] || 's-pending');
const sLabel = s => ({ teaching: 'Teaching', pending: 'Pending' }[s] || s);

function render() {
  const total = filtered.length;
  const pages = Math.max(1, Math.ceil(total / PER));
  if (page > pages) page = pages;
  const start = (page - 1) * PER;
  const slice = filtered.slice(start, start + PER);

  const tbody = document.getElementById('tableBody');

  if (total === 0) {
    tbody.innerHTML = `<tr><td colspan="6"><div class="empty-state">
      <svg viewBox="0 0 24 24"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
      <p>No classes found</p>
    </div></td></tr>`;
  } else {
    tbody.innerHTML = slice.map((c, i) => {
      const teacherName = c.teacher?.user?.fullname || null;
      const studentCount = c.students_count ?? (c.students ? c.students.length : 0);
      return `
      <tr style="animation-delay:${i * .03}s">
        <td>
          <div class="class-name-cell">
            <div class="class-icon" style="background:${colorFor(c.name)}">${initials(c.name)}</div>
            <div>
              <div class="class-label">${c.name}</div>
              <div class="class-id">#${String(c.id).padStart(4, '0')}</div>
            </div>
          </div>
        </td>
        <td>
          ${teacherName
            ? `<div class="teacher-cell">
                <div class="teacher-avatar">${initials(teacherName)}</div>
                <span class="teacher-name">${teacherName}</span>
              </div>`
            : `<span class="teacher-unassigned">No teacher assigned</span>`
          }
        </td>
        <td>
          <span class="student-count">
            <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg>
            ${studentCount} student${studentCount !== 1 ? 's' : ''}
          </span>
        </td>
        <td><span class="status-badge ${sClass(c.status)}">${sLabel(c.status)}</span></td>
        <td style="color:var(--text-label);font-size:13px">${fmtDate(c.created_at)}</td>
        <td>
          <button class="action-btn" onclick="openEditModal(${c.id})">Edit</button>
          <button class="action-btn danger" onclick="openDeleteModal(${c.id}, '${c.name.replace(/'/g, "\\'")}')">Delete</button>
        </td>
      </tr>`;
    }).join('');
  }

  const end = Math.min(start + PER, total);
  document.getElementById('tfInfo').textContent = total === 0
    ? 'No classes found'
    : `Showing ${start + 1}–${end} of ${total} class${total !== 1 ? 'es' : ''}`;

  const pg = document.getElementById('pagination');
  pg.innerHTML = '';
  const btn = (label, p, active = false) => {
    const b = document.createElement('button');
    b.className = 'pg-btn' + (active ? ' active' : '');
    b.textContent = label;
    b.onclick = () => { page = p; render(); };
    return b;
  };
  if (page > 1) pg.appendChild(btn('‹', page - 1));
  for (let p2 = 1; p2 <= pages; p2++) {
    if (pages <= 6 || p2 === 1 || p2 === pages || Math.abs(p2 - page) <= 1) {
      pg.appendChild(btn(p2, p2, p2 === page));
    } else if (p2 === 2 || p2 === pages - 1) {
      const s = document.createElement('span');
      s.className = 'pg-btn';
      s.textContent = '…';
      s.style.pointerEvents = 'none';
      pg.appendChild(s);
    }
  }
  if (page < pages) pg.appendChild(btn('›', page + 1));
}

function filterTable() {
  const q = document.getElementById('searchInput').value.toLowerCase();
  const st = document.getElementById('statusFilter').value;
  const tr = document.getElementById('teacherFilter').value;

  filtered = classes.filter(c =>
    (!q || c.name?.toLowerCase().includes(q) || c.teacher?.user?.fullname?.toLowerCase().includes(q)) &&
    (!st || c.status === st) &&
    (!tr || String(c.teacher_id) === tr)
  );
  page = 1;
  render();
}

function sortTable() {
  const value = document.getElementById('sortBy').value;
  if (value === 'name_asc')  filtered.sort((a, b) => (a.name || '').localeCompare(b.name || ''));
  if (value === 'name_desc') filtered.sort((a, b) => (b.name || '').localeCompare(a.name || ''));
  if (value === 'students_asc')    filtered.sort((a, b) => a.students_count - b.students_count);
  if (value === 'students_desc')    filtered.sort((a, b) => b.students_count - a.students_count);
  if (value === 'newest')    filtered.sort((a, b) => b.id - a.id);
  if (value === 'oldest')    filtered.sort((a, b) => a.id - b.id);
  page = 1;
  render();
}

// ── MODAL ──
function openModal() {
  document.getElementById('modalTitle').textContent = 'Create New Class';
  document.getElementById('submitBtn').textContent = 'Create Class';
  document.getElementById('classForm').action = "{{ route('classes.store') }}";
  document.getElementById('formMethod').value = 'POST';
  document.getElementById('f-name').value = '';
  document.getElementById('f-teacher').value = '';
  document.getElementById('f-status').value = 'pending';
  document.getElementById('overlay').classList.add('open');
}

function openEditModal(id) {
  const c = classes.find(x => x.id == id);
  if (!c) return;
  document.getElementById('modalTitle').textContent = 'Edit Class';
  document.getElementById('submitBtn').textContent = 'Save Changes';
  document.getElementById('classForm').action = `/classes/${id}`;
  document.getElementById('formMethod').value = 'PUT';
  document.getElementById('f-name').value = c.name;
  document.getElementById('f-teacher').value = c.teacher_id ?? '';
  document.getElementById('f-status').value = c.status;
  document.getElementById('overlay').classList.add('open');
}

function closeModal() { document.getElementById('overlay').classList.remove('open'); }
function closeOnOverlay(e) { if (e.target === e.currentTarget) closeModal(); }

// ── DELETE ──
function openDeleteModal(id, name) {
  document.getElementById('deleteMsg').textContent = `Are you sure you want to delete "${name}"? This action cannot be undone.`;
  document.getElementById('deleteForm').action = `/classes/${id}`;
  document.getElementById('deleteOverlay').classList.add('open');
}
function closeDeleteModal() { document.getElementById('deleteOverlay').classList.remove('open'); }
function closeDeleteOnOverlay(e) { if (e.target === e.currentTarget) closeDeleteModal(); }

// ── TOAST ──
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
}

// ── FLASH MESSAGES ──
@if(session('success'))
  window.addEventListener('load', () => showToast('✅ {{ session("success") }}'));
@endif
@if(session('error'))
  window.addEventListener('load', () => showToast('❌ {{ session("error") }}'));
@endif

render();
</script>
</body>
</html>