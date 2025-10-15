# Awesome — Landing Page

Local landing page you can open with XAMPP at: http://localhost/landing_pages/

Files created

- `index.html` — main landing page
- `assets/css/styles.css` — styles
- `assets/js/main.js` — small UI script
- `submit.php` — local PHP form handler (saves to `submissions.log`)
- `assets/*` — placeholder images and favicon

How to view

1. Make sure XAMPP (Apache) is running.
2. Open http://localhost/landing_pages/ in your browser.
3. Submit the contact form — entries are appended to `submissions.log` in this folder.

Notes & next steps

- This is a static landing page with a simple PHP handler for local testing only.
- For production, replace `submit.php` with a secure backend or use a service (Formspree, Netlify forms, etc.).
- Consider adding real images, GA/Tag manager, meta/social tags, and accessibility testing.
