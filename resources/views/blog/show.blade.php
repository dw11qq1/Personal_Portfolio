<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }} — {{ $name }}</title>
<meta name="description" content="{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}">
@include('partials.adsense')
<script>(function(){var t=localStorage.getItem('theme');if(t){document.documentElement.setAttribute('data-theme',t)}else if(window.matchMedia&&matchMedia('(prefers-color-scheme:dark)').matches){document.documentElement.setAttribute('data-theme','dark')}})();</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Noto+Sans+SC:wght@400;500;700&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">
<style>
/* Hallmark · genre: studio-minimal · macrostructure: long-form article (content page) · design-system: design.md · designed-as-app */
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
.top nav a[aria-current="page"]{color:var(--accent)}
.theme-toggle{width:32px;height:32px;display:grid;place-items:center;border:none;background:transparent;border-radius:8px;color:var(--ink-3);cursor:pointer;transition:background-color 160ms ease,color 160ms ease}
.theme-toggle:hover{background:var(--panel);color:var(--ink)}

.article-head{max-width:720px;margin:0 auto;padding:3.5rem clamp(1.25rem,4vw,3rem) 2rem}
.back{font-family:var(--font-mono);font-size:0.82rem;color:var(--ink-3);text-decoration:none;transition:color 160ms ease}
.back:hover{color:var(--accent)}
.article-head .date{font-family:var(--font-mono);font-size:0.8rem;color:var(--accent);margin-top:2rem}
.article-head h1{font-family:var(--font-display);font-weight:700;font-size:clamp(1.8rem,4vw,2.5rem);line-height:1.25;letter-spacing:-0.01em;margin-top:0.6rem}
.article-cover{max-width:720px;margin:0 auto;padding:0 clamp(1.25rem,4vw,3rem)}
.article-cover img{width:100%;aspect-ratio:16/7;object-fit:cover;border:1px solid var(--line)}

.prose{max-width:720px;margin:0 auto;padding:2rem clamp(1.25rem,4vw,3rem) 4rem;font-size:1rem;color:var(--ink-2)}
.prose h2{font-family:var(--font-display);font-weight:700;font-size:1.4rem;color:var(--ink);margin:2.5rem 0 0.8rem;letter-spacing:-0.01em}
.prose h3{font-family:var(--font-display);font-weight:600;font-size:1.15rem;color:var(--ink);margin:1.8rem 0 0.6rem}
.prose p{margin-bottom:1.1rem}
.prose a{color:var(--accent);text-decoration:underline;text-underline-offset:3px}
.prose ul,.prose ol{padding-left:1.5rem;margin-bottom:1.1rem}
.prose li{margin-bottom:0.4rem}
.prose li::marker{color:var(--accent)}
.prose blockquote{border-left:3px solid var(--accent);background:var(--panel);padding:1rem 1.4rem;color:var(--ink);margin:1.5rem 0}
.prose code{font-family:var(--font-mono);font-size:0.85em;background:var(--panel);border:1px solid var(--line);color:var(--ink);border-radius:5px;padding:0.12em 0.45em}
.prose pre{background:#222522;color:#e6e8e2;border:1px solid #33362f;padding:1.1rem 1.4rem;overflow-x:auto;margin:1.5rem 0;font-size:0.88rem;line-height:1.7}
.prose pre code{background:none;border:none;color:inherit;padding:0;font-size:inherit}
.prose hr{border:none;border-top:1px solid var(--line);margin:2.5rem 0}
.prose img{max-width:100%;border:1px solid var(--line);margin:1.5rem 0}
.prose strong{color:var(--ink);font-weight:600}

.bottom-strip{border-top:1px solid var(--line);background:var(--panel)}
.bottom-strip .half{max-width:720px;margin:0 auto;padding:2rem clamp(1.25rem,4vw,3rem);display:flex;justify-content:space-between;align-items:baseline;gap:1rem;flex-wrap:wrap}
.bottom-strip .wordmark{font-family:var(--font-display);font-weight:700;text-decoration:none}
.bottom-strip .muted{font-family:var(--font-mono);font-size:0.75rem;color:var(--ink-3)}

@media (max-width:768px){
  .top nav a:not(.keep){display:none}
}
@media (prefers-reduced-motion:reduce){
  *{transition-duration:0ms!important}
}
</style>
</head>
<body>

<header class="top">
  <a href="/" class="wordmark">{{ $name }}</a>
  <nav>
    <a href="/#work">作品</a>
    <a href="/blog" aria-current="page" class="keep">博客</a>
    <a href="/#contact">联系</a>
    <button class="theme-toggle" id="themeToggle" aria-label="切换主题">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.9 4.9l1.4 1.4M17.7 17.7l1.4 1.4M2 12h2M20 12h2M4.9 19.1l1.4-1.4M17.7 6.3l1.4-1.4"/></svg>
    </button>
  </nav>
</header>

<header class="article-head">
  <a class="back" href="/blog">← 全部文章</a>
  <p class="date">{{ $post->published_at->isoFormat('YYYY 年 MM 月 DD 日') }}</p>
  <h1>{{ $post->title }}</h1>
</header>

@if($post->cover_image)
  <div class="article-cover"><img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}"></div>
@endif

<main class="prose">{!! $post->content !!}</main>

<footer class="bottom-strip">
  <div class="half">
    <a class="wordmark" href="/blog">← 更多文章</a>
    <span class="muted">© {{ date('Y') }} · 用心编写</span>
  </div>
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
