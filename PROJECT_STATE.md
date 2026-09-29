# Project Status

## Goal
Prywatne portfolio Kacpra Koszarskiego (osoba prywatna, bez firmy) w DE / EN / PL, z ręcznymi tłumaczeniami. Deutsch domyślny. Docelowo własny, minimalistyczny design czarno-biały.

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
- Homepage DE/EN/PL jest hubem trzech powiększonych pionowych prostokątnych kart z narożnikami 4 px, przesuniętych względem siebie: About, Projekte, Contact. Lebenslauf pozostaje osobną stroną dostępną z menu. Kompozycja oparta na aktualnym, obejrzanym `reference/image.png`: centralne karty i dużo whitespace; napis oraz kropki w tle usunięte zgodnie z obecną decyzją użytkownika. Referencja nie jest publicznym assetem.
- `page.html` wyświetla tytuł H1 i treść Gutenberga pomiędzy headerem a footerem.
- Istnieje 9 opublikowanych stron z tymczasową treścią DE/EN/PL. Grupy Polylang: About (DE 9 / EN 10 / PL 11), Resume (12 / 13 / 14), Contact (15 / 16 / 17); powiązania i szablony zweryfikowano przez API.
- Użytkownik potwierdził konfigurację Polylang Free: Deutsch domyślny bez prefiksu, English `/en/`, Polski `/pl/`; `project` i `project_technology` obsługują wielojęzyczność.
- Szablony `about`, `resume`, `contact` są przypisane do odpowiednich stron we wszystkich językach; bez CSS i formularza. HTTP 200 oraz właściwą treść i klasy szablonów potwierdzono dla wszystkich 9 adresów.
- URL stron: DE `/ueber-mich/`, `/lebenslauf/`, `/kontakt/`; EN `/en/about/`, `/en/resume/`, `/en/contact/`; PL `/pl/o-mnie/`, `/pl/cv/`, `/pl/skontaktuj-sie/`. Slugi zgodne z zamówieniem.
- Opublikowane strony główne: DE Startseite (18, `startseite`), EN Home (19, `home`), PL Strona główna (20, `strona-glowna`), powiązane przez Polylang; treść to blok `kacper-portfolio/home-hub` z edytowalnymi opisami, powitaniem, wyborem trzech zdjęć i podglądem w Gutenbergu; bazowe wzorce w `theme/patterns/home-{de,en,pl}.php`. Startseite ustawiona natywnym API jako statyczna strona główna.
- `front-page.html` jest neutralny językowo: header, main.home-page z Post Content, footer. `/`, `/en/`, `/pl/` działają prawidłowo (HTTP 200, właściwy język i szablon).

- Header używa dynamicznego bloku `kacper-portfolio/site-navigation` z pluginu: menu DE/EN/PL bez stałych ID, publiczne API Polylang Free 3.8.10, natywny link archiwum `project`, bezpieczny fallback DE bez Polylang.
- Switcher `pll_the_languages(raw)` pokazuje DE/EN/PL, klasę `current-lang`, tłumaczenia About i homepage oraz standardowy fallback na home. Na archiwum `project` switcher prowadzi do `/projekte/`, `/en/projekte/`, `/pl/projekte/`: natywny URL archiwum przetwarza publiczny filtr `wpml_permalink` obsługiwany przez Polylang Free; pozostałe widoki zachowują standardowe API. Testy 9 URL-i: HTTP 200, menu, aktywne linki i switcher poprawne; render PHP bez warnings/notices.

