<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $name }} — {{ $title }}</title>
@include('partials.adsense')
<script>(function(){var t=localStorage.getItem('theme');if(t){document.documentElement.setAttribute('data-theme',t)}else if(window.matchMedia&&matchMedia('(prefers-color-scheme:dark)').matches){document.documentElement.setAttribute('data-theme','dark')}})();</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Noto+Sans+SC:wght@400;500;700&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">
<style>
/* Hallmark · genre: studio-minimal · macrostructure: Split Studio · design-system: design.md · designed-as-app */
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --bg:#fbfbf8; --panel:#efefe9; --line:#ddddd2;
  --ink:#1a1c1a; --ink-2:#44473f; --ink-3:#7c7f75;
  --accent:#2f6b4f; --accent-ink:#f4f6f2;
  --font-display:'Sora','Noto Sans SC',sans-serif;
  --font-body:'Noto Sans SC',Arial,system-ui,-apple-system,sans-serif;
  --font-mono:'JetBrains Mono','Noto Sans SC',monospace;
}
[data-theme="dark"]{
  --bg:#1a1c1a; --panel:#222522; --line:#33362f;
  --ink:#f2f3ef; --ink-2:#c3c6bd; --ink-3:#8b8e83;
  --accent:#6fbf94; --accent-ink:#16241d;
}
html{scroll-behavior:smooth;overflow-x:clip}
body{font-family:var(--font-body);background:var(--bg);color:var(--ink);font-size:16px;line-height:1.7;-webkit-font-smoothing:antialiased;transition:background-color 300ms ease,color 300ms ease}
:focus-visible{outline:2px solid var(--accent);outline-offset:3px}
a{color:inherit}

.top{display:flex;justify-content:space-between;align-items:center;padding:1.5rem clamp(1.25rem,4vw,3rem);gap:1rem}
.top .wordmark{font-family:var(--font-display);font-weight:700;font-size:1.05rem;text-decoration:none}
.top nav{display:flex;gap:1.5rem;align-items:center}
.top nav a{text-decoration:none;font-size:0.88rem;color:var(--ink-3);transition:color 160ms ease}
.top nav a:hover{color:var(--accent)}
.theme-toggle{width:32px;height:32px;display:grid;place-items:center;border:none;background:transparent;border-radius:8px;color:var(--ink-3);cursor:pointer;transition:background-color 160ms ease,color 160ms ease}
.theme-toggle:hover{background:var(--panel);color:var(--ink)}

.split{display:grid;grid-template-columns:1fr 1fr;min-height:56vh}
.half{padding:clamp(1.5rem,4vw,3.5rem);display:flex;flex-direction:column;justify-content:center}
.half--text .role{font-family:var(--font-mono);font-size:0.8rem;color:var(--accent);margin-bottom:1rem}
.half--text h1{font-family:var(--font-display);font-weight:700;font-size:clamp(2.2rem,5vw,3.6rem);line-height:1.12;letter-spacing:-0.01em}
.half--text .tag{margin-top:1.25rem;color:var(--ink-2);max-width:32ch}
.chip{display:inline-block;margin-top:1.75rem;width:fit-content;font-size:0.9rem;font-weight:500;text-decoration:none;border:1.5px solid var(--ink);border-radius:999px;padding:0.55rem 1.4rem;transition:background-color 160ms ease,color 160ms ease,border-color 160ms ease}
.chip:hover{background:var(--accent);border-color:var(--accent);color:var(--accent-ink)}
.half--proof{background:var(--panel);border-left:1px solid var(--line)}
.stack-list{list-style:none;font-family:var(--font-mono);font-size:0.88rem;color:var(--ink-2);width:100%}
.stack-list li{padding:0.55rem 0;border-bottom:1px dashed var(--line);display:flex;justify-content:space-between;gap:1rem}
.stack-list li:last-child{border-bottom:none}
.stack-list .v{color:var(--ink-3);font-size:0.75rem}

