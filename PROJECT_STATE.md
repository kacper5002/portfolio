# Project Status

## Goal
Profesjonalne portfolio Kacpra Koszarskiego w DE / EN / PL, z ręcznymi tłumaczeniami. Deutsch domyślny. Docelowo własny, minimalistyczny design czarno-biały.

## Architecture
- WordPress + Gutenberg; własny Block Theme w `theme/`.
- Polylang Free zarządza językami DE/EN/PL i powiązaniami ręcznych tłumaczeń; Deutsch domyślny.
- Własny plugin `plugin/kacper-portfolio-core/kacper-portfolio-core.php` (Kacper Portfolio Core) obsługuje dane projektów.
- Docker Compose: WordPress i MariaDB, trwałe wolumeny danych; theme i plugin udostępnione przez bind mounts.
- Lokalnie: http://localhost:8080, panel: http://localhost:8080/wp-admin. Repozytorium Git połączone z GitHub.

## Completed
- Baza motywu: `style.css`, `theme.json`, `templates/index.html`; template parts `parts/header.html` i `parts/footer.html`.
- Szablony w `theme/templates/`: `front-page.html`, `archive-project.html`, `single-project.html`, `page.html` oraz neutralne `about.html`, `resume.html`, `contact.html`, zarejestrowane w `theme.json` dla stron.
- CPT `project` / Projekte: Gutenberg, archiwum `/projekte/`, pojedynczy projekt `/projekte/{slug}/`.
- Post meta: `project_year` (integer), `project_github_url`, `project_live_url`; meta box Projektdetails, bezpieczny zapis i REST API.
- Taksonomia `project_technology` / Technologien: tylko dla projektów, działa jak tagi, REST API, slug `technologien`.
- Dynamiczny blok `kacper-portfolio/project-details`: PHP `render_callback`, dane pod tytułem projektu; pomija puste wartości.

## Current State
- Homepage DE/EN/PL jest asymetrycznym hubem czterech kart: About, Projekte, Resume, Contact. Kompozycja oparta na aktualnym, obejrzanym `reference/image.png`: centralne karty, dużo whitespace, ogromny subtelny napis w tle. Referencja nie jest publicznym assetem.
- `page.html` wyświetla tytuł H1 i treść Gutenberga pomiędzy headerem a footerem.
- Istnieje 9 opublikowanych stron z tymczasową treścią DE/EN/PL. Grupy Polylang: About (DE 9 / EN 10 / PL 11), Resume (12 / 13 / 14), Contact (15 / 16 / 17); powiązania i szablony zweryfikowano przez API.
- Użytkownik potwierdził konfigurację Polylang Free: Deutsch domyślny bez prefiksu, English `/en/`, Polski `/pl/`; `project` i `project_technology` obsługują wielojęzyczność.
- Szablony `about`, `resume`, `contact` są przypisane do odpowiednich stron we wszystkich językach; bez CSS i formularza. HTTP 200 oraz właściwą treść i klasy szablonów potwierdzono dla wszystkich 9 adresów.
- URL stron: DE `/ueber-mich/`, `/lebenslauf/`, `/kontakt/`; EN `/en/about/`, `/en/resume/`, `/en/contact/`; PL `/pl/o-mnie/`, `/pl/cv/`, `/pl/skontaktuj-sie/`. Slugi zgodne z zamówieniem.
- Opublikowane strony główne: DE Startseite (18, `startseite`), EN Home (19, `home`), PL Strona główna (20, `strona-glowna`), powiązane przez Polylang; treść to blok `kacper-portfolio/home-hub` z edytowalnymi opisami i wyborem portretu; bazowe wzorce w `theme/patterns/home-{de,en,pl}.php`. Startseite ustawiona natywnym API jako statyczna strona główna.
- `front-page.html` jest neutralny językowo: header, main.home-page z Post Content, footer. `/`, `/en/`, `/pl/` działają prawidłowo (HTTP 200, właściwy język i szablon).

- Header używa dynamicznego bloku `kacper-portfolio/site-navigation` z pluginu: menu DE/EN/PL bez stałych ID, publiczne API Polylang Free 3.8.10, natywny link archiwum `project`, bezpieczny fallback DE bez Polylang.
- Switcher `pll_the_languages(raw)` pokazuje DE/EN/PL, klasę `current-lang`, tłumaczenia About i homepage oraz standardowy fallback na home. Na archiwum `project` switcher prowadzi do `/projekte/`, `/en/projekte/`, `/pl/projekte/`: natywny URL archiwum przetwarza publiczny filtr `wpml_permalink` obsługiwany przez Polylang Free; pozostałe widoki zachowują standardowe API. Testy 9 URL-i: HTTP 200, menu, aktywne linki i switcher poprawne; render PHP bez warnings/notices.

