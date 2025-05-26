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
