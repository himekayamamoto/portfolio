/**
 * 共通JS：ハンバーガーメニュー ＋ TOPアニメーション
 * DOM準備後にまとめて実行
 */
function init() {
  // ハンバーガーメニュー：開閉
  var header = document.querySelector('.header');
  var toggle = document.querySelector('.nav__toggle');
  var nav = document.getElementById('nav-menu');
  if (header && toggle && nav) {
    function openMenu() {
      header.classList.add('is-open');
      toggle.setAttribute('aria-expanded', 'true');
      toggle.setAttribute('aria-label', 'メニューを閉じる');
      nav.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }
    function closeMenu() {
      header.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      toggle.setAttribute('aria-label', 'メニューを開く');
      nav.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }
    toggle.addEventListener('click', function () {
      header.classList.contains('is-open') ? closeMenu() : openMenu();
    });
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeMenu);
    });
  }

  // TOPセクション：タイトル1文字ずつ＋サブタイトル
  var titleEl = document.getElementById('top-title');
  if (titleEl) {
    var text = titleEl.innerText || titleEl.textContent || '';
    if (!text || !text.trim()) return;
    titleEl.textContent = '';
    for (var i = 0; i < text.length; i++) {
      if (text[i] === '\n') {
        titleEl.appendChild(document.createElement('br'));
        continue;
      }
      var span = document.createElement('span');
      span.className = 'char' + (text[i] === ' ' ? ' is-space' : '');
      span.textContent = text[i];
      titleEl.appendChild(span);
    }
    var chars = titleEl.querySelectorAll('.char');
    var subtitleEl = document.getElementById('top-subtitle');
    if (chars.length === 0) return;

    function runTopAnimation() {
      if (typeof gsap !== 'undefined') {
        gsap.fromTo(chars, { opacity: 0, y: 28, scale: 0.92 }, {
          opacity: 1,
          y: 0,
          scale: 1,
          duration: 0.6,
          stagger: 0.035,
          ease: 'power3.out',
          delay: 0.15
        });
        if (subtitleEl) {
          gsap.to(subtitleEl, {
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: 1.1,
            ease: 'power2.out'
          });
        }
      } else {
        chars.forEach(function (el) {
          el.style.opacity = '1';
          el.style.transform = 'translateY(0) scale(1)';
        });
        if (subtitleEl) {
          subtitleEl.style.opacity = '1';
          subtitleEl.style.transform = 'translateY(0)';
        }
      }
    }

    function startAnimation() {
      requestAnimationFrame(function () {
        requestAnimationFrame(runTopAnimation);
      });
    }

    if (typeof gsap !== 'undefined') {
      startAnimation();
    } else {
      window.addEventListener('load', startAnimation);
      setTimeout(startAnimation, 150);
    }
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