- Motyw obsługuje light/dark: prawdziwie czarne tło dark mode (`#000000`), neutralne zmienne kolorów w `style.css`, `data-theme` na html, wczesna inicjalizacja w `functions.php`, asset `assets/js/theme-toggle.js`; wybór `portfolio-theme` w localStorage ma pierwszeństwo przed systemem i jest wspólny dla DE/EN/PL.
- Header homepage: powiększony podpis: logo KK 26 × 30 px i nazwisko 20 px na desktopie, odstęp 3 px; mobile logo 24 × 28 px i tekst 17–18 px, centralny pasek 380 px rozwijany do 720 px (na mniejszych ekranach linki w dodatkowym rzędzie). DE/EN/PL i animowany suwak sun/moon są osobno w prawym górnym rogu; poniżej 1200 px mają własny rząd nad paskiem. Enter/Tab/Escape, inert i reduced motion; bez JS menu widoczne. Logo dziedziczy kolor motywu, oryginał SVG zachowany.
- `assets/css/home.css` / `assets/js/home.js`: asymetryczny desktop, dwie kolumny tablet, jedna mobile; tilt do ±3,5° tylko dla myszy, subtelne wejście i reduced motion.
- Hub należy do motywu (`inc/home-hub.php`, natywny edytor bloku): tytuły i linki stron z WordPress/Polylang, podgląd projektu z CPT. MSP Monitoring bez featured image — prawdziwy tytuł zamiast fikcyjnego screenshotu; danych projektu nie zmieniano. Poprzedni blok selected-projects pozostaje dostępny w pluginie, ale homepage go nie używa.
- Portret z `projectpictures/aboutme.png` dodany przez API do mediów WordPressa (ID 24), wybierany w bloku. Oryginalne zdjęcia i referencja pozostały nietknięte.
- `page-transitions.css/js`: natywne cross-document View Transitions między kartą a main podstrony, również Wstecz. Zwykłe URL-e i linki; brak SPA, fetchowania stron i opóźniania kliknięć. Dodatkowe assety na docelowych stronach służą tylko przejściom; layouty nietknięte.
- Testy Chrome: DE/EN/PL × 1440/1024/768/390 px × light/dark bez overflow; 12 kliknięć kart, reload/Wstecz, Menu klawiaturą, system/localStorage, reduced motion i brak tilt na dotyku. HTTP 200; brak JS errors i PHP warnings/notices. Gutenberg rozpoznaje poprawny blok hub we wszystkich trzech wersjach. Potwierdzono nienaruszone dane podstron, projektów i grupy tłumaczeń.

## Current Task
Header z logo po lewej oraz oddzielnym wyborem języka i suwakiem motywu gotowy do oceny. Testy: 36 stanów układu (DE/EN/PL, 320–1440 px, menu otwarte/zamknięte), animacja ikon/suwaka, klawiatura, reduced motion, localStorage i linki Polylang; brak kolizji, overflow i błędów JS. Nie projektować kolejnych podstron przed oceną użytkownika.

## Next Steps
Pojedynczo:
1. Zebrać wizualną ocenę homepage; kolejny etap ustalić z użytkownikiem.

## Important Decisions
- Kolory interfejsu i przyszłych sekcji korzystają z CSS custom properties light/dark; bez pluginu, zależności npm i powiązania motywu kolorów z językiem.
- Własny Gutenberg Block Theme, bez Elementora, gotowego motywu i ACF; preferowane natywne API i bloki WordPressa.
- Motyw określa układ i wygląd; plugin przechowuje logikę danych oraz renderowanie szczegółów projektu. Szablon tylko wskazuje miejsce bloku.
- GitHub i Live Demo są opcjonalne; starsze projekty mogą nie mieć żadnego linku.
- Polylang Free, wyłącznie ręczne tłumaczenia; bez Pro, płatnych funkcji i ich obchodzenia.
- Docelowe URL: DE `/` bez `/de/`, EN `/en/`, PL `/pl/`; wspólna baza CPT `projekte` (bez tłumaczenia bazowych slugów).
- Layouty neutralne językowo: `about`, `resume`, `contact`; nie tworzyć szablonów zależnych od slugów, np. `page-ueber-mich.html`.
- Rok i URL-e to dane techniczne, nie teksty do tłumaczenia. Bez własnego kopiowania i bez włączania synchronizacji custom fields; Polylang może kopiować meta przy tworzeniu tłumaczenia.
- Lokalne zmiany theme i pluginu trafiają do kontenera przez bind mounts, bez instalacji ZIP.
- Praca po polsku, jeden logiczny etap naraz; po etapie czekać na „dalej”. Bez automatycznych commitów; nie odczytywać ani nie ujawniać `.env`.

## Known Issues
- Bloki `kacper-portfolio/project-details` i `kacper-portfolio/site-navigation` mają tylko rejestrację PHP: działają na frontendzie, ale nie mają interfejsu JavaScript ani podglądu w edytorze witryny.
- Pełna integracja edytora witryny (FSE) i tłumaczenie template parts nie należą do Free; nawigacja korzysta z własnego bloku PHP i publicznego API Free, bez Navigation entities Pro.
