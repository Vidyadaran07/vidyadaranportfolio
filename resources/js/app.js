import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.min.css';
import Collapse from 'bootstrap/js/dist/collapse';
import 'bootstrap/js/dist/modal'; // project "View Details" dialogs

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

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

    // The current section is the lowest one whose top has passed 40% of the screen.
    // Side-by-side sections (About and Skills) share a top, so the first one wins the tie.
    // At the very bottom of the page the last section wins, even if it is short.
    const update = () => {
        const atBottom = window.innerHeight + window.scrollY >= document.documentElement.scrollHeight - 4;
        const line = window.innerHeight * 0.4;
        const passed = sections
            .map((section) => ({ section, top: section.getBoundingClientRect().top }))
            .filter(({ top }) => top <= line);
        const lowest = passed.reduce((best, item) => (!best || item.top > best.top + 1 ? item : best), null);
        const current = atBottom ? sections[sections.length - 1] : lowest?.section ?? sections[0];

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
 * "Build this for me" buttons: fill the contact message with the chosen solution,
 * then go to the form. Inside a dialog, wait until it has closed first.
 */
const messageField = document.getElementById('contact-message');

document.querySelectorAll('[data-interest]').forEach((button) => {
    button.addEventListener('click', (event) => {
        if (!messageField) return;

        event.preventDefault();

        const intro = `Hi, I'm interested in a ${button.dataset.interest} for my business. `;
        if (!messageField.value.trim() || messageField.dataset.prefilled === 'true') {
            messageField.value = intro;
            messageField.dataset.prefilled = 'true';
        }

        const goToForm = () => {
            document.getElementById('contact')?.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth' });
            document.getElementById('contact-name')?.focus({ preventScroll: true });
        };

        const dialog = button.closest('.modal');
        if (dialog) {
            dialog.addEventListener('hidden.bs.modal', goToForm, { once: true });
        } else {
            goToForm();
        }
    });
});

// Once the visitor edits the message, stop replacing it.
messageField?.addEventListener('input', () => {
    messageField.dataset.prefilled = 'false';
});
