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
- Utworzenie stron Über mich, Lebenslauf i Kontakt oraz konfiguracja menu w bazie WordPressa nie zostały potwierdzone.
- Użytkownik potwierdził konfigurację Polylang Free: Deutsch domyślny bez prefiksu, English `/en/`, Polski `/pl/`; `project` i `project_technology` obsługują wielojęzyczność.
- Szablony About, Resume i Contact mają header, main z osobnymi klasami intro/content, dynamiczny tytuł H1, treść i footer. Bez CSS, treści i formularza; jeszcze nie przypisano ich do stron w tym etapie.

## Current Task
Neutralne custom templates są gotowe. Oczekiwanie na „dalej” przed utworzeniem stron językowych i połączeniem ich przez Polylang.

## Next Steps
Pojedynczo:
1. Utworzyć i powiązać strony DE/EN/PL dla About, Resume i Contact, przypisując wspólne szablony.
2. Przygotować i powiązać językowe strony główne.
3. Przygotować language switcher i nawigację w granicach Polylang Free.

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
- Blok `kacper-portfolio/project-details` ma tylko rejestrację PHP: działa na frontendzie, ale nie ma interfejsu JavaScript ani podglądu w edytorze witryny.
- Pełna integracja edytora witryny (FSE) i tłumaczenie template parts nie należą do Free; sposób wielojęzycznej nawigacji wymaga sprawdzenia w osobnym etapie.
