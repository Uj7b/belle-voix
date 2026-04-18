<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SchoolHub — Management System</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --blue:       #2563EB;
    --blue-light: #EFF6FF;
    --blue-mid:   #BFDBFE;
    --accent:     #0EA5E9;
    --green:      #10B981;
    --red:        #EF4444;
    --amber:      #F59E0B;
    --purple:     #8B5CF6;
    --sidebar-w:  220px;
    --topbar-h:   60px;
    --bg:         #F0F4FA;
    --surface:    #FFFFFF;
    --border:     #E2E8F0;
    --text:       #0F172A;
    --muted:      #64748B;
    --light:      #94A3B8;
    --shadow:     0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04);
    --shadow-md:  0 4px 16px rgba(0,0,0,.08);
    --radius:     10px;
    --radius-sm:  6px;
  }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    display: flex;
    height: 100vh;
    overflow: hidden;
    font-size: 14px;
  }

  /* ── SIDEBAR ─────────────────────────────── */
  .sidebar {
    width: var(--sidebar-w);
    background: var(--surface);
    border-right: 1px solid var(--border);
    display: flex;
    flex-direction: column;
    padding: 0;
    flex-shrink: 0;
    overflow-y: auto;
  }
  .sidebar-logo {
    display: flex;
    align-items: center;
    gap: 9px;
    padding: 18px 20px 14px;
    font-size: 15px;
    font-weight: 600;
    letter-spacing: -.3px;
    color: var(--blue);
    border-bottom: 1px solid var(--border);
  }
  .sidebar-logo .dot {
    width: 28px; height: 28px;
    background: var(--blue);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
  }
  .sidebar-logo .dot svg { width: 16px; height: 16px; fill: #fff; }
  .sidebar-section { padding: 14px 12px 4px; }
  .sidebar-section-label {
    font-size: 10px;
    font-weight: 600;
    letter-spacing: .8px;
    text-transform: uppercase;
    color: var(--light);
    padding: 0 8px;
    margin-bottom: 4px;
  }
  .nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 10px;
    border-radius: var(--radius-sm);
    cursor: pointer;
    color: var(--muted);
    font-size: 13.5px;
    font-weight: 400;
    transition: all .15s;
    position: relative;
  }
  .nav-item:hover { background: var(--blue-light); color: var(--blue); }
  .nav-item.active { background: var(--blue); color: #fff; font-weight: 500; }
  .nav-item svg { width: 16px; height: 16px; flex-shrink: 0; }
  .nav-badge {
    margin-left: auto;
    background: var(--red);
    color: #fff;
    font-size: 10px;
    font-weight: 600;
    padding: 1px 6px;
    border-radius: 20px;
  }
  .nav-item.active .nav-badge { background: rgba(255,255,255,.3); }
  .sidebar-promo {
    margin: 16px 12px;
    background: linear-gradient(135deg, var(--blue) 0%, var(--accent) 100%);
    border-radius: var(--radius);
    padding: 16px;
    color: #fff;
    font-size: 12.5px;
    line-height: 1.5;
  }
  .sidebar-promo strong { display: block; font-size: 14px; margin-bottom: 4px; }
  .sidebar-promo button {
    margin-top: 10px;
    width: 100%;
    background: rgba(255,255,255,.2);
    border: 1px solid rgba(255,255,255,.3);
    color: #fff;
    border-radius: var(--radius-sm);
    padding: 7px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    font-family: inherit;
    transition: background .15s;
  }
  .sidebar-promo button:hover { background: rgba(255,255,255,.3); }

  /* ── MAIN ─────────────────────────────────── */
  .main { flex: 1; display: flex; flex-direction: column; overflow: hidden; }

  .topbar {
    height: var(--topbar-h);
    background: var(--surface);
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    padding: 0 24px;
    gap: 14px;
    flex-shrink: 0;
  }
  .topbar-search {
    flex: 1;
    max-width: 320px;
    display: flex;
    align-items: center;
    gap: 8px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 0 12px;
    height: 36px;
    color: var(--muted);
  }
  .topbar-search input {
    border: none;
    background: none;
    font-family: inherit;
    font-size: 13px;
    color: var(--text);
    outline: none;
    flex: 1;
  }
  .topbar-search input::placeholder { color: var(--light); }
  .topbar-actions { display: flex; align-items: center; gap: 10px; margin-left: auto; }
  .icon-btn {
    width: 34px; height: 34px;
    border-radius: 8px;
    background: var(--bg);
    border: 1px solid var(--border);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer;
    color: var(--muted);
    transition: all .15s;
    position: relative;
  }
  .icon-btn:hover { border-color: var(--blue); color: var(--blue); }
  .icon-btn svg { width: 16px; height: 16px; }
  .notif-dot {
    position: absolute; top: 5px; right: 5px;
    width: 7px; height: 7px;
    background: var(--red);
    border-radius: 50%;
    border: 1.5px solid var(--surface);
  }
  .user-chip {
    display: flex; align-items: center; gap: 8px;
    background: var(--bg);
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 4px 12px 4px 4px;
    cursor: pointer;
    font-size: 13px;
  }
  .avatar {
    width: 26px; height: 26px;
    border-radius: 6px;
    background: var(--blue);
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 10px;
    font-weight: 600;
    flex-shrink: 0;
  }
  .user-chip .avatar { border-radius: 6px; }
  .user-info { line-height: 1.3; }
  .user-name { font-weight: 500; font-size: 12.5px; }
  .user-role { font-size: 10.5px; color: var(--muted); }

  .content {
    flex: 1;
    overflow-y: auto;
    padding: 24px;
  }

  .page { display: none; }
  .page.active { display: block; }

  /* ── SHARED COMPONENTS ──────────────────── */
  .page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
  }
  .page-title { font-size: 20px; font-weight: 600; letter-spacing: -.3px; }
  .page-subtitle { font-size: 13px; color: var(--muted); margin-top: 2px; }

  .card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    box-shadow: var(--shadow);
  }

  .btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 14px;
    border-radius: var(--radius-sm);
    font-family: inherit;
    font-size: 13px;
    font-weight: 500;
    cursor: pointer;
    transition: all .15s;
    border: none;
  }
  .btn-primary { background: var(--blue); color: #fff; }
  .btn-primary:hover { background: #1d4ed8; }
  .btn-ghost { background: transparent; border: 1px solid var(--border); color: var(--muted); }
  .btn-ghost:hover { border-color: var(--blue); color: var(--blue); }
  .btn svg { width: 14px; height: 14px; }

  .select-pill {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 6px 12px;
    border-radius: 20px;
    border: 1px solid var(--border);
    background: var(--surface);
    font-family: inherit;
    font-size: 12.5px;
    color: var(--text);
    cursor: pointer;
    font-weight: 500;
  }

  /* ── DASHBOARD ─────────────────────────── */
  .stat-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px; margin-bottom: 20px; }
  .stat-card {
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 18px 20px;
    box-shadow: var(--shadow);
  }
  .stat-label { font-size: 12px; color: var(--muted); font-weight: 500; margin-bottom: 8px; }
  .stat-value { font-size: 26px; font-weight: 600; letter-spacing: -1px; margin-bottom: 4px; }
  .stat-change { font-size: 11.5px; color: var(--green); font-weight: 500; }
  .stat-change.down { color: var(--red); }
  .stat-icon {
    width: 36px; height: 36px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 12px;
  }
  .stat-icon svg { width: 18px; height: 18px; }

  .dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 320px;
    gap: 16px;
  }

  /* ── TABLE ──────────────────────────────── */
  .table-wrap { overflow-x: auto; }
  table { width: 100%; border-collapse: collapse; }
  th {
    text-align: left;
    font-size: 11.5px;
    font-weight: 600;
    letter-spacing: .4px;
    text-transform: uppercase;
    color: var(--muted);
    padding: 10px 16px;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
  }
  td {
    padding: 11px 16px;
    border-bottom: 1px solid var(--border);
    font-size: 13.5px;
    color: var(--text);
    vertical-align: middle;
  }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: #F8FAFC; }

  /* ── ATTENDANCE ─────────────────────────── */
  .att-dot {
    width: 22px; height: 22px;
    border-radius: 50%;
    display: inline-flex; align-items: center; justify-content: center;
    font-size: 10px;
    font-weight: 600;
  }
  .att-dot.p { background: var(--blue); color: #fff; }
  .att-dot.a { background: var(--red); color: #fff; }
  .att-dot.l { background: var(--amber); color: #fff; }
  .att-dot.h { background: var(--border); color: var(--muted); }

  /* ── NOTICE ─────────────────────────────── */
  .notice-card {
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    cursor: pointer;
    transition: background .12s;
  }
  .notice-card:last-child { border-bottom: none; }
  .notice-card:hover { background: var(--blue-light); }
  .notice-meta { display: flex; align-items: center; gap: 8px; margin-bottom: 6px; }
  .notice-avatar {
    width: 32px; height: 32px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px;
    font-weight: 600;
    color: #fff;
  }
  .notice-title { font-weight: 600; font-size: 14px; margin-bottom: 4px; }
  .notice-by { font-size: 11.5px; color: var(--muted); }
  .notice-body { font-size: 12.5px; color: var(--muted); line-height: 1.55; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
  .notice-date { font-size: 11px; color: var(--light); margin-left: auto; }
  .tag {
    display: inline-block;
    padding: 2px 9px;
    border-radius: 20px;
    font-size: 10.5px;
    font-weight: 600;
  }

  /* ── CALENDAR ───────────────────────────── */
  .cal-grid { display: grid; grid-template-columns: 1fr 280px; gap: 16px; }
  .cal-month-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
    gap: 2px;
  }
  .cal-day-label {
    text-align: center;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    color: var(--muted);
    padding: 8px 0;
  }
  .cal-day {
    aspect-ratio: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    cursor: pointer;
    font-size: 13px;
    transition: all .12s;
    position: relative;
    min-height: 44px;
  }
  .cal-day:hover { background: var(--blue-light); }
  .cal-day.today { background: var(--blue); color: #fff; font-weight: 600; }
  .cal-day.other-month { color: var(--light); }
  .cal-day.has-event::after {
    content: '';
    width: 4px; height: 4px;
    border-radius: 50%;
    background: var(--accent);
    position: absolute;
    bottom: 5px;
  }
  .cal-day.today.has-event::after { background: rgba(255,255,255,.7); }
  .agenda-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 10px 16px;
    border-bottom: 1px solid var(--border);
  }
  .agenda-item:last-child { border-bottom: none; }
  .agenda-time { font-size: 11px; color: var(--muted); min-width: 60px; margin-top: 2px; }
  .agenda-dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 4px; flex-shrink: 0; }
  .agenda-title { font-size: 13px; font-weight: 500; }
  .agenda-sub { font-size: 11.5px; color: var(--muted); margin-top: 2px; }

  /* ── FINANCE ───────────────────────────── */
  .finance-summary { display: grid; grid-template-columns: repeat(3,1fr); gap: 14px; margin-bottom: 20px; }

  /* ── MESSAGES ───────────────────────────── */
  .msg-layout { display: grid; grid-template-columns: 280px 1fr; gap: 0; height: calc(100vh - var(--topbar-h) - 80px); }
  .msg-list { border-right: 1px solid var(--border); overflow-y: auto; }
  .msg-item {
    display: flex;
    gap: 10px;
    padding: 12px 16px;
    cursor: pointer;
    border-bottom: 1px solid var(--border);
    transition: background .12s;
    position: relative;
  }
  .msg-item:hover { background: var(--blue-light); }
  .msg-item.active { background: var(--blue-light); border-left: 2px solid var(--blue); }
  .msg-item-name { font-size: 13px; font-weight: 500; margin-bottom: 3px; }
  .msg-item-preview { font-size: 11.5px; color: var(--muted); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
  .msg-item-time { font-size: 10.5px; color: var(--light); margin-left: auto; white-space: nowrap; }
  .unread-dot { width: 7px; height: 7px; border-radius: 50%; background: var(--blue); position: absolute; right: 14px; top: 50%; transform: translateY(-50%); }
  .chat-area { display: flex; flex-direction: column; }
  .chat-header {
    padding: 14px 20px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 12px;
  }
  .chat-messages { flex: 1; overflow-y: auto; padding: 20px; display: flex; flex-direction: column; gap: 12px; }
  .bubble {
    max-width: 60%;
    padding: 10px 14px;
    border-radius: 12px;
    font-size: 13px;
    line-height: 1.55;
  }
  .bubble.them { background: var(--bg); border: 1px solid var(--border); align-self: flex-start; border-bottom-left-radius: 4px; }
  .bubble.me { background: var(--blue); color: #fff; align-self: flex-end; border-bottom-right-radius: 4px; }
  .bubble-time { font-size: 10.5px; color: var(--light); margin-top: 4px; }
  .bubble.me .bubble-time { color: rgba(255,255,255,.6); text-align: right; }
  .chat-input-area {
    padding: 14px 20px;
    border-top: 1px solid var(--border);
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .chat-input {
    flex: 1;
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 9px 14px;
    font-family: inherit;
    font-size: 13px;
    outline: none;
    background: var(--bg);
    color: var(--text);
  }
  .chat-input:focus { border-color: var(--blue); }

  /* ── PAGINATION ──────────────────────────── */
  .pagination { display: flex; align-items: center; gap: 4px; padding: 14px 16px; border-top: 1px solid var(--border); }
  .page-btn {
    width: 28px; height: 28px;
    border-radius: 6px;
    border: 1px solid var(--border);
    background: none;
    font-size: 12.5px;
    cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    font-family: inherit;
    color: var(--text);
    transition: all .12s;
  }
  .page-btn.active { background: var(--blue); color: #fff; border-color: var(--blue); }
  .page-btn:hover:not(.active) { border-color: var(--blue); color: var(--blue); }

  /* ── SCROLLBAR ───────────────────────────── */
  ::-webkit-scrollbar { width: 5px; height: 5px; }
  ::-webkit-scrollbar-track { background: transparent; }
  ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }

  /* ── ANIMATIONS ──────────────────────────── */
  .page.active { animation: fadeIn .2s ease; }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }

  .mini-bar { display: flex; gap: 2px; align-items: flex-end; height: 36px; }
  .mini-bar span { width: 6px; border-radius: 3px 3px 0 0; background: var(--blue-mid); transition: height .3s; }
  .mini-bar span.hi { background: var(--blue); }

  .progress-bar { height: 6px; background: var(--border); border-radius: 4px; overflow: hidden; }
  .progress-fill { height: 100%; border-radius: 4px; transition: width .6s ease; }
</style>
</head>
<body>

<!-- ── SIDEBAR ─────────────────────────────── -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="dot">
      <svg viewBox="0 0 24 24"><path d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3zM5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"/></svg>
    </div>
    SchoolHub
  </div>

  <div class="sidebar-section">
    <div class="sidebar-section-label">Menu</div>
    <div class="nav-item active" onclick="navigate('dashboard',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Dashboard
    </div>
    <div class="nav-item" onclick="navigate('teachers',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Teachers
    </div>
    <div class="nav-item" onclick="navigate('students',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 14l9-5-9-5-9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 0 1 .665 6.479A11.952 11.952 0 0 0 12 20.055a11.952 11.952 0 0 0-6.824-2.998 12.078 12.078 0 0 1 .665-6.479L12 14z"/></svg>
      Students
    </div>
    <div class="nav-item" onclick="navigate('attendance',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
      Attendance
    </div>
    <div class="nav-item" onclick="navigate('finance',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      Finance
    </div>
    <div class="nav-item" onclick="navigate('notice',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
      Notice
      <span class="nav-badge">5</span>
    </div>
    <div class="nav-item" onclick="navigate('calendar',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
      Calendar
    </div>
    <div class="nav-item" onclick="navigate('library',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
      Library
    </div>
    <div class="nav-item" onclick="navigate('messages',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
      Messages
      <span class="nav-badge">3</span>
    </div>
  </div>

  <div class="sidebar-section" style="margin-top:auto">
    <div class="sidebar-section-label">Other</div>
    <div class="nav-item" onclick="navigate('profile',this)">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
      Profile
    </div>
    <div class="nav-item">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
      Setting
    </div>
  </div>

  <div class="sidebar-promo">
    <strong>Manage Smarter</strong>
    Keep all your school data in one place, anytime.
    <button>Download the App</button>
  </div>
</aside>

<!-- ── MAIN ─────────────────────────────────── -->
<div class="main">
  <!-- TOPBAR -->
  <div class="topbar">
    <div class="topbar-search">
      <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      <input type="text" placeholder="Search anything…" id="globalSearch">
    </div>
    <div class="topbar-actions">
      <div class="icon-btn">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
      </div>
      <div class="icon-btn" style="position:relative">
        <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
        <div class="notif-dot"></div>
      </div>
      <div class="user-chip">
        <div class="avatar">LA</div>
        <div class="user-info">
          <div class="user-name">Linda Adora</div>
          <div class="user-role">Admin</div>
        </div>
      </div>
    </div>
  </div>

  <div class="content">

    <!-- ═══════════════════════════════════════
         PAGE: DASHBOARD
    ════════════════════════════════════════════ -->
    <div class="page active" id="page-dashboard">
      <div class="page-header">
        <div>
          <div class="page-title">Dashboard</div>
          <div class="page-subtitle">Welcome back, Linda! Here's what's happening today.</div>
        </div>
        <button class="btn btn-primary" onclick="navigate('attendance',document.querySelector('[onclick*=attendance]'))">
          <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
          New Record
        </button>
      </div>

      <div class="stat-grid">
        <div class="stat-card">
          <div class="stat-icon" style="background:#EFF6FF">
            <svg fill="none" stroke="#2563EB" stroke-width="2" viewBox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5z"/><path d="M12 14l6.16-3.422a12.083 12.083 0 0 1 .665 6.479A11.952 11.952 0 0 0 12 20.055a11.952 11.952 0 0 0-6.824-2.998 12.078 12.078 0 0 1 .665-6.479L12 14z"/></svg>
          </div>
          <div class="stat-label">Total Students</div>
          <div class="stat-value">{{ $students }}</div>
          <div class="stat-change">↑ 4.2% from last month</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:#F0FDF4">
            <svg fill="none" stroke="#10B981" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </div>
          <div class="stat-label">Teaching Staff</div>
          <div class="stat-value">86</div>
          <div class="stat-change">↑ 1 new this week</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:#FFFBEB">
            <svg fill="none" stroke="#F59E0B" stroke-width="2" viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
          </div>
          <div class="stat-label">Attendance Rate</div>
          <div class="stat-value">94.7%</div>
          <div class="stat-change">↑ 0.3% this week</div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:#FDF4FF">
            <svg fill="none" stroke="#8B5CF6" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
          </div>
          <div class="stat-label">Monthly Budget</div>
          <div class="stat-value">$48,200</div>
          <div class="stat-change down">↓ $1,200 over plan</div>
        </div>
      </div>

      <div class="dashboard-grid">
        <!-- Recent Students -->
        <div class="card">
          <div style="padding:16px 20px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between;">
            <div style="font-weight:600; font-size:15px;">Recent Enrollments</div>
            <button class="btn btn-ghost" style="padding:5px 10px; font-size:12px;" onclick="navigate('students',document.querySelector('[onclick*=students]'))">View all</button>
          </div>
          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Student</th><th>Class</th><th>Status</th><th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:#3B82F6">LJ</div> Lucas Johnson</div></td><td>10A</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Active</span></td><td style="color:var(--muted)">Apr 01</td></tr>
                <tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:#8B5CF6">EP</div> Emily Peterson</div></td><td>9B</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Active</span></td><td style="color:var(--muted)">Apr 02</td></tr>
                <tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:#F59E0B">MB</div> Michael Brown</div></td><td>11C</td><td><span class="tag" style="background:#FFFBEB;color:#92400E">On Leave</span></td><td style="color:var(--muted)">Mar 28</td></tr>
                <tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:#10B981">HW</div> Hannah White</div></td><td>8A</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Active</span></td><td style="color:var(--muted)">Mar 25</td></tr>
                <tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:#EF4444">OM</div> Oliver Martinez</div></td><td>12B</td><td><span class="tag" style="background:#FEF2F2;color:#B91C1C">Inactive</span></td><td style="color:var(--muted)">Mar 20</td></tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Right column -->
        <div style="display:flex; flex-direction:column; gap:16px;">
          <!-- Quick stats -->
          <div class="card" style="padding:16px 20px;">
            <div style="font-weight:600; font-size:14px; margin-bottom:14px;">Attendance Today</div>
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px;">
              <div style="background:var(--blue-light); border-radius:8px; padding:12px; text-align:center;">
                <div style="font-size:22px; font-weight:700; color:var(--blue)">1,187</div>
                <div style="font-size:11px; color:var(--muted); margin-top:2px;">Present</div>
              </div>
              <div style="background:#FEF2F2; border-radius:8px; padding:12px; text-align:center;">
                <div style="font-size:22px; font-weight:700; color:var(--red)">97</div>
                <div style="font-size:11px; color:var(--muted); margin-top:2px;">Absent</div>
              </div>
              <div style="background:#FFFBEB; border-radius:8px; padding:12px; text-align:center;">
                <div style="font-size:22px; font-weight:700; color:var(--amber)">34</div>
                <div style="font-size:11px; color:var(--muted); margin-top:2px;">Late</div>
              </div>
              <div style="background:#F0FDF4; border-radius:8px; padding:12px; text-align:center;">
                <div style="font-size:22px; font-weight:700; color:var(--green)">94.7%</div>
                <div style="font-size:11px; color:var(--muted); margin-top:2px;">Rate</div>
              </div>
            </div>
          </div>

          <!-- Upcoming events -->
          <div class="card">
            <div style="padding:14px 16px; border-bottom:1px solid var(--border); font-weight:600; font-size:14px;">Upcoming Events</div>
            <div class="agenda-item">
              <div class="agenda-dot" style="background:var(--blue)"></div>
              <div>
                <div class="agenda-title">Science Fair Setup</div>
                <div class="agenda-sub">Today · Science Club</div>
              </div>
            </div>
            <div class="agenda-item">
              <div class="agenda-dot" style="background:var(--amber)"></div>
              <div>
                <div class="agenda-title">Teacher Meeting</div>
                <div class="agenda-sub">May 8 · 11:00 AM</div>
              </div>
            </div>
            <div class="agenda-item">
              <div class="agenda-dot" style="background:var(--green)"></div>
              <div>
                <div class="agenda-title">Varsity Track Meet</div>
                <div class="agenda-sub">May 8 · Track Team</div>
              </div>
            </div>
            <div class="agenda-item" style="border-bottom:none">
              <div class="agenda-dot" style="background:var(--purple)"></div>
              <div>
                <div class="agenda-title">Parents Meeting</div>
                <div class="agenda-sub">May 8 · 3:00 PM</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: TEACHERS
    ════════════════════════════════════════════ -->
    <div class="page" id="page-teachers">
      <div class="page-header">
        <div><div class="page-title">Teachers</div><div class="page-subtitle">Manage teaching staff and assignments</div></div>
        <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Add Teacher</button>
      </div>
      <div class="card">
        <div style="padding:14px 16px; border-bottom:1px solid var(--border); display:flex; gap:8px; align-items:center;">
          <div class="topbar-search" style="max-width:220px; height:32px;"><svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg><input type="text" placeholder="Search teachers…"></div>
          <select class="select-pill"><option>All Subjects</option><option>Math</option><option>Science</option><option>English</option><option>History</option></select>
        </div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Name</th><th>Subject</th><th>Class</th><th>Experience</th><th>Students</th><th>Status</th><th>Action</th></tr></thead>
            <tbody id="teachers-tbody"></tbody>
          </table>
        </div>
        <div class="pagination" id="teachers-pagination"></div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: STUDENTS
    ════════════════════════════════════════════ -->
    <div class="page" id="page-students">
      <div class="page-header">
        <div><div class="page-title">Students</div><div class="page-subtitle">1,284 enrolled students</div></div>
        <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Enroll Student</button>
      </div>
      <div class="card">
        <div style="padding:14px 16px; border-bottom:1px solid var(--border); display:flex; gap:8px;">
          <div class="topbar-search" style="max-width:220px; height:32px;"><svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg><input type="text" placeholder="Search students…"></div>
          <select class="select-pill"><option>All Classes</option><option>Grade 8</option><option>Grade 9</option><option>Grade 10</option><option>Grade 11</option><option>Grade 12</option></select>
          <select class="select-pill"><option>All Status</option><option>Active</option><option>On Leave</option><option>Inactive</option></select>
        </div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Name</th><th>Student ID</th><th>Class</th><th>Parent</th><th>GPA</th><th>Status</th><th>Action</th></tr></thead>
            <tbody id="students-tbody"></tbody>
          </table>
        </div>
        <div class="pagination" id="students-pagination"></div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: ATTENDANCE
    ════════════════════════════════════════════ -->
    <div class="page" id="page-attendance">
      <div class="page-header">
        <div><div class="page-title">Attendance</div></div>
        <div style="display:flex;gap:8px;align-items:center;">
          <select class="select-pill"><option>Apr 2030</option></select>
          <select class="select-pill"><option>Week 2–3</option></select>
          <select class="select-pill"><option>Class 11A</option><option>Class 10A</option><option>Class 9B</option></select>
        </div>
      </div>
      <div class="card">
        <div class="table-wrap">
          <table>
            <thead>
              <tr>
                <th style="min-width:140px">Student Name</th>
                <th>08</th><th>09</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th>
                <th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th><th>21</th>
              </tr>
            </thead>
            <tbody id="attendance-tbody"></tbody>
          </table>
        </div>
        <div class="pagination">
          <span style="font-size:12px;color:var(--muted);margin-right:auto">Previous</span>
          <button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">4</button><span style="padding:0 4px;color:var(--muted)">…</span><button class="page-btn">17</button>
          <span style="font-size:12px;color:var(--muted);margin-left:auto">Next</span>
        </div>
        <div style="padding:12px 20px;border-top:1px solid var(--border);display:flex;gap:16px;font-size:12px;color:var(--muted)">
          <span><span class="att-dot p" style="width:16px;height:16px;font-size:9px;margin-right:5px">P</span>Present</span>
          <span><span class="att-dot a" style="width:16px;height:16px;font-size:9px;margin-right:5px">A</span>Absent</span>
          <span><span class="att-dot l" style="width:16px;height:16px;font-size:9px;margin-right:5px">L</span>Late</span>
          <span><span class="att-dot h" style="width:16px;height:16px;font-size:9px;margin-right:5px">–</span>Holiday</span>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: FINANCE
    ════════════════════════════════════════════ -->
    <div class="page" id="page-finance">
      <div class="page-header">
        <div><div class="page-title">School Expenses</div><div class="page-subtitle">April 2030 · All Categories</div></div>
        <div style="display:flex;gap:8px;">
          <select class="select-pill"><option>Apr 2030</option></select>
          <select class="select-pill"><option>All Categories</option><option>Maintenance</option><option>Laboratory</option><option>Library</option></select>
          <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Add Expense</button>
        </div>
      </div>

      <div class="finance-summary">
        <div class="stat-card">
          <div class="stat-label">Total Expenses</div>
          <div class="stat-value" style="font-size:22px">$48,200</div>
          <div style="margin-top:10px;"><div class="progress-bar"><div class="progress-fill" style="width:80%;background:var(--red)"></div></div></div>
          <div style="font-size:11px;color:var(--muted);margin-top:4px">80% of $60,000 budget</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Budget Remaining</div>
          <div class="stat-value" style="font-size:22px;color:var(--green)">$11,800</div>
          <div style="margin-top:10px;"><div class="progress-bar"><div class="progress-fill" style="width:20%;background:var(--green)"></div></div></div>
          <div style="font-size:11px;color:var(--muted);margin-top:4px">20% remaining</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Transactions</div>
          <div class="stat-value" style="font-size:22px">10</div>
          <div class="stat-change" style="margin-top:6px">↑ 3 more than last month</div>
        </div>
      </div>

      <div class="card">
        <div class="table-wrap">
          <table>
            <thead><tr><th>ID</th><th>Category</th><th>Expense</th><th>Quantity</th><th>Amount</th><th>Payment Date</th><th>Action</th></tr></thead>
            <tbody id="finance-tbody"></tbody>
          </table>
        </div>
        <div class="pagination">
          <span style="font-size:12px;color:var(--muted);margin-right:auto">Previous</span>
          <button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button><button class="page-btn">4</button><button class="page-btn">5</button>
          <span style="font-size:12px;color:var(--muted);margin-left:auto">Next</span>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: NOTICE
    ════════════════════════════════════════════ -->
    <div class="page" id="page-notice">
      <div class="page-header">
        <div><div class="page-title">Notice Board</div><div class="page-subtitle">Page 1 of 12</div></div>
        <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Post Notice</button>
      </div>
      <div style="display:grid;grid-template-columns:1fr 340px;gap:16px;">
        <div class="card" id="notice-list"></div>
        <!-- Detail panel -->
        <div class="card" id="notice-detail">
          <div style="padding:0">
            <div style="height:120px;background:linear-gradient(135deg,#2563EB,#0EA5E9);border-radius:var(--radius) var(--radius) 0 0;display:flex;align-items:center;justify-content:center;">
              <svg width="40" height="40" fill="none" stroke="rgba(255,255,255,.7)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
            </div>
            <div style="padding:16px" id="notice-detail-content">
              <p style="font-size:12px;color:var(--muted)">Select a notice to read more</p>
            </div>
          </div>
        </div>
      </div>
      <div style="display:flex;justify-content:space-between;align-items:center;margin-top:14px;padding:0 4px;">
        <span style="font-size:13px;color:var(--muted)">Previous</span>
        <span style="font-size:13px;color:var(--muted)">Page 1 of 12</span>
        <span style="font-size:13px;color:var(--blue);cursor:pointer;font-weight:500">Next</span>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: CALENDAR
    ════════════════════════════════════════════ -->
    <div class="page" id="page-calendar">
      <div class="page-header">
        <div><div class="page-title">Calendar</div></div>
        <div style="display:flex;gap:8px;">
          <button class="btn btn-ghost">Today</button>
          <button class="btn btn-ghost" id="cal-prev">‹</button>
          <button class="btn btn-ghost" id="cal-next">›</button>
          <span id="cal-month-label" style="display:flex;align-items:center;font-weight:600;font-size:15px;padding:0 6px;"></span>
        </div>
      </div>
      <div class="cal-grid">
        <div class="card" style="padding:20px">
          <div class="cal-month-grid" id="cal-days-labels"></div>
          <div class="cal-month-grid" id="cal-days" style="margin-top:4px;"></div>
        </div>
        <div class="card">
          <div style="padding:14px 16px;border-bottom:1px solid var(--border);font-weight:600;font-size:14px" id="agenda-date-label">Agenda</div>
          <div id="agenda-items"></div>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: LIBRARY
    ════════════════════════════════════════════ -->
    <div class="page" id="page-library">
      <div class="page-header">
        <div><div class="page-title">Library</div><div class="page-subtitle">4,820 books in collection</div></div>
        <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Add Book</button>
      </div>
      <div class="card">
        <div style="padding:14px 16px;border-bottom:1px solid var(--border);display:flex;gap:8px;">
          <div class="topbar-search" style="max-width:240px;height:32px;"><svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg><input type="text" placeholder="Search by title or author…"></div>
          <select class="select-pill"><option>All Genres</option><option>Science</option><option>History</option><option>Math</option><option>Literature</option><option>Arts</option></select>
        </div>
        <div class="table-wrap">
          <table>
            <thead><tr><th>Title</th><th>Author</th><th>Genre</th><th>Copies</th><th>Available</th><th>Status</th></tr></thead>
            <tbody>
              <tr><td>The Art of Learning</td><td>Josh Waitzkin</td><td>Self-help</td><td>5</td><td>3</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Available</span></td></tr>
              <tr><td>Brief History of Time</td><td>Stephen Hawking</td><td>Science</td><td>4</td><td>0</td><td><span class="tag" style="background:#FEF2F2;color:#B91C1C">Checked Out</span></td></tr>
              <tr><td>The Great Gatsby</td><td>F. Scott Fitzgerald</td><td>Literature</td><td>8</td><td>6</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Available</span></td></tr>
              <tr><td>Calculus: Early Transcendentals</td><td>James Stewart</td><td>Math</td><td>12</td><td>7</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Available</span></td></tr>
              <tr><td>World History: Patterns</td><td>R. Ellis et al.</td><td>History</td><td>6</td><td>1</td><td><span class="tag" style="background:#FFFBEB;color:#92400E">Low Stock</span></td></tr>
              <tr><td>Biology: Life on Earth</td><td>Audesirk et al.</td><td>Science</td><td>10</td><td>8</td><td><span class="tag" style="background:#F0FDF4;color:#15803D">Available</span></td></tr>
            </tbody>
          </table>
        </div>
        <div class="pagination">
          <span style="font-size:12px;color:var(--muted);margin-right:auto">Previous</span>
          <button class="page-btn active">1</button><button class="page-btn">2</button><button class="page-btn">3</button>
          <span style="font-size:12px;color:var(--muted);margin-left:auto">Next</span>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: MESSAGES
    ════════════════════════════════════════════ -->
    <div class="page" id="page-messages">
      <div class="page-header" style="margin-bottom:14px">
        <div><div class="page-title">Messages</div></div>
        <button class="btn btn-primary"><svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>New Message</button>
      </div>
      <div class="card" style="overflow:hidden">
        <div class="msg-layout">
          <div class="msg-list" id="msg-list"></div>
          <div class="chat-area">
            <div class="chat-header">
              <div class="avatar" id="chat-avatar" style="width:36px;height:36px;border-radius:8px;font-size:13px">DR</div>
              <div>
                <div style="font-weight:600;font-size:14px" id="chat-name">Dr. Lila Ramirez</div>
                <div style="font-size:11.5px;color:var(--green)">● Online</div>
              </div>
            </div>
            <div class="chat-messages" id="chat-messages"></div>
            <div class="chat-input-area">
              <input class="chat-input" type="text" placeholder="Type a message…" id="chat-input" onkeydown="if(event.key==='Enter')sendMsg()">
              <button class="btn btn-primary" onclick="sendMsg()">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══════════════════════════════════════
         PAGE: PROFILE
    ════════════════════════════════════════════ -->
    <div class="page" id="page-profile">
      <div class="page-header">
        <div><div class="page-title">My Profile</div></div>
        <button class="btn btn-primary">Save Changes</button>
      </div>
      <div style="display:grid;grid-template-columns:280px 1fr;gap:16px;">
        <div class="card" style="padding:24px;text-align:center;">
          <div style="width:80px;height:80px;border-radius:16px;background:var(--blue);color:#fff;display:flex;align-items:center;justify-content:center;font-size:28px;font-weight:600;margin:0 auto 14px">LA</div>
          <div style="font-size:17px;font-weight:600">Linda Adora</div>
          <div style="font-size:13px;color:var(--muted);margin-top:4px">System Administrator</div>
          <div style="margin-top:14px;padding-top:14px;border-top:1px solid var(--border);font-size:12.5px;color:var(--muted);line-height:2;">
            <div>📧 linda.adora@school.edu</div>
            <div>📞 +82 1234 5678</div>
            <div>🏫 Main Campus, Block A</div>
          </div>
        </div>
        <div class="card" style="padding:24px;">
          <div style="font-weight:600;font-size:15px;margin-bottom:18px;">Personal Information</div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;">
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">First Name</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="Linda"></div>
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">Last Name</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="Adora"></div>
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">Email</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="linda.adora@school.edu"></div>
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">Phone</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="+82 1234 5678"></div>
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">Role</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="Administrator"></div>
            <div><label style="font-size:12px;color:var(--muted);font-weight:500;display:block;margin-bottom:5px">Department</label><input style="width:100%;border:1px solid var(--border);border-radius:8px;padding:9px 12px;font-family:inherit;font-size:13px;background:var(--bg);color:var(--text);outline:none;" value="Administration"></div>
          </div>
        </div>
      </div>
    </div>

  </div><!-- /content -->
</div><!-- /main -->

<script>
// ══ NAVIGATION ══════════════════════════════
function navigate(page, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + page).classList.add('active');
  if (el) el.classList.add('active');
}

// ══ DATA ════════════════════════════════════
const colors = ['#3B82F6','#8B5CF6','#10B981','#F59E0B','#EF4444','#0EA5E9','#EC4899','#6366F1'];
const initials = n => n.split(' ').map(w=>w[0]).join('').slice(0,2).toUpperCase();

const teachers = [
  {name:'Dr. Sarah Collins',subject:'Mathematics',class:'10A, 11B',exp:'8 yrs',students:62,status:'Active'},
  {name:'Mr. James Wu',subject:'Physics',class:'11A, 12C',exp:'5 yrs',students:54,status:'Active'},
  {name:'Ms. Priya Mehta',subject:'English',class:'9A, 9B',exp:'11 yrs',students:68,status:'Active'},
  {name:'Mr. David Osei',subject:'History',class:'10B, 10C',exp:'3 yrs',students:46,status:'On Leave'},
  {name:'Ms. Laura Stein',subject:'Chemistry',class:'11C, 12A',exp:'7 yrs',students:58,status:'Active'},
  {name:'Mr. Kenji Tanaka',subject:'Art & Design',class:'8A, 8B',exp:'6 yrs',students:44,status:'Active'},
  {name:'Ms. Amara Diallo',subject:'Biology',class:'10A, 11A',exp:'9 yrs',students:60,status:'Active'},
  {name:'Mr. Carlos Ruiz',subject:'P.E.',class:'All Grades',exp:'4 yrs',students:120,status:'Active'},
];

const students = [
  {name:'Lucas Johnson',id:'STU-001',class:'10A',parent:'Mark Johnson',gpa:'3.8',status:'Active'},
  {name:'Emily Peterson',id:'STU-002',class:'9B',parent:'Susan Peterson',gpa:'3.5',status:'Active'},
  {name:'Michael Brown',id:'STU-003',class:'11C',parent:'David Brown',gpa:'2.9',status:'On Leave'},
  {name:'Hannah White',id:'STU-004',class:'8A',parent:'Lisa White',gpa:'4.0',status:'Active'},
  {name:'Oliver Martinez',id:'STU-005',class:'12B',parent:'Carlos Martinez',gpa:'3.1',status:'Inactive'},
  {name:'Isabella Garcia',id:'STU-006',class:'10A',parent:'Ana Garcia',gpa:'3.7',status:'Active'},
  {name:'Ethan Lee',id:'STU-007',class:'9A',parent:'Thomas Lee',gpa:'3.3',status:'Active'},
  {name:'Sophia Wilson',id:'STU-008',class:'11A',parent:'Kate Wilson',gpa:'3.9',status:'Active'},
  {name:'Aiden Taylor',id:'STU-009',class:'8B',parent:'James Taylor',gpa:'2.7',status:'Active'},
  {name:'Ava Smith',id:'STU-010',class:'12A',parent:'Nancy Smith',gpa:'4.0',status:'Active'},
];

const attStudents = ['Lucas Johnson','Emily Peterson','Michael Brown','Hannah White','Oliver Martinez','Isabella Garcia','Ethan Lee','Sophia Wilson','Aiden Taylor','Ava Smith'];
const attTypes = ['p','p','p','a','p','p','l','p','p','p','p','h','h','p'];

const expenses = [
  {id:'EX01',cat:'Laboratory',expense:'Chemicals',qty:'100 units',amount:'$500',date:'04/05/2024'},
  {id:'EX02',cat:'Maintenance',expense:'HVAC Repair',qty:'1 service',amount:'$2000',date:'04/05/2024'},
  {id:'EX03',cat:'Boarding Equipment',expense:'Bedding Sets',qty:'50 sets',amount:'$2500',date:'04/15/2024'},
  {id:'EX04',cat:'Library',expense:'Books Acquisition',qty:'200 books',amount:'$3000',date:'04/20/2024'},
  {id:'EX05',cat:'Sports',expense:'Basketball Gear',qty:'30 items',amount:'$1500',date:'04/22/2024'},
  {id:'EX06',cat:'IT Infrastructure',expense:'Computers Upgrade',qty:'10 pcs',amount:'$10000',date:'04/25/2024'},
  {id:'EX07',cat:'Transportation',expense:'Bus Maintenance',qty:'3 buses',amount:'$4500',date:'04/08/2024'},
  {id:'EX08',cat:'Cafeteria',expense:'Kitchen Equipment Upgrade',qty:'5 items',amount:'$8000',date:'04/18/2024'},
  {id:'EX09',cat:'Arts & Crafts',expense:'Supplies Purchase',qty:'100 kits',amount:'$1000',date:'04/22/2024'},
  {id:'EX10',cat:'Maintenance',expense:'Painting School Building',qty:'1 service',amount:'$7000',date:'04/28/2024'},
];

const notices = [
  {title:'Welcome Back to School!',by:'Principal Linda Carter',date:'August 1, 2024',body:"As we embark on another exciting academic year, let's embrace the opportunities that lie ahead. We're thrilled to welcome new faces and reunite with returning students. Don't miss our opening assembly on August 5th!",tag:'General',tagColor:'#2563EB',color:'#2563EB'},
  {title:'Fall Sports Tryouts Schedule',by:'Coach Marcus Reed',date:'August 15, 2024',body:"Get ready to show your spirit and skills! Tryouts for soccer, volleyball, and football start next week. Check the gym bulletin board for exact dates and required gear. Go Eagles!",tag:'Sports',tagColor:'#10B981',color:'#10B981'},
  {title:'Library Hours Extension',by:'Librarian Sarah Knox',date:'September 8, 2024',body:"Attention students! To support your exam preparation, the library will offer extended hours starting September 15th. Join us for additional study sessions and access thousands of resources!",tag:'Academic',tagColor:'#8B5CF6',color:'#8B5CF6'},
  {title:'Flu Vaccination Clinic',by:'Nurse Emily White',date:'October 15, 2024',body:"Protect yourself this flu season! The school nurse's office will host a vaccination clinic on October 20th. Sign up in the main office. Vaccines are free and available to all students and staff.",tag:'Health',tagColor:'#F59E0B',color:'#F59E0B'},
  {title:'Annual Food Drive Kickoff',by:'Student Council · Tom Briggs',date:'November 1, 2024',body:"Let's make a difference together! Our annual food drive starts November 5th. Please bring non-perishable food items to Room 108. Help us reach our goal to collect over 2,000 pounds of food for local food banks.",tag:'Community',tagColor:'#EF4444',color:'#EF4444'},
];

const msgs = [
  {name:'Dr. Lila Ramirez',role:'Class lead',time:'9:23 AM',preview:'Good morning! The attendance report is due by April 30th.',color:'#2563EB',unread:false},
  {name:'Ms. Heather Morris',role:'Teacher',time:'8:15 AM',preview:"Don't forget the staff meeting on digital tools scheduled for May 5th.",color:'#8B5CF6',unread:true},
  {name:'Staff Coordination',role:'Group',time:'Yesterday',preview:"Meeting agenda items are due by end of this month. Please submit.",color:'#10B981',unread:false},
  {name:'Officer Dan Brooks',role:'Security',time:'Yesterday',preview:'New security protocol effective May 1st. Please familiarize yourself.',color:'#F59E0B',unread:false},
  {name:'Ms. Tina Goldberg',role:'Finance',time:'2 days ago',preview:'Reminder: Major IT system upgrade on May — mark your calendars.',color:'#0EA5E9',unread:true},
  {name:'Mr. Roberto Gracias',role:'Counselor',time:'2 days ago',preview:'Students needing academic review are listed in the attached file.',color:'#EC4899',unread:false},
  {name:'Mr. Reed',role:'Science Dept.',time:'3 days ago',preview:'Science club meeting today at lunch or account for the additional.',color:'#6366F1',unread:true},
  {name:'Nurse Emily',role:'Health Office',time:'3 days ago',preview:'Please ensure you have signed the consent forms.',color:'#EF4444',unread:false},
];

const conversations = {
  0: [
    {me:false,text:"Good morning, Linda! Just a reminder that the April attendance report is due by the 30th.",time:"9:23 AM"},
    {me:true,text:"Good morning! Thanks for the heads up. I'll have it ready by the 28th.",time:"9:25 AM"},
    {me:false,text:"Perfect. Also, can you check if Class 11A's records are complete? A few entries seem to be missing.",time:"9:26 AM"},
    {me:true,text:"I'll look into it right now and get back to you shortly.",time:"9:28 AM"},
  ],
  1: [
    {me:false,text:"Don't forget the staff meeting on digital tools scheduled for May 5th at 11:00 AM.",time:"8:15 AM"},
    {me:true,text:"Got it! I've added it to the calendar. Will the training materials be shared beforehand?",time:"8:18 AM"},
  ],
};

let activeConv = 0;

// ══ RENDER FUNCTIONS ════════════════════════
function renderTeachers() {
  const tbody = document.getElementById('teachers-tbody');
  tbody.innerHTML = teachers.map((t,i)=>`
    <tr>
      <td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:${colors[i%colors.length]}">${initials(t.name)}</div>${t.name}</div></td>
      <td>${t.subject}</td><td style="color:var(--muted)">${t.class}</td>
      <td style="color:var(--muted)">${t.exp}</td>
      <td style="font-weight:500">${t.students}</td>
      <td><span class="tag" style="background:${t.status==='Active'?'#F0FDF4':'#FFFBEB'};color:${t.status==='Active'?'#15803D':'#92400E'}">${t.status}</span></td>
      <td><button class="btn btn-ghost" style="padding:4px 10px;font-size:11.5px">View</button></td>
    </tr>`).join('');
}

function renderStudents() {
  const tbody = document.getElementById('students-tbody');
  tbody.innerHTML = students.map((s,i)=>`
    <tr>
      <td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:${colors[i%colors.length]}">${initials(s.name)}</div>${s.name}</div></td>
      <td style="font-family:'DM Mono',monospace;font-size:12px;color:var(--muted)">${s.id}</td>
      <td>${s.class}</td><td style="color:var(--muted)">${s.parent}</td>
      <td style="font-weight:600;color:${parseFloat(s.gpa)>=3.5?'var(--green)':parseFloat(s.gpa)>=3?'var(--amber)':'var(--red)'}">${s.gpa}</td>
      <td><span class="tag" style="background:${s.status==='Active'?'#F0FDF4':s.status==='On Leave'?'#FFFBEB':'#FEF2F2'};color:${s.status==='Active'?'#15803D':s.status==='On Leave'?'#92400E':'#B91C1C'}">${s.status}</span></td>
      <td><button class="btn btn-ghost" style="padding:4px 10px;font-size:11.5px">Profile</button></td>
    </tr>`).join('');
}

function renderAttendance() {
  const tbody = document.getElementById('attendance-tbody');
  tbody.innerHTML = attStudents.map((name,i)=>{
    const cols = attTypes.map(t=>{
      const types = ['p','a','l','h'];
      const r = types[(i+types.indexOf(t))%types.length];
      const labels = {p:'P',a:'A',l:'L',h:'–'};
      return `<td style="text-align:center"><span class="att-dot ${r}">${labels[r]}</span></td>`;
    }).join('');
    return `<tr><td><div style="display:flex;align-items:center;gap:8px"><div class="avatar" style="background:${colors[i%colors.length]};width:26px;height:26px;font-size:10px">${initials(name)}</div>${name}</div></td>${cols}</tr>`;
  }).join('');
}

function renderFinance() {
  const tbody = document.getElementById('finance-tbody');
  tbody.innerHTML = expenses.map(e=>`
    <tr>
      <td style="font-family:'DM Mono',monospace;font-size:12px;color:var(--muted)">${e.id}</td>
      <td><span class="tag" style="background:var(--blue-light);color:var(--blue)">${e.cat}</span></td>
      <td style="font-weight:500">${e.expense}</td>
      <td style="color:var(--muted)">${e.qty}</td>
      <td style="font-weight:600">${e.amount}</td>
      <td style="color:var(--muted)">${e.date}</td>
      <td style="display:flex;gap:6px">
        <button class="btn btn-ghost" style="padding:4px 8px;font-size:11px">✏️</button>
        <button class="btn btn-ghost" style="padding:4px 8px;font-size:11px;color:var(--red)">🗑</button>
      </td>
    </tr>`).join('');
}

function renderNotices() {
  const list = document.getElementById('notice-list');
  list.innerHTML = notices.map((n,i)=>`
    <div class="notice-card" onclick="showNotice(${i})">
      <div class="notice-meta">
        <div class="notice-avatar" style="background:${n.color}">${initials(n.by)}</div>
        <div>
          <div class="notice-title">${n.title}</div>
          <div class="notice-by">${n.by}</div>
        </div>
        <span class="notice-date">${n.date}</span>
      </div>
      <div class="notice-body">${n.body}</div>
      <div style="margin-top:8px"><span class="tag" style="background:${n.color}18;color:${n.color}">${n.tag}</span></div>
    </div>`).join('');
  showNotice(0);
}

function showNotice(i) {
  const n = notices[i];
  document.getElementById('notice-detail-content').innerHTML = `
    <div class="notice-title" style="font-size:15px;margin-bottom:6px">${n.title}</div>
    <div style="font-size:12px;color:var(--muted);margin-bottom:10px">${n.by} · ${n.date}</div>
    <p style="font-size:13px;line-height:1.65;color:var(--muted)">${n.body}</p>
    <div style="margin-top:14px"><span class="tag" style="background:${n.color}18;color:${n.color}">${n.tag}</span></div>
    <button class="btn btn-primary" style="margin-top:16px;width:100%">Read Full Page</button>`;
}

// ══ CALENDAR ════════════════════════════════
let calDate = new Date(2030, 4, 1); // May 2030
const events = {8:[{title:'Science Fair Setup',sub:'Science Club',color:'var(--blue)'},
                    {title:'Teacher Meeting',sub:'11:00 AM · All Teachers',color:'var(--amber)'},
                    {title:'Varsity Track Meet',sub:'Track Team',color:'var(--green)'}],
                 15:[{title:'Library Extended Hours',sub:'From today',color:'var(--purple)'}],
                 21:[{title:'PTA Meeting',sub:'7:00 PM',color:'var(--red)'}],
                 28:[{title:'Board of Education',sub:'Main Hall',color:'var(--blue)'}],
                 31:[{title:'Last Day of School',sub:'End of Year',color:'var(--green)'}]};

function renderCalendar() {
  const y = calDate.getFullYear(), m = calDate.getMonth();
  document.getElementById('cal-month-label').textContent = calDate.toLocaleDateString('en-US',{month:'long',year:'numeric'});
  const labels = document.getElementById('cal-days-labels');
  labels.innerHTML = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'].map(d=>`<div class="cal-day-label">${d}</div>`).join('');
  const grid = document.getElementById('cal-days');
  const firstDay = new Date(y,m,1).getDay();
  const daysInMonth = new Date(y,m+1,0).getDate();
  const daysInPrev = new Date(y,m,0).getDate();
  const today = new Date();
  let cells = '';
  for(let i=0;i<firstDay;i++) {
    const d = daysInPrev - firstDay + 1 + i;
    cells += `<div class="cal-day other-month">${d}</div>`;
  }
  for(let d=1;d<=daysInMonth;d++) {
    const isToday = y===today.getFullYear()&&m===today.getMonth()&&d===today.getDate();
    const hasEv = events[d];
    cells += `<div class="cal-day${isToday?' today':''}${hasEv?' has-event':''}" onclick="showAgenda(${d})">${d}</div>`;
  }
  const remaining = 42 - firstDay - daysInMonth;
  for(let d=1;d<=remaining;d++) cells += `<div class="cal-day other-month">${d}</div>`;
  grid.innerHTML = cells;
  showAgenda(8);
}

function showAgenda(day) {
  const label = document.getElementById('agenda-date-label');
  const y = calDate.getFullYear(), m = calDate.getMonth();
  const date = new Date(y,m,day);
  label.textContent = date.toLocaleDateString('en-US',{weekday:'long',month:'long',day:'numeric'});
  const items = document.getElementById('agenda-items');
  const evs = events[day] || [];
  if(!evs.length) { items.innerHTML = '<div style="padding:20px 16px;font-size:13px;color:var(--muted)">No events scheduled.</div>'; return; }
  items.innerHTML = evs.map(e=>`
    <div class="agenda-item">
      <div class="agenda-dot" style="background:${e.color}"></div>
      <div><div class="agenda-title">${e.title}</div><div class="agenda-sub">${e.sub}</div></div>
    </div>`).join('');
}

document.getElementById('cal-prev').onclick = ()=>{ calDate.setMonth(calDate.getMonth()-1); renderCalendar(); };
document.getElementById('cal-next').onclick = ()=>{ calDate.setMonth(calDate.getMonth()+1); renderCalendar(); };

// ══ MESSAGES ════════════════════════════════
function renderMsgList() {
  document.getElementById('msg-list').innerHTML = msgs.map((m,i)=>`
    <div class="msg-item${i===activeConv?' active':''}" onclick="openConv(${i})">
      <div class="avatar" style="width:36px;height:36px;border-radius:8px;background:${m.color};font-size:12px;flex-shrink:0">${initials(m.name)}</div>
      <div style="flex:1;min-width:0;">
        <div style="display:flex;justify-content:space-between;"><span class="msg-item-name">${m.name}</span><span class="msg-item-time">${m.time}</span></div>
        <div class="msg-item-preview">${m.preview}</div>
      </div>
      ${m.unread?'<div class="unread-dot"></div>':''}
    </div>`).join('');
}

function openConv(i) {
  activeConv = i;
  msgs[i].unread = false;
  renderMsgList();
  const m = msgs[i];
  document.getElementById('chat-avatar').textContent = initials(m.name);
  document.getElementById('chat-avatar').style.background = m.color;
  document.getElementById('chat-name').textContent = m.name;
  const conv = conversations[i] || [{me:false,text:m.preview,time:m.time}];
  document.getElementById('chat-messages').innerHTML = conv.map(b=>`
    <div>
      <div class="bubble ${b.me?'me':'them'}">${b.text}</div>
      <div class="bubble-time" style="text-align:${b.me?'right':'left'}">${b.time}</div>
    </div>`).join('');
  document.getElementById('chat-messages').scrollTop = 99999;
}

function sendMsg() {
  const inp = document.getElementById('chat-input');
  const txt = inp.value.trim();
  if(!txt) return;
  if(!conversations[activeConv]) conversations[activeConv] = [{me:false,text:msgs[activeConv].preview,time:msgs[activeConv].time}];
  conversations[activeConv].push({me:true,text:txt,time:'Now'});
  inp.value = '';
  const msgs_el = document.getElementById('chat-messages');
  msgs_el.innerHTML += `<div><div class="bubble me">${txt}</div><div class="bubble-time" style="text-align:right">Now</div></div>`;
  msgs_el.scrollTop = 99999;
}

// ══ INIT ════════════════════════════════════
renderTeachers();
renderStudents();
renderAttendance();
renderFinance();
renderNotices();
renderCalendar();
renderMsgList();
openConv(0);
</script>
</body>
</html>