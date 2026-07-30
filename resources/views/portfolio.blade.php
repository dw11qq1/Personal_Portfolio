<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $name }} — {{ $title }}</title>
<link rel="preconnect" href="https://fonts.googleapis.cn">
<link rel="preconnect" href="https://fonts.gstatic.cn" crossorigin>
<link href="https://fonts.googleapis.cn/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Fraunces:opsz,wght@9..144,400;9..144,600&family=JetBrains+Mono:wght@400;600&family=Noto+Sans+SC:wght@400;500;700&family=Noto+Serif+SC:wght@500;600&display=swap" rel="stylesheet">
<style>
/* Hallmark · macrostructure: Bento Grid · genre: editorial · anchor hue: teal (oklch) */

*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  /* paper is tinted toward the teal anchor — never pure white */
  --paper:    oklch(96% 0.012 190);
  --paper-2:  oklch(98.5% 0.006 190);
  --surface:  oklch(99% 0.004 190);
  --ink:      oklch(23% 0.022 200);
  --ink-2:    oklch(45% 0.016 200);
  --ink-3:    oklch(62% 0.012 200);
  --line:     oklch(86% 0.010 200);
  --accent:   oklch(48% 0.072 188);   /* teal, ~3% of viewport */
  --accent-2: oklch(58% 0.070 188);
  --accent-deep: oklch(38% 0.060 188);
  --accent-soft: oklch(93% 0.020 190);
  --focus:    var(--accent);

  --font-display:'Space Grotesk','Noto Sans SC',-apple-system,sans-serif;
  --font-body:'Space Grotesk','Noto Sans SC',-apple-system,sans-serif;
  --font-serif:'Fraunces','Noto Serif SC',Georgia,serif;      /* outlier: hero name + footer line only */
  --font-mono:'JetBrains Mono','Fira Code',monospace;         /* wordmark + small meta */

  --radius:1rem; --radius-lg:1.25rem; --radius-xl:1.75rem;
  --space-xs:0.5rem; --space-sm:0.75rem; --space-md:1rem; --space-lg:1.5rem;
  --space-xl:2.5rem; --space-2xl:4rem; --space-3xl:6rem;
  --ease-out:cubic-bezier(0.16,1,0.3,1);
  --dur-short:220ms; --dur-long:420ms;
  --shadow-whisper:0 1px 2px oklch(20% 0.02 200 / 0.05);
  --on-accent:oklch(98% 0.005 200);   /* button text on accent — light mode */
}

[data-theme="dark"]{
  --paper:    oklch(16% 0.015 200);
  --paper-2:  oklch(19% 0.018 200);
  --surface:  oklch(21% 0.020 200);
  --ink:      oklch(92% 0.008 200);
  --ink-2:    oklch(74% 0.010 200);
  --ink-3:    oklch(58% 0.008 200);
  --line:     oklch(30% 0.012 200);
  --accent:   oklch(64% 0.080 190);
  --accent-2: oklch(70% 0.080 190);
  --accent-deep: oklch(52% 0.070 190);
  --accent-soft: oklch(24% 0.030 190);
  --shadow-whisper:0 1px 2px oklch(0% 0 0 / 0.4);
  --on-accent:oklch(18% 0.02 200);    /* button text on accent — dark mode */
}

html{scroll-behavior:smooth;font-size:16px;overflow-x:clip}
body{
  font-family:var(--font-body);
  background-color:var(--paper);
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='22' height='22'%3E%3Ccircle cx='1.4' cy='1.4' r='1' fill='currentColor' opacity='0.05'/%3E%3C/svg%3E");
  background-size:22px 22px;
  color:var(--ink);
  line-height:1.6;
  transition:background-color var(--dur-long) var(--ease-out),color var(--dur-long) var(--ease-out);
  -webkit-font-smoothing:antialiased;
  overflow-x:clip;
}

:focus-visible{outline:2px solid var(--focus);outline-offset:3px}

/* visible scroll progress — solid accent, no gradient blob */
.scroll-progress{position:fixed;top:0;left:0;height:3px;width:0;background:var(--accent);z-index:60;transition:width 80ms linear}

