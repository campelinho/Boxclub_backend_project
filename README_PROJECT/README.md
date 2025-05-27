# BoxClub Brussels – Laravel Project

## 🥊 Over dit project

Dit is mijn eindopdracht voor het vak **Backend Web**, waarin ik een dynamische Laravel 12 website moest bouwen voor een fictieve boksschool in Brussel: **BoxClub Brussels**.

Het project bevat gebruikersauthenticatie, profielbeheer, een nieuwspagina (CRUD), een publieke FAQ-pagina, en meer.

## ✅ Functionaliteiten die wel werken

- Gebruikersregistratie en login met wachtwoord reset
- Profielpagina met aanpasbare gegevens: naam, bio, verjaardag en profielfoto
- CRUD voor laatste nieuwsberichten met afbeelding en publicatiedatum (enkel voor admins)
- Publieke FAQ-pagina met vragen en antwoorden
- CRUD voor vragen (alle gebruikers kunnen vragen toevoegen)
- Mogelijkheid om gebruikers admin te maken via de gebruikersbeheerpagina (alleen admin)
- Middleware om routes te beschermen per rol (auth/adminOnly)
- Twee layouts gebruikt via Blade
- Database migraties en seeders met een default admin-account
- Upload en opslag van afbeeldingen via Laravel Storage

## ⚠ Wat niet is gelukt

Door tijdsdruk en technische problemen is het me **niet gelukt om het project volledig af te werken**. Ik ben een aanzienlijk deel van de tijd vastgelopen op het correct configureren van de `middleware` voor admin routes. Uiteindelijk heb ik deze vervangen door een custom middleware genaamd `adminOnly`, wat uiteindelijk wél werkte.

Ook de **categorieën in de FAQ** gaven problemen met relaties, en ik heb er uiteindelijk voor gekozen om dit veld optioneel te maken en/of te verwijderen.

Daarnaast heb ik geen tijd meer gehad om het **contactformulier met mailfunctie** te implementeren.

## 🧠 Gebruikte bronnen

- Laravel officiële documentatie: https://laravel.com/docs/12.x
- Stack Overflow (voor specifieke foutmeldingen)
- [ChatGPT (OpenAI)](https://chat.openai.com): gebruikt om mij te helpen bij:
  - het oplossen van middlewareproblemen
  - het opzetten van CRUD-structuren
  - hulp bij views, controllers en seeders
  - algemene uitleg van de Laravel MVC-structuur

Zonder deze hulp had ik bepaalde delen simpelweg niet kunnen afwerken, gezien de complexiteit en het feit dat ik een aantal lessen had gemist.

## 👤 Admin login (voor testdoeleinden)

- **Gebruikersnaam**: admin  
- **Email**: admin@ehb.be  
- **Wachtwoord**: Password!321

## 📂 Installatiehandleiding

1. Clone deze repository  
2. Installeer de dependencies  
   ```bash
   composer install
   npm install && npm run build

   Maak een .env bestand en configureer de database
   Voer de migraties en seeders uit:
php artisan migrate:fresh --seed
Start de server:
php artisan serve
