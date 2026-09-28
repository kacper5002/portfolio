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
- Użytkownik potwierdził działanie CMS i podstawowych stron projektów. Brak rozbudowanego designu.
- `page.html` wyświetla tytuł H1 i treść Gutenberga pomiędzy headerem a footerem; test zwykłej strony w przeglądarce nie został jeszcze potwierdzony.
- Istnieje 9 opublikowanych stron z tymczasową treścią DE/EN/PL. Grupy Polylang: About (DE 9 / EN 10 / PL 11), Resume (12 / 13 / 14), Contact (15 / 16 / 17); powiązania i szablony zweryfikowano przez API.
- Użytkownik potwierdził konfigurację Polylang Free: Deutsch domyślny bez prefiksu, English `/en/`, Polski `/pl/`; `project` i `project_technology` obsługują wielojęzyczność.
- Szablony `about`, `resume`, `contact` są przypisane do odpowiednich stron we wszystkich językach; bez CSS i formularza. HTTP 200 oraz właściwą treść i klasy szablonów potwierdzono dla wszystkich 9 adresów.
- URL stron: DE `/ueber-mich/`, `/lebenslauf/`, `/kontakt/`; EN `/en/about/`, `/en/resume/`, `/en/contact/`; PL `/pl/o-mnie/`, `/pl/cv/`, `/pl/skontaktuj-sie/`. Slugi zgodne z zamówieniem.
- Opublikowane strony główne: DE Startseite (18, `startseite`), EN Home (19, `home`), PL Strona główna (20, `strona-glowna`), powiązane przez Polylang; treść to bloki H1 „Kacper Koszarski” i akapit „Portfolio”. Startseite ustawiona natywnym API jako statyczna strona główna.
- `front-page.html` jest neutralny językowo: header, main.home-page z Post Content, footer. `/`, `/en/`, `/pl/` działają prawidłowo (HTTP 200, właściwy język i szablon).

- Header używa dynamicznego bloku `kacper-portfolio/site-navigation` z pluginu: menu DE/EN/PL bez stałych ID, publiczne API Polylang Free 3.8.10, natywny link archiwum `project`, bezpieczny fallback DE bez Polylang.
- Switcher `pll_the_languages(raw)` pokazuje DE/EN/PL, klasę `current-lang`, tłumaczenia About i homepage oraz standardowy fallback na home. Na archiwach API zwraca home języków. Testy 9 URL-i: HTTP 200, menu, aktywne linki i switcher poprawne; render PHP bez warnings/notices.

## Current Task
Dynamiczna nawigacja i language switcher DE/EN/PL są gotowe i przetestowane. Oczekiwanie na „dalej” przed wizualnym designem headera i homepage.

## Next Steps
Pojedynczo:
1. Przygotować wizualny design headera i homepage, etapami.

## Important Decisions
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
