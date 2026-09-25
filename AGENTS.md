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
- Keep the code simple and readable
- Prefer semantic HTML
- Build mobile-first
- Consider accessibility from the beginning
- Avoid unnecessary dependencies
- Do not add libraries or plugins without explaining why
- Do not overengineer simple features
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
- Respond to me in Polish
- Explain everything in very simple language
- Assume I am still learning
- Work step by step
- Before making a larger architectural change, explain it and wait for approval
- After each task explain:
  - which files were changed
  - what was added
  - why it is needed
  - how I can test it
- After finishing one logical step, stop and wait for my "dalej"

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
