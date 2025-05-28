# 🎤 Talentenshow Website

Een PHP & MySQL-webapplicatie voor het beheren van een lokale talentenshow. Bezoekers kunnen kaartjes reserveren, deelnemers kunnen zich aanmelden, en beheerders krijgen inzicht via afgeschermde overzichten.

## 📌 Inhoud

- [Beschrijving](#beschrijving)
- [Functionaliteiten](#functionaliteiten)
- [Technische Specificaties](#technische-specificaties)
- [Installatie](#installatie)
- [Database](#database)
- [To Do](#to-do)
- [Auteurs](#auteurs)

---

## 📝 Beschrijving

Voor een lokaal evenement – een talentenshow – is een complete website ontwikkeld waarin gebruikers en beheerders kunnen interageren. De site bestaat uit:

- Een homepage met informatie over het evenement
- Een bestelpagina voor kaartverkoop
- Een aanmeldpagina voor deelnemers (zang, dans, etc.)
- Beheerderspagina’s met overzichten van deelnemers en bezoekers
- Een login-systeem voor beveiligde toegang

Deze site is ontwikkeld in het kader van een schoolproject waarbij PHP, PDO, MySQL en CSS zijn toegepast.

---

## 🚀 Functionaliteiten

- 📅 **Homepage** met datum, tijd, locatie en omschrijving
- 🎟️ **Kaartverkoopformulier** voor bezoekers
- ✍️ **Aanmeldformulier** voor deelnemers incl. categorie en leeftijd
- 🧾 **Overzicht deelnemers** per categorie (met onderscheid in leeftijd)
- 🧾 **Overzicht bezoekers** met NAW en e-mail
- 🔐 **Admin-login** (beveiligde toegang)
- 🛠️ **PDO-databaseverbinding** voor veilige interactie
- 📱 **Responsive design** voor mobiel, tablet en desktop

---

## ⚙️ Technische Specificaties

| Onderdeel     | Techniek           |
|---------------|--------------------|
| Backend       | PHP 8.x + PDO      |
| Frontend      | HTML5, CSS3 (Flexbox/Grid), Bootstrap 5 |
| Database      | MySQL              |
| Hosting       | Webserver met PHP + MySQL-ondersteuning |
| Authenticatie | Eigen login-systeem voor admin |
| Beveiliging   | Prepared statements (SQL injectie preventie), inputvalidatie |

---

## 💾 Installatie

1. **Clone deze repository**  
```bash
git clone https://github.com/gebruikersnaam/talentenshow-website.git
cd talentenshow-website
```
2. **Database aanmaken**
   - Maak een MySQL database aan, bijvoorbeeld `talentenshow`.
   - Importeer het script `database/scripts/init.sql` in je database.
   - Pas indien nodig de databasegegevens aan in `database/connection.php`.

3. **Start de webserver**
   - Zorg dat Apache en MySQL draaien (XAMPP/WAMP).
   - Navigeer naar `http://localhost/Web/Talentenshow project/` in je browser.

4. **Structuur**
   - Zie `docs/project structure.txt` voor uitleg over de mappen en bestanden.

---

## 🗂️ Database

De database is opgebouwd uit verschillende tabellen die met elkaar in relatie staan. Belangrijke tabellen zijn:

- **gebruikers**: Voor admin-accounts
- **deelnemers**: Informatie over deelnemers aan de talentenshow
- **categorieen**: Categorieën voor deelnemers (bijv. zang, dans)
- **voorstellingen**: Geplande voorstellingen met deelnemers en tijdstippen
- **kaartjes**: Reserveringen gemaakt door bezoekers

Zie `database/talentenshow_schema.sql` voor het databasemodel.

---

## ⏳ To Do

- [ ] Bezoekers kunnen hun reserveringen inzien en annuleren
- [ ] Deelnemers kunnen hun gegevens en voorstellingen beheren
- [ ] Uitgebreidere statistieken en rapportages voor beheerders
- [ ] Verbeterde foutafhandeling en validatie
- [ ] Meertalige ondersteuning (NL/EN)
- [ ] Optimalisatie voor zoekmachines (SEO)

---

## 👤 Auteurs

- **Jouw Naam** - *Ontwikkelaar* - [jouwprofiel](https://github.com/jouwgebruikersnaam)
- **Medewerker 2** - *Rol* - [profiel2](https://github.com/gebruiker2)
- **Medewerker 3** - *Rol* - [profiel3](https://github.com/gebruiker3)

Zie `docs/credits.md` voor meer informatie over bijdragers en gebruikte bronnen.
