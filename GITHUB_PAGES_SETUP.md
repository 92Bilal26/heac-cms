# GitHub Pages Deployment Guide

This guide explains how to deploy your Laravel CMS to GitHub Pages while keeping the CMS running locally.

## Overview

- **Local System**: Your Laravel CMS stays on your computer for content management
- **GitHub Pages**: Hosts static HTML files generated from your content
- **Workflow**: Edit content → Generate HTML → Deploy to GitHub Pages

## Prerequisites

1. Git installed and configured
2. Laravel development environment running
3. Database with published content
4. GitHub repository access

## Manual Deployment Steps

### Step 1: Generate Static Files

Run this command in your project directory:

```bash
php artisan export:static-site
```

This creates a `dist/` folder with your entire website as static HTML files.

### Step 2: Commit and Push to GitHub

```bash
# Stage the changes
git add .github/ .gitignore

# Commit
git commit -m "Add GitHub Pages deployment setup"

# Push to GitHub
git push origin main
```

### Step 3: Configure GitHub Pages

1. Go to your repository: https://github.com/92Bilal26/heac-cms
2. Click **Settings** → **Pages**
3. Under "Source", select:
   - Branch: `gh-pages`
   - Folder: `/ (root)`
4. Click **Save**

### Step 4: Deploy Static Files to GitHub Pages

After generating files with `php artisan export:static-site`, deploy them:

```bash
# Checkout to gh-pages branch (creates it if doesn't exist)
git checkout --orphan gh-pages

# Remove all files from staging
git rm -rf .

# Copy dist folder contents to root
xcopy dist .

# Add all files
git add .

# Commit
git commit -m "Deploy static site"

# Push
git push origin gh-pages

# Go back to main branch
git checkout main
```

## Automated Deployment with GitHub Actions

Once enabled, GitHub Actions automatically:
1. Builds your Laravel app on every push to `main`
2. Generates static HTML files
3. Deploys to GitHub Pages

**No additional setup needed** - the workflow is already configured at `.github/workflows/deploy-static-site.yml`

## Workflow Overview

```
Local Development:
┌─────────────────────────────────────┐
│  Laravel CMS + Filament Admin      │
│  - Edit content                    │
│  - Manage pages, research, etc.    │
└─────────────────────────────────────┘
            ↓
    php artisan export:static-site
            ↓
┌─────────────────────────────────────┐
│  Generated dist/ folder            │
│  - HTML files                      │
│  - CSS/JS assets                   │
│  - Complete static website         │
└─────────────────────────────────────┘
            ↓
    git push origin gh-pages
            ↓
┌─────────────────────────────────────┐
│  GitHub Pages                      │
│  - Public website                  │
│  - Served as static content        │
└─────────────────────────────────────┘
```

## File Structure

After running `php artisan export:static-site`:

```
dist/
├── index.html              (homepage)
├── contact/
│   └── index.html          (contact page)
├── research/
│   ├── index.html          (research listing)
│   ├── article-1/
│   │   └── index.html
│   ├── category/
│   │   ├── technology/
│   │   │   └── index.html
│   └── tag/
│       ├── blockchain/
│       │   └── index.html
├── about/                  (dynamic pages)
│   └── index.html
├── css/                    (copied assets)
├── js/
├── images/
├── .nojekyll               (tells GitHub to skip Jekyll)
└── .gitkeep
```

## What Gets Exported

✅ **Homepage** - `index.html`
✅ **Dynamic Pages** - All published pages with their slugs
✅ **Research Articles** - All published research items
✅ **Categories & Tags** - Research category and tag pages
✅ **Contact Page** - Static HTML form
✅ **Assets** - CSS, JavaScript, images, fonts

## Important Notes

### Contact Form
The contact form on the static site needs external handling. Options:
- **Formspree**: Free form service (recommended)
  1. Update contact form action to: `https://formspree.io/f/YOUR_FORM_ID`
  2. Sign up at https://formspree.io
- **Basin**: Simple form hosting
- **Netlify Forms**: If using Netlify instead

### URLs and Links
- All relative URLs work automatically
- API endpoints won't work (static only)
- Search feature requires JavaScript solution

### Database Not Available
The static site has no database. For features that need it:
- Search → Use client-side search library
- Dynamic comments → Use third-party service
- Contact submissions → Use form service

## Troubleshooting

### Export command fails
Check if your Laravel app is properly configured:
```bash
php artisan migrate
php artisan key:generate
```

### Assets not showing
Ensure `public/` folder has:
- `css/` directory
- `js/` directory
- `images/` directory

### GitHub Pages not updating
1. Check Actions tab in GitHub for workflow errors
2. Verify `gh-pages` branch exists
3. Check Pages settings point to correct branch

### Content not appearing
1. Verify pages have `status = 'published'`
2. Ensure `published_at` is set to past date
3. Check base URL in `.env`: `APP_URL=http://localhost`

## Maintenance Workflow

**Every time you update content:**

1. Edit content in Filament admin panel
2. Publish your changes
3. Run locally to verify
4. Generate static files:
   ```bash
   php artisan export:static-site
   ```
5. Commit and push:
   ```bash
   git add dist/
   git commit -m "Update static site"
   git push origin main
   ```

## GitHub Actions Automatic Deployment

Alternatively, let GitHub Actions handle deployment:

1. Push changes to `main` branch
2. GitHub Actions automatically:
   - Builds Laravel app
   - Generates static files
   - Deploys to GitHub Pages

Check progress in **Actions** tab on GitHub.

## Your Repository

GitHub repo: https://github.com/92Bilal26/heac-cms

## Need Help?

- Check `.github/workflows/deploy-static-site.yml` for workflow configuration
- Review generated `dist/` folder structure
- Check GitHub Actions logs for errors

---

**Remember**: Keep your Laravel CMS running locally while GitHub Pages serves static files to the world!
