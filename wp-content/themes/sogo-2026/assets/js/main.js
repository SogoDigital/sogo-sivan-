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
    gsap.fromTo(['.hero__kicker', '.hero__logo'], { y: 36, opacity: 0 }, { y: 0, opacity: 1, duration: 1.2, stagger: 0.14, ease: 'expo.out', delay: 0.15 });
    gsap.fromTo('.hero__scroll', { opacity: 0 }, { opacity: 1, duration: 1, delay: 1.1 });
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

    /* ---------- שירותים ---------- */
    var services = qs('[data-services]');
    if (services) {
      // עיגולי הרקע נעים לאט יותר מהגלילה
      gsap.to('.orb--red', { yPercent: -28, ease: 'none', scrollTrigger: { trigger: services, start: 'top bottom', end: 'bottom top', scrub: true } });
      gsap.to('.orb--green', { yPercent: 24, ease: 'none', scrollTrigger: { trigger: services, start: 'top bottom', end: 'bottom top', scrub: true } });
      gsap.to('.orb--yellow', { yPercent: -50, ease: 'none', scrollTrigger: { trigger: services, start: 'top bottom', end: 'bottom top', scrub: true } });

      var mm = gsap.matchMedia();
      mm.add('(min-width: 900px)', function () {
        var pin = qs('.services__pin', services);
        var viewport = qs('.services__viewport', services);
        var track = qs('[data-track]', services);
        var progress = qs('[data-progress]', services);
        if (!pin || !viewport || !track) { return; }

        var distance = function () { return Math.max(0, track.scrollWidth - viewport.clientWidth); };
        var dir = isRTL ? 1 : -1; // ב-RTL הכרטיסים מתחילים בימין ונגללים שמאלה

        var st = gsap.timeline({
          defaults: { ease: 'none' },
          scrollTrigger: {
            trigger: pin, start: 'top top', end: function () { return '+=' + distance(); },
            pin: true, scrub: true, anticipatePin: 1, invalidateOnRefresh: true
          }
        });
        st.to(track, { x: function () { return dir * distance(); } }, 0);
        if (progress) { st.to(progress, { scaleX: 1 }, 0); }
      });
    }

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
        trigger: el, start: 'top 70px', end: 'bottom top',
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
