# Quick Start: Deploy to GitHub Pages

## One-Time Setup

### 1. Update Repository Remote (Already Done ✓)
```bash
git remote set-url origin https://github.com/92Bilal26/heac-cms.git
```

### 2. Configure GitHub Pages
Go to: https://github.com/92Bilal26/heac-cms/settings/pages

- Branch: `gh-pages`
- Folder: `/ (root)`
- Save

## Every Time You Update Content

### Step 1: Publish Content Locally
- Edit and publish pages/research in Filament admin panel
- Test locally at `http://localhost`

### Step 2: Generate Static Files
```bash
php artisan export:static-site
```
Creates `dist/` folder with all static HTML files.

### Step 3: Deploy to GitHub Pages
```bash
git add .github/ GITHUB_PAGES_SETUP.md app/Console/Commands/ExportStaticSite.php

git commit -m "Update content"

git push origin main
```

**GitHub Actions will automatically:**
- Build your Laravel app
- Generate static files
- Deploy to GitHub Pages
- Your site goes live!

## View Your Website
Once deployed: `https://92bilal26.github.io/heac-cms/`

## Troubleshooting

**Command not found?**
```bash
php artisan list | grep export
```

**Assets not showing?**
Ensure folders exist:
- `public/css/`
- `public/js/`
- `public/images/`

**Push failed?**
```bash
git pull origin main
git push origin main
```

---

That's it! 🚀
