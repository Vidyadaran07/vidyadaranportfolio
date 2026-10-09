# Vidyadaran M · Portfolio

Personal portfolio of **Vidyadaran M**, Software Developer (PHP & Laravel).
A single-page site covering my skills, projects, experience, education and contact details.

## Tech stack

- Laravel 12 (Blade views and components)
- Bootstrap 5.3 with custom SCSS (dark theme), Bootstrap Icons, Devicon logos
- Vite for building CSS and JavaScript

## Editing content

All text on the page lives in **`config/portfolio.php`**: hero, about, skills, projects,
experience, education, career objective, contact and navigation. Change it there; the
views in `resources/views/sections/` read from it.

Email, GitHub, LinkedIn and resume links can be overridden in `.env`:

```
PORTFOLIO_EMAIL=
PORTFOLIO_GITHUB_URL=
PORTFOLIO_LINKEDIN_URL=
PORTFOLIO_RESUME_URL=
```

Your photo goes in `public/images/me.jpg` (square works best); until it exists the hero
shows your initials.

A missing value shows a highlighted placeholder on your machine (`APP_ENV=local`)
and is hidden on the live site.

## Project structure

```
config/portfolio.php                  Page content
app/Http/Controllers/HomeController   Renders the home page
resources/views/
  components/layouts/app.blade.php    Page layout (head, navbar, footer)
  components/                         social-links, system-diagram, todo (placeholder)
  partials/                           navbar, footer
  sections/                           hero (+ stats), about (bento), skills, projects,
                                      journey (work + education), contact (+ objective)
  errors/404.blade.php                Not-found page
resources/scss/                       Design tokens and styles per area
resources/js/app.js                   Mobile menu, active nav link, scroll reveal, mouse glow
```

## Running locally

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
npm run dev          # in one terminal
php artisan serve    # in another (or use Laragon)
```

## Tests

```bash
php artisan test
```

## Deploying

```bash
npm run build
```

Set `APP_ENV=production`, `APP_DEBUG=false` and the real `APP_URL` on the server.

## Contact

- Email: vidyadaran07@gmail.com
- GitHub: https://github.com/VidyadaranM007
- LinkedIn: https://www.linkedin.com/in/vidyadaran-m-a70929375/
