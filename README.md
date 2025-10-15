# Awesome — Landing Page

Local landing page you can open with XAMPP at: http://localhost/landing_pages/

Files created

- `index.html` — main landing page
- `assets/css/styles.css` — styles
- `assets/js/main.js` — small UI script
- `submit.php` — local PHP form handler (saves to `submissions.log`)
- `assets/*` — placeholder images and favicon

How to view (local)

1. Make sure XAMPP (Apache) is running.
2. Open http://localhost/landing_pages/ in your browser.
3. Submit the contact form — entries are appended to `submissions.log` in this folder.

Deploying to Render (Docker)

This project includes a `Dockerfile` so you can deploy to Render as a Docker web service.

Quick steps:

1. Push this repo to GitHub (or use an existing repo).
2. In Render, create a new Web Service and choose 'Docker' as the environment.
3. Connect the GitHub repo and point Render to this repository/branch. The included `render.yaml` is optional and can be used for Infrastructure as Code.
4. Render will build the Docker image using the `Dockerfile` and expose port 80.

Notes about production

- The included `submit.php` is suitable for local testing. For production use a proper backend with authentication, CSRF protection, and secure storage of submissions (database or third-party forms provider).
- Remove `submissions.log` from your repo and ensure sensitive files are protected.
- Consider environment variables for configuration rather than hard-coding contact addresses.

