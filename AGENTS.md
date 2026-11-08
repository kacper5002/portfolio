# Project
Personal portfolio website for Kacper Koszarski.

# Stack
- WordPress
- Gutenberg
- Custom Block Theme
- HTML
- CSS
- JavaScript
- PHP only where required by WordPress
- Docker
- MariaDB
- Git / GitHub

# Architecture
- theme/ contains the custom Gutenberg Block Theme
- theme/ is mounted into WordPress as wp-content/themes/kacper-portfolio
- WordPress runs locally at http://localhost:8080
- Do not use Elementor
- Do not use a premade commercial theme
- Prefer native Gutenberg blocks and WordPress APIs
- Keep presentation logic in the theme
- Keep future content/data functionality outside the theme when appropriate

# Coding rules
- Keep the code simple and readable; do not overengineer
- Prefer semantic HTML
- Build mobile-first
- Consider accessibility from the beginning
- Prefer existing solutions and dependencies; explain why before adding a library or plugin
- Keep files modular and logically organized
- Preserve WordPress/Gutenberg conventions

# Security
- Never print, expose, read unnecessarily, or commit .env secrets
- Never commit credentials, tokens, passwords, or private keys
- .env must remain ignored by Git
- Use .env.example only for placeholder configuration

# Git
- Do not commit automatically unless I explicitly ask
- Before larger changes, explain what will be changed
- Keep commits small and focused when I ask for them

# Working style
- Respond in Polish, simply and concisely; assume I am still learning
- Inspect only files relevant to the task and their dependencies; broaden the search when evidence requires it
- Before making a larger architectural change, explain it and wait for approval
- Complete the requested task without pausing after routine steps; wait for "dalej" before starting a separate task
- End with one brief summary of changed files, purpose, verification and any limitations; include manual test instructions when useful
- Small changes do not require separate plans, reports or additional documents

# Verification
- Match verification to scope and risk: check changed behavior and affected integrations using existing tools
- For UI changes, check relevant responsive layouts and accessibility; check languages and color modes when affected
- Run full tests for changes spanning multiple components or requiring broad regression coverage
- Fix errors found during verification and rerun the affected checks; report any unresolved issues or checks that could not run

# Design direction
- Modern
- Black and white
- Minimalistic
- Editorial / portfolio-focused
- Clean typography
- Strong spacing
- Responsive on desktop, tablet, and mobile

# Current pages planned
- Home
- Über mich
- Projekte
- individual project pages
- Lebenslauf / experience
- Kontakt

# Project memory

- Read PROJECT_STATE.md once at the start of a session; reread relevant sections only if context is missing or the file changed.
- Update it only when lasting project state, decisions or next steps change, not for routine edits or changes limited to AGENTS.md.
- Keep it concise and current: update existing bullets, keep Completed and Next Steps short, and avoid chronological logs or duplicating Git history or AGENTS.md rules.
