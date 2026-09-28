# Project Status

## Goal
Profesjonalne, wielostronicowe portfolio Kacpra Koszarskiego: Home, Über mich, Projekte, pojedyncze projekty, Lebenslauf i Kontakt. Docelowo własny, minimalistyczny design czarno-biały.

## Architecture
- WordPress + Gutenberg; własny Block Theme w `theme/`.
- Własny plugin `plugin/kacper-portfolio-core/kacper-portfolio-core.php` (Kacper Portfolio Core) obsługuje dane projektów.
- Docker Compose: WordPress i MariaDB, trwałe wolumeny danych; theme i plugin udostępnione przez bind mounts.
- Lokalnie: http://localhost:8080, panel: http://localhost:8080/wp-admin. Repozytorium Git połączone z GitHub.

## Completed
- Baza motywu: `style.css`, `theme.json`, `templates/index.html`; template parts `parts/header.html` i `parts/footer.html`.
- Szablony w `theme/templates/`: `front-page.html`, `archive-project.html`, `single-project.html` i `page.html`.
- CPT `project` / Projekte: Gutenberg, archiwum `/projekte/`, pojedynczy projekt `/projekte/{slug}/`.
- Post meta: `project_year` (integer), `project_github_url`, `project_live_url`; meta box Projektdetails, bezpieczny zapis i REST API.
- Taksonomia `project_technology` / Technologien: tylko dla projektów, działa jak tagi, REST API, slug `technologien`.
- Dynamiczny blok `kacper-portfolio/project-details`: PHP `render_callback`, dane pod tytułem projektu; pomija puste wartości.

## Current State
- Użytkownik potwierdził działanie CMS i podstawowych stron projektów. Brak rozbudowanego designu.
- `page.html` wyświetla tytuł H1 i treść Gutenberga pomiędzy headerem a footerem; test zwykłej strony w przeglądarce nie został jeszcze potwierdzony.
- Utworzenie stron Über mich, Lebenslauf i Kontakt oraz konfiguracja menu w bazie WordPressa nie zostały potwierdzone.

## Current Task
Dodano lekką pamięć projektu. Development wstrzymany do kolejnego polecenia użytkownika; następny etap wymaga uzgodnienia.

## Next Steps
Propozycje do zatwierdzenia, realizowane pojedynczo:
1. Utworzyć lub sprawdzić stronę Über mich pod `/ueber-mich/` z domyślnym szablonem `page.html`.
2. Przygotować podstawową treść stron Lebenslauf i Kontakt w Gutenbergu.
3. Skonfigurować istniejący blok Navigation z odnośnikami do głównych stron i `/projekte/`.

## Important Decisions
- Własny Gutenberg Block Theme, bez Elementora, gotowego motywu i ACF; preferowane natywne API i bloki WordPressa.
- Motyw określa układ i wygląd; plugin przechowuje logikę danych oraz renderowanie szczegółów projektu. Szablon tylko wskazuje miejsce bloku.
- GitHub i Live Demo są opcjonalne; starsze projekty mogą nie mieć żadnego linku.
- Lokalne zmiany theme i pluginu trafiają do kontenera przez bind mounts, bez instalacji ZIP.
- Praca po polsku, jeden logiczny etap naraz; po etapie czekać na „dalej”. Bez automatycznych commitów; nie odczytywać ani nie ujawniać `.env`.

## Known Issues
- Blok `kacper-portfolio/project-details` ma tylko rejestrację PHP: działa na frontendzie, ale nie ma interfejsu JavaScript ani podglądu w edytorze witryny.
