# Vidyadaran M · Portfolio

Personal portfolio of **Vidyadaran M**, Software Developer (PHP & Laravel).
A single-page site covering my skills, experience, projects, services and a working contact form.

## Tech stack

- Laravel 12 (Blade views and components)
- Bootstrap 5.3 with custom SCSS (light theme, blue accent), Bootstrap Icons
- Vite for building CSS and JavaScript

## Editing content

All text on the page lives in **`config/portfolio.php`**: hero, about, skills, projects,
services, experience, work projects, "why work with me", contact and navigation. Change it
there; the views in `resources/views/sections/` read from it.

Email, GitHub and LinkedIn links can be overridden in `.env`:

```
PORTFOLIO_EMAIL=
PORTFOLIO_GITHUB_URL=
PORTFOLIO_LINKEDIN_URL=
```

Optional files (each one appears on the site as soon as it exists):

| File | Shows up as |
|---|---|
| `public/images/profile-hero.webp` | Round photo in the hero (square). Set by `photo` in the config |
| `public/images/profile-about.webp` | Portrait in the About card (4:5). Set by `about_photo`; falls back to the hero photo, then initials |
| `public/images/projects/{slug}.png` | Real project screenshot (`crm`, `hrm`, `payroll`, `seminar-hall`, `ai-model`). Until then the card shows `{slug}-preview.webp`, a full app screen with sample data, labelled "Sample concept" (HTML sources in `resources/previews/`, see below) |

A missing value shows a highlighted placeholder on your machine (`APP_ENV=local`)
and is hidden on the live site.

### Regenerating the solution previews

Each `resources/previews/{slug}.html` is a 1440x810 app screen (its `card-shot` style zooms in 2x on
the key area so text stays readable in the small card) that shares
`resources/previews/app.css`. To update an image, render it with headless Chrome:

```
chrome --headless=new --hide-scrollbars --allow-file-access-from-files --window-size=1440,810 --force-device-scale-factor=2 --virtual-time-budget=6000 --screenshot=crm.png resources/previews/crm.html
```

then save the 2880x1620 result, without resizing, as `public/images/projects/{slug}-preview.webp`
(WebP quality 95). Rendering at 2x and not resizing keeps the text sharp on high-density screens.

## Contact form email

Messages from the contact form are emailed to `PORTFOLIO_EMAIL`. Locally, with
`MAIL_MAILER=log`, they are written to `storage/logs/laravel.log` instead.

To send real email through Gmail:

1. Turn on 2-Step Verification for your Google account.
2. Create an App Password at https://myaccount.google.com/apppasswords.
3. Set these in `.env` (never commit this file):

```
MAIL_MAILER=smtp
MAIL_SCHEME=smtps
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=your-gmail-address@gmail.com
MAIL_PASSWORD="your 16-character app password"
MAIL_FROM_ADDRESS=your-gmail-address@gmail.com
MAIL_FROM_NAME="Vidyadaran Portfolio"
```

Then run `php artisan config:clear`. Spam protection: a hidden trap field, and at most
5 messages per minute per visitor.

## Project structure

```
config/portfolio.php                  Page content
app/Http/Controllers/                 HomeController (page), ContactController (form)
app/Http/Requests/ContactRequest.php  Contact form validation
app/Mail/ContactMessage.php           Email sent for each message
resources/views/
  components/layouts/app.blade.php    Page layout (head, navbar, footer)
  components/                         brand-name, social-links, todo (placeholder)
  partials/                           navbar, footer
  sections/                           hero, about (+ skills), experience, work, projects,
                                      services, contact (+ why work with me)
  mail/contact-message.blade.php      Email template
  errors/404.blade.php                Not-found page
resources/scss/                       Design tokens and styles per area
resources/js/app.js                   Mobile menu, active nav link, scroll reveal, project dialogs
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
