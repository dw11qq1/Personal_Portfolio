<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>技术笔记 — {{ $name }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Fraunces:opsz,wght@9..144,400;9..144,600&family=JetBrains+Mono:wght@400;600&family=Noto+Sans+SC:wght@400;500;700&family=Noto+Serif+SC:wght@500;600&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --paper:    oklch(96% 0.012 190);
  --paper-2:  oklch(98.5% 0.006 190);
  --surface:  oklch(99% 0.004 190);
  --ink:      oklch(23% 0.022 200);
  --ink-2:    oklch(45% 0.016 200);
  --ink-3:    oklch(62% 0.012 200);
  --line:     oklch(86% 0.010 200);
  --accent:   oklch(48% 0.072 188);
  --accent-soft: oklch(93% 0.020 190);
  --font-display:'Space Grotesk','Noto Sans SC',-apple-system,sans-serif;
  --font-body:'Space Grotesk','Noto Sans SC',-apple-system,sans-serif;
  --font-serif:'Fraunces','Noto Serif SC',Georgia,serif;
  --font-mono:'JetBrains Mono','Fira Code',monospace;
  --space-md:1rem; --space-lg:1.5rem; --space-xl:2.5rem; --space-2xl:4rem; --space-3xl:6rem;
  --ease-out:cubic-bezier(0.16,1,0.3,1);
  --dur-short:220ms;
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
  --accent-soft: oklch(24% 0.030 190);
}
html{scroll-behavior:smooth;overflow-x:clip}
body{font-family:var(--font-body);background-color:var(--paper);color:var(--ink);line-height:1.6;-webkit-font-smoothing:antialiased;transition:background-color 420ms var(--ease-out),color 420ms var(--ease-out)}
:focus-visible{outline:2px solid var(--accent);outline-offset:3px}
.nav-pill{position:fixed;inset:1rem auto auto 50%;transform:translateX(-50%);display:inline-flex;align-items:center;gap:1.5rem;padding:0.5rem 0.75rem 0.5rem 1.25rem;background:color-mix(in oklch,var(--paper) 78%,transparent);backdrop-filter:blur(14px) saturate(120%);border:1px solid var(--line);border-radius:999px;box-shadow:0 8px 24px -12px oklch(0% 0 0 / 0.18);z-index:40;max-width:min(92vw,720px)}
.nav-pill .wordmark{font-family:var(--font-mono);font-weight:600;font-size:0.95rem;letter-spacing:-0.01em;color:var(--ink);text-decoration:none}
.nav-pill__links{display:flex;gap:1rem;list-style:none}
.nav-pill__links a{color:var(--ink-2);text-decoration:none;font-size:0.9rem;font-weight:500;transition:color var(--dur-short) var(--ease-out)}
.nav-pill__links a:hover{color:var(--accent)}
.nav-pill__links a[aria-current="page"]{color:var(--accent)}
.theme-toggle{width:36px;height:36px;display:grid;place-items:center;border-radius:999px;border:1px solid var(--line);background:var(--surface);color:var(--ink);cursor:pointer;transition:border-color var(--dur-short) var(--ease-out),transform var(--dur-short) var(--ease-out)}
.theme-toggle:hover{border-color:var(--accent);transform:rotate(15deg) scale(1.05)}
.blog-head{max-width:820px;margin:0 auto;padding:calc(var(--space-3xl) + 3rem) clamp(1.5rem,5vw,4rem) var(--space-xl)}
.blog-role{font-family:var(--font-mono);font-size:0.8rem;letter-spacing:0.08em;text-transform:uppercase;color:var(--accent);margin-bottom:var(--space-md)}
.blog-title{font-family:var(--font-serif);font-weight:600;font-size:clamp(2.25rem,6vw,4rem);line-height:1;letter-spacing:-0.02em}
.blog-list{max-width:820px;margin:0 auto;padding:0 clamp(1.5rem,5vw,4rem) var(--space-3xl);display:flex;flex-direction:column;gap:var(--space-lg)}
.post-card{display:flex;gap:var(--space-lg);background:var(--surface);border:1px solid var(--line);border-radius:1.25rem;padding:var(--space-lg);text-decoration:none;color:inherit;transition:transform var(--dur-short) var(--ease-out),border-color var(--dur-short) var(--ease-out)}
.post-card:hover{transform:translateY(-2px);border-color:var(--accent)}
.post-card__cover{width:180px;aspect-ratio:16/9;object-fit:cover;border-radius:0.75rem;border:1px solid var(--line);flex-shrink:0}
.post-card__body{display:flex;flex-direction:column;min-width:0}
.post-card__date{font-family:var(--font-mono);font-size:0.72rem;color:var(--ink-3)}
.post-card__title{font-family:var(--font-display);font-size:1.2rem;font-weight:700;letter-spacing:-0.01em;margin-top:0.25rem}
.post-card:hover .post-card__title{color:var(--accent)}
.post-card__excerpt{color:var(--ink-2);font-size:0.9rem;margin-top:0.4rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.blog-empty{max-width:820px;margin:0 auto;padding:var(--space-2xl) clamp(1.5rem,5vw,4rem) var(--space-3xl);color:var(--ink-3)}
.foot-stmt{max-width:820px;margin:0 auto;padding:var(--space-2xl) clamp(1.5rem,5vw,4rem) var(--space-2xl);border-top:1px solid var(--line);display:flex;justify-content:space-between;align-items:baseline;flex-wrap:wrap;gap:var(--space-md)}
.foot-stmt .wordmark{font-family:var(--font-mono);font-weight:600;color:var(--ink);text-decoration:none}
.foot-stmt .muted{color:var(--ink-3);font-size:0.85rem}
@media (max-width:640px){
  .nav-pill__links{display:none}
  .post-card{flex-direction:column}
  .post-card__cover{width:100%}
}
</style>
</head>
<body>
<nav class="nav-pill" aria-label="Primary">
  <a href="/" class="wordmark">{{ $name }}</a>
  <ul class="nav-pill__links">
    <li><a href="/#work">作品</a></li>
    <li><a href="/#exp">经历</a></li>
    <li><a href="/blog" aria-current="page">博客</a></li>
    <li><a href="/#contact">联系</a></li>
  </ul>
  <button class="theme-toggle" id="themeToggle" aria-label="切换主题">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
  </button>
</nav>

<header class="blog-head">
  <p class="blog-role">Blog · 技术笔记</p>
  <h1 class="blog-title">写下来的思考。</h1>
</header>

@if($posts->isEmpty())
  <div class="blog-empty">还没有文章，敬请期待。</div>
@else
  <main class="blog-list">
    @foreach($posts as $post)
      <a class="post-card" href="{{ route('blog.show', $post) }}">
        @if($post->cover_image)
          <img class="post-card__cover" src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" loading="lazy">
        @endif
        <div class="post-card__body">
          <span class="post-card__date">{{ $post->published_at->isoFormat('YYYY-MM-DD') }}</span>
          <span class="post-card__title">{{ $post->title }}</span>
          <p class="post-card__excerpt">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
        </div>
      </a>
    @endforeach
  </main>
@endif

<footer class="foot-stmt">
  <a class="wordmark" href="/">← 返回主页</a>
  <span class="muted">© {{ date('Y') }} · 用心编写</span>
</footer>

<script>
(function(){
  var root = document.documentElement;
  var saved = localStorage.getItem('theme');
  if(saved){
    root.setAttribute('data-theme', saved);
  } else if(window.matchMedia && matchMedia('(prefers-color-scheme:dark)').matches){
    root.setAttribute('data-theme', 'dark');
  }
  document.getElementById('themeToggle').addEventListener('click', function(){
    var next = root.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
    root.setAttribute('data-theme', next);
    localStorage.setItem('theme', next);
  });
})();
</script>
</body>
</html>
