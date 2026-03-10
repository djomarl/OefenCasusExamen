# 🎓 Laravel Examen Template - Role-Based Auth & CRUD Ready

Dit project dient als de ultieme startbasis voor ons examen. Het bevat een volledig werkend inlog- en registratiesysteem met rollen, zodat we geen tijd verliezen en direct kunnen focussen op de specifieke CRUD-eisen van de opdracht.

---

## 📑 Inhoudsopgave

1. [📋 Kenmerken & Inhoud](#1-kenmerken--inhoud)
2. [🛠️ Installatie & Setup (met Laravel Herd)](#2-installatie--setup)
3. [🗄️ Database: SQLite](#3-database-sqlite)
4. [🤝 Samenwerken via GitHub (Tips)](#4-samenwerken-via-github-tips)
5. [🚀 Hoe we verder bouwen (Casus Voorbeeld: Relaties & CRUD)](#5-hoe-we-verder-bouwen)
6. [🎨 Views & Mappenstructuur (Nieuwe schermen maken)](#6-views--mappenstructuur)
7. [🔐 Hoe werkt het Rollensysteem? (Nieuwe rol: bijv. Keuken of Directie)](#7-hoe-werkt-het-rollensysteem)

---

<h2 id="1-kenmerken--inhoud">1. 📋 Kenmerken & Inhoud</h2>

<details>
<summary><b>Klik om de projectkenmerken te bekijken</b></summary>

<br>

* **Authenticatie:** Registreren en inloggen op basis van `username`.
* **Role-Based Access Control (RBAC):**
  * `Beheerder`: Volledige toegang tot alle onderdelen en instellingen.
  * `Gebruiker`: Beperkte toegang tot specifieke dashboards.
* **Middleware:** De routes zijn standaard beveiligd via de `CheckRole` middleware.
* **Frontend:** Volledig startklaar met **Tailwind CSS** en **Vite** voor razendsnelle styling.

</details>

---

<h2 id="2-installatie--setup">2. 🛠️ Installatie & Setup (met Laravel Herd)</h2>

<details>
<summary><b>Klik om het stappenplan voor Laravel Herd te bekijken</b></summary>

<br>

Voor dit project gebruiken we **Laravel Herd**. Dit is de allermakkelijkste manier om PHP en Laravel lokaal te draaien, zonder dat je XAMPP of ingewikkelde server-software hoeft in te stellen.

### Stap 1: Download & Installeer Laravel Herd
1. Ga naar [herd.laravel.com](https://herd.laravel.com/) en download de gratis versie voor jouw systeem (Windows of macOS).
2. Voer de installatie uit en start het programma. Herd draait nu stilletjes in je taakbalk/menubalk en regelt PHP automatisch op de achtergrond!

### Stap 2: Clone het project op de juiste plek
Herd kijkt standaard naar een specifieke map op je computer (meestal een map genaamd `Herd` of `Sites` in je gebruikersmap). Clone dit project ín die map:
```bash
cd pad/naar/je/herd/map
git clone [REPO_URL]
cd LoginRegisterWithRolesLaravel
```
*Heb je de map ergens anders gezet? Geen paniek! Open je terminal in je projectmap en typ `herd link`. Herd maakt dan een snelkoppeling voor je.*

### Stap 3: Voer het setup-script uit
Nu we in de projectmap zitten, runnen we één commando die alles (zoals de `.env` en de packages) voor ons fixt:
```bash
composer run setup
```

### Stap 4: Bekijk de website!
Doordat we Herd gebruiken, hoeven we **geen** `php artisan serve` meer te typen. Jouw website is nu direct in je browser bereikbaar via de naam van je map, gevolgd door `.test`. 
* Ga in je browser naar: **`http://loginregisterwithroleslaravel.test`** ### Stap 5: Tailwind CSS (Vite) aanzetten
Omdat we Tailwind gebruiken voor de opmaak, moet Vite wel op de achtergrond draaien om onze aanpassingen te laden. Open één terminal venster in je project en laat dit commando open staan:
```bash
npm run dev
```

</details>

---

<h2 id="3-database-sqlite">3. 🗄️ Database: SQLite</h2>

<details>
<summary><b>Klik om te zien hoe de SQLite database werkt</b></summary>

<br>

Voor dit examen gebruiken we **SQLite**. Dit is een database die in één simpel bestand leeft (`database/database.sqlite`). Dit bespaart ons zeeën van tijd, omdat we geen zware MySQL-server (zoals XAMPP, MAMP of Docker) hoeven in te stellen.

**Hoe werkt het?**

1. **Configuratie:** In je `.env` bestand staat `DB_CONNECTION=sqlite`. De andere `DB_` regels (zoals host, port, username) mag je negeren.
2. **Bestand aanmaken:** Als de database nog niet bestaat, maak hem dan aan met dit commando:
```bash
touch database/database.sqlite
```
3. **Migreren & Seeden:** Voer het onderstaande commando uit om de tabellen aan te maken (en eventuele testdata in te laden):
```bash
php artisan migrate --seed
```

</details>

---

<h2 id="4-samenwerken-via-github-tips">4. 🤝 Samenwerken via GitHub (Tips)</h2>

<details>
<summary><b>Klik voor onze afspraken rondom versiebeheer</b></summary>

<br>

Om te voorkomen dat we code overschrijven of merge-conflicts krijgen, spreken we het volgende af:

1. **Gebruik Branches:** Werk **nooit** direct in de `main` branch. Maak voor elke nieuwe taak of feature een eigen branch aan:
```bash
git checkout -b feature/naam-van-onderdeel
```
2. **Pull Before Push:** Doe altijd een `git pull origin main` voordat je lokaal begint te werken, zodat je zeker weet dat je de laatste versie van je teamgenoot hebt.
3. **Lokale Database:** Het `database.sqlite` bestand staat in de `.gitignore`. Dat is goed, want dit betekent dat we lokaal onze eigen testdata hebben! 
   * *Let op:* Passen we de database structuur aan? Push dan alleen je **Migration** bestanden. 
   * Na een `git pull` met nieuwe migraties draai je direct even `php artisan migrate`.

</details>

---

<h2 id="5-hoe-we-verder-bouwen">5. 🚀 Hoe we verder bouwen (Casus Voorbeeld: Relaties & CRUD)</h2>

<details>
<summary><b>Klik voor een complete gids over het aanmaken van CRUD's en Relaties</b></summary>

<br>

Tijdens het examen moeten we de functionaliteiten uit de casus bouwen. **Stel je voor dat we de casus krijgen: "Een ingelogde gebruiker moet een reservering kunnen plaatsen."** (Dit kan natuurlijk net zo goed een *Ticket*, *Bestelling* of *Blogpost* zijn). 

Hier is het stappenplan van wát je doet, welke bestanden je aanmaakt, waar ze voor zijn en hoe je ze koppelt.

### Stap 1: Genereer alle basisbestanden
Voer dit commando uit om alle benodigde bestanden in één klap aan te maken:
```bash
php artisan make:model Reservation -mcr
```
* **Wat doet dit?** * `-m` maakt de **Migration** (voor de database tabel).
  * `-c` maakt de **Controller** (voor de logica/achterkant).
  * `-r` staat voor **Resource**, waardoor de controller meteen alle benodigde CRUD-functies krijgt (`index`, `create`, `store`, `edit`, `update`, `destroy`).

---

### Stap 2: Pas de gegenereerde en bestaande bestanden aan

#### 1. De Migratie (`database/migrations/xxxx_create_reservations_table.php`)
```php
public function up(): void
{
    Schema::create('reservations', function (Blueprint $table) {
        $table->id();
        
        // DIT IS DE RELATIE: foreignId koppelt dit aan de 'id' in de 'users' tabel.
        $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
        
        $table->string('titel'); 
        $table->dateTime('datum'); 
        $table->timestamps();
    });
}
```
*Draai hierna direct `php artisan migrate` in je terminal!*

#### 2. De Models (`app/Models/Reservation.php` & `app/Models/User.php`)
* **In `Reservation.php`:**
```php
class Reservation extends Model
{
    protected $fillable = ['user_id', 'titel', 'datum'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```
* **In `User.php`:**
```php
class User extends Authenticatable
{
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
```

#### 3. De Controller (`app/Http/Controllers/ReservationController.php`)
```php
use Illuminate\Support\Facades\Auth;

public function store(Request $request)
{
    $validated = $request->validate([
        'titel' => 'required|string',
        'datum' => 'required|date',
    ]);

    // MAGIE: Sla de reservering op VIA de ingelogde gebruiker.
    Auth::user()->reservations()->create($validated);

    return redirect()->route('reservations.index')->with('success', 'Aangemaakt!');
}
```

#### 4. De Routes (`routes/web.php`)
```php
use App\Http\Controllers\ReservationController;

Route::middleware(['auth'])->group(function () {
    Route::resource('reservations', ReservationController::class);
});
```

</details>

---

<h2 id="6-views--mappenstructuur">6. 🎨 Views & Mappenstructuur (Nieuwe schermen maken)</h2>

<details>
<summary><b>Klik om te begrijpen hoe we nieuwe schermen bouwen voor een casus</b></summary>

<br>

Om het overzichtelijk te houden tijdens het examen, hebben we de visuele kant (`resources/views/`) opgedeeld in logische mappen. **Waarom doen we dit?** Omdat we zo nooit per ongeluk een "Beheerder" functionaliteit bij een "Gebruiker" zetten. 

### De Huidige Mappen:
* 📁 **`auth/`**: Bestanden voor bezoekers (bijv. `login.blade.php`, `register.blade.php`).
* 📁 **`beheerder/`**: Weergaves die **alleen** voor de admin bedoeld zijn.
* 📁 **`gebruiker/`**: Weergaves voor de normale, ingelogde gebruiker.
* 📁 **`components/`**: Onze gereedschapskist! Hier staan herbruikbare stukjes HTML, zoals `<x-navbar />` en `<x-layout>`.

### Casus Voorbeeld: "Maak een Producten beheer pagina voor de Beheerder"
Krijgen we de opdracht om 'Producten' te maken die alleen de admin mag beheren? Volg dan deze stappen:

**Stap 1: Maak de map en het bestand aan**
Ga naar `resources/views/beheerder/` en maak een nieuw mapje aan voor deze specifieke CRUD. Bijvoorbeeld:
📁 `resources/views/beheerder/producten/`
Maak hierin je views aan, zoals `index.blade.php` (voor het overzicht) en `create.blade.php` (voor het formulier).

**Stap 2: Gebruik de layout component**
In `index.blade.php` wil je natuurlijk de navbar en de styling hebben. Omdat wij Laravel components gebruiken, hoef je alleen dit te doen in je nieuwe bestand:
```blade
<x-layout>
    <x-navbar /> <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold">Producten Overzicht</h1>
        </div>
</x-layout>
```

**Stap 3: Koppel de view in je Controller**
Nu moet je Laravel vertellen dat hij dit bestand moet laden als iemand de URL bezoekt. Open je `ProductController` en pas de `index` methode aan. 

*Let op de puntjes (`.`) in de naam! Laravel ziet een punt als een map.*
```php
public function index()
{
    $producten = Product::all(); 

    // map: beheerder -> map: producten -> bestand: index.blade.php
    return view('beheerder.producten.index', compact('producten')); 
}
```

</details>

---

<h2 id="7-hoe-werkt-het-rollensysteem">7. 🔐 Hoe werkt het Rollensysteem? (Nieuwe rol: bijv. Keuken of Directie)</h2>

<details>
<summary><b>Klik voor een stappenplan om een compleet nieuwe rol toe te voegen</b></summary>

<br>

Ons rollensysteem is super simpel: in de `users` tabel staat gewoon een tekstkolom (string) genaamd `role`. In onze code checken we simpelweg: *Is de rol van deze User gelijk aan de benodigde rol?*

### Casus Voorbeeld: Een 'Keuken' rol toevoegen
Stel je krijgt op het examen de opdracht: *"Er is een restaurant-applicatie. Maak een apart systeem waar het keukenpersoneel (rol: keuken) de bestellingen kan zien."*

**Zo pak je dat aan (in 4 stappen):**

**Stap 1: Gebruikers aanmaken (De Database)**
Zorg dat gebruikers de rol `keuken` kunnen krijgen. 
* Wil je dat ze dit zelf kunnen kiezen bij registratie? Voeg dan in `resources/views/auth/register.blade.php` een extra optie toe aan het formulier: `<option value="keuken">Keukenpersoneel</option>`. *(Vergeet dan niet je validatie in `RegisteredUserController.php` aan te passen!)*
* Wil je gewoon test-accounts? Maak een user aan in je `DatabaseSeeder.php` en zet hardcoded `'role' => 'keuken'`.

**Stap 2: Mappenstructuur aanmaken (De Frontend)**
Net zoals we een mapje `beheerder` en `gebruiker` hebben, maak je nu een eigen "wijk" aan in je views speciaal voor de keuken:
1. Maak de map: 📁 `resources/views/keuken/`
2. Maak het bestand: 📄 `resources/views/keuken/dashboard.blade.php`
3. Vul dit bestand met je layout (`<x-layout>`) en de inhoud voor de keuken.

**Stap 3: Routes beveiligen (De Backend / Middleware)**
Je wilt niet dat een gewone "gebruiker" de URL `/keuken/bestellingen` kan openen. Hiervoor gebruiken we onze `CheckRole` middleware. Open `routes/web.php` en voeg dit toe:

```php
// Het woord ná 'role:' moet exact overeenkomen met de string in je database!
Route::middleware(['auth', 'role:keuken'])->group(function () {
    
    // Alle routes binnen deze groep zijn nu 100% beveiligd voor uitsluitend keukenpersoneel!
    Route::get('/keuken/dashboard', [KeukenController::class, 'index'])->name('keuken.dashboard');
    
});
```

*(En in de `index` functie van die `KeukenController` zet je natuurlijk: `return view('keuken.dashboard');`)*

**Stap 4: De Navbar aanpassen (De Navigatie)**
Tot slot wil je dat de keukenmedewerker een linkje naar zijn dashboard ziet in het menu. Open `resources/views/components/navbar.blade.php` en gebruik dit simpele if-statement:

```blade
@if(auth()->user()->role === 'keuken')
    <a href="{{ route('keuken.dashboard') }}" class="nav-link">Keuken Overzicht</a>
@endif
```

**Klaar!** Op exact deze manier (Database -> Mapje maken -> Route beveiligen met `role:naam` -> Navbar updaten) kun je élke denkbare rol toevoegen, of het nou *Directie*, *Docent*, *Klant* of *Keuken* is!

</details>