/* ── N5 Floating pill nav ── */
.nav-pill{
  position:fixed;inset:var(--space-md) auto auto 50%;transform:translateX(-50%);
  display:inline-flex;align-items:center;gap:var(--space-lg);
  padding:0.5rem 0.75rem 0.5rem 1.25rem;
  background:color-mix(in oklch,var(--paper) 78%,transparent);
  backdrop-filter:blur(14px) saturate(120%);
  border:1px solid var(--line);border-radius:999px;
  box-shadow:0 8px 24px -12px oklch(0% 0 0 / 0.18);
  z-index:40;max-width:min(92vw,720px);
}
.nav-pill .wordmark{font-family:var(--font-mono);font-weight:600;font-size:0.95rem;letter-spacing:-0.01em;color:var(--ink);text-decoration:none}
.nav-pill__links{display:flex;gap:var(--space-md);list-style:none}
.nav-pill__links a{color:var(--ink-2);text-decoration:none;font-size:0.9rem;font-weight:500;transition:color var(--dur-short) var(--ease-out)}
.nav-pill__links a:hover{color:var(--accent)}
.theme-toggle{
  width:36px;height:36px;display:grid;place-items:center;border-radius:999px;
  border:1px solid var(--line);background:var(--surface);color:var(--ink);cursor:pointer;
  transition:border-color var(--dur-short) var(--ease-out),transform var(--dur-short) var(--ease-out);
}
.theme-toggle:hover{border-color:var(--accent);transform:rotate(15deg) scale(1.05)}

/* ── Hero (left-biased, fixed height, not full viewport) ── */
.hero{min-height:76vh;display:flex;align-items:center;padding:var(--space-3xl) clamp(1.5rem,5vw,4rem) var(--space-2xl)}
.hero-inner{max-width:1180px;margin:0 auto;width:100%}
.hero-role{font-family:var(--font-mono);font-size:0.8rem;letter-spacing:0.08em;text-transform:uppercase;color:var(--accent);margin-bottom:var(--space-md)}
.hero-name{font-family:var(--font-serif);font-weight:600;font-size:clamp(3rem,11vw,7rem);line-height:0.95;letter-spacing:-0.03em;color:var(--ink)}
.hero-tag{font-size:clamp(1.1rem,2.4vw,1.6rem);color:var(--ink-2);max-width:34ch;margin-top:var(--space-lg);line-height:1.4}
.hero-actions{display:flex;gap:var(--space-md);margin-top:var(--space-xl);flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:0.4rem;padding:0.8rem 1.4rem;border-radius:999px;font-weight:600;font-size:0.95rem;text-decoration:none;cursor:pointer;transition:transform var(--dur-short) var(--ease-out),border-color var(--dur-short) var(--ease-out),background-color var(--dur-short) var(--ease-out)}
.btn-primary{background:var(--accent);color:var(--on-accent)}
.btn-primary:hover{transform:translateY(-2px)}
.btn-ghost{border:1px solid var(--line);color:var(--ink);background:var(--surface)}
.btn-ghost:hover{border-color:var(--accent);color:var(--accent)}

/* ── Bento grid ── */
.bento{
  max-width:1180px;margin:0 auto;padding:0 clamp(1.5rem,5vw,4rem) var(--space-3xl);
  display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:minmax(170px,auto);
  gap:var(--space-md);grid-auto-flow:dense;
}
.cell{
  background:var(--surface);border:1px solid var(--line);border-radius:var(--radius-lg);
  padding:var(--space-xl);display:flex;flex-direction:column;
  opacity:0;transform:translateY(10px);animation:rise var(--dur-long) var(--ease-out) forwards;
  animation-delay:calc(var(--i,0) * 70ms);
}
@keyframes rise{to{opacity:1;transform:none}}
.span-2x2{grid-column:span 2;grid-row:span 2}
.span-2x1{grid-column:span 2}
.span-1x2{grid-row:span 2}

