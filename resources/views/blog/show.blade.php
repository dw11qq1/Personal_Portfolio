<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }} — {{ $name }}</title>
<meta name="description" content="{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}">
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
.theme-toggle{width:36px;height:36px;display:grid;place-items:center;border-radius:999px;border:1px solid var(--line);background:var(--surface);color:var(--ink);cursor:pointer;transition:border-color var(--dur-short) var(--ease-out),transform var(--dur-short) var(--ease-out)}
.theme-toggle:hover{border-color:var(--accent);transform:rotate(15deg) scale(1.05)}
.article-head{max-width:760px;margin:0 auto;padding:calc(var(--space-3xl) + 3rem) clamp(1.5rem,5vw,4rem) var(--space-xl)}
.article-back{font-family:var(--font-mono);font-size:0.78rem;color:var(--ink-3);text-decoration:none;transition:color var(--dur-short) var(--ease-out)}
.article-back:hover{color:var(--accent)}
.article-date{font-family:var(--font-mono);font-size:0.8rem;letter-spacing:0.08em;text-transform:uppercase;color:var(--accent);margin-top:var(--space-lg)}
.article-title{font-family:var(--font-serif);font-weight:600;font-size:clamp(2rem,5.5vw,3.5rem);line-height:1.1;letter-spacing:-0.02em;margin-top:var(--space-md)}
.article-cover{max-width:760px;margin:0 auto;padding:0 clamp(1.5rem,5vw,4rem)}
.article-cover img{width:100%;aspect-ratio:16/9;object-fit:cover;border-radius:1rem;border:1px solid var(--line)}
.prose{max-width:760px;margin:0 auto;padding:var(--space-xl) clamp(1.5rem,5vw,4rem) var(--space-3xl);font-size:1.05rem;color:var(--ink-2)}
.prose h2{font-family:var(--font-display);font-size:1.5rem;font-weight:700;letter-spacing:-0.01em;color:var(--ink);margin:var(--space-2xl) 0 var(--space-md);padding-left:0.75rem;border-left:3px solid var(--accent)}
.prose h3{font-family:var(--font-display);font-size:1.2rem;font-weight:700;color:var(--ink);margin:var(--space-lg) 0 var(--space-sm)}
.prose p{margin-bottom:var(--space-md)}
.prose a{color:var(--accent);text-decoration:underline;text-underline-offset:3px}
.prose ul,.prose ol{padding-left:1.5rem;margin-bottom:var(--space-md)}
.prose li{margin-bottom:0.45rem}
.prose li::marker{color:var(--accent)}
.prose blockquote{border-left:3px solid var(--accent);background:var(--accent-soft);border-radius:0 0.5rem 0.5rem 0;padding:var(--space-md) var(--space-lg);color:var(--ink);margin:var(--space-lg) 0;font-style:normal}
.prose code{font-family:var(--font-mono);font-size:0.85em;background:var(--accent-soft);color:var(--ink);border-radius:0.4rem;padding:0.15em 0.5em}
.prose pre{background:oklch(20% 0.02 200);color:oklch(90% 0.01 200);border-radius:0.75rem;padding:var(--space-md) var(--space-lg);overflow-x:auto;margin:var(--space-lg) 0;font-size:0.9rem;line-height:1.7;box-shadow:0 8px 24px -12px oklch(0% 0 0 / 0.25)}
.prose pre code{background:none;color:inherit;padding:0;font-size:inherit}
.prose hr{border:none;border-top:1px solid var(--line);margin:var(--space-xl) 0}
.prose img{max-width:100%;border-radius:0.75rem;border:1px solid var(--line);margin:var(--space-lg) 0}
.prose strong{color:var(--ink);font-weight:700}
.foot-stmt{max-width:760px;margin:0 auto;padding:var(--space-2xl) clamp(1.5rem,5vw,4rem) var(--space-2xl);border-top:1px solid var(--line);display:flex;justify-content:space-between;align-items:baseline;flex-wrap:wrap;gap:var(--space-md)}
.foot-stmt .wordmark{font-family:var(--font-mono);font-weight:600;color:var(--ink);text-decoration:none}
.foot-stmt .muted{color:var(--ink-3);font-size:0.85rem}
@media (max-width:640px){.nav-pill__links{display:none}}
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

<header class="article-head">
  <a class="article-back" href="/blog">← 全部文章</a>
  <p class="article-date">{{ $post->published_at->isoFormat('YYYY 年 MM 月 DD 日') }}</p>
  <h1 class="article-title">{{ $post->title }}</h1>
</header>

@if($post->cover_image)
  <div class="article-cover"><img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}"></div>
@endif

<main class="prose">{!! $post->content !!}</main>

<footer class="foot-stmt">
  <a class="wordmark" href="/blog">← 更多文章</a>
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
