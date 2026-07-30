//
<script>
// ===== Hero Name Char Animation =====
(function() {
  const name = '{{ $name }}';
  const el = document.getElementById('heroName');
  let html = '';
  name.split('').forEach((ch, i) => {
    const accent = (i === name.length - 1) ? 'accent-char' : '';
    html += `<span class="char ${accent}" style="animation-delay:${0.1 + i * 0.08}s">${ch}</span>`;
  });
  el.innerHTML = html;
})();

// ===== Theme Toggle =====
function toggleTheme() {
  const html = document.documentElement;
  const next = html.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
  html.setAttribute('data-theme', next);
  localStorage.setItem('theme', next);
}
(function() {
  const saved = localStorage.getItem('theme');
  if (saved) document.documentElement.setAttribute('data-theme', saved);
  else if (window.matchMedia('(prefers-color-scheme: dark)').matches)
    document.documentElement.setAttribute('data-theme', 'dark');
})();

// ===== Custom Cursor =====
(function() {
  if (window.matchMedia('(pointer: coarse)').matches) return;
  const dot = document.getElementById('cursorDot');
  const ring = document.getElementById('cursorRing');
  let mx = 0, my = 0, rx = 0, ry = 0;
  document.addEventListener('mousemove', (e) => {
    mx = e.clientX; my = e.clientY;
    dot.style.left = mx + 'px'; dot.style.top = my + 'px';
  });
  function animateRing() {
    rx += (mx - rx) * 0.18; ry += (my - ry) * 0.18;
    ring.style.left = rx + 'px'; ring.style.top = ry + 'px';
    requestAnimationFrame(animateRing);
  }
  animateRing();
  // Hover states
  document.querySelectorAll('a, button, .project-card, .skill-circle, .stat-card, .timeline-card').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('hover'));
    el.addEventListener('mouseleave', () => ring.classList.remove('hover'));
  });
  document.querySelectorAll('input, textarea').forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('text'));
    el.addEventListener('mouseleave', () => ring.classList.remove('text'));
  });
})();

// ===== Scroll Progress + Nav + Back to Top + Section Active =====
const nav = document.getElementById('nav');
const backToTop = document.getElementById('backToTop');
const scrollProgress = document.getElementById('scrollProgress');
const sectionNavItems = document.querySelectorAll('.section-nav-item');
const sections = ['hero','about','skills','projects','experience','contact'].map(id => document.getElementById(id));

window.addEventListener('scroll', () => {
  const sy = window.scrollY;
  const docH = document.documentElement.scrollHeight - window.innerHeight;
  scrollProgress.style.width = (sy / docH * 100) + '%';
  nav.classList.toggle('scrolled', sy > 50);
  backToTop.classList.toggle('show', sy > 600);

  // Section active
  let current = 0;
  sections.forEach((sec, i) => {
    const rect = sec.getBoundingClientRect();
    if (rect.top <= window.innerHeight * 0.4) current = i;
  });
  sectionNavItems.forEach((item, i) => item.classList.toggle('active', i === current));
});

// Section nav click
sectionNavItems.forEach(item => {
  item.addEventListener('click', () => {
    const target = document.getElementById(item.dataset.target);
    target.scrollIntoView({ behavior: 'smooth' });
  });
});

// ===== Scroll Reveal =====
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      // Skill rings
      entry.target.querySelectorAll('.skill-ring-fill').forEach(fill => {
        const pct = parseInt(fill.dataset.percent);
        const offset = 314 - (314 * pct / 100);
        fill.style.strokeDashoffset = offset;
      });
      // Skill numbers
      entry.target.querySelectorAll('.skill-ring-text .num').forEach(num => {
        const target = parseInt(num.dataset.count);
        if (target && !num.dataset.animated) {
          num.dataset.animated = 'true';
          animateCount(num, target, '');
        }
      });
      // Stats
      entry.target.querySelectorAll('.stat-number').forEach(stat => {
        const target = parseInt(stat.dataset.count);
        if (target && !stat.dataset.animated) {
          stat.dataset.animated = 'true';
          animateCount(stat, target, '+');
        }
      });
      revealObserver.unobserve(entry.target);
    }
  });
}, { root: null, rootMargin: '0px 0px -80px 0px', threshold: 0.1 });
document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

function animateCount(el, target, suffix) {
  const duration = 1500, start = performance.now();
  function update(now) {
    const progress = Math.min((now - start) / duration, 1);
    const eased = 1 - Math.pow(1 - progress, 3);
    el.textContent = Math.round(eased * target) + suffix;
    if (progress < 1) requestAnimationFrame(update);
    else el.textContent = target + suffix;
  }
  requestAnimationFrame(update);
}

// ===== Contact Form =====
function handleSubmit(e) {
  e.preventDefault();
  const form = document.getElementById('contactForm');
  const btn = form.querySelector('.form-submit');
  btn.querySelector('span').textContent = '发送中...'; btn.disabled = true; btn.style.opacity = '0.7';
  setTimeout(() => {
    form.style.display = 'none';
    document.getElementById('formSuccess').classList.add('show');
  }, 800);
}

// ===== Hero visible on load =====
window.addEventListener('DOMContentLoaded', () => {
  document.querySelector('.hero-content').classList.add('visible');
});
</script>