/* small accent square beside a heading — the only decorative accent use */
.cell-kicker{display:flex;align-items:center;gap:0.6rem;margin-bottom:var(--space-md)}
.cell-kicker::before{content:"";width:10px;height:10px;border-radius:2px;background:var(--accent);flex-shrink:0}
.cell-title{font-family:var(--font-display);font-size:1.5rem;font-weight:700;letter-spacing:-0.02em;color:var(--ink)}
.cell-lead{color:var(--ink-2);margin-top:var(--space-sm);max-width:46ch}

/* About */
.cell-about .cell-lead{font-size:1.05rem}
.about-meta{display:flex;gap:var(--space-lg);margin-top:auto;padding-top:var(--space-lg);flex-wrap:wrap}
.about-meta div{font-size:0.85rem;color:var(--ink-3)}
.about-meta strong{display:block;font-family:var(--font-mono);color:var(--ink);font-size:1.1rem;font-weight:600}

/* Skills — grouped by category */
.skill-group{margin-top:var(--space-md)}
.skill-group:first-of-type{margin-top:var(--space-lg)}
.skill-group__label{font-family:var(--font-mono);font-size:0.7rem;letter-spacing:0.1em;text-transform:uppercase;color:var(--ink-3);margin-bottom:var(--space-xs)}
.skill-tags{display:flex;flex-wrap:wrap;gap:0.4rem}
.skill-tag{font-size:0.82rem;font-weight:500;color:var(--ink-2);background:var(--paper-2);border:1px solid var(--line);border-radius:999px;padding:0.25rem 0.7rem}
.skill-tag b{color:var(--accent);font-family:var(--font-mono);font-weight:600}

/* Projects */
.proj-name{font-family:var(--font-display);font-size:1.35rem;font-weight:700;color:var(--ink);letter-spacing:-0.01em}
.cell-feature .proj-name{font-size:2rem}
.proj-desc{color:var(--ink-2);margin-top:var(--space-sm);font-size:0.92rem;flex-grow:1}
.cell-feature .proj-desc{font-size:1rem;max-width:42ch}
.proj-tags{display:flex;flex-wrap:wrap;gap:0.35rem;margin-top:var(--space-md)}
.proj-tag{font-family:var(--font-mono);font-size:0.72rem;color:var(--accent);background:var(--accent-soft);border-radius:0.4rem;padding:0.15rem 0.55rem}
.proj-link{margin-top:var(--space-md);font-weight:600;color:var(--ink);text-decoration:none;align-self:flex-start;border-bottom:2px solid transparent;transition:border-color var(--dur-short) var(--ease-out),color var(--dur-short) var(--ease-out)}
.proj-link:hover{color:var(--accent);border-color:var(--accent)}

/* Experience — compact timeline inside a tile */
.exp-list{margin-top:var(--space-md);display:flex;flex-direction:column;gap:var(--space-md)}
.exp-item{border-left:2px solid var(--line);padding-left:var(--space-md);position:relative}
.exp-item::before{content:"";position:absolute;left:-5px;top:6px;width:8px;height:8px;border-radius:50%;background:var(--accent)}
.exp-date{font-family:var(--font-mono);font-size:0.72rem;color:var(--ink-3)}
.exp-title{font-weight:600;color:var(--ink);margin-top:2px}
.exp-company{color:var(--accent);font-size:0.85rem}
.exp-desc{color:var(--ink-2);font-size:0.85rem;margin-top:var(--space-xs)}

/* Contact — mini grid inside a tile */
.contact-grid{display:grid;grid-template-columns:1fr 1fr;gap:var(--space-md);margin-top:var(--space-md)}
.contact-item{display:flex;gap:0.75rem;align-items:flex-start}
.contact-item svg{width:20px;height:20px;color:var(--accent);flex-shrink:0;margin-top:2px}
.contact-item .l{font-family:var(--font-mono);font-size:0.68rem;letter-spacing:0.08em;text-transform:uppercase;color:var(--ink-3)}
.contact-item .v{font-size:0.9rem;color:var(--ink);font-weight:500}
.contact-links{display:flex;flex-wrap:wrap;gap:0.35rem 0.9rem}
.contact-links a{color:var(--ink);font-weight:600;text-decoration:none;position:relative}
.contact-links a::after{content:"";position:absolute;left:0;bottom:-2px;width:0;height:1px;background:var(--accent);transition:width var(--dur-short) var(--ease-out)}
.contact-links a:hover{color:var(--accent)}
.contact-links a:hover::after{width:100%}