.block{display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line)}
.block .half{min-height:340px}
.block .num{font-family:var(--font-display);font-weight:700;font-size:0.85rem;color:var(--accent);letter-spacing:0.08em;margin-bottom:1rem}
.block h2{font-family:var(--font-display);font-weight:700;font-size:clamp(1.5rem,3vw,2.1rem);line-height:1.2;letter-spacing:-0.01em}
.block .desc{margin-top:1rem;color:var(--ink-2);font-size:0.98rem;max-width:48ch}
.block .tags{margin-top:1.25rem;display:flex;gap:0.5rem;flex-wrap:wrap}
.block .tags span{font-family:var(--font-mono);font-size:0.72rem;color:var(--ink-2);border:1px solid var(--line);border-radius:6px;padding:0.15rem 0.6rem}
.block--flip .half--text{order:2}
.block--flip .half--proof{order:1;border-left:none;border-right:1px solid var(--line)}
.half--proof img{width:100%;height:100%;object-fit:cover}
.proof-grid{display:grid;grid-template-columns:1fr 1fr;gap:1px;background:var(--line);border:1px solid var(--line);width:100%}
.stat{background:var(--panel);padding:1.4rem 1.2rem;display:flex;flex-direction:column;gap:0.4rem}
.stat .v{font-family:var(--font-display);font-weight:700;font-size:1.35rem;line-height:1.15;color:var(--accent);letter-spacing:-0.01em}

.band{border-top:1px solid var(--line)}
.band-head{padding:2.5rem clamp(1.25rem,4vw,3rem) 1.5rem;display:flex;justify-content:space-between;align-items:baseline;gap:1rem;flex-wrap:wrap}
.band-head h2{font-family:var(--font-display);font-weight:700;font-size:clamp(1.5rem,3vw,2.1rem);letter-spacing:-0.01em}
.band-head .k{font-family:var(--font-mono);font-size:0.78rem;color:var(--accent)}
.about-meta{display:grid;grid-template-columns:repeat(3,1fr);gap:1px;background:var(--line);border-top:1px solid var(--line);border-bottom:1px solid var(--line)}
.about-meta>div{background:var(--panel);padding:1.4rem clamp(1.25rem,4vw,3rem);font-size:0.82rem;color:var(--ink-3)}
.about-meta strong{display:block;font-family:var(--font-display);font-weight:600;color:var(--ink);font-size:1rem;margin-top:0.3rem}
.exp-item{padding:1.4rem clamp(1.25rem,4vw,3rem);border-bottom:1px dashed var(--line);display:grid;grid-template-columns:11rem minmax(0,1fr);gap:1rem}
.exp-item:last-of-type{border-bottom:none}
.exp-date{font-family:var(--font-mono);font-size:0.8rem;color:var(--ink-3)}
.exp-title{font-weight:500}
.exp-company{font-size:0.9rem;color:var(--accent)}
.exp-desc{font-size:0.92rem;color:var(--ink-2);margin-top:0.3rem}

.bottom-split{display:grid;grid-template-columns:1fr 1fr;border-top:1px solid var(--line)}
.bottom-split .half:first-child{background:var(--ink);color:var(--bg)}
.bottom-split .half:first-child h2{font-family:var(--font-display);font-weight:700;font-size:1.5rem}
.bottom-split .half:first-child p{margin-top:0.75rem;color:var(--ink-3);font-size:0.92rem}
.bottom-split .half:last-child ul{list-style:none;font-family:var(--font-mono);font-size:0.9rem;width:100%}
.bottom-split .half:last-child li{padding:0.7rem 0;border-bottom:1px dashed var(--line)}
.bottom-split .half:last-child li:last-child{border-bottom:none}
.bottom-split .half:last-child a{text-decoration:none;transition:color 160ms ease}
.bottom-split .half:last-child a:hover{color:var(--accent)}

footer{padding:1.5rem clamp(1.25rem,4vw,3rem);display:flex;justify-content:space-between;gap:1rem;flex-wrap:wrap;border-top:1px solid var(--line)}
footer .wordmark{font-family:var(--font-display);font-weight:700;text-decoration:none}
footer .muted{font-family:var(--font-mono);font-size:0.75rem;color:var(--ink-3)}

@media (max-width:768px){
  .split,.block,.bottom-split{grid-template-columns:1fr;min-height:0}
  .half{padding:2rem clamp(1.25rem,4vw,3rem)}
  .half--proof{border-left:none;border-top:1px solid var(--line);min-height:0}
  .block--flip .half--text{order:1}
  .block--flip .half--proof{order:2;border-right:none}
  .about-meta{grid-template-columns:1fr}
  .exp-item{grid-template-columns:1fr;gap:0.25rem}
}
@media (prefers-reduced-motion:reduce){
  *{transition-duration:0ms!important}
}
</style>
</head>
<body>

