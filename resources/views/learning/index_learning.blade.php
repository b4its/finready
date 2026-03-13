<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Master Web Development</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --bg: #f7f6f3;
      --card: #ffffff;
      --border: #e8e4dc;
      --text: #1a1814;
      --muted: #7a756b;
      --primary: #16a34a;
      --primary-light: #dcfce7;
      --success: #16a34a;
      --success-light: #dcfce7;
      --secondary: #f0ede7;
      --radius: 16px;
      --shadow: 0 1px 3px rgba(0,0,0,.06), 0 4px 12px rgba(0,0,0,.04);
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
      font-size: 15px;
      line-height: 1.6;
    }

    /* HEADER */
    .header {
      background: var(--card);
      border-bottom: 1px solid var(--border);
    }
    .header-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 36px 24px;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }
    .breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 13px;
      color: var(--muted);
    }
    .breadcrumb svg { width: 14px; height: 14px; }
    .header-row {
      display: flex;
      align-items: flex-start;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
    }
    .header-text h1 {
      font-size: clamp(26px, 4vw, 36px);
      font-weight: 700;
      letter-spacing: -0.03em;
      line-height: 1.15;
      margin-bottom: 10px;
      color: var(--text);
    }
    .header-text p {
      max-width: 580px;
      color: var(--muted);
      font-size: 15px;
      line-height: 1.65;
    }
    .btn-continue {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--primary);
      color: #fff;
      border: none;
      border-radius: 12px;
      padding: 13px 22px;
      font-size: 14px;
      font-weight: 600;
      font-family: inherit;
      cursor: pointer;
      white-space: nowrap;
      transition: background .18s, transform .12s;
      flex-shrink: 0;
    }
    .btn-continue:hover { background: #15803d; transform: translateY(-1px); }
    .btn-continue svg { width: 15px; height: 15px; }

    .progress-wrap { display: flex; flex-direction: column; gap: 8px; }
    .progress-labels {
      display: flex;
      justify-content: space-between;
      font-size: 13px;
    }
    .progress-labels span:first-child { color: var(--muted); }
    .progress-labels span:last-child { font-weight: 600; }
    .progress-bar-bg {
      height: 8px;
      background: var(--secondary);
      border-radius: 99px;
      overflow: hidden;
    }
    .progress-bar-fill {
      height: 100%;
      background: var(--primary);
      border-radius: 99px;
      transition: width .6s ease;
    }

    /* LAYOUT */
    .layout {
      max-width: 1200px;
      margin: 0 auto;
      padding: 36px 24px;
      display: flex;
      gap: 32px;
      align-items: flex-start;
    }
    .main-col { flex: 1; min-width: 0; }
    .sidebar-col {
      width: 296px;
      flex-shrink: 0;
      position: sticky;
      top: 24px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    /* CARD */
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      box-shadow: var(--shadow);
    }
    .card-header {
      padding: 20px 20px 12px;
      border-bottom: 1px solid var(--border);
    }
    .card-header h3 {
      font-size: 15px;
      font-weight: 600;
    }
    .card-body { padding: 16px 20px; }

    /* SIDEBAR STAT */
    .stat-row {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 10px 0;
    }
    .stat-row + .stat-row { border-top: 1px solid var(--border); }
    .stat-icon {
      width: 40px; height: 40px;
      background: var(--secondary);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .stat-icon svg { width: 18px; height: 18px; color: var(--text); }
    .stat-label { font-size: 14px; font-weight: 600; }
    .stat-sub { font-size: 12px; color: var(--muted); margin-top: 1px; }

    .instructor-row {
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .avatar {
      width: 44px; height: 44px;
      background: var(--primary-light);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .avatar svg { width: 22px; height: 22px; color: var(--primary); }

    .cert-row { display: flex; gap: 12px; }
    .cert-icon {
      width: 40px; height: 40px;
      background: var(--primary-light);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .cert-icon svg { width: 18px; height: 18px; color: var(--primary); }
    .cert-text { font-size: 13px; color: var(--muted); line-height: 1.5; }

    .btn-complete {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      background: var(--card);
      color: var(--muted);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 12px;
      font-size: 14px;
      font-weight: 600;
      font-family: inherit;
      cursor: not-allowed;
    }
    .btn-complete svg { width: 16px; height: 16px; }

    /* LEARNING PATH */
    .lp-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 28px;
    }
    .lp-header h2 { font-size: 20px; font-weight: 700; letter-spacing: -0.02em; }
    .lp-header span { font-size: 13px; color: var(--muted); }

    /* MODULE CARD */
    .module-wrap {
      display: flex;
      gap: 16px;
      position: relative;
    }
    .module-wrap + .module-wrap { margin-top: 24px; }

    .timeline-col {
      display: flex;
      flex-direction: column;
      align-items: center;
      flex-shrink: 0;
      width: 40px;
    }
    .module-dot {
      width: 40px; height: 40px;
      border-radius: 50%;
      border: 2px solid var(--border);
      background: var(--card);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
      color: var(--muted);
      flex-shrink: 0;
      position: relative;
      z-index: 1;
      transition: all .2s;
    }
    .module-dot.completed {
      border-color: var(--success);
      background: var(--success);
      color: #fff;
    }
    .module-dot.in-progress {
      border-color: var(--primary);
      background: var(--primary);
      color: #fff;
    }
    .module-dot svg { width: 17px; height: 17px; }
    .timeline-line {
      flex: 1;
      width: 2px;
      background: var(--border);
      margin-top: 4px;
      min-height: 20px;
    }
    .timeline-line.completed { background: var(--success); }

    .module-card {
      flex: 1;
      border: 1px solid var(--border);
      border-radius: var(--radius);
      background: var(--card);
      box-shadow: var(--shadow);
      overflow: hidden;
      transition: box-shadow .2s;
      margin-bottom: 4px;
    }
    .module-card.in-progress {
      box-shadow: 0 0 0 2px var(--primary), var(--shadow);
    }
    .module-card-btn {
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background: none;
      border: none;
      cursor: pointer;
      text-align: left;
      font-family: inherit;
      gap: 16px;
    }
    .module-card-btn:disabled { cursor: default; }
    .module-card-info { flex: 1; min-width: 0; }
    .module-badge-row {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 6px;
    }
    .module-num-label {
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .08em;
      color: var(--muted);
    }
    .module-num-label.completed { color: var(--success); }
    .module-num-label.in-progress { color: var(--primary); }
    .badge {
      font-size: 11px;
      font-weight: 600;
      padding: 2px 9px;
      border-radius: 99px;
    }
    .badge-success { background: var(--success-light); color: var(--success); }
    .badge-primary { background: var(--primary-light); color: var(--primary); }

    .module-title {
      font-size: 17px;
      font-weight: 700;
      letter-spacing: -0.01em;
      color: var(--text);
      margin-bottom: 4px;
    }
    .module-title.locked { color: var(--muted); }
    .module-desc { font-size: 13px; color: var(--muted); line-height: 1.55; }

    .module-meta {
      display: flex;
      align-items: center;
      gap: 4px;
      font-size: 13px;
      color: var(--muted);
      white-space: nowrap;
    }
    .module-meta svg { width: 14px; height: 14px; }
    .chevron { width: 18px; height: 18px; color: var(--muted); transition: transform .25s; flex-shrink: 0; }
    .chevron.open { transform: rotate(180deg); }

    .module-progress-bar {
      border-top: 1px solid var(--border);
      padding: 12px 20px;
    }
    .module-progress-labels {
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      margin-bottom: 8px;
    }
    .module-progress-labels span:first-child { color: var(--muted); }
    .module-progress-labels span:last-child { font-weight: 600; }
    .mini-bar-bg {
      height: 5px;
      background: var(--secondary);
      border-radius: 99px;
      overflow: hidden;
    }
    .mini-bar-fill {
      height: 100%;
      background: var(--success);
      border-radius: 99px;
    }

    .lessons-list {
      border-top: 1px solid var(--border);
      padding: 12px;
      display: none;
    }
    .lessons-list.open { display: block; }

    .lesson-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 12px;
      border-radius: 10px;
      cursor: pointer;
      transition: background .15s;
    }
    .lesson-item:hover { background: var(--secondary); }
    .lesson-item.locked { opacity: .5; cursor: default; pointer-events: none; }
    .lesson-left { display: flex; align-items: center; gap: 10px; }
    .lesson-icon-wrap {
      width: 32px; height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .lesson-icon-wrap.completed { background: var(--success-light); color: var(--success); }
    .lesson-icon-wrap.in-progress { background: var(--primary-light); color: var(--primary); }
    .lesson-icon-wrap.locked { background: var(--secondary); color: var(--muted); }
    .lesson-icon-wrap svg { width: 15px; height: 15px; }
    .lesson-name { font-size: 13px; font-weight: 600; color: var(--text); }
    .lesson-item.locked .lesson-name { color: var(--muted); }
    .lesson-type { font-size: 11px; color: var(--muted); margin-top: 1px; text-transform: capitalize; }
    .lesson-dur {
      display: flex;
      align-items: center;
      gap: 4px;
      font-size: 12px;
      color: var(--muted);
    }
    .lesson-dur svg { width: 12px; height: 12px; }

    /* MOBILE */
    .mobile-sidebar {
      display: none;
      border-top: 1px solid var(--border);
      background: var(--card);
      padding: 24px;
    }

    @media (max-width: 900px) {
      .sidebar-col { display: none; }
      .mobile-sidebar { display: block; }
      .header-row { flex-direction: column; }
    }
    @media (max-width: 600px) {
      .layout { padding: 24px 16px; }
      .header-inner { padding: 24px 16px; }
      .module-meta { display: none; }
    }

    /* SVG icon inline helpers */
    svg { vertical-align: middle; }
  </style>
</head>
<body>

<!-- HEADER -->
<header class="header">
  <div class="header-inner">
    <div class="breadcrumb">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
      <span>Kembali</span>
    </div>

    <div class="header-row">
      <div class="header-text">
        <h1>Master Web Development</h1>
        <p>Build modern, responsive websites from scratch. Learn HTML, CSS, JavaScript, and responsive design principles through hands-on projects.</p>
      </div>
      <button class="btn-continue">
        Continue Learning
        <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
      </button>
    </div>

    <div class="progress-wrap">
      <div class="progress-labels">
        <span>Your progress</span>
        <span>35% completed</span>
      </div>
      <div class="progress-bar-bg">
        <div class="progress-bar-fill" style="width:35%"></div>
      </div>
    </div>
  </div>
</header>

<!-- LAYOUT -->
<div class="layout">
  <!-- MAIN -->
  <main class="main-col">
    <div class="lp-header">
      <h2>Learning Path</h2>
      <span>6 modules</span>
    </div>

    <!-- MODULE 1 -->
    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot completed">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
        </div>
        <div class="timeline-line completed"></div>
      </div>
      <div class="module-card" id="mc1">
        <button class="module-card-btn" onclick="toggleModule(1)">
          <div class="module-card-info">
            <div class="module-badge-row">
              <span class="module-num-label completed">Module 1</span>
              <span class="badge badge-success">Completed</span>
            </div>
            <div class="module-title">Introduction to Web Development</div>
            <div class="module-desc">Get started with the fundamentals of how the web works and set up your development environment.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 45 min</span>
          <svg class="chevron" id="chev1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/></svg>
        </button>
        <div class="module-progress-bar">
          <div class="module-progress-labels"><span>4 of 4 lessons completed</span><span>100%</span></div>
          <div class="mini-bar-bg"><div class="mini-bar-fill" style="width:100%"></div></div>
        </div>
        <div class="lessons-list" id="ll1">
          <div class="lesson-item">
            <div class="lesson-left">
              <div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div>
              <div><div class="lesson-name">How the Web Works</div><div class="lesson-type">video</div></div>
            </div>
            <div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>12 min</div>
          </div>
          <div class="lesson-item">
            <div class="lesson-left">
              <div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div>
              <div><div class="lesson-name">Setting Up Your Environment</div><div class="lesson-type">reading</div></div>
            </div>
            <div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>8 min</div>
          </div>
          <div class="lesson-item">
            <div class="lesson-left">
              <div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div>
              <div><div class="lesson-name">Your First Webpage</div><div class="lesson-type">video</div></div>
            </div>
            <div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>15 min</div>
          </div>
          <div class="lesson-item">
            <div class="lesson-left">
              <div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div>
              <div><div class="lesson-name">Module Quiz</div><div class="lesson-type">quiz</div></div>
            </div>
            <div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>10 min</div>
          </div>
        </div>
      </div>
    </div>

    <!-- MODULE 2 -->
    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot completed">
          <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
        </div>
        <div class="timeline-line completed"></div>
      </div>
      <div class="module-card" id="mc2">
        <button class="module-card-btn" onclick="toggleModule(2)">
          <div class="module-card-info">
            <div class="module-badge-row">
              <span class="module-num-label completed">Module 2</span>
              <span class="badge badge-success">Completed</span>
            </div>
            <div class="module-title">HTML Fundamentals</div>
            <div class="module-desc">Master HTML structure, semantic elements, and accessibility best practices.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 1h 20min</span>
          <svg class="chevron" id="chev2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/></svg>
        </button>
        <div class="module-progress-bar">
          <div class="module-progress-labels"><span>5 of 5 lessons completed</span><span>100%</span></div>
          <div class="mini-bar-bg"><div class="mini-bar-fill" style="width:100%"></div></div>
        </div>
        <div class="lessons-list" id="ll2">
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">HTML Document Structure</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>18 min</div></div>
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">Semantic HTML Elements</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>22 min</div></div>
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">Forms and Inputs</div><div class="lesson-type">reading</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>15 min</div></div>
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">Accessibility Basics</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>15 min</div></div>
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">Module Quiz</div><div class="lesson-type">quiz</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>10 min</div></div>
        </div>
      </div>
    </div>

    <!-- MODULE 3 (in-progress, expanded by default) -->
    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot in-progress"><span>3</span></div>
        <div class="timeline-line"></div>
      </div>
      <div class="module-card in-progress" id="mc3">
        <button class="module-card-btn" onclick="toggleModule(3)">
          <div class="module-card-info">
            <div class="module-badge-row">
              <span class="module-num-label in-progress">Module 3</span>
              <span class="badge badge-primary">In Progress</span>
            </div>
            <div class="module-title">CSS Basics</div>
            <div class="module-desc">Learn CSS fundamentals including selectors, box model, layouts, and modern styling techniques.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 1h 45min</span>
          <svg class="chevron open" id="chev3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7"/></svg>
        </button>
        <div class="module-progress-bar">
          <div class="module-progress-labels"><span>2 of 6 lessons completed</span><span>33%</span></div>
          <div class="mini-bar-bg"><div class="mini-bar-fill" style="width:33%"></div></div>
        </div>
        <div class="lessons-list open" id="ll3">
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">CSS Selectors Deep Dive</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>20 min</div></div>
          <div class="lesson-item"><div class="lesson-left"><div class="lesson-icon-wrap completed"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg></div><div><div class="lesson-name">The Box Model</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>18 min</div></div>
          <div class="lesson-item">
            <div class="lesson-left">
              <div class="lesson-icon-wrap in-progress">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polygon points="10,8 16,12 10,16" fill="currentColor" stroke="none"/></svg>
              </div>
              <div><div class="lesson-name">Flexbox Layout</div><div class="lesson-type">video</div></div>
            </div>
            <div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>25 min</div>
          </div>
          <div class="lesson-item locked"><div class="lesson-left"><div class="lesson-icon-wrap locked"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div><div><div class="lesson-name">CSS Grid Fundamentals</div><div class="lesson-type">reading</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>20 min</div></div>
          <div class="lesson-item locked"><div class="lesson-left"><div class="lesson-icon-wrap locked"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div><div><div class="lesson-name">Styling Best Practices</div><div class="lesson-type">video</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>12 min</div></div>
          <div class="lesson-item locked"><div class="lesson-left"><div class="lesson-icon-wrap locked"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div><div><div class="lesson-name">Module Quiz</div><div class="lesson-type">quiz</div></div></div><div class="lesson-dur"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg>10 min</div></div>
        </div>
      </div>
    </div>

    <!-- MODULES 4, 5, 6 (locked) -->
    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div>
        <div class="timeline-line"></div>
      </div>
      <div class="module-card" id="mc4">
        <button class="module-card-btn" disabled>
          <div class="module-card-info">
            <div class="module-badge-row"><span class="module-num-label">Module 4</span></div>
            <div class="module-title locked">Responsive Design</div>
            <div class="module-desc">Create websites that look great on any device using media queries and mobile-first design.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 1h 30min</span>
        </button>
      </div>
    </div>

    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div>
        <div class="timeline-line"></div>
      </div>
      <div class="module-card" id="mc5">
        <button class="module-card-btn" disabled>
          <div class="module-card-info">
            <div class="module-badge-row"><span class="module-num-label">Module 5</span></div>
            <div class="module-title locked">JavaScript Basics</div>
            <div class="module-desc">Add interactivity to your websites with JavaScript fundamentals and DOM manipulation.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 2h 15min</span>
        </button>
      </div>
    </div>

    <div class="module-wrap">
      <div class="timeline-col">
        <div class="module-dot"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg></div>
      </div>
      <div class="module-card" id="mc6">
        <button class="module-card-btn" disabled>
          <div class="module-card-info">
            <div class="module-badge-row"><span class="module-num-label">Module 6</span></div>
            <div class="module-title locked">Final Project</div>
            <div class="module-desc">Put it all together by building a complete responsive website from scratch.</div>
          </div>
          <span class="module-meta"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg> 1h 30min</span>
        </button>
      </div>
    </div>
  </main>

  <!-- SIDEBAR (desktop) -->
  <aside class="sidebar-col">
    <div class="card">
      <div class="card-header"><h3>Course Overview</h3></div>
      <div class="card-body">
        <div class="stat-row">
          <div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg></div>
          <div><div class="stat-label">32 Lessons</div><div class="stat-sub">6 modules</div></div>
        </div>
        <div class="stat-row">
          <div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg></div>
          <div><div class="stat-label">8h 45m</div><div class="stat-sub">Total duration</div></div>
        </div>
        <div class="stat-row">
          <div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg></div>
          <div><div class="stat-label">2 of 6</div><div class="stat-sub">Modules completed</div></div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h3>Instructor</h3></div>
      <div class="card-body">
        <div class="instructor-row">
          <div class="avatar"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg></div>
          <div><div class="stat-label">Sarah Chen</div><div class="stat-sub">Senior Frontend Engineer</div></div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header"><h3>Certificate</h3></div>
      <div class="card-body">
        <div class="cert-row">
          <div class="cert-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/></svg></div>
          <div class="cert-text">Earn a certificate of completion when you finish all modules.</div>
        </div>
      </div>
    </div>

    <button class="btn-complete" disabled>
      <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="width:16px;height:16px"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
      Mark Course Complete
    </button>
  </aside>
</div>

<!-- MOBILE SIDEBAR -->
<div class="mobile-sidebar">
  <div style="display:flex;flex-direction:column;gap:16px;">
    <div class="card">
      <div class="card-header"><h3>Course Overview</h3></div>
      <div class="card-body">
        <div class="stat-row"><div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"/></svg></div><div><div class="stat-label">32 Lessons</div><div class="stat-sub">6 modules</div></div></div>
        <div class="stat-row"><div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path stroke-linecap="round" d="M12 6v6l4 2"/></svg></div><div><div class="stat-label">8h 45m</div><div class="stat-sub">Total duration</div></div></div>
        <div class="stat-row"><div class="stat-icon"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg></div><div><div class="stat-label">2 of 6</div><div class="stat-sub">Modules completed</div></div></div>
      </div>
    </div>
    <div class="card">
      <div class="card-header"><h3>Instructor</h3></div>
      <div class="card-body"><div class="instructor-row"><div class="avatar"><svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg></div><div><div class="stat-label">Sarah Chen</div><div class="stat-sub">Senior Frontend Engineer</div></div></div></div>
    </div>
  </div>
</div>

<script>
  function toggleModule(n) {
    const ll = document.getElementById('ll' + n);
    const chev = document.getElementById('chev' + n);
    if (!ll) return;
    const isOpen = ll.classList.contains('open');
    ll.classList.toggle('open', !isOpen);
    if (chev) chev.classList.toggle('open', !isOpen);
  }
</script>
</body>
</html>