/* ── Ft5 Statement footer ── */
.foot-stmt{max-width:1180px;margin:0 auto;padding:var(--space-3xl) clamp(1.5rem,5vw,4rem) var(--space-2xl);display:grid;gap:var(--space-lg)}
.foot-stmt__line{font-family:var(--font-serif);font-weight:600;font-size:clamp(1.75rem,5vw,3.25rem);line-height:1.02;letter-spacing:-0.02em;max-width:26ch;color:var(--ink);margin:0}
.foot-stmt__meta{display:flex;justify-content:space-between;align-items:baseline;padding-top:var(--space-md);border-top:1px solid var(--line);flex-wrap:wrap;gap:var(--space-sm)}
.foot-stmt__meta .wordmark{font-family:var(--font-mono);font-weight:600}
.foot-stmt__meta .muted{color:var(--ink-3);font-size:0.85rem}

@media (prefers-reduced-motion:reduce){
  *{animation-duration:150ms!important;animation-iteration-count:1!important;transition-duration:150ms!important}
  .cell{animation:rise 150ms linear forwards}
}
@media (max-width:960px){
  .bento{grid-template-columns:repeat(2,1fr)}
  .span-2x2{grid-column:span 2;grid-row:span 2}
  .span-2x1{grid-column:span 2}
}
@media (max-width:560px){
  .bento{grid-template-columns:1fr}
  .span-2x2,.span-2x1{grid-column:span 1;grid-row:auto}
  .nav-pill{gap:var(--space-sm);padding:0.5rem 0.6rem 0.5rem 1rem}
  .nav-pill__links{display:none}
  .contact-grid{grid-template-columns:1fr}
}
</style>
</head>
<body>
<div class="scroll-progress" id="progress"></div>

<nav class="nav-pill" aria-label="Primary">
  <a href="#top" class="wordmark">{{ $name }}</a>
  <ul class="nav-pill__links">
    <li><a href="#work">作品</a></li>
    <li><a href="#exp">经历</a></li>
    <li><a href="#contact">联系</a></li>
  </ul>
  <button class="theme-toggle" id="themeToggle" aria-label="切换主题">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
  </button>
</nav>

<header class="hero" id="top">
  <div class="hero-inner">
    <p class="hero-role">{{ $title }}</p>
    <h1 class="hero-name">{{ $name }}</h1>
    <p class="hero-tag">{{ $subtitle }}</p>
    <div class="hero-actions">
      <a href="#contact" class="btn btn-primary">一起聊聊 →</a>
      <a href="#work" class="btn btn-ghost">看作品</a>
    </div>
  </div>
</header>