<header class="top">
  <a href="#top" class="wordmark">{{ $name }}</a>
  <nav>
    <a href="#work">作品</a>
    @if($experiences->isNotEmpty())<a href="#exp">经历</a>@endif
    <a href="/blog">博客</a>
    <a href="#contact">联系</a>
    <button class="theme-toggle" id="themeToggle" aria-label="切换主题">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
    </button>
  </nav>
</header>

<section class="split" id="top">
  <div class="half half--text">
    <p class="role">{{ $title }}</p>
    <h1>{{ $subtitle }}</h1>
    <p class="tag">从数据库设计到服务器运维，一个人走完整条链路。</p>
    <a class="chip" href="#work">看作品 ↓</a>
  </div>
  <div class="half half--proof">
    <ul class="stack-list">
      <li><span>PHP / Laravel</span><span class="v">主力栈</span></li>
      <li><span>MySQL</span><span class="v">数据库设计</span></li>
      <li><span>Java / Spring Boot</span><span class="v">全栈项目</span></li>
      <li><span>Linux / 宝塔</span><span class="v">部署运维</span></li>
      <li><span>Pest</span><span class="v">自动化测试</span></li>
    </ul>
  </div>
</section>

<main id="work">
  @foreach($projects as $p)
  <article class="block @if($loop->odd){{ 'block--flip' }}@endif">
    <div class="half half--text">
      <p class="num">P.0{{ $loop->iteration }}</p>
      <h2>{{ $p->name }}</h2>
      <p class="desc">{{ $p->description }}</p>
      <div class="tags">
        @foreach((array)$p->tags as $t)
          <span>{{ $t }}</span>
        @endforeach
      </div>
      @if($p->repo_url || $p->live_url)
        <a class="chip" href="{{ $p->live_url ?: $p->repo_url }}" @if(str_starts_with($p->live_url ?: $p->repo_url, 'http')) target="_blank" rel="noopener" @endif>查看项目 →</a>
      @endif
    </div>
    <div class="half half--proof">
      @if($p->cover_image)
        <img src="{{ asset('storage/'.$p->cover_image) }}" alt="{{ $p->name }}" loading="lazy">
      @else
        <div class="proof-grid">
          @foreach((array)$p->tags as $t)
            <div class="stat"><span class="v">{{ $t }}</span></div>
          @endforeach
        </div>
      @endif
    </div>
  </article>
  @endforeach

  <section class="band" id="about">
    <div class="band-head">
      <h2>把复杂业务，写成清晰的代码。</h2>
      <span class="k">关于</span>
    </div>
    <div class="about-meta">
      <div>所在地<strong>远程协作 / Remote</strong></div>
      <div>主力栈<strong>Laravel / PHP · Java</strong></div>
      <div>状态<strong>接单中</strong></div>
    </div>
  </section>

  @if($experiences->isNotEmpty())
  <section class="band" id="exp">
    <div class="band-head">
      <h2>走过的时间线。</h2>
      <span class="k">经历</span>
    </div>
    @foreach($experiences as $exp)
      <div class="exp-item">
        <div class="exp-date">{{ $exp->date_range }}</div>
        <div>
          <div class="exp-title">{{ $exp->title }} <span class="exp-company">· {{ $exp->company }}</span></div>
          <p class="exp-desc">{{ $exp->description }}</p>
        </div>
      </div>
    @endforeach
  </section>
  @endif

  <section class="bottom-split" id="contact">
    <div class="half">
      <h2>有项目想聊聊？</h2>
      <p>后端开发、Laravel 项目、接口设计与部署运维，欢迎邮件或 GitHub 联系。</p>
    </div>
    <div class="half">
      <ul>
        <li><a href="mailto:3023207113@qq.com">3023207113@qq.com</a></li>
        <li><a href="https://github.com/dw11qq1" target="_blank" rel="noopener">github.com/dw11qq1 ↗</a></li>
        <li><a href="/blog">技术笔记 · 博客 →</a></li>
      </ul>
    </div>
  </section>
</main>

<footer>
  <a class="wordmark" href="#top">{{ $name }}</a>
  <span class="muted">© {{ date('Y') }} · Built with Laravel 13</span>
</footer>

<script>
(function(){
  var root = document.documentElement;
  document.getElementById('themeToggle').addEventListener('click', function(){
    var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  });
})();
</script>
</body>
</html>
