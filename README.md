# eDoktrina - Online Platforma za Učenje

eDoktrina je moderna web aplikacija za online učenje koja povezuje studente s instruktorima. Aplikacija posebno naglašava AI-asistiranu nastavu i pružanje obrazovnih materijala te generiranje materijala za ponavljanje.

## Tehnologije

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade Template Engine, TailwindCSS s DaisyUI pluginom
- **JavaScript**: jQuery
- **Autentikacija**: Laravel Sanctum
- **Autorizacija**: Spatie Permission Package
- **AI Integracija**: OpenAI API

## Značajke

### Za Studente
- 📚 AI Chat Asistent za učenje
- 📖 Pristup obrazovnim materijalima i skriptama
- 👨‍🏫 Pronalaženje i rezerviranje instrukcija
- 💬 Real-time komunikacija s instruktorima
- 🎯 Personalizirana putanja učenja

### Za Instruktore
- 👩‍🏫 Kreiranje i upravljanje gradivom
- 📅 Raspoređivanje instrukcija
- 💰 Praćenje prihoda
- 📊 Analitika učeničkog napredka
- ⭐ Sustav recenzija

### Administrativne Funkcije
- 🔑 Upravljanje korisnicima i ulogama
- 📈 Analitička kontrolna ploča
- 📊 Praćenje aktivnosti platforme
- ⚙️ Postavke sustava

## Uloge Korisnika

Aplikacija koristi tri osnovne uloge:
- **user**: Osnovni korisnici/studenti
- **tutor**: Instruktori
- **admin**: Administratori

Uloge su implementirane koristeći Spatie Permission paket.

## Sigurnost

- CSRF zaštita na svim formama
- Validacija svih korisničkih unosa
- Autorizacija za sve osjetljive operacije
- Sigurno skladište dokumenata i slika
- Rate limiting za API zahtjeve

## Struktura Baze Podataka

### Ključne Tablice
- `users` - Korisnici sustava
- `subjects` - Predmeti/teme
- `chat_sessions` - AI chat sesije
- `chat_messages` - Poruke u AI chatu
- `roles` & `permissions` - Spatie uloge i dozvole

## API Krajnje Točke

### Chat API
- `POST /chat/messages` - Slanje poruke
- `PATCH /chat/messages/{message}` - Uređivanje poruke
- `GET /chat/session/{session}/status` - Status sesije
- `POST /chat/session/{session}/retry` - Ponovno pokušaj
- `POST /chat/session/{session}/restart` - Restart sesije

### Web Rute
- `/` - Početna stranica
- `/login` - Prijava
- `/register` - Registracija
- `/chat` - AI Chat interface
- `/admin/*` - Admin panel
- `/u/{username}` - Korisnički profili

## Postavljanje

### Zahtjevi
- PHP 8.1+
- Composer
- Node.js & NPM
- MySQL/PostgreSQL
- OpenAI API ključ

### Instalacija
1. Klonirajte repozitorij
2. Kopirajte `.env.example` u `.env` i postavite varijable okruženja
3. Instalirajte PHP ovisnosti: `composer install`
4. Instalirajte JS ovisnosti: `npm install`
5. Generirajte ključ aplikacije: `php artisan key:generate`
6. Pokrenite migracije: `php artisan migrate`
7. Seedajte osnovne podatke: `php artisan db:seed`
8. Kreirajte simboličku poveznicu za storage: `php artisan storage:link`
9. Kompajlirajte assets: `npm run build`

### Konfiguracija

#### OpenAI API
Postavite u `.env` datoteku:
```
OPENAI_API_KEY=your_api_key
OPENAI_MODEL=gpt-4o
```

#### Email
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.example.com
MAIL_PORT=587
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
```

## Razvoj

### Kompiliranje Assets-a
```bash
# Development
npm run dev

# Production
npm run build

# Watch mode
npm run watch
```

### Pokretanje Queues
```bash
php artisan queue:work
```

### Testiranje
```bash
php artisan test
```

## Sigurnosne Napomene

- Svi korisnici moraju potiditi email prije pristupa sustavu
- Admin korisnici imaju potpunu kontrolu nad sustavom
- Osjetljivi dokumenti se skladište u privatnom storage direktoriju
- Rate limiting je primijenjen na sve kritične API krajnje točke

## Arhitektura

Aplikacija slijedi MVC obrazac:
- **Controllers**: Upravljanje logikom aplikacije
- **Models**: Eloquent ORM modeli
- **Views**: Blade template za UI
- **Policies**: Autorizacijska logika
- **Jobs**: Background taskovi (OpenAI processing)

## Doprinosite

Da biste doprinijeli projektu:
1. Forkajte repozitorij
2. Kreirajte feature branch
3. Commitajte promjene
4. Otvorite pull request





---

Razvijeno s ❤️ u Hrvatskoj
