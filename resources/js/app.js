import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.min.css';
import Collapse from 'bootstrap/js/dist/collapse';

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

if (sections.length && 'IntersectionObserver' in window) {
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

    const observer = new IntersectionObserver(
        (entries) => {
            entries
                .filter((entry) => entry.isIntersecting)
                .forEach((entry) => setActive(entry.target.id));
        },
        // A section counts as "current" when it crosses the upper part of the screen.
        { rootMargin: '-35% 0px -60% 0px' },
    );

    sections.forEach((section) => observer.observe(section));
}