- Motyw obsługuje light/dark: prawdziwie czarne tło dark mode (`#000000`), neutralne zmienne kolorów w `style.css`, `data-theme` na html, wczesna inicjalizacja w `functions.php`, asset `assets/js/theme-toggle.js`; wybór `portfolio-theme` w localStorage ma pierwszeństwo przed systemem i jest wspólny dla DE/EN/PL.
- Header homepage: powiększony podpis: logo KK 26 × 30 px i nazwisko 20 px na desktopie, odstęp 3 px; mobile logo 24 × 28 px i tekst 17–18 px, centralny pasek 380 px rozwijany do 720 px (na mniejszych ekranach linki w dodatkowym rzędzie). DE/EN/PL i animowany suwak sun/moon są osobno w prawym górnym rogu; poniżej 1200 px mają własny rząd nad paskiem. Enter/Tab/Escape, inert i reduced motion; bez JS menu widoczne. Logo dziedziczy kolor motywu, oryginał SVG zachowany.
- `assets/css/home.css` / `assets/js/home.js`: asymetryczny desktop mieszczący się w jednym ekranie od 1000×600 px (svh/flex/grid), dwie kolumny tablet, jedna mobile z przewijaniem; tilt do ±3,5° i parallax zdjęć tylko dla myszy, odsłonięcie dwóch linii powitania, rozłożenie kart przy wejściu w ekran (IntersectionObserver), refleks pod kursorem, zoom zdjęć i animowane strzałki; reduced motion wyłącza ruch.
- Nad kartami jest edytowalne „Hey! Ich bin Kacper und das ist mein Portfolio.” i odpowiedniki EN/PL („Hej! Jestem Kacper a to moje portfolio.”), w dwóch liniach, z odstępami i wysokością kart dopasowanymi do okna desktopu / odstępem 72 px na mniejszych ekranach; dymki About usunięte. Zdjęcia i nazwy są stale widoczne: grayscale w spoczynku, kolor i powiększenie 1.035 na hover/focus, wtedy też pojawia się opis. Na dotyku pełna treść bez konieczności hover.
- Hub należy do motywu (`inc/home-hub.php`, natywny edytor bloku): tytuły i linki stron z WordPress/Polylang, featured image projektu z CPT, jeśli istnieje. Domyślne grafiki kategorii Projekte / Contact (grafika Resume zachowana w assets, obecnie nieużywana) wygenerowano przez imagegen i zapisano jako zoptymalizowane `assets/images/hub-*.jpg`; to ilustracje, nie screenshoty MSP ani dokumenty CV. Prompty: `assets/images/GENERATED.md`. Danych projektu nie zmieniano. Poprzedni blok selected-projects pozostaje dostępny w pluginie, ale homepage go nie używa.
- Portret z `projectpictures/aboutme.png` dodany przez API do mediów WordPressa (ID 24), wybierany w bloku. Oryginalne zdjęcia i referencja pozostały nietknięte.
- `page-transitions.css/js`: natywne cross-document View Transitions między kartą a main podstrony, również Wstecz. Zwykłe URL-e i linki; brak SPA, fetchowania stron i opóźniania kliknięć. Dodatkowe assety na docelowych stronach służą tylko przejściom; layouty nietknięte.
- Testy Chrome: DE/EN/PL × 1440/1024/768/390 px × light/dark bez overflow; 12 kliknięć kart, reload/Wstecz, Menu klawiaturą, system/localStorage, reduced motion i brak tilt na dotyku. HTTP 200; brak JS errors i PHP warnings/notices. Gutenberg rozpoznaje poprawny blok hub we wszystkich trzech wersjach. Potwierdzono nienaruszone dane podstron, projektów i grupy tłumaczeń.

## Current Task
Homepage ma trzy karty: About, Projekte, Kontakt. Kafelek Lebenslauf usunięty wraz z jego kontrolkami edytora; strona CV, menu i zapisane dane pozostają. Układ wyśrodkowany i dopasowany do trzech kart; na desktopie karty przesunięte o 16–28 px wyżej, z takim samym zwiększeniem przestrzeni nad stopką, bez zmniejszania kart.

Naprawiono brak rejestracji JS bloków nawigacji/szczegółów projektu. Gutenberg ma podglądy, niemieckie kontrolki homepage i wybór zdjęć wszystkich kart; osobny `assets/css/editor.css` izoluje edytor od dark mode i animacji. Test zapisu na usuniętym szkicu, parser wszystkich szablonów, REST preview i DE/EN/PL bez błędów JS/PHP; desktop nadal bez scrolla.

Stopka ma natywne Social Links: GitHub prowadzi do `https://github.com/kacper5002/`; LinkedIn prowadzi do `https://www.linkedin.com/in/kacper-koszarski-6363712ba/`. Stopka ma trzy wyśrodkowane rzędy: ikony 42 px (cel kliknięcia 56 px), copyright, Impressum / Datenschutz; hover/focus zmienia kolor (LinkedIn niebieski, GitHub fioletowy) i lekko unosi ikonę, z obsługą light/dark i reduced motion. Dynamiczny blok motywu `legal-links` pokazuje tylko opublikowane Impressum i politykę prywatności, z tłumaczeniami Polylang lub fallbackiem DE. Za zgodą użytkownika udostępniono lokalne placeholdery „w przygotowaniu”: Impressum ID 29 `/impressum/`, Datenschutz ID 3 `/datenschutzerklaerung/`. Treść uwzględnia prywatne portfolio, nie jest kompletną dokumentacją prawną; poprzednie szkice zachowane w rewizjach. Oba linki dostępne w DE/EN/PL (fallback DE dla nietłumaczonego Datenschutz). Testy: HTTP 200, stopka wyśrodkowana, desktop bez scrolla, brak błędów JS/PHP.

## Next Steps
1. Uzupełnić i zweryfikować Impressum oraz Datenschutzerklärung przed publikacją strony.
2. Zebrać wizualną ocenę homepage.

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
- Pełna integracja edytora witryny (FSE) i tłumaczenie template parts nie należą do Free; nawigacja korzysta z własnego bloku PHP i publicznego API Free, bez Navigation entities Pro.
