=== NABU WordPress Theme ===

Theme Name: NABU
Theme URI: https://github.com/strYchni0x/nabu_wordpress_theme
Version: 1.2.9
Author: Florian Willnat
Author Email: florian@nabu-diepholz.de
Requires at least: WordPress 5.8
Tested up to: 6.9
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: blue, green, two-columns, right-sidebar, custom-logo, custom-menu, featured-images, threaded-comments, translation-ready, footer-widgets


== Beschreibung ==

WordPress-Theme für lokale NABU-Gruppen (Naturschutzbund Deutschland).

Das Theme basiert auf dem offiziellen NABU HTML-Design-Template (2017) und bringt alle
typischen NABU-Design-Elemente in WordPress:

- NABU Farbschema (Blau #0068B4, Grün, Orange "Mitmachen")
- Source Sans Pro Schriftart (lokal ausgeliefert, kein Google-Aufruf)
- Responsive Bootstrap 4 Layout
- Bildslider auf der Startseite (Carousel)
- Neuigkeiten-Slider mit Slick
- Rechte Sidebar-Navigation oben (neben Neuigkeiten-Slider, Pills-Design)
- Rechte Sidebar-Navigation unten (neben Beitragsliste, Pills-Design)
- 4-spaltiger Footer
- Soziale Medien im Footer
- Meta-Navigation (oben rechts)
- Blaue Navigationsleiste: dekorativ, oder optional mit Hauptnavigation
  (inkl. eingeklapptem Mobilmenü, sobald ein Menü zugewiesen ist)
- Logo schwebend über der blauen Leiste (160 × 152 px, weißer Hintergrund)
- Paginierte Beitragsliste auf der Startseite (konfigurierbar, Standard: 5 pro Seite)
- Automatische Beitragskürzung nach 150 Wörtern mit Weiterlesen-Link
- Vollständige Widget-Unterstützung
- WordPress Customizer-Integration
- Block Editor (Gutenberg) vollständig unterstützt
- theme.json mit NABU-Farbpalette, Typografie und Layout-Größen
- Editor-Stylesheet für einheitliches Erscheinungsbild im Block-Editor
- 4 vordefinierte Block-Stilvarianten (Mitmachen-Button, Hervorhebung, Trenner, Teaser-Bild)
- Footer Adresse & Kontakt über den Customizer konfigurierbar
- Footer Spendenkonto (Kontoinhaber, Bank, IBAN, BIC) über den Customizer konfigurierbar
- RSS-Feed Widget: beliebig viele Feeds als Kästen in der Sidebar, konfigurierbar über Design > Widgets


== Installation ==

1. Laden Sie das Theme als ZIP-Datei herunter.
2. Gehen Sie in WordPress zu Design > Themes > Theme installieren.
3. Klicken Sie auf "Theme hochladen" und wählen Sie die ZIP-Datei.
4. Aktivieren Sie das Theme.

ODER:

1. Entpacken Sie den Theme-Ordner.
2. Kopieren Sie ihn nach wp-content/themes/nabu-theme/
3. Aktivieren Sie das Theme unter Design > Themes.


== Einrichtung nach Installation ==

=== Navigationsmenüs (Design > Menüs) ===

Das Theme unterstützt fünf Menü-Positionen:

1. Meta-Navigation (oben rechts) - Kleine Links wie "NABU", "Newsletter", "Shop"
2. Haupt-Navigation (blaue Leiste) - Hauptnavigation mit Seiten. Diese Position ist
   optional: Solange ihr kein Menü zugewiesen ist, bleibt die blaue Leiste leer und
   rein dekorativ, wie im originalen NABU-Design. Sobald ein Menü zugewiesen wird,
   erscheinen die Links in der Leiste; auf schmalen Bildschirmen klappt stattdessen
   ein Menü-Button (☰) das Mobilmenü auf.
3. Sidebar-Navigation oben (neben Slider) - Vertikale Pills-Navigation neben dem Neuigkeiten-Slider
4. Sidebar-Navigation unten (neben Beiträgen) - Vertikale Pills-Navigation neben der Beitragsliste
5. Footer-Navigation - Links im Footer

Tipp: Für den "Mitmachen"-Button in der Navigation fügen Sie dem entsprechenden
Menüpunkt die CSS-Klasse "nav-link-mitmachen" hinzu (Menüs > Erweitert > CSS-Klassen).
Aktivieren Sie "CSS-Klassen" unter Ansicht anpassen > CSS-Klassen wenn nicht sichtbar.

=== Startseite einrichten ===

1. Erstellen Sie unter Seiten eine neue Seite "Startseite"
2. Erstellen Sie ggf. eine Seite "Aktuelles" als Blog-Seite
3. Gehen Sie zu Einstellungen > Lesen
4. Wählen Sie "Statische Seite" und setzen Sie "Startseite" und "Beitragsseite"

=== Footer – Adresse & Kontakt ===

Design > Customizer > Footer – Adresse & Kontakt
- Name der Gruppe / Organisation
- Straße und Hausnummer
- PLZ und Ort
- Telefon
- E-Mail-Adresse
- Website-URL

=== Footer – Spendenkonto ===

Design > Customizer > Footer – Spendenkonto
- Kontoinhaber
- Bank
- IBAN
- BIC
- Zusätzlicher Hinweis (mehrzeilig möglich)

Hinweis: Wenn unter Design > Widgets ein Widget für „Footer: Adresse & Kontakt" bzw.
„Footer: Spendenkonto" zugewiesen ist, hat dieses Priorität über die Customizer-Felder.

=== Beitragsliste auf der Startseite ===

Wenn als Startseite "Neueste Beiträge" eingestellt ist, zeigt das Theme eine
paginierte Beitragsliste. Jeder Beitrag wird nach 150 Wörtern mit einem
"Weiterlesen"-Link gekürzt.

Anzahl der Beiträge pro Seite: Design > Customizer > Startseite – Neuigkeiten >
Beiträge pro Seite (Standard: 5, konfigurierbar 1–20)

=== Bildslider (Carousel) ===

Der Bildslider auf der Startseite zeigt automatisch die letzten Beiträge MIT Beitragsbild an.
Empfohlene Bildgröße: 940 × 300 Pixel.

Anzahl der Slider-Bilder: Design > Customizer > Startseite – Bildslider

=== Automatisches Weiterschalten und Barrierefreiheit ===

Der Slider schaltet standardmäßig NICHT automatisch weiter. Besucher blättern
selbst über die Pfeile oder die Punkte darunter.

Das ist eine bewusste Entscheidung: WCAG 2.2, Erfolgskriterium 2.2.2 („Pause,
Stop, Hide", Konformitätsstufe A) verlangt, dass sich automatisch bewegte
Inhalte anhalten lassen. Automatische Bewegung erschwert außerdem das Lesen für
Menschen mit Aufmerksamkeits- oder Leseeinschränkungen, und wer langsamer liest,
verpasst Inhalte.

Wer das automatische Weiterschalten dennoch möchte:
Design > Customizer > Startseite – Bildslider > „Bildslider automatisch
weiterschalten"

Ist die Option aktiv, sorgt das Theme selbst für die Barrierefreiheit:
- Unten rechts im Slider erscheint eine Pause-Taste. Ein Klick hält den Slider
  dauerhaft an; er startet auch dann nicht von allein wieder, wenn die Maus den
  Bereich verlässt.
- Besucher, die in ihrem Betriebssystem „Bewegung reduzieren" eingestellt haben
  (prefers-reduced-motion), bekommen gar keine automatische Bewegung. Die Taste
  bleibt sichtbar, damit sie die Wiedergabe bei Bedarf selbst starten können.
- Der Slider pausiert außerdem, solange er mit der Maus überfahren wird oder den
  Tastaturfokus hat.

=== Logo einrichten ===

Design > Customizer > Website-Identität > Logo
Empfohlene Größe: 115 × 96 Pixel (oder höher mit gleichem Seitenverhältnis)
Das Logo wird verkleinert oberhalb der blauen Leiste schwebend dargestellt.

=== Farben anpassen ===

Design > Customizer > NABU Farben
- Primärfarbe: Standard #0068B4 (NABU-Blau)
- Akzentfarbe: Standard #ef7c00 (Orange für "Mitmachen"-Button)

=== Soziale Medien ===

Design > Customizer > Soziale Medien
Geben Sie die URLs für Facebook, Twitter, YouTube, Instagram und E-Mail ein.
Die Icons erscheinen dann automatisch im Footer.

=== Footer-Widgets ===

Design > Widgets
- Footer: Adresse & Kontakt (Spalte 1)
- Footer: Spalte 2
- Footer: Spalte 3
- Footer: Spendenkonto (Spalte 4)

Empfehlung: Nutzen Sie das "Text"-Widget für freie Inhalte.

=== Sidebar-Widgets ===

Design > Widgets > Sidebar
Hier können Sie zusätzliche Widgets unter der oberen Sidebar-Navigation platzieren
(neben dem Neuigkeiten-Slider).

Design > Widgets > Sidebar unten (neben Beiträgen)
Hier können Sie Widgets in der rechten Spalte unterhalb der Trennlinie platzieren
(neben der Beitragsliste).

=== RSS-Feed Kästen (Sidebar) ===

Das Theme enthält das Widget „NABU RSS-Feed", das beliebig oft zur Sidebar
hinzugefügt werden kann – ein Widget pro Feed.

Einrichtung: Design > Widgets > Sidebar > „NABU RSS-Feed" hinzufügen
Einstellungen pro Widget:
- Titel des Kastens (z. B. „NABU Bundesverband")
- RSS-Feed URL (z. B. https://www.nabu.de/rss.xml)
- Anzahl Einträge: 1–5 (Standard: 3)
- Datum anzeigen: optional

Feeds werden automatisch 12 Stunden gecacht. Bei Verbindungsproblemen wird
ein Hinweis nur für eingeloggte Administratoren angezeigt.


== Bild-Größen ==

Das Theme registriert folgende Bildgrößen:
- nabu-carousel: 940 × 300 px (Slider auf der Startseite)
- nabu-teaser:   220 × 110 px (Vorschaubilder im Neuigkeiten-Slider)
- nabu-page:     680 × 453 px (Hauptbild auf Unterseiten)
- nabu-wide:     700 × 350 px (Allgemeines breites Format)

Tipp: Installieren Sie das Plugin "Regenerate Thumbnails" nach Theme-Aktivierung,
um vorhandene Bilder in den neuen Größen zu erstellen.


== Sprache und Übersetzung ==

Die Quell-Strings im Code sind Englisch (WordPress-Konvention). Die deutsche
Übersetzung liegt in languages/de_DE.po und languages/de_DE.mo und wird
automatisch geladen, sobald WordPress auf Deutsch eingestellt ist – deutsche
NABU-Gruppen sehen also durchgängig deutsche Beschriftungen.

Übersetzung anpassen: languages/de_DE.po mit Poedit öffnen, ändern und
speichern (Poedit erzeugt die de_DE.mo automatisch mit).

Neue Sprache anlegen: languages/nabu.pot als Vorlage verwenden und die
fertige Übersetzung als languages/<locale>.mo ablegen, z. B. nl_NL.mo.
Wichtig: Bei Themes lautet der Dateiname nur <locale>.mo, nicht
nabu-<locale>.mo – Letzteres gilt nur für Plugins.


== Copyright, Lizenzen und Quellen ==

NABU WordPress Theme, Copyright (C) 2025-2026 Florian Willnat
Lizenziert unter der GNU General Public License v2 or later.
https://www.gnu.org/licenses/gpl-2.0.html

Dieses Theme ist freie Software: Sie dürfen es weitergeben und/oder verändern
unter den Bedingungen der GNU General Public License, Version 2 oder später.
Es wird ohne jede Gewährleistung bereitgestellt.

=== Enthaltene Bibliotheken ===

Bootstrap (js/bootstrap.min.js, Teile von css/nabu.css)
  Version 4.0.0-alpha.5
  Copyright (C) 2011-2016 The Bootstrap Authors, Twitter Inc.
  MIT License | https://opensource.org/licenses/MIT
  Quelle: https://getbootstrap.com

Slick Carousel (js/slick.min.js)
  Version 1.6.0
  Copyright (C) 2017 Ken Wheeler
  MIT License | https://opensource.org/licenses/MIT
  Quelle: http://kenwheeler.github.io/slick/

Font Awesome (fonts/, Icon-Klassen in css/nabu.css)
  Version 4.7.0
  Copyright (C) 2017 Dave Gandy
  Code: MIT License | https://opensource.org/licenses/MIT
  Schriftdateien: SIL Open Font License 1.1 | https://scripts.sil.org/OFL
  Quelle: https://fontawesome.com

jQuery wird nicht mitgeliefert – das Theme nutzt die im WordPress-Kern
enthaltene Version.

=== Bekannte Einschränkung: Bootstrap-Version ===

Das Theme nutzt Bootstrap 4.0.0-alpha.5, weil das mitgelieferte Stylesheet
css/nabu.css gegen genau diese Vorabversion kompiliert wurde (erkennbar an
.collapse.in und .navbar-toggleable-*). Ein Austausch nur der JavaScript-Datei
gegen eine stabile 4.x-Version würde das mobile Menü unbrauchbar machen, da
stabile Versionen die Klasse .show statt .in schalten.

Ein Upgrade erfordert daher, nabu.css gegen Bootstrap 4.6 neu zu kompilieren
und die Markup-Klassen anzupassen (navbar-toggleable-md -> navbar-expand-lg,
hidden-md-down -> d-lg-none usw.).

Sicherheitseinschätzung: Die bekannten XSS-Schwachstellen in Bootstrap 4
(u. a. CVE-2018-14041) betreffen die Komponenten Tooltip, Popover und
Scrollspy. Diese werden vom Theme nicht verwendet – genutzt werden
ausschließlich Collapse, Carousel und Tab.

=== Schriftarten ===

Source Sans Pro (fonts/source-sans-pro/, eingebunden über css/fonts.css)
  Copyright (C) 2010-2020 Adobe Systems Incorporated
  SIL Open Font License 1.1 | https://scripts.sil.org/OFL
  Lizenztext: fonts/source-sans-pro/LICENSE.md
  Quelle: https://fonts.google.com/specimen/Source+Sans+Pro

  Die Schriftdateien werden vom eigenen Server ausgeliefert (latin und
  latin-ext, je Regular/Italic/Bold/Bold-Italic als woff2). Es findet kein
  Verbindungsaufbau zu Google statt – relevant für die DSGVO-Konformität
  der NABU-Gruppen-Websites.

=== Bilder ===

img/list-point2.png, img/logo-default.jpg
  Copyright (C) 2025 Florian Willnat
  GNU General Public License v2 or later

screenshot.png
  Copyright (C) 2025 Florian Willnat
  GNU General Public License v2 or later

=== Design-Vorlage ===

Das Stylesheet css/nabu.css basiert auf dem HTML-Design-Template des
NABU (Naturschutzbund Deutschland e.V., 2017). "NABU" ist eine
eingetragene Marke des Naturschutzbund Deutschland e.V.; das Theme steht
in keiner offiziellen Verbindung zum Bundesverband. Die Nutzung von Name
und Design setzt eine Abstimmung mit dem NABU voraus.


== Anpassungen für Entwickler ==

=== Hooks und Filter ===

- `nabu_content_width`: Inhaltsbreite anpassen (Standard: 700px)
- `nabu_before_main_nav`: Vor der Hauptnavigation ausgeben
- `nabu_after_footer`: Nach dem Footer ausgeben

=== Template Hierarchy ===

Das Theme nutzt die Standard WordPress Template-Hierarchie:
- front-page.php: Startseite
- page.php: Statische Seiten
- single.php: Einzelne Beiträge
- archive.php: Kategorien, Tags, Datum, Autor
- search.php: Suchergebnisse
- 404.php: Seite nicht gefunden
- index.php: Fallback / Blog-Übersicht

=== Child Theme ===

Für eigene Anpassungen erstellen Sie ein Child Theme:

1. Neuen Ordner: wp-content/themes/nabu-theme-child/
2. style.css mit folgendem Inhalt:
   /*
   Theme Name: NABU Child
   Template: nabu-theme
   Version: 1.0.0
   */
3. functions.php mit folgendem Inhalt (@import ist veraltet und langsam):
   <?php
   add_action( 'wp_enqueue_scripts', function() {
       wp_enqueue_style( 'nabu-parent-style', get_template_directory_uri() . '/style.css' );
   } );
4. Eigene PHP-Anpassungen ebenfalls in die functions.php des Child Themes


== Autor ==

Florian Willnat
E-Mail: florian@nabu-diepholz.de
Web: https://www.nabu-diepholz.de


== Changelog ==

= 1.2.9 =
* Barrierefreiheit: Der Bildslider schaltet nicht mehr automatisch weiter. Bisher
  lief er fest alle 5 Sekunden, ohne Möglichkeit zum Anhalten – ein Verstoß gegen
  WCAG 2.2 Erfolgskriterium 2.2.2 („Pause, Stop, Hide", Stufe A). Das Pausieren
  bei Mausberührung genügt dafür nicht, da es Touch-Nutzern nicht hilft.
* Neue Customizer-Option „Bildslider automatisch weiterschalten" (standardmäßig
  aus) unter Startseite – Bildslider
* Ist sie aktiv, zeigt der Slider eine Pause-Taste. Diese hält ihn dauerhaft an:
  Bootstrap ruft bei mouseleave von sich aus cycle() auf, deshalb wird zusätzlich
  das Intervall in der Instanzkonfiguration auf false gesetzt – sonst liefe der
  Slider gegen den ausdrücklichen Nutzerwunsch wieder los.
* prefers-reduced-motion wird respektiert: Wer im Betriebssystem weniger Bewegung
  eingestellt hat, bekommt keine automatische Bewegung, kann sie über die Taste
  aber selbst starten
* Hinweis für bestehende Installationen: Sliders, die bisher automatisch liefen,
  stehen nach dem Update still. Das automatische Weiterschalten lässt sich im
  Customizer wieder einschalten.

= 1.2.8 =
* Bugfix: Die Menüposition "Haupt-Navigation (blaue Leiste)" war zwar registriert und
  in Design > Menüs zuweisbar, hatte aber keinerlei Wirkung – header.php gab die blaue
  Leiste als leeres Element aus und rief nabu_main_navigation() nie auf. Damit waren
  auch das eingeklappte Mobilmenü (#mobilenav) und der Walker Nabu_Walker_Nav_Menu
  unerreichbar. Der Fehler bestand seit dem ersten Release.
* Die Hauptnavigation wird jetzt in header.php ausgegeben, inklusive Menü-Button (☰)
  für das Bootstrap-Collapse-Mobilmenü auf schmalen Bildschirmen
* Die Position bleibt bewusst optional: Ohne zugewiesenes Menü bleibt die blaue Leiste
  leer wie bisher. Der frühere Fallback nabu_default_main_nav() hätte per
  wp_list_pages() sämtliche Seiten aufgelistet und damit bestehende Installationen
  ungefragt verändert – er wurde deshalb entfernt.

= 1.2.7 =
* Source Sans Pro wird jetzt lokal ausgeliefert (fonts/source-sans-pro/, neue
  css/fonts.css) statt von Google Fonts geladen – behebt das DSGVO-Problem;
  betrifft Frontend und Block-Editor (@import in editor-style.css entfernt)
* jQuery wird nicht mehr mitgeliefert und nicht mehr deregistriert – das Theme
  nutzt jetzt die jQuery-Version aus dem WordPress-Kern (js/jquery-3.1.1.min.js entfernt)
* i18n: alle Quell-Strings im Code auf Englisch umgestellt (WordPress-Konvention),
  deutsche Übersetzung wird als languages/de_DE.po und de_DE.mo mitgeliefert –
  die Oberfläche bleibt für deutsche Installationen unverändert deutsch
* Übersetzungsvorlage languages/nabu.pot ergänzt (135 Strings)
* Bugfix i18n: Die elf Feldbeschriftungen der Customizer-Abschnitte "Footer –
  Adresse & Kontakt" und "Footer – Spendenkonto" wurden über eine Variable an
  esc_html__() übergeben (esc_html__( $field['label'] )) und waren dadurch
  überhaupt nicht übersetzbar – Beschriftungen jetzt direkt im Array übersetzt
* Bugfix i18n: Die Tab-Überschrift auf der Startseite war aus drei Fragmenten
  ("Aktuelle" + "s" + "Meldungen") zusammengesetzt und damit nicht sinnvoll
  übersetzbar – jetzt zwei vollständige Strings für schmale und breite Ansicht
* README.txt in readme.txt umbenannt (WordPress-Konvention)
* Vollständiger Copyright- und Lizenznachweis für alle enthaltenen Bibliotheken,
  Schriften und Bilder ergänzt
* style.css: Theme-Beschreibung auf Englisch, gültige Theme URI, ungültiges Tag
  "nature" entfernt, "Tested up to" auf 6.9 angehoben

= 1.2.6 =
* Zweite Sidebar-Navigation unterhalb der horizontalen Trennlinie hinzugefügt
  (neben der Beitragsliste auf der Startseite)
* Neues Navigationsmenü „Sidebar-Navigation unten (neben Beiträgen)" unter Design > Menüs
* Neuer Widget-Bereich „Sidebar unten (neben Beiträgen)" unter Design > Widgets
* Neue Template-Datei sidebar-bottom.php für die untere Sidebar

= 1.2.5 =
* Bugfix: Beitragsbild in der Vorschauliste von nabu-teaser (220×110 px) auf nabu-wide
  (700×350 px) umgestellt — verhindert Pixelierung bei Vollbreiten-Darstellung
  (betrifft front-page.php und index.php)
* Bugfix: nabu_posted_on() zeigte Veröffentlichungs- und Änderungsdatum ohne Trenner
  zusammen; jetzt wird nur noch das Veröffentlichungsdatum ausgegeben
* Datum der Veröffentlichung wird jetzt im Footer des Teasers (unterhalb der Preview,
  bei Kategorien) angezeigt statt im Entry-Header oberhalb des Textes
* README und style.css: "Offizielles" aus der Theme-Beschreibung entfernt

= 1.2.4 =
* Neues Widget „NABU RSS-Feed" (inc/class-nabu-rss-widget.php): zeigt 1–5 aktuelle
  Einträge eines beliebigen RSS/Atom-Feeds als Kasten in der Sidebar; Titel, Feed-URL,
  Anzahl und optionale Datumsanzeige über Design > Widgets konfigurierbar; mehrfach
  verwendbar (ein Widget pro Feed); Caching via WordPress fetch_feed() (12 Stunden);
  Fehleranzeige im Frontend nur für Administratoren
* CSS: NABU-blauer Titelbalken, weiße Listeneinträge mit Trennlinien, responsive

= 1.2.3 =
* Footer Adresse & Kontakt: neuer Customizer-Abschnitt mit Feldern für Gruppenname,
  Straße, PLZ/Ort, Telefon, E-Mail (Spam-geschützt via antispambot()) und Website-URL
* Footer Spendenkonto: neuer Customizer-Abschnitt mit Feldern für Kontoinhaber, Bank,
  IBAN, BIC und optionalem Hinweistext; Ausgabe als strukturierte Tabelle im Footer
* Beide Abschnitte erscheinen unter Design > Customizer; Widgets haben weiterhin Priorität
* Bugfix: footer { background } in nabu.css auf body > footer eingeengt — verhindert
  blauen Hintergrund auf <footer class="entry-footer"> in Beiträgen
* Entry-Footer: background: transparent und korrektes Padding gesetzt

= 1.2.2 =
* Entry-Footer (Kategorien/Schlagwörter): Schriftgröße auf 0.8em reduziert, engere
  Zeilenhöhe (1.3), Link-Unterstrich nur noch bei Hover — Bereich wirkt ca. 50% kompakter
* Seitenzahl-Kästen: von inline-block (height: 34px / line-height: 34px) auf inline-flex
  mit align-items: center umgestellt — Zahlen jetzt exakt mittig, Größe richtet sich
  nach Schriftgröße (padding: 0.3em 0.5em, min-width: 2.2em)

= 1.2.1 =
* Bugfix: Logo-Wrapper in header.php von <a> auf <div> geändert — verschachtelte
  <a>-Tags (äußerer nabu-logo-Link + innerer custom-logo-link von WordPress) ließen
  den Browser das äußere Element leer rendern, wodurch width: 160px nicht griff und
  das Logo in voller Originalgröße erschien

= 1.2.0 =
* Block Editor (Gutenberg) – Stufe 1: add_theme_support für align-wide, wp-block-styles,
  responsive-embeds, editor-styles; NABU-Farbpalette im Editor
* Block Editor – Stufe 1: editor-style.css mit Source Sans Pro, NABU-Farben, Block-Stilen
* Block Editor – Stufe 1: CSS für alignwide/alignfull, responsive Embeds, Farbpaletten-Klassen,
  Block-Stile für Button, Quote, Tabelle, Separator, Bild
* Block Editor – Stufe 2: theme.json mit Layout-Größen (700 px / 940 px), Farbpalette,
  Typografie (Source Sans Pro, 5 Schriftgrößen), Abstandssteuerung, globale Stile
* Block Editor – Stufe 2: 4 Block-Stilvarianten: Mitmachen-Button (Orange), NABU Hervorhebung
  (Quote), NABU Blau (Separator), NABU Teaser (Image)
* Autor auf Florian Willnat aktualisiert
* Mindest-WordPress-Version auf 5.9 angehoben (theme.json v2 Voraussetzung)

= 1.1.0 =
* Logo verkleinert (115 px) und schwebend über der blauen Leiste positioniert
* Blaue Navigationsleiste: Navigationslinks entfernt (dekorative Leiste)
* Startseite: Paginierte Beitragsliste mit konfigurierbarer Anzahl pro Seite (Standard: 5)
* Startseite: Beiträge werden nach 150 Wörtern automatisch mit Weiterlesen-Link gekürzt
* Neues Customizer-Feld: Beiträge pro Seite (Hauptseite) unter Startseite – Neuigkeiten
* CSS: Stile für nummerierte Seitennavigation im NABU-Blau

= 1.0.0 =
* Erste Version
* Basiert auf dem NABU HTML-Template 2017
* WordPress-Integration: Menüs, Widgets, Customizer, Custom Logo
* Slick-Slider für Neuigkeiten
* Bootstrap Carousel für Startseiten-Slider
* 4-spaltiger Footer mit Widget-Bereichen
* Soziale Medien-Icons im Footer
* Anpassbare Farben über den Customizer


== Credits ==

- NABU HTML-Vorlage 2017: Basis für dieses Theme
- Bootstrap-basiertes responsives Grid-System
- Font Awesome Icons für Navigation und Footer
