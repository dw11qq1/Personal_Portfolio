<!DOCTYPE html>
<html lang="zh-CN" data-theme="light">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>技术笔记 — {{ $name }}</title>
@include('partials.adsense')
<script>(function(){var t=localStorage.getItem('theme');if(t){document.documentElement.setAttribute('data-theme',t)}else if(window.matchMedia&&matchMedia('(prefers-color-scheme:dark)').matches){document.documentElement.setAttribute('data-theme','dark')}})();</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700&family=Noto+Sans+SC:wght@400;500;700&family=JetBrains+Mono:wght@400&display=swap" rel="stylesheet">
<style>
/* Hallmark · genre: studio-minimal · macrostructure: index list (content page) · design-system: design.md · designed-as-app */
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

.head{max-width:760px;margin:0 auto;padding:4rem clamp(1.25rem,4vw,3rem) 2.5rem}
.head .k{font-family:var(--font-mono);font-size:0.8rem;color:var(--accent);margin-bottom:1rem}
.head h1{font-family:var(--font-display);font-weight:700;font-size:clamp(2rem,4.5vw,3rem);line-height:1.15;letter-spacing:-0.01em}
.head .sub{margin-top:1rem;color:var(--ink-2);max-width:40ch}

.list{max-width:760px;margin:0 auto;padding:0 clamp(1.25rem,4vw,3rem) 4rem}
.post{display:block;text-decoration:none;color:inherit;border-top:1px solid var(--line);padding:1.75rem 0;transition:background-color 160ms ease}
.post:last-of-type{border-bottom:1px solid var(--line)}
.post .date{font-family:var(--font-mono);font-size:0.75rem;color:var(--ink-3)}
.post h2{font-family:var(--font-display);font-weight:700;font-size:1.3rem;line-height:1.35;margin-top:0.4rem;letter-spacing:-0.01em;transition:color 160ms ease}
.post:hover h2{color:var(--accent)}
.post .excerpt{color:var(--ink-2);font-size:0.95rem;margin-top:0.5rem;max-width:62ch;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.post img{width:100%;aspect-ratio:16/7;object-fit:cover;border:1px solid var(--line);margin-top:1rem}
.empty{max-width:760px;margin:0 auto;padding:2rem clamp(1.25rem,4vw,3rem) 5rem;color:var(--ink-3)}

.bottom-strip{border-top:1px solid var(--line);background:var(--panel)}
.bottom-strip .half{max-width:760px;margin:0 auto;padding:2rem clamp(1.25rem,4vw,3rem);display:flex;justify-content:space-between;align-items:baseline;gap:1rem;flex-wrap:wrap}
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

<div class="head">
  <p class="k">Blog · 技术笔记</p>
  <h1>写下来的思考。</h1>
  <p class="sub">记录开发路上踩过的坑、想明白的事。</p>
</div>

@if($posts->isEmpty())
  <div class="empty">还没有文章，敬请期待。</div>
@else
  <main class="list">
    @foreach($posts as $post)
      <a class="post" href="{{ route('blog.show', $post) }}">
        <span class="date">{{ $post->published_at->isoFormat('YYYY-MM-DD') }}</span>
        <h2>{{ $post->title }}</h2>
        <p class="excerpt">{{ $post->excerpt ?: \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
        @if($post->cover_image)
          <img src="{{ asset('storage/'.$post->cover_image) }}" alt="{{ $post->title }}" loading="lazy">
        @endif
      </a>
    @endforeach
  </main>
@endif

<footer class="bottom-strip">
  <div class="half">
    <a class="wordmark" href="/">← 返回主页</a>
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
