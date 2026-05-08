<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Belle Voix – Schedules</title>
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

  /* ── PAGE HEADER ── */
  .page-header { display: flex; align-items: flex-start; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 14px; }
  .page-header h1 { font-size: 24px; font-weight: 800; letter-spacing: -.3px; }
  .page-header .sub { font-size: 13px; color: var(--text-muted); margin-top: 3px; }
  .add-btn {
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
  .add-btn:hover { background: var(--brand-dark); transform: translateY(-1px); }
  .add-btn:active { transform: translateY(0); }

  /* ── CARD ── */
  .card { background: var(--card-bg); border: 1px solid var(--border); border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm); }

  /* ── VIEW TOGGLE + CONTROLS ── */
  .controls-row {
    display: flex; align-items: center; gap: 10px;
    padding: 16px 20px;
    border-bottom: 1px solid var(--border);
    flex-wrap: wrap;
  }
  .view-tabs {
    display: flex;
    border: 1px solid var(--border);
    border-radius: 9px;
    overflow: hidden;
    flex-shrink: 0;
  }
  .view-tab {
    padding: 7px 14px;
    font-size: 12.5px;
    font-weight: 600;
    font-family: inherit;
    border: none;
    background: #fff;
    color: var(--text-label);
    cursor: pointer;
    transition: background .15s, color .15s;
    border-right: 1px solid var(--border);
  }
  .view-tab:last-child { border-right: none; }
  .view-tab.active { background: var(--brand); color: #fff; }
  .view-tab:hover:not(.active) { background: var(--brand-light); color: var(--brand); }

  .nav-arrow {
    width: 32px; height: 32px;
    border: 1px solid var(--border);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    background: #fff;
    cursor: pointer;
    transition: background .15s, border-color .15s;
    flex-shrink: 0;
  }
  .nav-arrow:hover { background: var(--brand-light); border-color: var(--brand); }
  .nav-arrow svg { width: 14px; height: 14px; stroke: var(--text-label); fill: none; stroke-width: 2.5; }
  .nav-arrow:hover svg { stroke: var(--brand); }

  .period-label {
    font-size: 14px;
    font-weight: 700;
    color: var(--text-primary);
    min-width: 180px;
    text-align: center;
  }

  .today-btn {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 7px 14px;
    font-size: 12.5px;
    font-weight: 600;
    font-family: inherit;
    background: #fff;
    color: var(--text-label);
    cursor: pointer;
    transition: background .15s, color .15s, border-color .15s;
  }
  .today-btn:hover { background: var(--brand-light); color: var(--brand); border-color: var(--brand); }

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
  .filter-select:focus { border-color: var(--brand); background-color: #fff; }

  .filter-date-input {
    border: 1px solid var(--border);
    border-radius: 8px;
    padding: 8px 12px;
    font-size: 13px;
    font-family: inherit;
    color: var(--text-primary);
    background: var(--main-bg);
    outline: none;
    transition: border-color .15s;
  }
  .filter-date-input:focus { border-color: var(--brand); background-color: #fff; }

  .controls-spacer { flex: 1; }

  /* ── LIST VIEW ── */
  .list-view { padding: 0; }
  .list-group { border-bottom: 1px solid var(--border); }
  .list-group:last-child { border-bottom: none; }
  .list-group-header {
    padding: 10px 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: .07em;
    text-transform: uppercase;
    color: var(--text-muted);
    background: #fafbff;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .list-group-header .date-dot {
    width: 8px; height: 8px; border-radius: 50%; background: var(--brand); flex-shrink: 0;
  }
  .session-row {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 20px;
    border-bottom: 1px solid var(--border);
    transition: background .12s;
    animation: fadeIn .25s ease both;
  }
  .session-row:last-child { border-bottom: none; }
  .session-row:hover { background: var(--row-hover); }
  @keyframes fadeIn { from { opacity: 0; transform: translateY(4px); } to { opacity: 1; transform: none; } }

  .session-time-col {
    width: 90px;
    flex-shrink: 0;
    text-align: right;
  }
  .session-time-start { font-size: 13px; font-weight: 700; color: var(--text-primary); }
  .session-time-end   { font-size: 11px; color: var(--text-muted); margin-top: 2px; }

  .session-bar {
    width: 4px;
    border-radius: 4px;
    align-self: stretch;
    min-height: 38px;
    flex-shrink: 0;
  }

  .session-info { flex: 1; min-width: 0; }
  .session-title { font-size: 14px; font-weight: 700; margin-bottom: 4px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
  .session-meta { display: flex; flex-wrap: wrap; gap: 10px; }
  .session-meta-item {
    display: flex; align-items: center; gap: 4px;
    font-size: 12px; color: var(--text-muted);
  }
  .session-meta-item svg { width: 12px; height: 12px; stroke: currentColor; fill: none; stroke-width: 2; flex-shrink: 0; }

  .session-chips { display: flex; gap: 6px; flex-wrap: wrap; align-items: center; }
  .chip {
    display: inline-flex; align-items: center; gap: 4px;
    font-size: 11px; font-weight: 600;
    padding: 3px 9px;
    border-radius: 20px;
  }
  .chip-class   { background: var(--brand-light); color: var(--brand); }
  .chip-room    { background: #f0fdf4; color: #166534; }
  .chip-teacher { background: #fdf4ff; color: #7e22ce; }

  .session-action-btn {
    border: 1px solid var(--border);
    background: #fff;
    border-radius: 7px;
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 600;
    font-family: inherit;
    color: var(--text-label);
    cursor: pointer;
    transition: border-color .15s, color .15s, background .15s;
    white-space: nowrap;
  }
  .session-action-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }

  /* ── DAY / WEEK SHARED ── */
  .cal-scroll-wrap {
    overflow-y: auto;
    max-height: 640px;
    position: relative;
    scroll-behavior: smooth;
  }
  .cal-layout {
    display: flex;
    position: relative;
  }
  /* Sticky time gutter */
  .time-gutter {
    width: 64px;
    flex-shrink: 0;
    background: #fafbff;
    border-right: 1px solid var(--border);
    position: sticky;
    left: 0;
    z-index: 3;
  }
  .time-gutter-inner { position: relative; }
  .time-row-label {
    height: 64px; /* SLOT_H — must match JS */
    display: flex;
    align-items: flex-start;
    justify-content: flex-end;
    padding: 5px 8px 0 0;
    font-size: 10.5px;
    color: var(--text-muted);
    font-weight: 600;
    box-sizing: border-box;
  }
  /* Columns area */
  .cal-columns {
    flex: 1;
    position: relative;
    display: flex;
    min-width: 0;
  }
  .cal-col {
    flex: 1;
    position: relative;
    border-left: 1px solid var(--border);
    min-width: 120px;
  }
  /* Hour lines */
  .hour-line {
    position: absolute;
    left: 0; right: 0;
    border-top: 1px solid var(--border);
    pointer-events: none;
  }
  .half-hour-line {
    position: absolute;
    left: 0; right: 0;
    border-top: 1px dashed #f0f1f7;
    pointer-events: none;
  }

  /* ── EVENT BLOCKS ── */
  .cal-event {
    position: absolute;
    border-radius: 7px;
    padding: 5px 8px;
    font-size: 12px;
    overflow: hidden;
    cursor: pointer;
    transition: filter .15s, box-shadow .15s, transform .12s;
    z-index: 2;
    border-left-width: 3px;
    border-left-style: solid;
    box-sizing: border-box;
  }
  .cal-event:hover {
    filter: brightness(.93);
    box-shadow: 0 4px 14px rgba(0,0,0,.13);
    transform: scale(1.012);
    z-index: 4;
  }
  .cal-event-title { font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; line-height: 1.3; }
  .cal-event-sub   { font-size: 10.5px; opacity: .78; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 1px; }
  .cal-event-time  { font-size: 10px; opacity: .65; margin-top: 2px; }

  /* ── DAY VIEW HEADER ── */
  .day-view { padding: 0; }
  .day-header {
    display: flex;
    border-bottom: 1px solid var(--border);
    background: #fafbff;
    position: sticky;
    top: 0;
    z-index: 4;
  }
  .day-header-gutter {
    width: 64px;
    flex-shrink: 0;
    border-right: 1px solid var(--border);
  }
  .day-header-col {
    flex: 1;
    padding: 12px 16px;
    text-align: center;
    border-left: 1px solid var(--border);
  }
  .day-col-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .06em; }
  .day-col-date {
    font-size: 22px; font-weight: 800;
    width: 40px; height: 40px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 4px auto 0;
  }
  .day-col-date.today { background: var(--brand); color: #fff; }

  /* ── WEEK VIEW HEADER ── */
  .week-view { padding: 0; overflow-x: auto; }
  .week-header {
    display: flex;
    border-bottom: 1px solid var(--border);
    background: #fafbff;
    position: sticky;
    top: 0;
    z-index: 4;
    min-width: 760px;
  }
  .week-header-gutter {
    width: 64px;
    flex-shrink: 0;
    border-right: 1px solid var(--border);
  }
  .week-header-day {
    flex: 1;
    padding: 10px 8px;
    text-align: center;
    border-left: 1px solid var(--border);
    min-width: 100px;
  }
  .week-day-label { font-size: 10px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .06em; }
  .week-day-num {
    font-size: 17px; font-weight: 800;
    width: 32px; height: 32px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 3px auto 0;
  }
  .week-day-num.today { background: var(--brand); color: #fff; }

  /* ── CURRENT TIME INDICATOR ── */
  .now-line {
    position: absolute;
    left: 0; right: 0;
    z-index: 5;
    pointer-events: none;
    display: flex;
    align-items: center;
  }
  .now-line-dot {
    width: 10px; height: 10px;
    background: #ef4444;
    border-radius: 50%;
    margin-left: -5px;
    flex-shrink: 0;
  }
  .now-line-bar {
    flex: 1;
    height: 2px;
    background: #ef4444;
    opacity: .85;
  }

  /* ── MONTH VIEW ── */
  .month-view { padding: 0; }
  .month-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr);
  }
  .month-day-header {
    padding: 10px 0;
    text-align: center;
    font-size: 11px;
    font-weight: 700;
    color: var(--text-muted);
    text-transform: uppercase;
    letter-spacing: .06em;
    border-bottom: 1px solid var(--border);
    background: #fafbff;
  }
  .month-cell {
    min-height: 90px;
    border-right: 1px solid var(--border);
    border-bottom: 1px solid var(--border);
    padding: 6px;
    vertical-align: top;
    transition: background .12s;
  }
  .month-cell:nth-child(7n) { border-right: none; }
  .month-cell:hover { background: var(--row-hover); }
  .month-cell.other-month { opacity: .4; }
  .month-cell.today-cell { background: #f0f4ff; }
  .month-date {
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 4px;
    width: 24px; height: 24px;
    display: flex; align-items: center; justify-content: center;
    border-radius: 50%;
  }
  .month-date.today-date { background: var(--brand); color: #fff; }
  .month-event {
    font-size: 10.5px;
    font-weight: 600;
    padding: 2px 6px;
    border-radius: 4px;
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    cursor: pointer;
    transition: filter .15s;
  }
  .month-event:hover { filter: brightness(.92); }
  .month-more { font-size: 10px; color: var(--text-muted); font-weight: 600; padding: 1px 4px; cursor: pointer; }
  .month-more:hover { color: var(--brand); }

  /* ── YEAR VIEW ── */
  .year-view { padding: 20px; }
  .year-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 16px; }
  .mini-month { background: #fff; border: 1px solid var(--border); border-radius: 10px; overflow: hidden; }
  .mini-month-header {
    padding: 10px 12px;
    font-size: 12px; font-weight: 700;
    border-bottom: 1px solid var(--border);
    background: #fafbff;
    display: flex; align-items: center; justify-content: space-between;
  }
  .mini-month-header .session-count {
    font-size: 10px; font-weight: 600; color: var(--brand);
    background: var(--brand-light); padding: 2px 7px; border-radius: 20px;
  }
  .mini-cal { padding: 8px; }
  .mini-cal-header { display: grid; grid-template-columns: repeat(7, 1fr); margin-bottom: 4px; }
  .mini-cal-dh { font-size: 9px; font-weight: 700; text-align: center; color: var(--text-muted); padding: 2px 0; }
  .mini-cal-grid { display: grid; grid-template-columns: repeat(7, 1fr); }
  .mini-cal-day {
    font-size: 9.5px; text-align: center; padding: 2px 0;
    border-radius: 4px; cursor: default;
  }
  .mini-cal-day.has-event { background: var(--brand-light); color: var(--brand); font-weight: 700; cursor: pointer; }
  .mini-cal-day.is-today { background: var(--brand); color: #fff; font-weight: 700; }
  .mini-cal-day.faded { opacity: .3; }

  /* ── EMPTY STATE ── */
  .empty-state {
    padding: 60px 20px;
    text-align: center;
  }
  .empty-state svg { width: 48px; height: 48px; stroke: var(--text-muted); fill: none; stroke-width: 1.5; margin: 0 auto 14px; display: block; }
  .empty-state h3 { font-size: 16px; font-weight: 700; margin-bottom: 6px; }
  .empty-state p  { font-size: 13px; color: var(--text-muted); }

  /* ── STATS ROW ── */
  .stats-row { display: grid; grid-template-columns: repeat(auto-fill, minmax(160px, 1fr)); gap: 14px; margin-bottom: 20px; }
  .stat-card {
    background: #fff;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    padding: 16px 18px;
    box-shadow: var(--shadow-sm);
  }
  .stat-label { font-size: 11px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .06em; margin-bottom: 6px; }
  .stat-value { font-size: 24px; font-weight: 800; letter-spacing: -.5px; }
  .stat-sub { font-size: 11px; color: var(--text-muted); margin-top: 2px; }

  /* ── TABLE FOOTER ── */
  .view-footer {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 20px;
    border-top: 1px solid var(--border);
    background: #fafbff;
    flex-wrap: wrap;
    gap: 10px;
  }
  .tf-info { font-size: 13px; color: var(--text-muted); }
  .pagination { display: flex; gap: 4px; }
  .pg-btn { width: 30px; height: 30px; border: 1px solid var(--border); background: #fff; border-radius: 7px; font-size: 13px; font-weight: 600; font-family: inherit; color: var(--text-label); cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all .15s; }
  .pg-btn:hover { border-color: var(--brand); color: var(--brand); background: var(--brand-light); }
  .pg-btn.active { background: var(--brand); border-color: var(--brand); color: #fff; }

  /* ── MODAL ── */
  .overlay { display: none; position: fixed; inset: 0; background: rgba(0,0,0,.35); backdrop-filter: blur(3px); z-index: 50; align-items: center; justify-content: center; }
  .overlay.open { display: flex; }
  .modal { background: #fff; border-radius: 16px; padding: 28px; width: 100%; max-width: 520px; box-shadow: 0 20px 60px rgba(0,0,0,.2); animation: slideUp .2s ease; margin: 16px; }
  @keyframes slideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: none; } }
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

  /* ── SESSION DETAIL MODAL ── */
  .detail-field { margin-bottom: 14px; }
  .detail-field-label { font-size: 10px; font-weight: 700; color: var(--text-muted); text-transform: uppercase; letter-spacing: .07em; margin-bottom: 4px; }
  .detail-field-value { font-size: 14px; font-weight: 600; color: var(--text-primary); display: flex; align-items: center; gap: 6px; }
  .detail-field-value svg { width: 14px; height: 14px; stroke: var(--text-muted); fill: none; stroke-width: 2; }
  .detail-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }

  /* ── TOAST ── */
  .toast { position: fixed; bottom: 24px; right: 24px; background: #1a1d2e; color: #fff; padding: 12px 18px; border-radius: 10px; font-size: 13.5px; font-weight: 500; display: flex; align-items: center; gap: 8px; box-shadow: 0 8px 24px rgba(0,0,0,.2); transform: translateY(60px); opacity: 0; transition: all .3s ease; z-index: 999; }
  .toast.show { transform: translateY(0); opacity: 1; }

  /* ── VIEW TRANSITION ── */
  #viewContainer { transition: opacity .18s ease; }
  #viewContainer.fading { opacity: 0; }

  /* ── RESPONSIVE ── */
  @media (max-width: 900px) {
    .sidebar { width: 60px; }
    .sidebar-logo span, .sidebar-section-label, .nav-item span, .sidebar-promo { display: none; }
    .nav-item { justify-content: center; padding: 12px; margin: 2px 6px; }
    .main { margin-left: 60px; }
  }
  @media (max-width: 600px) {
    .content { padding: 16px; }
    .controls-row { flex-direction: column; align-items: stretch; }
    .view-tabs { width: 100%; }
    .view-tab { flex: 1; }
  }
</style>
</head>
<body>

<!-- SIDEBAR -->
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
    </div>
    <span>Belle voix</span>
  </div>
  <div class="sidebar-section-label">Menu</div>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg><span>Dashboard</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg><span>Teachers</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Students</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg><span>Attendance</span></a>
  <a class="nav-item active" href="#"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Schedules</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg><span>Finance</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg><span>Notice</span><span class="badge">5</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg><span>Library</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg><span>Messages</span><span class="badge">3</span></a>
  <div class="sidebar-section-label">Other</div>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg><span>Profile</span></a>
  <a class="nav-item" href="#"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 1 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 1 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 1 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 1 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 1 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 1 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 1 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 1 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg><span>Setting</span></a>
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
        <div class="avatar">AX</div>
        <div class="user-info"><div class="name">Adila XYZ</div><div class="role">Admin</div></div>
      </div>
    </div>
  </header>

  <div class="content">
    <!-- Page Header -->
    <div class="page-header">
      <div>
        <h1>Schedules</h1>
        <div class="sub" id="scheduleSubtitle">Loading sessions…</div>
      </div>
      <button class="add-btn" onclick="openBookingModal()">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
        Book Session
      </button>
    </div>

    <!-- Stats Row -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="stat-label">Total Sessions</div>
        <div class="stat-value" id="statTotal">—</div>
        <div class="stat-sub">All time</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">This Week</div>
        <div class="stat-value" id="statWeek">—</div>
        <div class="stat-sub">Sessions booked</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Today</div>
        <div class="stat-value" id="statToday">—</div>
        <div class="stat-sub">Sessions</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Teachers</div>
        <div class="stat-value" id="statTeachers">—</div>
        <div class="stat-sub">Active this month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Classrooms</div>
        <div class="stat-value" id="statRooms">—</div>
        <div class="stat-sub">In use</div>
      </div>
    </div>

    <!-- Main Card -->
    <div class="card">
      <!-- Controls Row -->
      <div class="controls-row">
        <!-- View Tabs -->
        <div class="view-tabs">
          <button class="view-tab active" onclick="switchView('list')">List</button>
          <button class="view-tab" onclick="switchView('day')">Day</button>
          <button class="view-tab" onclick="switchView('week')">Week</button>
          <button class="view-tab" onclick="switchView('month')">Month</button>
          <button class="view-tab" onclick="switchView('year')">Year</button>
        </div>

        <!-- Navigation -->
        <button class="nav-arrow" id="prevBtn" onclick="navigate(-1)">
          <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        </button>
        <div class="period-label" id="periodLabel">—</div>
        <button class="nav-arrow" id="nextBtn" onclick="navigate(1)">
          <svg viewBox="0 0 24 24"><polyline points="9 18 15 12 9 6"/></svg>
        </button>
        <button class="today-btn" onclick="goToday()">Today</button>

        <div class="controls-spacer"></div>

        <!-- Filters -->
        <select class="filter-select" id="filterTeacher" onchange="applyFilters()">
          <option value="">All Teachers</option>
        </select>
        <select class="filter-select" id="filterClass" onchange="applyFilters()">
          <option value="">All Classes</option>
        </select>
        <select class="filter-select" id="filterRoom" onchange="applyFilters()">
          <option value="">All Rooms</option>
        </select>
      </div>

      <!-- View Container -->
      <div id="viewContainer"></div>

      <!-- Footer (for list view) -->
      <div class="view-footer" id="viewFooter" style="display:none">
        <div class="tf-info" id="tfInfo"></div>
        <div class="pagination" id="pagination"></div>
      </div>
    </div>
  </div>
</div>

<!-- BOOKING MODAL -->
<div class="overlay" id="bookingOverlay" onclick="if(event.target===this)closeBookingModal()">
  <div class="modal">
    <div class="modal-header">
      <h2 id="bookingModalTitle">Book New Session</h2>
      <button type="button" class="close-btn" onclick="closeBookingModal()">✕</button>
    </div>
    <div class="form-grid">
      <div class="form-group full">
        <label>Teacher</label>
        <select id="b-teacher">
          <option value="">Select teacher</option>
        </select>
      </div>
      <div class="form-group full">
        <label>Class</label>
        <select id="b-class">
          <option value="">Select class</option>
        </select>
      </div>
      <div class="form-group full">
        <label>Classroom / Room</label>
        <select id="b-room">
          <option value="">Select room</option>
        </select>
      </div>
      <div class="form-group full">
        <label>Date</label>
        <input type="date" id="b-date"/>
      </div>
      <div class="form-group">
        <label>Start Time</label>
        <input type="time" id="b-start"/>
      </div>
      <div class="form-group">
        <label>End Time</label>
        <input type="time" id="b-end"/>
      </div>
    </div>
    <div class="modal-actions">
      <button type="button" class="btn-cancel" onclick="closeBookingModal()">Cancel</button>
      <button type="button" class="btn-submit" onclick="saveSession()">Book Session</button>
    </div>
  </div>
</div>

<!-- SESSION DETAIL MODAL -->
<div class="overlay" id="detailOverlay" onclick="if(event.target===this)closeDetailModal()">
  <div class="modal" style="max-width:460px">
    <div class="modal-header">
      <h2>Session Details</h2>
      <button type="button" class="close-btn" onclick="closeDetailModal()">✕</button>
    </div>
    <div id="detailContent"></div>
    <div class="modal-actions">
      <button type="button" class="btn-cancel" onclick="closeDetailModal()">Close</button>
      <button type="button" class="btn-submit" style="background:#dc2626" onclick="deleteSession()">Delete Session</button>
    </div>
  </div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"><span id="toastMsg"></span></div>

<script>
// ─── FAKE DATA ───────────────────────────────────────────────────────────────
const TEACHERS = [
  { id: 1, name: 'Emma Hartwell',   initials: 'EH', color: '#3b6ef8' },
  { id: 2, name: 'Luca Moretti',    initials: 'LM', color: '#8b5cf6' },
  { id: 3, name: 'Yasmine Benali',  initials: 'YB', color: '#10b981' },
  { id: 4, name: 'James Caldwell',  initials: 'JC', color: '#f59e0b' },
  { id: 5, name: 'Sofia Almeida',   initials: 'SA', color: '#ef4444' },
  { id: 6, name: 'Mehdi Tazi',      initials: 'MT', color: '#06b6d4' },
  { id: 7, name: 'Nora Lefebvre',   initials: 'NL', color: '#ec4899' },
];

const CLASSES = [
  { id: 1, name: 'Beginners A1'  },
  { id: 2, name: 'Elementary A2' },
  { id: 3, name: 'Pre-Int B1'    },
  { id: 4, name: 'Intermediate B2' },
  { id: 5, name: 'Upper-Int C1'  },
  { id: 6, name: 'Advanced C2'   },
  { id: 7, name: 'Conversation Club' },
  { id: 8, name: 'Kids Phonics'  },
];

const ROOMS = ['Room 101', 'Room 102', 'Room 103', 'Studio A', 'Studio B', 'Lab 1', 'Online'];

// Color palette for sessions
const SESSION_COLORS = [
  { bg: '#dbeafe', text: '#1d4ed8', border: '#93c5fd' },
  { bg: '#ede9fe', text: '#6d28d9', border: '#c4b5fd' },
  { bg: '#d1fae5', text: '#065f46', border: '#6ee7b7' },
  { bg: '#fef3c7', text: '#92400e', border: '#fcd34d' },
  { bg: '#fee2e2', text: '#991b1b', border: '#fca5a5' },
  { bg: '#cffafe', text: '#155e75', border: '#67e8f9' },
  { bg: '#fce7f3', text: '#9d174d', border: '#f9a8d4' },
];

// Generate realistic fake schedules
function makeDate(offsetDays) {
  const d = new Date();
  d.setDate(d.getDate() + offsetDays);
  return d.toISOString().slice(0, 10);
}

const RAW_SCHEDULES = [];
let scheduleId = 1;
const TIMES = [
  ['08:00','09:30'], ['09:45','11:15'], ['11:30','13:00'],
  ['14:00','15:30'], ['15:45','17:15'], ['17:30','19:00'], ['19:15','20:45']
];

// Spread sessions across -30 to +45 days
for (let dayOffset = -30; dayOffset <= 45; dayOffset++) {
  // Skip most days to be realistic; 60% chance of having sessions
  if (Math.abs(dayOffset) > 5 && Math.random() < 0.35) continue;
  const sessionCount = dayOffset >= -3 && dayOffset <= 5 ? 3 + Math.floor(Math.random()*4) : 1 + Math.floor(Math.random()*3);
  const usedSlots = new Set();
  for (let s = 0; s < sessionCount; s++) {
    const slotIdx = TIMES.findIndex((_,i) => !usedSlots.has(i) && Math.random() > 0.3);
    if (slotIdx === -1) continue;
    usedSlots.add(slotIdx);
    const teacherId = TEACHERS[Math.floor(Math.random()*TEACHERS.length)].id;
    const classId   = CLASSES[Math.floor(Math.random()*CLASSES.length)].id;
    const room      = ROOMS[Math.floor(Math.random()*ROOMS.length)];
    RAW_SCHEDULES.push({
      id: scheduleId++,
      teacher_id: teacherId,
      class_id: classId,
      classroom: room,
      date: makeDate(dayOffset),
      start_time: TIMES[slotIdx][0],
      end_time:   TIMES[slotIdx][1],
    });
  }
}

// Enrich with related objects
let schedules = RAW_SCHEDULES.map(s => ({
  ...s,
  teacher: TEACHERS.find(t => t.id === s.teacher_id),
  cls:     CLASSES.find(c => c.id === s.class_id),
}));

// ─── STATE ───────────────────────────────────────────────────────────────────
let currentView    = 'list';
let currentDate    = new Date();
let filtered       = [];
let listPage       = 1;
const LIST_PER     = 12;
let activeDetailId = null;

// ─── HELPERS ─────────────────────────────────────────────────────────────────
const pad2 = n => String(n).padStart(2, '0');
const MONTHS = ['January','February','March','April','May','June','July','August','September','October','November','December'];
const DAYS_SHORT = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
const DAYS_LONG  = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];

function formatDate(d) {
  const parts = d.split('-');
  return MONTHS[+parts[1]-1] + ' ' + parseInt(parts[2]) + ', ' + parts[0];
}
function fmt12(t) {
  if (!t) return '';
  const [h, m] = t.split(':').map(Number);
  return (h % 12 || 12) + ':' + pad2(m) + (h < 12 ? ' AM' : ' PM');
}
function todayStr() {
  return new Date().toISOString().slice(0, 10);
}
function dateStr(d) {
  return d.getFullYear() + '-' + pad2(d.getMonth()+1) + '-' + pad2(d.getDate());
}
function colorFor(teacherId) {
  return SESSION_COLORS[(teacherId - 1) % SESSION_COLORS.length];
}
function weekStart(d) {
  const dt = new Date(d);
  dt.setDate(dt.getDate() - dt.getDay());
  return dt;
}
function addDays(d, n) {
  const dt = new Date(d);
  dt.setDate(dt.getDate() + n);
  return dt;
}

// ─── FILTER HELPERS ───────────────────────────────────────────────────────────
function getFilters() {
  return {
    teacher: document.getElementById('filterTeacher').value,
    cls:     document.getElementById('filterClass').value,
    room:    document.getElementById('filterRoom').value,
  };
}
function matchFilter(s, f) {
  if (f.teacher && String(s.teacher_id) !== f.teacher) return false;
  if (f.cls     && String(s.class_id)   !== f.cls)     return false;
  if (f.room    && s.classroom          !== f.room)     return false;
  return true;
}

// ─── STATS ───────────────────────────────────────────────────────────────────
function updateStats() {
  const today = todayStr();
  const ws = dateStr(weekStart(new Date()));
  const we = dateStr(addDays(weekStart(new Date()), 6));
  document.getElementById('statTotal').textContent   = schedules.length;
  document.getElementById('statToday').textContent   = schedules.filter(s => s.date === today).length;
  document.getElementById('statWeek').textContent    = schedules.filter(s => s.date >= ws && s.date <= we).length;
  document.getElementById('statTeachers').textContent= new Set(schedules.filter(s => s.date.startsWith(currentDate.getFullYear()+'-'+pad2(currentDate.getMonth()+1))).map(s => s.teacher_id)).size;
  document.getElementById('statRooms').textContent   = new Set(schedules.map(s => s.classroom)).size;
  document.getElementById('scheduleSubtitle').textContent = schedules.length + ' total sessions booked';
}

// ─── POPULATE FILTERS ─────────────────────────────────────────────────────────
function populateFilters() {
  const tSel = document.getElementById('filterTeacher');
  const cSel = document.getElementById('filterClass');
  const rSel = document.getElementById('filterRoom');
  const bT   = document.getElementById('b-teacher');
  const bC   = document.getElementById('b-class');
  const bR   = document.getElementById('b-room');

  TEACHERS.forEach(t => {
    [tSel, bT].forEach(sel => {
      const o = document.createElement('option');
      o.value = t.id; o.textContent = t.name;
      sel.appendChild(o);
    });
  });
  CLASSES.forEach(c => {
    [cSel, bC].forEach(sel => {
      const o = document.createElement('option');
      o.value = c.id; o.textContent = c.name;
      sel.appendChild(o);
    });
  });
  ROOMS.forEach(r => {
    [rSel, bR].forEach(sel => {
      const o = document.createElement('option');
      o.value = r; o.textContent = r;
      sel.appendChild(o);
    });
  });
}

function applyFilters() { renderCurrentView(); }

// ─── NAVIGATION ───────────────────────────────────────────────────────────────
function navigate(dir) {
  if (currentView === 'list') { listPage = Math.max(1, listPage + dir); renderList(); return; }
  if (currentView === 'day')   { currentDate = addDays(currentDate, dir); }
  else if (currentView === 'week')  { currentDate = addDays(currentDate, dir * 7); }
  else if (currentView === 'month') { currentDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + dir, 1); }
  else if (currentView === 'year')  { currentDate = new Date(currentDate.getFullYear() + dir, 0, 1); }
  renderCurrentView();
}

function goToday() {
  currentDate = new Date();
  listPage = 1;
  renderCurrentView();
}

function updatePeriodLabel() {
  const el = document.getElementById('periodLabel');
  if (currentView === 'list') {
    el.textContent = 'All Sessions';
  } else if (currentView === 'day') {
    const t = todayStr();
    const ds = dateStr(currentDate);
    el.textContent = (ds === t ? 'Today — ' : '') + DAYS_LONG[currentDate.getDay()] + ', ' + MONTHS[currentDate.getMonth()].slice(0,3) + ' ' + currentDate.getDate() + ', ' + currentDate.getFullYear();
  } else if (currentView === 'week') {
    const ws = weekStart(currentDate);
    const we = addDays(ws, 6);
    el.textContent = MONTHS[ws.getMonth()].slice(0,3) + ' ' + ws.getDate() + ' – ' + MONTHS[we.getMonth()].slice(0,3) + ' ' + we.getDate() + ', ' + we.getFullYear();
  } else if (currentView === 'month') {
    el.textContent = MONTHS[currentDate.getMonth()] + ' ' + currentDate.getFullYear();
  } else if (currentView === 'year') {
    el.textContent = String(currentDate.getFullYear());
  }
}

// ─── VIEW SWITCHER ────────────────────────────────────────────────────────────
function switchView(view) {
  currentView = view;
  listPage = 1;
  document.querySelectorAll('.view-tab').forEach((b,i) => {
    b.classList.toggle('active', ['list','day','week','month','year'][i] === view);
  });
  document.getElementById('viewFooter').style.display = view === 'list' ? 'flex' : 'none';
  renderCurrentView();
}

function renderCurrentView() {
  const vc = document.getElementById('viewContainer');
  vc.classList.add('fading');
  setTimeout(() => {
    vc.classList.remove('fading');
    updatePeriodLabel();
    updateStats();
    if (currentView === 'list')        renderList();
    else if (currentView === 'day')    renderDay();
    else if (currentView === 'week')   renderWeek();
    else if (currentView === 'month')  renderMonth();
    else if (currentView === 'year')   renderYear();
  }, 80);
}

// ─── LIST VIEW ────────────────────────────────────────────────────────────────
function renderList() {
  const f = getFilters();
  const today = todayStr();
  // Only show today + future sessions
  let data = schedules
    .filter(s => s.date >= today && matchFilter(s, f))
    .sort((a,b) => a.date.localeCompare(b.date) || a.start_time.localeCompare(b.start_time));
  const total = data.length;
  const pages = Math.max(1, Math.ceil(total / LIST_PER));
  if (listPage > pages) listPage = pages;
  const slice = data.slice((listPage-1)*LIST_PER, listPage*LIST_PER);

  // Group by date
  const groups = {};
  slice.forEach(s => { if (!groups[s.date]) groups[s.date] = []; groups[s.date].push(s); });

  let html = '<div class="list-view">';
  if (Object.keys(groups).length === 0) {
    html += emptyState('No upcoming sessions');
  } else {
    Object.entries(groups).forEach(([date, sessions]) => {
      const isToday = date === todayStr();
      html += `<div class="list-group">
        <div class="list-group-header">
          <div class="date-dot" style="${isToday ? 'background:#22c55e' : ''}"></div>
          ${formatDate(date)}${isToday ? ' <span style="color:#22c55e;font-size:10px;margin-left:4px">● TODAY</span>' : ''}
        </div>`;
      sessions.forEach((s, i) => {
        const c = colorFor(s.teacher_id);
        html += `<div class="session-row" style="animation-delay:${i*.04}s" onclick="openDetailModal(${s.id})">
          <div class="session-time-col">
            <div class="session-time-start">${fmt12(s.start_time)}</div>
            <div class="session-time-end">${fmt12(s.end_time)}</div>
          </div>
          <div class="session-bar" style="background:${c.border}"></div>
          <div class="session-info">
            <div class="session-title" style="color:${c.text}">${s.cls.name}</div>
            <div class="session-meta">
              <div class="session-meta-item">
                <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
                ${s.teacher.name}
              </div>
              <div class="session-meta-item">
                <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
                ${s.classroom}
              </div>
              <div class="session-meta-item">
                <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                ${fmt12(s.start_time)} – ${fmt12(s.end_time)}
              </div>
            </div>
          </div>
          <div class="session-chips">
            <span class="chip chip-class">${s.cls.name}</span>
            <span class="chip chip-room">${s.classroom}</span>
          </div>
          <button class="session-action-btn" onclick="event.stopPropagation();openDetailModal(${s.id})">View</button>
        </div>`;
      });
      html += '</div>';
    });
  }
  html += '</div>';
  document.getElementById('viewContainer').innerHTML = html;

  // Footer
  const start = (listPage-1)*LIST_PER + 1;
  const end = Math.min(listPage*LIST_PER, total);
  document.getElementById('tfInfo').textContent = total === 0 ? 'No upcoming sessions' : `Showing ${start}–${end} of ${total} upcoming session${total!==1?'s':''}`;
  renderPagination(pages);
}

function renderPagination(pages) {
  const pg = document.getElementById('pagination');
  pg.innerHTML = '';
  const btn = (label, p, active=false) => {
    const b = document.createElement('button');
    b.className = 'pg-btn' + (active ? ' active' : '');
    b.textContent = label;
    b.onclick = () => { listPage = p; renderList(); };
    return b;
  };
  if (listPage > 1) pg.appendChild(btn('‹', listPage-1));
  for (let p = 1; p <= pages; p++) {
    if (pages <= 6 || p === 1 || p === pages || Math.abs(p-listPage) <= 1) {
      pg.appendChild(btn(p, p, p === listPage));
    } else if (p === 2 || p === pages-1) {
      const s = document.createElement('span');
      s.className = 'pg-btn'; s.textContent = '…'; s.style.pointerEvents = 'none';
      pg.appendChild(s);
    }
  }
  if (listPage < pages) pg.appendChild(btn('›', listPage+1));
}

// ─── DAY VIEW ─────────────────────────────────────────────────────────────────
const HOUR_START = 7;
const HOUR_END   = 21;
const SLOT_H     = 64; // px per hour — matches CSS .time-row-label height

function timeToMinutes(t) {
  const [h, m] = t.split(':').map(Number);
  return h * 60 + m;
}
function minutesToPx(mins) {
  return (mins / 60) * SLOT_H;
}

// Resolve overlapping events into columns (like Google Calendar)
function resolveOverlaps(events) {
  // Sort by start time
  const sorted = [...events].sort((a,b) => timeToMinutes(a.start_time) - timeToMinutes(b.start_time));
  const columns = []; // each column = array of events

  sorted.forEach(ev => {
    const evStart = timeToMinutes(ev.start_time);
    const evEnd   = timeToMinutes(ev.end_time);
    let placed = false;
    for (let col of columns) {
      const last = col[col.length - 1];
      if (timeToMinutes(last.end_time) <= evStart) {
        col.push(ev);
        placed = true;
        break;
      }
    }
    if (!placed) columns.push([ev]);
  });

  // Assign col index and total overlapping cols
  const result = [];
  sorted.forEach(ev => {
    const evStart = timeToMinutes(ev.start_time);
    const evEnd   = timeToMinutes(ev.end_time);
    let colIdx = 0;
    let totalCols = 1;

    // Which columns does this event share time with?
    const overlappingCols = columns.filter(col =>
      col.some(other =>
        timeToMinutes(other.start_time) < evEnd &&
        timeToMinutes(other.end_time)   > evStart
      )
    );
    totalCols = overlappingCols.length;
    colIdx    = overlappingCols.findIndex(col => col.includes(ev));

    result.push({ ...ev, _colIdx: colIdx, _totalCols: totalCols });
  });
  return result;
}

function nowLineHTML(gridTop) {
  const now = new Date();
  const mins = now.getHours() * 60 + now.getMinutes();
  const startMins = HOUR_START * 60;
  const endMins   = HOUR_END   * 60;
  if (mins < startMins || mins > endMins) return '';
  const top = minutesToPx(mins - startMins);
  return `<div class="now-line" style="top:${top}px">
    <div class="now-line-dot"></div>
    <div class="now-line-bar"></div>
  </div>`;
}

function buildTimeGutter() {
  let html = '<div class="time-gutter"><div class="time-gutter-inner">';
  const totalHours = HOUR_END - HOUR_START + 1;
  for (let h = HOUR_START; h <= HOUR_END; h++) {
    const label = h === 12 ? '12 PM' : h < 12 ? h + ' AM' : (h - 12) + ' PM';
    html += `<div class="time-row-label">${label}</div>`;
  }
  html += '</div></div>';
  return html;
}

function buildHourLines() {
  let html = '';
  const totalHours = HOUR_END - HOUR_START + 1;
  for (let h = 0; h <= totalHours; h++) {
    const top = h * SLOT_H;
    html += `<div class="hour-line" style="top:${top}px"></div>`;
    if (h < totalHours) {
      html += `<div class="half-hour-line" style="top:${top + SLOT_H/2}px"></div>`;
    }
  }
  return html;
}

function buildEventBlock(ev) {
  const c = colorFor(ev.teacher_id);
  const startMins = timeToMinutes(ev.start_time);
  const endMins   = timeToMinutes(ev.end_time);
  const top    = minutesToPx(startMins - HOUR_START * 60);
  const height = Math.max(minutesToPx(endMins - startMins) - 3, 18);
  const totalCols = ev._totalCols || 1;
  const colIdx    = ev._colIdx   || 0;
  const pad = 4;
  const widthPct  = (100 / totalCols);
  const leftPct   = colIdx * widthPct;

  return `<div class="cal-event"
    style="top:${top+2}px;height:${height}px;
           left:calc(${leftPct}% + ${pad}px);
           width:calc(${widthPct}% - ${pad*2}px);
           background:${c.bg};color:${c.text};border-left-color:${c.border}"
    onclick="openDetailModal(${ev.id})">
    <div class="cal-event-title">${ev.cls.name}</div>
    ${height > 32 ? `<div class="cal-event-sub">${ev.teacher.name} · ${ev.classroom}</div>` : ''}
    ${height > 52 ? `<div class="cal-event-time">${fmt12(ev.start_time)} – ${fmt12(ev.end_time)}</div>` : ''}
  </div>`;
}

function renderDay() {
  const ds    = dateStr(currentDate);
  const today = todayStr();
  const f     = getFilters();
  const daySessions = resolveOverlaps(schedules.filter(s => s.date === ds && matchFilter(s, f)));
  const isToday = ds === today;
  const totalH  = (HOUR_END - HOUR_START + 1) * SLOT_H;

  let html = `<div class="day-view">
    <div class="day-header">
      <div class="day-header-gutter"></div>
      <div class="day-header-col">
        <div class="day-col-label">${DAYS_LONG[currentDate.getDay()]}</div>
        <div class="day-col-date${isToday ? ' today' : ''}">${currentDate.getDate()}</div>
      </div>
    </div>
    <div class="cal-scroll-wrap" id="dayScroll">
      <div class="cal-layout" style="height:${totalH}px">
        ${buildTimeGutter()}
        <div class="cal-columns">
          <div class="cal-col" style="height:${totalH}px">
            ${buildHourLines()}
            ${isToday ? nowLineHTML() : ''}
            ${daySessions.length === 0 ? `<div style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);text-align:center;color:var(--text-muted);pointer-events:none"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" style="margin:0 auto 8px;display:block"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg><div style="font-size:13px;font-weight:600">No sessions today</div></div>` : ''}
            ${daySessions.map(buildEventBlock).join('')}
          </div>
        </div>
      </div>
    </div>
  </div>`;

  document.getElementById('viewContainer').innerHTML = html;

  // Auto-scroll to current time (or first event)
  const scrollEl = document.getElementById('dayScroll');
  if (scrollEl) {
    let scrollTo;
    if (isToday) {
      const now = new Date();
      scrollTo = minutesToPx((now.getHours() * 60 + now.getMinutes()) - HOUR_START * 60) - 120;
    } else if (daySessions.length > 0) {
      scrollTo = minutesToPx(timeToMinutes(daySessions[0].start_time) - HOUR_START * 60) - 60;
    } else {
      scrollTo = minutesToPx(2 * 60); // 2 hours in = 9 AM for HOUR_START=7
    }
    scrollEl.scrollTop = Math.max(0, scrollTo);
  }

  // Update now-line every minute
  if (isToday) {
    clearInterval(window._nowLineTimer);
    window._nowLineTimer = setInterval(() => {
      const col = document.querySelector('#dayScroll .cal-col');
      if (!col) { clearInterval(window._nowLineTimer); return; }
      const existing = col.querySelector('.now-line');
      if (existing) existing.remove();
      col.insertAdjacentHTML('beforeend', nowLineHTML());
    }, 60000);
  }
}

// ─── WEEK VIEW ────────────────────────────────────────────────────────────────
function renderWeek() {
  const ws    = weekStart(currentDate);
  const days  = Array.from({ length: 7 }, (_, i) => addDays(ws, i));
  const today = todayStr();
  const f     = getFilters();
  const totalH = (HOUR_END - HOUR_START + 1) * SLOT_H;

  // Build header
  let html = `<div class="week-view">
    <div style="overflow-x:auto">
    <div style="min-width:760px">
    <div class="week-header">
      <div class="week-header-gutter"></div>`;
  days.forEach(d => {
    const ds = dateStr(d);
    html += `<div class="week-header-day">
      <div class="week-day-label">${DAYS_SHORT[d.getDay()]}</div>
      <div class="week-day-num${ds === today ? ' today' : ''}">${d.getDate()}</div>
    </div>`;
  });
  html += `</div>`;

  // Build body
  html += `<div class="cal-scroll-wrap" id="weekScroll" style="overflow-x:visible">
    <div class="cal-layout" style="height:${totalH}px;min-width:760px">
      ${buildTimeGutter()}
      <div class="cal-columns">`;

  days.forEach(d => {
    const ds = dateStr(d);
    const daySessions = resolveOverlaps(schedules.filter(s => s.date === ds && matchFilter(s, f)));
    const isToday = ds === today;
    html += `<div class="cal-col" style="height:${totalH}px">
      ${buildHourLines()}
      ${isToday ? nowLineHTML() : ''}
      ${daySessions.map(buildEventBlock).join('')}
    </div>`;
  });

  html += `</div></div></div></div></div>`;
  document.getElementById('viewContainer').innerHTML = html;

  // Auto-scroll to current time
  const scrollEl = document.getElementById('weekScroll');
  if (scrollEl) {
    const now = new Date();
    const scrollTo = minutesToPx((now.getHours() * 60 + now.getMinutes()) - HOUR_START * 60) - 120;
    scrollEl.scrollTop = Math.max(0, scrollTo);
  }

  // Update now-line every minute
  clearInterval(window._nowLineTimer);
  window._nowLineTimer = setInterval(() => {
    document.querySelectorAll('#weekScroll .cal-col').forEach((col, i) => {
      const ds = dateStr(days[i]);
      if (ds !== today) return;
      const existing = col.querySelector('.now-line');
      if (existing) existing.remove();
      col.insertAdjacentHTML('beforeend', nowLineHTML());
    });
  }, 60000);
}

// ─── MONTH VIEW ───────────────────────────────────────────────────────────────
function renderMonth() {
  const year  = currentDate.getFullYear();
  const month = currentDate.getMonth();
  const today = todayStr();
  const f = getFilters();

  const firstDay  = new Date(year, month, 1);
  const lastDay   = new Date(year, month+1, 0);
  const startPad  = firstDay.getDay();
  const endPad    = 6 - lastDay.getDay();

  let html = `<div class="month-view"><div class="month-grid">`;
  DAYS_SHORT.forEach(d => { html += `<div class="month-day-header">${d}</div>`; });

  // Previous month padding
  for (let i = startPad - 1; i >= 0; i--) {
    const d = new Date(year, month, -i);
    html += `<div class="month-cell other-month"><div class="month-date">${d.getDate()}</div></div>`;
  }
  // Current month
  for (let day = 1; day <= lastDay.getDate(); day++) {
    const ds = year + '-' + pad2(month+1) + '-' + pad2(day);
    const isToday = ds === today;
    const daySessions = schedules.filter(s => s.date === ds && matchFilter(s, f));
    const show = daySessions.slice(0, 3);
    const more = daySessions.length - 3;
    html += `<div class="month-cell${isToday?' today-cell':''}">
      <div class="month-date${isToday?' today-date':''}">${day}</div>`;
    show.forEach(s => {
      const c = colorFor(s.teacher_id);
      html += `<div class="month-event" style="background:${c.bg};color:${c.text}" onclick="openDetailModal(${s.id})">${s.cls.name}</div>`;
    });
    if (more > 0) html += `<div class="month-more">+${more} more</div>`;
    html += `</div>`;
  }
  // Next month padding
  for (let i = 1; i <= endPad; i++) {
    html += `<div class="month-cell other-month"><div class="month-date">${i}</div></div>`;
  }
  html += `</div></div>`;
  document.getElementById('viewContainer').innerHTML = html;
}

// ─── YEAR VIEW ────────────────────────────────────────────────────────────────
function renderYear() {
  const year = currentDate.getFullYear();
  const today = todayStr();
  const f = getFilters();

  let html = `<div class="year-view"><div class="year-grid">`;
  for (let m = 0; m < 12; m++) {
    const monthSessions = schedules.filter(s => s.date.startsWith(year+'-'+pad2(m+1)) && matchFilter(s,f));
    const eventDays = new Set(monthSessions.map(s => +s.date.slice(8)));
    const firstDay = new Date(year, m, 1).getDay();
    const lastDate = new Date(year, m+1, 0).getDate();

    html += `<div class="mini-month">
      <div class="mini-month-header">
        <span>${MONTHS[m]}</span>
        ${monthSessions.length > 0 ? `<span class="session-count">${monthSessions.length}</span>` : ''}
      </div>
      <div class="mini-cal">
        <div class="mini-cal-header">`;
    DAYS_SHORT.forEach(d => { html += `<div class="mini-cal-dh">${d[0]}</div>`; });
    html += `</div><div class="mini-cal-grid">`;
    for (let i = 0; i < firstDay; i++) html += `<div class="mini-cal-day faded"></div>`;
    for (let day = 1; day <= lastDate; day++) {
      const ds = year+'-'+pad2(m+1)+'-'+pad2(day);
      const isT = ds === today;
      const hasEv = eventDays.has(day);
      html += `<div class="mini-cal-day${isT?' is-today':hasEv?' has-event':''}" onclick="${hasEv?`jumpToDay('${ds}')`:''}">${day}</div>`;
    }
    html += `</div></div></div>`;
  }
  html += `</div></div>`;
  document.getElementById('viewContainer').innerHTML = html;
}

function jumpToDay(ds) {
  currentDate = new Date(ds + 'T00:00:00');
  switchView('day');
}

// ─── EMPTY STATE ──────────────────────────────────────────────────────────────
function emptyState(msg = 'No upcoming sessions') {
  return `<div class="empty-state">
    <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
    <h3>${msg}</h3>
    <p>Try adjusting your filters or book a new session.</p>
  </div>`;
}

// ─── BOOKING MODAL ────────────────────────────────────────────────────────────
function openBookingModal() {
  document.getElementById('b-date').value = dateStr(currentDate);
  document.getElementById('bookingOverlay').classList.add('open');
}
function closeBookingModal() { document.getElementById('bookingOverlay').classList.remove('open'); }

function saveSession() {
  const teacherId = +document.getElementById('b-teacher').value;
  const classId   = +document.getElementById('b-class').value;
  const room      = document.getElementById('b-room').value;
  const date      = document.getElementById('b-date').value;
  const start     = document.getElementById('b-start').value;
  const end       = document.getElementById('b-end').value;

  if (!teacherId || !classId || !room || !date || !start || !end) {
    showToast('⚠️ Please fill in all fields.'); return;
  }
  if (start >= end) { showToast('⚠️ End time must be after start time.'); return; }

  const newId = Math.max(...schedules.map(s=>s.id), 0) + 1;
  const teacher = TEACHERS.find(t => t.id === teacherId);
  const cls     = CLASSES.find(c => c.id === classId);
  schedules.push({ id: newId, teacher_id: teacherId, class_id: classId, classroom: room, date, start_time: start, end_time: end, teacher, cls });
  closeBookingModal();
  renderCurrentView();
  showToast('✅ Session booked successfully!');
}

// ─── DETAIL MODAL ─────────────────────────────────────────────────────────────
function openDetailModal(id) {
  const s = schedules.find(x => x.id === id);
  if (!s) return;
  activeDetailId = id;
  const c = colorFor(s.teacher_id);
  document.getElementById('detailContent').innerHTML = `
    <div style="background:${c.bg};border-radius:10px;padding:14px 16px;margin-bottom:18px;border-left:4px solid ${c.border}">
      <div style="font-size:16px;font-weight:800;color:${c.text}">${s.cls.name}</div>
      <div style="font-size:12px;color:${c.text};opacity:.7;margin-top:3px">${formatDate(s.date)}</div>
    </div>
    <div class="detail-grid">
      <div class="detail-field">
        <div class="detail-field-label">Teacher</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
          ${s.teacher.name}
        </div>
      </div>
      <div class="detail-field">
        <div class="detail-field-label">Class</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          ${s.cls.name}
        </div>
      </div>
      <div class="detail-field">
        <div class="detail-field-label">Classroom</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18M9 21V9"/></svg>
          ${s.classroom}
        </div>
      </div>
      <div class="detail-field">
        <div class="detail-field-label">Date</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
          ${formatDate(s.date)}
        </div>
      </div>
      <div class="detail-field">
        <div class="detail-field-label">Start Time</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          ${fmt12(s.start_time)}
        </div>
      </div>
      <div class="detail-field">
        <div class="detail-field-label">End Time</div>
        <div class="detail-field-value">
          <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          ${fmt12(s.end_time)}
        </div>
      </div>
    </div>`;
  document.getElementById('detailOverlay').classList.add('open');
}

function closeDetailModal() { document.getElementById('detailOverlay').classList.remove('open'); }

function deleteSession() {
  if (!activeDetailId) return;
  schedules = schedules.filter(s => s.id !== activeDetailId);
  closeDetailModal();
  renderCurrentView();
  showToast('🗑️ Session deleted.');
}

// ─── TOAST ────────────────────────────────────────────────────────────────────
let toastTimer;
function showToast(msg) {
  const t = document.getElementById('toast');
  document.getElementById('toastMsg').textContent = msg;
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
}

// ─── INIT ─────────────────────────────────────────────────────────────────────
populateFilters();
document.getElementById('b-date').value = dateStr(new Date());
renderCurrentView();
document.getElementById('viewFooter').style.display = 'flex';
</script>
</body>
</html>