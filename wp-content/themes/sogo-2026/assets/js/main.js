/**
 * Sogo 2026 – אנימציות.
 * GSAP + ScrollTrigger לאנימציות, Lenis לגלילה חלקה.
 * אם משתמש ביקש "פחות תנועה" (או שהספריות לא נטענו), הדף מוצג כולו ללא אנימציות.
 */
(function () {
  'use strict';

  var doc = document.documentElement;
  var qs = function (sel, ctx) { return (ctx || document).querySelector(sel); };
  var qsa = function (sel, ctx) { return Array.prototype.slice.call((ctx || document).querySelectorAll(sel)); };

  var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var hasLibs = !!(window.gsap && window.ScrollTrigger);

  var header = qs('#site-header');
  var menu = qs('#fullscreen-menu');
  var toggle = qs('.menu-toggle');
  var lenis = null;
  var darkCount = 0;
  var menuOpen = false;

  /* ---------- כותרת: צבע הלוגו מעל אזורים כהים ---------- */
  function updateHeader() {
    if (header) { header.classList.toggle('is-dark', menuOpen || darkCount > 0); }
  }

  /* ---------- תפריט מסך מלא ---------- */
  function menuOrigin() {
    var r = toggle.getBoundingClientRect();
    return Math.round(r.left + r.width / 2) + 'px ' + Math.round(r.top + r.height / 2) + 'px';
  }
  function finishClose() {
    menu.classList.remove('is-open');
    menu.setAttribute('aria-hidden', 'true');
    if (hasLibs) { gsap.set(menu, { clearProps: 'clipPath' }); }
  }
  function openMenu() {
    if (menuOpen) { return; }
    menuOpen = true;
    menu.classList.add('is-open');
    menu.setAttribute('aria-hidden', 'false');
    toggle.setAttribute('aria-expanded', 'true');
    if (lenis) { lenis.stop(); }
    updateHeader();
    if (hasLibs && !reduceMotion) {
      var o = menuOrigin();
      gsap.fromTo(menu, { clipPath: 'circle(0px at ' + o.replace(' ', ' ') + ')' }, { clipPath: 'circle(150vmax at ' + o + ')', duration: 0.95, ease: 'power3.inOut' });
      gsap.fromTo(qsa('.fullscreen-menu__list a'), { yPercent: 110 }, { yPercent: 0, duration: 0.85, stagger: 0.07, ease: 'power3.out', delay: 0.3 });
      gsap.fromTo('.fullscreen-menu__contact', { opacity: 0, y: 24 }, { opacity: 1, y: 0, duration: 0.7, ease: 'power2.out', delay: 0.65 });
    }
    var first = qs('.fullscreen-menu__list a');
    if (first) { setTimeout(function () { first.focus({ preventScroll: true }); }, 400); }
  }
  function closeMenu() {
    if (!menuOpen) { return; }
    menuOpen = false;
    toggle.setAttribute('aria-expanded', 'false');
    if (lenis) { lenis.start(); }
    if (hasLibs && !reduceMotion) {
      gsap.to(menu, { clipPath: 'circle(0px at ' + menuOrigin() + ')', duration: 0.75, ease: 'power3.inOut', onComplete: finishClose });
    } else {
      finishClose();
    }
    updateHeader();
    toggle.focus({ preventScroll: true });
  }
  if (toggle && menu) {
    toggle.addEventListener('click', function () { menuOpen ? closeMenu() : openMenu(); });
    document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { closeMenu(); } });
    menu.addEventListener('click', function (e) {
      var a = e.target.closest ? e.target.closest('a') : null;
      if (a) { closeMenu(); }
    });
  }

  /* ---------- מסך טעינה (לוגו + מונה אחוזים), פעם אחת בכל ביקור ---------- */
  var preloader = qs('#preloader');
  var introFn = null;
  var introReady = !preloader;
  function triggerIntro() {
    introReady = true;
    if (introFn) { var f = introFn; introFn = null; f(); }
  }
  (function initPreloader() {
    if (!preloader) { return; }
    var seen = false;
    try { seen = sessionStorage.getItem('sogo26Preloaded') === '1'; sessionStorage.setItem('sogo26Preloaded', '1'); } catch (e) {}
    function removeNow() {
      if (preloader.parentNode) { preloader.parentNode.removeChild(preloader); }
      doc.classList.remove('is-loading');
      triggerIntro();
    }
    if (reduceMotion || !hasLibs || seen) { removeNow(); return; }

    doc.classList.add('is-loading');
    var num = qs('[data-preloader-count]', preloader);
    var bar = qs('[data-preloader-bar]', preloader);
    var state = { p: 0 };
    var loaded = document.readyState === 'complete';
    var leaving = false;
    function render() {
      if (num) { num.textContent = String(Math.round(state.p * 100)); }
      if (bar) { bar.style.transform = 'scaleX(' + state.p + ')'; }
    }
    function leave() {
      if (leaving) { return; }
      leaving = true;
      gsap.to(state, { p: 1, duration: 0.5, ease: 'power2.out', onUpdate: render, onComplete: function () {
        gsap.delayedCall(0.2, function () {
          gsap.delayedCall(0.45, triggerIntro);
          gsap.to(preloader, { yPercent: -100, duration: 0.95, ease: 'power3.inOut', onComplete: removeNow });
        });
      } });
    }
    window.addEventListener('load', function () { loaded = true; });
    gsap.to(state, { p: 0.88, duration: 1.2, ease: 'power1.out', onUpdate: render, onComplete: function () {
      (function wait() { if (loaded) { leave(); } else { setTimeout(wait, 80); } })();
    } });
    setTimeout(function () { leave(); }, 8000); // רשת ביטחון
  })();

  /* ---------- סליידר הפתיחה (וידאו / תמונה) ---------- */
  (function initHeroSlider() {
    var hero = qs('[data-hero]');
    if (!hero) { return; }
    var slides = qsa('[data-slide]', hero);
    if (!slides.length) { return; }
    var caps = qsa('[data-caption]', hero);
    var dots = qsa('[data-dot]', hero);
    var seconds = parseInt(hero.getAttribute('data-seconds'), 10) || 7;
    var idx = 0, timer = null;

    function playVideos() {
      slides.forEach(function (s, k) {
        var v = qs('video', s);
        if (!v) { return; }
        if (k === idx && !reduceMotion) {
          var p = v.play();
          if (p && p.catch) { p.catch(function () {}); }
        } else {
          v.pause();
        }
      });
    }
    function go(i) {
      idx = (i + slides.length) % slides.length;
      slides.forEach(function (s, k) { s.classList.toggle('is-active', k === idx); });
      caps.forEach(function (c, k) { c.classList.toggle('is-active', k === idx); });
      dots.forEach(function (d, k) { d.classList.toggle('is-active', k === idx); });
      playVideos();
    }
    function stop() { if (timer) { clearInterval(timer); timer = null; } }
    function start() {
      stop();
      if (reduceMotion || slides.length < 2) { return; }
      timer = setInterval(function () { go(idx + 1); }, seconds * 1000);
    }
    dots.forEach(function (d) {
      d.addEventListener('click', function () { go(parseInt(d.getAttribute('data-dot'), 10) || 0); start(); });
    });
    hero.addEventListener('mouseenter', stop);
    hero.addEventListener('mouseleave', start);
    document.addEventListener('visibilitychange', function () { if (document.hidden) { stop(); } else { start(); } });
    go(0);
    start();
  })();

  if (!hasLibs || reduceMotion) {
    // הדף מוצג במצבו הסופי, בלי אנימציות.
    doc.classList.remove('js');
    return;
  }

  try {
    gsap.registerPlugin(ScrollTrigger);
    var isRTL = (document.dir || getComputedStyle(doc).direction) === 'rtl';

    /* ---------- גלילה חלקה ---------- */
    if (window.Lenis) {
      lenis = new Lenis({ lerp: 0.1, smoothWheel: true });
      lenis.on('scroll', ScrollTrigger.update);
      gsap.ticker.add(function (t) { lenis.raf(t * 1000); });
      gsap.ticker.lagSmoothing(0);

      // קישורי עוגן פנימיים (למשל #contact) גוללים בעדינות.
      qsa('a[href^="#"]').forEach(function (a) {
        a.addEventListener('click', function (e) {
          var id = a.getAttribute('href');
          var target = id.length > 1 ? qs(id) : null;
          if (target) { e.preventDefault(); lenis.scrollTo(target, { offset: 0, duration: 1.4 }); }
        });
      });
    }

    /* ---------- פתיחה ---------- */
    introFn = function () {
      gsap.fromTo(['.hero__kicker', '.hero__logo'], { y: 36, opacity: 0 }, { y: 0, opacity: 1, duration: 1.2, stagger: 0.14, ease: 'expo.out', delay: 0.15 });
      gsap.fromTo('.hero__scroll', { opacity: 0 }, { opacity: 1, duration: 1, delay: 1.1 });
    };
    if (introReady) { triggerIntro(); }
    // פרלקסה: הרקע של הפתיחה מתקרב ויורד לאט יותר מהגלילה
    gsap.to('.hero__media', {
      scale: 1.16, yPercent: 10, ease: 'none',
      scrollTrigger: { trigger: '[data-hero]', start: 'top top', end: 'bottom top', scrub: true }
    });
    gsap.to('[data-hero-inner]', {
      scale: 1.18, y: -70, opacity: 0, ease: 'none',
      scrollTrigger: { trigger: '[data-hero]', start: 'top top', end: 'bottom 25%', scrub: true }
    });
    gsap.to('.hero__scroll', {
      opacity: 0, ease: 'none',
      scrollTrigger: { trigger: '[data-hero]', start: 'top top', end: '25% top', scrub: true }
    });

    /* ---------- אודות: המשפט נחשף מילה אחרי מילה ---------- */
    var words = qsa('.about__text .w');
    if (words.length) {
      var tl = gsap.timeline({
        scrollTrigger: { trigger: '[data-about]', start: 'top top', end: 'bottom bottom', scrub: 0.6 }
      });
      words.forEach(function (w, i) {
        var hl = w.classList.contains('w--hl');
        tl.to(w, { color: hl ? '#ed1c24' : '#2b2a26', duration: 1, ease: 'none' }, i * 0.45);
      });
      tl.to({}, { duration: 1.2 }); // החזקה קצרה בסוף, כדי שהמשפט המלא יישאר על המסך
    }

    /* ---------- שירותים: מסך מלא ← הכרטיסים נכנסים מהצד ← נגללים לרוחב ← ורק אז יורדים קומה ---------- */
    var services = qs('[data-services]');
    if (services) {
      gsap.matchMedia().add('(min-width: 900px)', function () {
        var pin = qs('[data-pin]', services);
        var intro = qs('[data-intro]', services);
        var panel = qs('[data-panel]', services);
        var track = qs('[data-track]', services);
        var prog = qs('[data-progress]', services);
        if (!pin || !intro || !panel || !track) { return; }

        var ease = gsap.parseEase('power2.inOut');
        var clamp01 = gsap.utils.clamp(0, 1);
        var enterSign = isRTL ? -1 : 1; // ב-RTL הפאנל נכנס משמאל, ב-LTR מימין
        var moveSign = isRTL ? 1 : -1;  // ב-RTL הכרטיסים נעים ימינה, ב-LTR שמאלה
        var phaseA = function () { return window.innerHeight * 0.9; };                         // הפאנל נכנס
        var dist = function () { return Math.max(0, track.scrollWidth - panel.clientWidth); }; // הכרטיסים נגללים עד האחרון

        function render(progress) {
          var a = phaseA();
          var d = dist();
          var y = progress * (a + d);
          var pa = clamp01(y / a);
          var pb = d > 0 ? clamp01((y - a) / d) : 1;
          var e = ease(pa);
          gsap.set(panel, { xPercent: enterSign * 100 * (1 - e) });
          gsap.set(intro, { xPercent: -enterSign * 16 * e, filter: 'brightness(' + (1 - 0.5 * e) + ')' });
          gsap.set(track, { x: moveSign * d * pb });
          if (prog) { gsap.set(prog, { scaleX: pb }); }
        }

        ScrollTrigger.create({
          trigger: pin, start: 'top top', end: function () { return '+=' + (phaseA() + dist()); },
          pin: true, scrub: true, anticipatePin: 1, invalidateOnRefresh: true,
          onUpdate: function (self) { render(self.progress); },
          onRefresh: function (self) { render(self.progress); }
        });
        render(0);

        return function () { gsap.set([panel, intro, track].concat(prog ? [prog] : []), { clearProps: 'all' }); };
      });
    }

    /* ---------- סרטונים שמתנגנים רק כשרואים אותם ---------- */
    (function () {
      var vids = qsa('video[data-autoplay]');
      if (!vids.length || !('IntersectionObserver' in window)) { return; }
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (en) {
          var v = en.target;
          if (en.isIntersecting) { var p = v.play(); if (p && p.catch) { p.catch(function () {}); } } else { v.pause(); }
        });
      }, { threshold: 0.25 });
      vids.forEach(function (v) { io.observe(v); });
    })();

    /* ---------- לקוחות ---------- */
    var clients = qs('[data-clients]');
    if (clients) {
      gsap.to('.clients__title', {
        color: '#ffffff', ease: 'none',
        scrollTrigger: { trigger: '.clients__title', start: 'top 88%', end: 'top 38%', scrub: true }
      });
      gsap.from('.clients__item', {
        y: 56, opacity: 0, duration: 0.9, ease: 'power3.out', stagger: 0.08,
        scrollTrigger: { trigger: '.clients__grid', start: 'top 86%', once: true }
      });
    }

    /* ---------- תמונה שמתרחבת למסך מלא ---------- */
    var zoom = qs('[data-zoom]');
    if (zoom) {
      var zmedia = qs('[data-zoom-media]', zoom);
      var zimg = qs('.zoom__img', zoom);
      var zcap = qs('.zoom__caption', zoom);
      gsap.matchMedia().add({ wide: '(min-width: 641px)', narrow: '(max-width: 640px)' }, function (ctx) {
        var narrow = ctx.conditions.narrow;
        var ztl = gsap.timeline({ defaults: { ease: 'none' }, scrollTrigger: { trigger: zoom, start: 'top top', end: 'bottom bottom', scrub: 0.6 } });
        ztl.fromTo(zmedia, { clipPath: narrow ? 'inset(12% 6% round 28px)' : 'inset(16% 26% round 44px)' }, { clipPath: 'inset(0% 0% round 0px)', duration: 1 }, 0);
        ztl.fromTo(zimg, { scale: 1.35 }, { scale: 1, duration: 1 }, 0);
        if (zcap) { ztl.fromTo(zcap, { opacity: 0, y: 40 }, { opacity: 1, y: 0, duration: 0.5 }, 0.5); }
      });
    }

    /* ---------- מספרים שרצים מאפס ---------- */
    qsa('.stat__num').forEach(function (el) {
      var target = parseFloat(el.getAttribute('data-count')) || 0;
      var dec = parseInt(el.getAttribute('data-decimals'), 10) || 0;
      var fmt = function (v) { return v.toLocaleString('he-IL', { minimumFractionDigits: dec, maximumFractionDigits: dec }); };
      var o = { v: 0 };
      el.textContent = fmt(0);
      ScrollTrigger.create({
        trigger: el, start: 'top 88%', once: true,
        onEnter: function () {
          gsap.to(o, { v: target, duration: 2, ease: 'power2.out', onUpdate: function () { el.textContent = fmt(o.v); }, onComplete: function () { el.textContent = fmt(target); } });
        }
      });
    });
    if (qs('.stat')) {
      gsap.from('.stat', { y: 40, opacity: 0, duration: 0.9, ease: 'power3.out', stagger: 0.1, scrollTrigger: { trigger: '.stats__grid', start: 'top 86%', once: true } });
    }

    /* ---------- וידאו בתחתית שנשלט בגלילה ---------- */
    var fvideo = qs('[data-scrub-video]');
    var fwrap = qs('[data-footer]');
    if (fvideo && fwrap) {
      var fprogress = 0, fraf = 0;
      fvideo.pause();
      fvideo.addEventListener('loadedmetadata', function () { ScrollTrigger.refresh(); });
      ScrollTrigger.create({
        trigger: fwrap, start: 'top bottom', end: 'bottom bottom', scrub: true,
        onUpdate: function (self) {
          fprogress = self.progress;
          if (!fraf) {
            fraf = requestAnimationFrame(function () {
              fraf = 0;
              if (fvideo.duration) { fvideo.currentTime = fvideo.duration * fprogress; }
            });
          }
        }
      });
    }

    /* ---------- תחתית ---------- */
    var footer = qs('[data-footer]');
    if (footer) {
      gsap.from(['.site-footer__logo', '.site-footer__tagline', '.big-link', '.site-footer__list li'], {
        y: 40, opacity: 0, duration: 0.85, ease: 'power3.out', stagger: 0.07,
        scrollTrigger: { trigger: footer, start: 'top 80%', once: true }
      });
    }

    /* ---------- כותרת וצבעי לוגו מעל אזורים כהים ---------- */
    qsa('[data-dark], [data-clients], [data-footer]').forEach(function (el) {
      ScrollTrigger.create({
        trigger: el, start: 'top 70px', end: el.hasAttribute('data-clients') ? 'bottom-=48 top' : 'bottom top',
        onToggle: function (self) { darkCount += self.isActive ? 1 : -1; updateHeader(); }
      });
    });

    /* ---------- חישוב מחדש אחרי טעינת פונטים ותמונות ---------- */
    window.addEventListener('load', function () { ScrollTrigger.refresh(); });
    if (document.fonts && document.fonts.ready) { document.fonts.ready.then(function () { ScrollTrigger.refresh(); }); }
  } catch (err) {
    // אם משהו נכשל, מחזירים את הדף למצב סטטי ושמיש.
    doc.classList.remove('js');
    if (window.console) { console.error('[sogo2026]', err); }
  }
})();