<main class="bento">
  <!-- About -->
  <article class="cell cell-about span-2x2" style="--i:0">
    <div class="cell-kicker"><h2 class="cell-title">关于</h2></div>
    <p class="cell-lead">后端开发工程师，专注 Laravel 与 PHP。习惯把复杂的业务逻辑拆成清晰的模型与接口，交付可读、可维护、能长期跑下去的代码。</p>
    <div class="about-meta">
      <div>所在地<strong>远程协作 / Remote</strong></div>
      <div>主力栈<strong>Laravel / PHP</strong></div>
      <div>状态<strong>接单中</strong></div>
    </div>
  </article>

  <!-- Skills grouped -->
  <article class="cell cell-skills span-2x2" style="--i:1">
    <div class="cell-kicker"><h2 class="cell-title">专业能力</h2></div>
    @php
      $grouped = $skills->groupBy('category');
    @endphp
    @foreach($grouped as $cat => $items)
      <div class="skill-group">
        <div class="skill-group__label">{{ $cat }}</div>
        <div class="skill-tags">
          @foreach($items as $s)
            <span class="skill-tag">{{ $s->name }} <b>{{ $s->percent }}%</b></span>
          @endforeach
        </div>
      </div>
    @endforeach
  </article>

  <!-- Featured project -->
  @php
    $feature = $projects->first();
    $rest = $projects->slice(1);
  @endphp
  @if($feature)
  <article class="cell cell-feature span-2x2" style="--i:2">
    <div class="cell-kicker"><h2 class="cell-title">精选作品</h2></div>
    <div class="proj-name">{{ $feature->name }}</div>
    <p class="proj-desc">{{ $feature->description }}</p>
    <div class="proj-tags">
      @foreach((array)$feature->tags as $t)
        <span class="proj-tag">{{ $t }}</span>
      @endforeach
    </div>
    <a href="#" class="proj-link">查看项目 →</a>
  </article>
  @endif

  <!-- Remaining projects -->
  @foreach($rest as $p)
  <article class="cell cell-proj span-2x1" style="--i:{{ $loop->index + 3 }}">
    <div class="proj-name">{{ $p->name }}</div>
    <p class="proj-desc">{{ $p->description }}</p>
    <div class="proj-tags">
      @foreach((array)$p->tags as $t)
        <span class="proj-tag">{{ $t }}</span>
      @endforeach
    </div>
  </article>
  @endforeach

  <!-- Experience -->
  <article class="cell cell-exp span-2x2" id="exp" style="--i:{{ $projects->count() + 2 }}">
    <div class="cell-kicker"><h2 class="cell-title">工作历程</h2></div>
    <div class="exp-list">
      @foreach($experiences as $exp)
        <div class="exp-item">
          <div class="exp-date">{{ $exp->date_range }}</div>
          <div class="exp-title">{{ $exp->title }}</div>
          <div class="exp-company">{{ $exp->company }}</div>
          <p class="exp-desc">{{ $exp->description }}</p>
        </div>
      @endforeach
    </div>
  </article>

  <!-- Contact -->
  <article class="cell cell-contact span-2x1" id="contact" style="--i:{{ $projects->count() + 3 }}">
    <div class="cell-kicker"><h2 class="cell-title">联系</h2></div>
    <div class="contact-grid">
      <div class="contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        <div><div class="l">邮箱</div><div class="v">GitHub 私信联系</div></div>
      </div>
      <div class="contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
        <div><div class="l">所在地</div><div class="v">远程协作 / Remote</div></div>
      </div>
      <div class="contact-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0 0 24 12c0-6.63-5.37-12-12-12z"/></svg>
        <div><div class="l">代码仓库</div><div class="contact-links"><a href="https://github.com" target="_blank" rel="noopener">GitHub</a><a href="https://gitee.com" target="_blank" rel="noopener">Gitee</a><a href="https://juejin.cn" target="_blank" rel="noopener">掘金</a></div></div>
      </div>
      <div class="contact-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
        <div><div class="l">微信</div><div class="v">扫码添加好友</div></div>
      </div>
    </div>
  </article>
</main>

<footer class="foot-stmt">
  <p class="foot-stmt__line">把想法写成能跑起来的系统。</p>
  <div class="foot-stmt__meta">
    <span class="wordmark">{{ $name }}</span>
    <span class="muted">© {{ date('Y') }} · 用心编写</span>
  </div>
</footer>

<script>
(function(){
  var root = document.documentElement;
  var saved = localStorage.getItem('theme');
  if(saved) root.setAttribute('data-theme', saved);
  document.getElementById('themeToggle').addEventListener('click', function(){
    var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  });
  var bar = document.getElementById('progress');
  function onScroll(){
    var h = document.documentElement.scrollHeight - window.innerHeight;
    bar.style.width = (h > 0 ? (window.scrollY / h) * 100 : 0) + '%';
  }
  window.addEventListener('scroll', onScroll, {passive:true});
  onScroll();
})();
</script>
</body>
</html>
