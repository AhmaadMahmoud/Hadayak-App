# NativePHP Mobile App

Cross-platform (Android + iOS) mobile application built with Laravel, NativePHP for Mobile,
Livewire, Tailwind CSS, and Vite.

> This repository is a **setup-only** scaffold. It contains the configured environment and
> project structure. No screens, routes, business logic, authentication, or demo pages are
> included yet.

## Stack

| Tool              | Version    | Purpose                                  |
| ----------------- | ---------- | ---------------------------------------- |
| Laravel           | ^13.8      | Application framework                    |
| NativePHP Mobile  | ^3.3       | Native Android/iOS runtime + tooling     |
| Livewire          | ^4.3       | Server-driven reactive UI                |
| Tailwind CSS      | ^4.0       | Utility-first CSS (via `@tailwindcss/vite`) |
| Vite              | ^8.0       | Asset bundling / dev server              |

## Requirements

- PHP >= 8.3 with the `pdo_sqlite` extension enabled (NativePHP runs SQLite on-device)
- Composer
- Node.js >= 20 and npm
- **Android builds:** Android Studio / Android SDK, a JDK, and (on Windows) [7-Zip](https://www.7-zip.org/)
- **iOS builds:** macOS with Xcode (the iOS native project is generated on a Mac)

## Setup

```bash
# 1. Install PHP dependencies
composer install

# 2. Install Node dependencies
npm install

# 3. Create your environment file (if not present) and generate the app key
cp .env.example .env
php artisan key:generate

# 4. Set your app identity in .env
#    NATIVEPHP_APP_ID=com.yourcompany.yourapp
#    NATIVEPHP_APP_VERSION=1.0.0

# 5. Install / configure the native layer for Android
php artisan native:install android
```

> On Windows, if 7-Zip is not in the default location, set `NATIVEPHP_7ZIP_LOCATION` in `.env`
> to the full path of `7z.exe`.

## Running

### Web (standard Laravel dev)

```bash
npm run dev          # Vite dev server (assets + HMR)
php artisan serve    # Laravel HTTP server
```

### On a device with Jump (no Android Studio / Xcode required)

```bash
npm run build
php artisan native:jump
```

Then scan the QR code with the **Jump** app on your phone.

### Build & run natively (requires Android SDK / Xcode)

```bash
npm run build

# Android
php artisan native:run android
# or via the helper wrapper installed by NativePHP:
./native run android

# iOS (macOS only — generate the iOS project first)
php artisan native:install ios
php artisan native:run ios
```

## Configuration

- App identity, versioning, deep links, theme colors, orientation, and build options live in
  `config/nativephp.php`.
- Environment values (app id, version, 7-Zip path, SDK paths) live in `.env`.

## iOS readiness

The shared `config/nativephp.php` already contains iOS sections (permissions, iPad support,
orientation, App Store Connect). To generate the iOS native project later, run
`php artisan native:install ios` on a macOS machine with Xcode installed.
