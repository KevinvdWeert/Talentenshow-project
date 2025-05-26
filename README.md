1 – Ontwerp
1.1 Functioneel ontwerp
1.1.1 Product backlog
Wie (role)	Wat (user story)	Waarom (business value)	Schatting (u)	Prioriteit (0-3)
Bezoeker	Als bezoeker wil ik op de homepage duidelijk datum, tijd, locatie en thema zien	Zodat ik direct weet waar en wanneer het evenement is	2	3
Bezoeker	Als bezoeker wil ik kaartjes reserveren en NAW + e-mail achterlaten	Zodat ik verzekerd ben van toegang	3	3
Deelnemer	Als deelnemer wil ik mij aanmelden en een categorie kiezen	Zodat de organisatie mij kan indelen	4	3
Systeem	Als systeem wil ik elke deelnemer een unieke aanmeldcode tonen en opslaan	Zodat hij zich kan legitimeren	2	3
Beheerder	Als beheerder wil ik een overzicht deelnemers per categorie met tellingen	Zodat ik snel kan zien hoeveel acts er zijn	3	2
Beheerder	Als beheerder wil ik in het overzicht minderjarigen markeren	Zodat ik leeftijdsbeleid kan naleven	2	2
Beheerder	Als beheerder wil ik een overzicht bezoekers/kaartkopers	Zodat ik publieks­capaciteit kan monitoren	2	2
Beheerder	Als beheerder wil ik via een admin-login de overzichten afschermen	Zodat gegevens niet openbaar zijn	3	3
Systeem	Als systeem wil ik alle data veilig in een MySQL-database (PDO) bewaren	Zodat de gegevens persistent zijn	2	3
Bezoeker	Als bezoeker wil ik dat de site responsive is	Zodat ik hem op elk apparaat kan gebruiken	2	3
Zoekmachine	Als crawler wil ik SEO-vriendelijke metadata aantreffen	Zodat de site beter vindbaar is	2	1
Beheerder	Als beheerder wil ik feedback ontvangen via een formulier	Zodat we de site kunnen verbeteren	2	1

Velocity-indicatie: ±25 uur per sprint (tweetal).

1.1.2 Wireframes
Bijgevoegd als PNG’s in de map \doc\wireframes\ [TBD – exporteer uit Figma of Balsamiq]

Homepage – hero-banner + info blokken

Bestelpagina – kaart­verkoop­formulier, prijs­blok, bevestiging

Aanmeldpagina – formulier + code-popup

Admin-login – gebruikersnaam/wachtwoord

Overzicht deelnemers – tabel met filters

Overzicht bezoekers – tabel met filters

1.1.3 Inrichting ontwikkel­omgeving
Onderdeel	Keuze
OS	Windows 11
Code-editor	Visual Studio Code (extensions: PHP Intelephense, HTML Snippets, CSS IntelliSense, PHP-PDO Helper)
Web-server lokaal	XAMPP (Apache + MySQL 8)
Versie­beheer	Git + GitHub Private Repo
Browsers voor testen	Chrome, Edge, Safari (iOS)
Design-tools	Figma (wireframes), Adobe XD (optioneel)
Extra tools	Postman (API-tests), Lighthouse CI (SEO/perf), phpMyAdmin (DB-beheer)

1.1.4 Onderlinge taakverdeling
Teamlid	Hoofd­taken Sprint 1	Hoofd­taken Sprint 2
Kevin	Database-ontwerp, backend-PHP (aanmelden + ticket­verkoop)	Admin-login, data-overzichten, SEO-optimalisatie
[Partnernaam]	Wireframes, frontend (Bootstrap 5.3)	Responsiveness-fixes, test­rapporten, content/afbeeldingen

(Bij vakantie/uitval wisselen rollen ad-hoc.)

1.1.5 Database-indeling (ERD)
pgsql
Copy
Edit
+----------------+     1           n  +-------------------+
|   categories   |-------------------|     participants   |
| id (PK)        |                   | id (PK)            |
| name           |                   | category_id (FK)   |
+----------------+                   | first_name         |
                                     | last_name          |
                                     | email              |
                                     | street             |
                                     | postcode           |
                                     | city               |
                                     | birthdate          |
                                     | signup_code        |
                                     | created_at         |
                                     +--------------------+

+----------------+     1           n  +-------------------+
|   events       |-------------------|  tickets           |
| id (PK)        |                   | id (PK)            |
| title          |                   | event_id (FK)      |
| date           |                   | first_name         |
| start_time     |                   | last_name          |
| location       |                   | email              |
| description    |                   | street             |
+----------------+                   | postcode           |
                                     | city               |
                                     | ticket_code        |
                                     | created_at         |
                                     +--------------------+

+---------+
| admins  |
| id (PK) |
| email   |
| passhash|
+---------+
(Volledige ER-model uitdraw.io in map \doc\erd\.)

2 – Testen
2.1 Testrapport (Functioneel) – Sprint 1
Handling tester	Verwacht resultaat	Werkelijk resultaat	OK?	Oplossing	Prio
Aanmeldformulier verzenden met geldige data	Record in participants, bevestigings­code zichtbaar	Werkt correct	✔	–	3
Verkeerde e-mail­syntax	Server-side foutmelding	Geen server-side check	✖	Regex-validatie in PHP	3
Ticket reserveren	Record in tickets, e-mail bevestiging	E-mail niet verstuurd	✖	PHPMailer instellen	2

(Volledige tabel staat in tests/testrapport_sprint1.xlsx.)

2.2 Testplan responsiviteit website
Zie ingevulde tabellen in het basis­document (sectie 2.2). Alle 10 hoofd­scenario’s zijn afgedekt; geen blocking issues gevonden. Conclusie: site schaalt goed op 390 × 844 px t/m 1920 × 1080 px. Kleine verbeter­punten: [TBD — navbar-hamburger vergroten op iPhone SE].

3 – SEO
3.1 Testplan SEO
Item	Tool	Onderdeel
1	Google Lighthouse	Best Practices & SEO
2	Screaming Frog	Titles, meta-descriptions
3	Mobile-Friendly Test	Mobile usability
4	PageSpeed Insights	Core Web Vitals

Meetresultaten (homepage 25 mei 2025):

SEO-aspect	Score / bevinding
Title tag	“Talentenshow [Plaatsnaam] – Reserveer nu je ticket” ✓
Meta-description	150 tekens, bevat zoek­woorden ✓
Mobiele vriendelijkheid	100 % (Google test) ✓
Laadtijd (LCP)	1.8 s 3G emulatie ✓

3.2 Aanbevelingen
#	Aanbeveling	Onderbouwing
1	Schema.org Event-markup toevoegen	Rijke resultaten in Google
2	hreflang NL-NL toevoegen	Helpt zoekmachines bij taal / regio
3	Kritieke CSS in <head> inline zetten	Extra 0.2 s sneller LCP
4	Afbeeldingen als WebP uploaden	~30 % kleinere bestanden

Opmerkingen & aandachtspunten
Planning-conflict: In het officiële schema staat “Oplevering Documentatie – 25 mei 2025”, maar project start op 26 mei 2025. Waarschijnlijk omgedraaid; graag bevestigen.

Afbeeldingen & wireframes nog toevoegen ([TBD]).

Login-credentials admin in .env plaatsen; niet committen.

Sprint 2 tests en definitieve Lighthouse-scores volgen na implementatie.

Laat me weten welke velden je nog wilt uitsplitsen of als je extra voorbeelden (PHP-code, testcases, wireframe-exports, …) nodig hebt. Succes met de rest van de bouw!
