# Sharkbyte POS

Sharkbyte POS is a Laravel 12 account directory for IT0049 TFA5. It provides a landing page, an about page, Customer Accounts, and User Accounts. The account controllers contain seven customers and six users transcribed from the supplied previous-POS screenshots; Blade displays them using `@foreach`.

The visual theme uses charcoal, crimson, ivory, and icy teal, inspired by Ellen Joe in Zenless Zone Zero. All styling is CSS. No character images or background artwork are included.

## Student details

| Field | Value |
| --- | --- |
| Student or group | Replace with your details |
| Members and roles | Replace if applicable |
| Section | Replace with your section |
| Professor | Replace with your professor |
| GitHub repository | Add the repository URL |
| Live application | Add the hosted URL |

## Run from a complete cloned repository

Requirements: PHP 8.2 or later with Laravel's required extensions, Composer 2, and Git. These instructions apply after the supplied files have been copied into a complete Laravel 12 project. The starter ZIP's `START_HERE.md` explains first-time project creation in Visual Studio Code.

```sh
git clone YOUR_REPOSITORY_URL laravel-pos
cd laravel-pos
composer install
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

Set these keys in the local `.env` file:

```dotenv
APP_NAME="Sharkbyte POS"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000
SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync
```

Generate a key for this new local installation and start Laravel:

```sh
php artisan key:generate
php artisan optimize:clear
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000). Stop the development server with Ctrl+C. On an existing installation, retain its existing `APP_KEY`.

The views load `public/css/pos.css` directly using `asset()`. An npm build is not required for these pages.

## Application structure

| URL | Controller method | View |
| --- | --- | --- |
| `/` | `PageController::home` | `resources/views/home.blade.php` |
| `/about` | `PageController::about` | `resources/views/about.blade.php` |
| `/customers` | `CustomerController::index` | `resources/views/customers/index.blade.php` |
| `/users` | `UserController::index` | `resources/views/users/index.blade.php` |

The four routes are defined in `routes/web.php`. Controllers are in `app/Http/Controllers`. Every page extends `resources/views/layouts/app.blade.php`, which supplies the navigation, page metadata, stylesheet, and footer.

## Data carried over from the previous POS

| Directory | Records | Supplied fields | Added example fields |
| --- | --- | --- | --- |
| Customers | 7 | `full_name`, `email` | `phone`, `created_at` |
| Users | 6 | `id`, `username`, `full_name` | `created_at` |

Customer names and emails match the supplied screenshot. User IDs, usernames, and full names also match, including the capitalization and hyphen in `Co-Manager`. Customer IDs are not visible in the supplied screenshot, so the customer listing uses row numbers labelled `#` rather than assigning imported customer IDs.

Customer phone numbers such as `09XX-XXX-1001` are masked examples. Creation timestamps are examples for both customers and users. They are stored under `created_at` and formatted as dates such as `Oct 01, 2026` in Blade. Notes below the tables identify these example values. Replace them in the arrays when actual phone numbers or creation dates are available.

The controllers define these records as static PHP arrays for the assignment. The data is static because it is hard-coded; PHP's `static` keyword is not needed. To change a record, edit the array in the relevant controller's `index()` method. No database query is made to populate either page.

For example, `/customers` calls `CustomerController::index()`. That method passes `$customers` to `customers.index`. The Blade loop creates one row per record and `{{ $customer['full_name'] }}` displays escaped text. User Accounts follows the same pattern using `$users`.

## Database demonstration files

Laravel's generated database files and the earlier optional database demonstration are retained. The two supplied migrations create a `customers` table and add role and status columns to Laravel's `users` table. `PosDemoSeeder` contains the earlier five generic demonstration records per table; it remains independent of the screenshot records displayed by the controllers.

This theme update does not import or alter the earlier POS database. To migrate additional original database fields later, use the original database export rather than reconstructing unseen columns from screenshots.

If you want to run the separate database demonstration locally, enable PDO SQLite, set `DB_CONNECTION=sqlite`, and leave `DB_DATABASE` unset so Laravel uses the default SQLite file:

```sh
php -r "is_file('database/database.sqlite') || touch('database/database.sqlite');"
php artisan optimize:clear
php artisan migrate
php artisan db:seed --class=PosDemoSeeder
```

Keep Laravel's generated default migrations, including its users migration. Running or editing the optional seeder does not change the static listings.

## Verification

Run these commands from the Laravel project root:

```sh
php artisan route:list --except-vendor
php artisan view:cache
php artisan test --filter=PosPagesTest
```

The existing feature tests check the four responses and navigation links, all supplied customer names and emails, all usernames and staff names, example phone and formatted date output, seven and six rendered rows, and that the account pages can render without a usable database connection.

Open every page in a browser as well. Check the active navigation link, the full names and emails, the dark theme, and scrolling tables on narrow screens. After changing CSS, refresh with Ctrl+F5. The source and data mappings were checked during preparation; PHP execution and browser rendering were unavailable, so run the checks locally before describing the application as tested.

## GitHub submission

Submit the complete generated Laravel project, including `artisan`, application files, `composer.json`, `composer.lock`, `.env.example`, migration files, seeder files, and this README. Use the generated `.gitignore`; keep `.env`, dependency folders, and local SQLite files out of Git.

Create an empty repository on GitHub, then run the following from the Laravel project root. Use `git init` only if the project is not already a Git repository:

```sh
git init
git add .
git status
git commit -m "Build Sharkbyte POS account directory"
git branch -M main
git remote add origin YOUR_REPOSITORY_URL
git push -u origin main
```

If a remote already exists, inspect it with `git remote -v` and use the correct existing remote. Add the real repository URL and your student details above before submission.

## Hosting

Use PHP-capable hosting with PHP 8.2 or later and Laravel's required extensions. GitHub Pages serves static files and cannot execute Laravel.

The host must install Composer dependencies, serve the `public` directory through `public/index.php`, and allow writes to `storage` and `bootstrap/cache`. Configure `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL` with the hosted HTTPS URL, and a stable server-specific `APP_KEY`. Use file sessions and cache for these static pages, with writable storage configured as required by the host.

Typical dependency and cache commands are:

```sh
composer install --no-dev --optimize-autoloader
php artisan optimize
```

The four pages use arrays and require no database import to display their records. If deploying the separate database demonstration, configure the server database and run `php artisan migrate --force` as part of deployment.

Open all four routes on the live domain and confirm the deployed commit matches the repository. Add the live URL to the student details table.

## Submission checklist

- [ ] All four required pages work.
- [ ] Customer Accounts renders seven records from a controller array with `@foreach`.
- [ ] User Accounts renders six records from a controller array with `@foreach`.
- [ ] Navigation connects all four pages.
- [ ] Sharkbyte branding and descriptions appear consistently.
- [ ] The provided names, emails, usernames, and staff IDs are correct.
- [ ] The complete Laravel project, migrations, and seeder files are committed.
- [ ] The README includes student details and accurate setup instructions.
- [ ] The hosted application works and matches the repository.
- [ ] Both repository and hosting links are included in the submission.

## References

- [Laravel 12 installation](https://laravel.com/docs/12.x/installation)
- [Laravel 12 routing](https://laravel.com/docs/12.x/routing)
- [Laravel 12 Blade templates](https://laravel.com/docs/12.x/blade)
- [Laravel 12 deployment](https://laravel.com/docs/12.x/deployment)
- [Composer create project](https://getcomposer.org/doc/03-cli.md#create-project)
