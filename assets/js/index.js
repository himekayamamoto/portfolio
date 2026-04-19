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

  // Works：デザインカンプ用モーダル（前へ／次えで切り替え）
  var worksModal = document.getElementById('works-design-modal');
  if (worksModal) {
    var modalImg = worksModal.querySelector('.works-modal__img');
    var modalTitle = worksModal.querySelector('.works-modal__title');
    var closeBtn = worksModal.querySelector('.works-modal__close');
    var prevBtn = worksModal.querySelector('.works-modal__prev');
    var nextBtn = worksModal.querySelector('.works-modal__next');
    var stepCurrentEl = worksModal.querySelector('.works-modal__step-current');
    var stepTotalEl = worksModal.querySelector('.works-modal__step-total');
    var stepLabelEl = worksModal.querySelector('.works-modal__step-label');
    var modalBody = worksModal.querySelector('.works-modal__body');
    var lastFocus = null;
    var slides = [];
    var currentIndex = 0;

    function buildSlides() {
      var seen = {};
      slides = [];
      document.querySelectorAll('.works__design-btn[data-modal-src]').forEach(function (btn) {
        var src = btn.getAttribute('data-modal-src');
        if (!src || seen[src]) return;
        seen[src] = true;
        slides.push({
          src: src,
          alt: btn.getAttribute('data-modal-alt') || '',
          label: btn.getAttribute('data-modal-label') || ''
        });
      });
    }

    function findSlideIndexBySrc(src) {
      for (var i = 0; i < slides.length; i++) {
        if (slides[i].src === src) return i;
      }
      return 0;
    }

    function applySlide() {
      if (!modalImg || slides.length === 0) return;
      var s = slides[currentIndex];
      modalImg.src = s.src;
      modalImg.alt = s.alt;
      if (modalTitle) {
        modalTitle.textContent = s.label ? s.label + ' — カンプ' : 'デザインカンプ';
      }
      if (stepCurrentEl) stepCurrentEl.textContent = String(currentIndex + 1);
      if (stepTotalEl) stepTotalEl.textContent = String(slides.length);
      if (stepLabelEl) {
        stepLabelEl.textContent = s.label ? '（' + s.label + '）' : '';
      }
      worksModal.setAttribute('aria-label', (s.label || 'カンプ') + 'の全体表示');
      if (modalBody) modalBody.scrollTop = 0;
    }

    function showSlideAt(index) {
      if (slides.length === 0) return;
      currentIndex = (index + slides.length) % slides.length;
      applySlide();
    }

    function openWorksModal(startIndex) {
      if (!modalImg || slides.length === 0) return;
      lastFocus = document.activeElement;
      currentIndex = (startIndex + slides.length) % slides.length;
      applySlide();
      if (typeof worksModal.showModal === 'function') {
        worksModal.showModal();
      }
    }

    function closeWorksModal() {
      if (typeof worksModal.close === 'function') {
        worksModal.close();
      }
    }

    buildSlides();

    document.querySelectorAll('.works__design-btn').forEach(function (btn) {
      btn.addEventListener('click', function () {
        var src = btn.getAttribute('data-modal-src');
        if (!src) return;
        buildSlides();
        openWorksModal(findSlideIndexBySrc(src));
      });
    });

    if (prevBtn) {
      prevBtn.addEventListener('click', function () {
        showSlideAt(currentIndex - 1);
      });
    }
    if (nextBtn) {
      nextBtn.addEventListener('click', function () {
        showSlideAt(currentIndex + 1);
      });
    }

    if (closeBtn) {
      closeBtn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        closeWorksModal();
      });
    }

    worksModal.addEventListener('click', function (e) {
      if (e.target.closest('.works-modal__close')) return;
      var rect = worksModal.getBoundingClientRect();
      var inDialog =
        e.clientX >= rect.left &&
        e.clientX <= rect.right &&
        e.clientY >= rect.top &&
        e.clientY <= rect.bottom;
      if (!inDialog) {
        closeWorksModal();
      }
    });

    worksModal.addEventListener('keydown', function (e) {
      if (!worksModal.open) return;
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        showSlideAt(currentIndex - 1);
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        showSlideAt(currentIndex + 1);
      }
    });

    worksModal.addEventListener('close', function () {
      if (modalImg) {
        modalImg.removeAttribute('src');
        modalImg.alt = '';
      }
      if (lastFocus && typeof lastFocus.focus === 'function') {
        lastFocus.focus();
      }
    });
  }
}

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
