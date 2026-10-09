import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.min.css';
import 'devicon/devicon.min.css';
import Collapse from 'bootstrap/js/dist/collapse';

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const finePointer = window.matchMedia('(pointer: fine)').matches;

/**
 * Mobile menu: close it after a link is tapped.
 */
const menu = document.getElementById('siteMenu');

if (menu) {
    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => {
            if (menu.classList.contains('show')) {
                Collapse.getOrCreateInstance(menu).hide();
            }
        });
    });
}

/**
 * Highlight the nav link of the section currently on screen (home page only).
 */
const navLinks = [...document.querySelectorAll('.site-nav [data-section]')];
const sections = navLinks
    .map((link) => document.getElementById(link.dataset.section))
    .filter(Boolean);

if (sections.length) {
    const setActive = (id) => {
        navLinks.forEach((link) => {
            const isActive = link.dataset.section === id;
            link.classList.toggle('active', isActive);
            if (isActive) {
                link.setAttribute('aria-current', 'true');
            } else {
                link.removeAttribute('aria-current');
            }
        });
    };

    // The current section is the last one whose top has passed 40% of the screen.
    // At the very bottom of the page the last section wins, even if it is short.
    const update = () => {
        const atBottom = window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 4;
        const line = window.innerHeight * 0.4;
        const current = atBottom
            ? sections[sections.length - 1]
            : sections.filter((section) => section.getBoundingClientRect().top <= line).pop() ?? sections[0];

        setActive(current.id);
    };

    let ticking = false;
    window.addEventListener('scroll', () => {
        if (ticking) return;
        ticking = true;
        requestAnimationFrame(() => {
            update();
            ticking = false;
        });
    }, { passive: true });

    update();
}

/**
 * Scroll reveal: fade elements in the first time they come on screen.
 */
const revealItems = document.querySelectorAll('[data-reveal]');

if (reduceMotion || !('IntersectionObserver' in window)) {
    revealItems.forEach((el) => el.classList.add('is-visible'));
} else {
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '0px 0px -8% 0px' },
    );

    revealItems.forEach((el) => revealObserver.observe(el));
}

/**
 * Mouse effects (desktop only): a soft page glow that follows the cursor,
 * and a border glow on cards near the cursor.
 */
if (finePointer && !reduceMotion) {
    const root = document.documentElement;
    const cards = document.querySelectorAll('.glow-card');
    let frame = null;

    window.addEventListener('pointermove', (event) => {
        if (frame) return;

        frame = requestAnimationFrame(() => {
            root.style.setProperty('--glow-x', `${event.clientX}px`);
            root.style.setProperty('--glow-y', `${event.clientY}px`);

            cards.forEach((card) => {
                const rect = card.getBoundingClientRect();
                card.style.setProperty('--card-x', `${event.clientX - rect.left}px`);
                card.style.setProperty('--card-y', `${event.clientY - rect.top}px`);
            });

            frame = null;
        });
    }, { passive: true });
}
