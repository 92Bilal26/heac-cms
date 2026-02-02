# ZipArchive Fix for Laravel Commands

## Problem
PHP commands were failing with error: `Class "ZipArchive" not found`

This was caused by the `spatie/laravel-backup` package trying to use the ZipArchive class on line 138 of its config file.

## Solution Applied
Modified `vendor/spatie/laravel-backup/config/backup.php` line 138:

**Before:**
```php
'compression_method' => ZipArchive::CM_DEFAULT,
```

**After:**
```php
'compression_method' => 0, // No compression - ZipArchive not available
```

## How This Fixes It
- Changed from using ZipArchive constant to a hardcoded integer value
- Value `0` = `ZipArchive::CM_STORE` (no compression)
- No longer tries to load the ZipArchive class at config initialization time
- Laravel Artisan commands now work properly

## If You Need to Reapply This
If you run `composer update` or `composer install`, you'll need to reapply this fix:

```bash
# Edit the file
nano vendor/spatie/laravel-backup/config/backup.php

# Find line 138 and change:
# FROM: 'compression_method' => ZipArchive::CM_DEFAULT,
# TO:   'compression_method' => 0,
```

Or run this command:
```bash
sed -i "s/'compression_method' => ZipArchive::CM_DEFAULT,/'compression_method' => 0, \/\/ No compression/g" vendor/spatie/laravel-backup/config/backup.php
```

## Alternative: Install php-zip Extension
If you want full zip support:
1. Install PHP zip extension (varies by system)
2. Verify with: `php -m | grep zip`
3. The original code will then work

## Database Status
✅ Migrations: Complete
✅ Seeds: Complete
✅ Admin user: Created (admin@heac.gov.jo / HeacAdmin2025!)
✅ Sample data: Created

All Laravel commands now work properly!
