# Percival Systems LLC — Website

Marketing site for Percival Systems LLC, built with plain PHP and Bootstrap 5 (no framework, no build step).

## Stack

- PHP (procedural, no framework)
- Bootstrap 5.3 (via jsDelivr CDN)
- Bootstrap Icons 1.11 (via jsDelivr CDN)
- Google Fonts: Inter (body) + Poppins (headings)
- Sessions + `mail()` for the contact form (no database)

## Structure

```
.
├── index.php               Home page (hero + service overview + CTA)
├── services.php             Full service list, rendered from a PHP array
├── services.md              Source-of-truth service list in plain markdown (keep in sync with services.php)
├── portfolio.php             Cards linking out to sites built
├── about.php                 Founder bio, experience highlights, skills, open source
├── contact.php                Contact form (GET renders form + flash messages)
├── contact-process.php        Form handler (POST only, redirects back to contact.php)
├── includes/
│   ├── header.php             <head>, nav, opens <body><main> sets $site_name/$site_email/$site_phone
│   ├── footer.php              Closes <main>, site footer, closes </body></html>
│   └── env.php                 load_env() tiny .env parser into $_ENV
├── assets/css/style.css        All custom styles (theme variables live at the top)
├── .env                        TO_ADDRESS, FROM_ADDRESS, reCAPTCHA keys (gitignored, not committed)
└── .gitignore                  Ignores .env
```

Every page follows the same pattern:

```php
<?php
$page_title = '...';
$page_description = '...';
$current_page = 'slug';   // matches nav highlighting in header.php
include __DIR__ . '/includes/header.php';
?>
... page content ...
<?php include __DIR__ . '/includes/footer.php'; ?>
```

## Running locally

No dependencies to install, just PHP's built-in server from the project root:

```
php -S 127.0.0.1:8099
```

Then visit `http://127.0.0.1:8099/index.php`.

## Branding

- Colors: navy (`--ps-navy`) + gold (`--ps-gold`), defined as CSS custom properties at the top of `assets/css/style.css`.
- Logo: **placeholder only** a Bootstrap Icons glyph (`bi-diagram-3-fill`) inside a gold circle (`.logo-mark`), used in both `includes/header.php` and `includes/footer.php`. Swap in a real logo image by editing those two spots once branding is finalized.
- Site-wide contact info (name, email, phone) is defined once in `includes/header.php` (`$site_name`, `$site_email`, `$site_phone`, `$site_phone_tel`) and reused everywhere via the included variables, update it there, not per-page.

## Services list

`services.md` and the `$services` array in `services.php` should always match, `services.md` is the readable source doc, `services.php` is what actually renders. When adding/removing a service, update both. The homepage's service overview grid (`$service_highlights` in `index.php`) is a curated subset/summary, not a full mirror — it doesn't need to list every single item, just the category-level highlights.

Current categories: Web Development, Custom Software Development, Infrastructure & Systems Administration, Networking & IT, Security, WordPress, SEO & Analytics, Hosting & Email, Consulting & Auditing, AI & Data.

## Contact form

- `contact.php` renders the form (name, email, subject, type of service, budget, timeline, message) and reads flash state (`$_SESSION['contact_errors']` / `contact_old`) so validation errors repopulate the form after a redirect.
- `contact-process.php` handles the POST: CSRF token check, honeypot field (`website`), server-side validation, Google reCAPTCHA v2 verification, then `mail()`.
- Config comes from `.env` via `includes/env.php`'s `load_env()`:
  - `TO_ADDRESS` / `FROM_ADDRESS` — where submissions go / appear to come from
  - `CAPTCHA_SITE_KEY` / `CAPTCHA_SECRET_KEY` — reCAPTCHA v2 "checkbox" keys

### Before this goes live, you still need to:

1. **Register real reCAPTCHA keys** at https://www.google.com/recaptcha/admin for the `percival-systems.com` domain (add `localhost` too for local testing), then update `.env`. The placeholder keys currently in `.env` will cause the form to reject submissions with "reCAPTCHA is not configured."
2. **Confirm the production server can actually send mail** — `contact-process.php` relies on PHP's `mail()`, which needs a configured MTA (sendmail/Postfix) on whatever host this deploys to. If mail delivery turns out to be unreliable, consider swapping in SMTP via PHPMailer instead.
3. `.env` is gitignored. If this repo gets pushed anywhere, double check the real keys never end up committed.

## Adding a new page

1. Copy the header/footer include pattern from any existing page (e.g. `about.php`).
2. Set `$current_page` to a new unique slug.
3. Add a nav link in `includes/header.php` (and update `ps_nav_class()` calls) and a link in `includes/footer.php`'s Quick Links list.

## Notes / reference

- Founder bio and experience highlights on `about.php` are drawn from the founder's resume/project history, update there if the story changes.
- Portfolio entries (`portfolio.php`) just link out to external sites (Tailiens, Sure Shot Inc, johnlradford.io, Dillon F. Meyer, Allegheny United) no screenshots/descriptions beyond a generic blurb.
- Style guide: no em dashes anywhere in copy (a prior editing pass removed them all) use commas or colons instead.
