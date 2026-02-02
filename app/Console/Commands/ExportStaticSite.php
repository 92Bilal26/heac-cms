<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

class ExportStaticSite extends Command
{
    protected $signature = 'export:static-site {--output=dist} {--base-url=} {--asset-url=}';
    protected $description = 'Export the entire website to static HTML files';

    private $outputPath;
    private $baseUrl;
    private $assetUrl;
    private $basePath = '';

    public function handle()
    {
        $this->outputPath = base_path($this->option('output'));
        $this->baseUrl = rtrim($this->option('base-url') ?: config('app.url'), '/');
        $this->assetUrl = rtrim($this->option('asset-url') ?: (config('app.asset_url') ?: $this->baseUrl), '/');
        $this->basePath = rtrim(parse_url($this->baseUrl, PHP_URL_PATH) ?? '', '/');

        config([
            'app.url' => $this->baseUrl,
            'app.asset_url' => $this->assetUrl,
        ]);

        URL::forceRootUrl($this->baseUrl);
        $scheme = parse_url($this->baseUrl, PHP_URL_SCHEME);
        if (!empty($scheme)) {
            URL::forceScheme($scheme);
        }

        $this->info('Starting static site export...');
        $this->info("Base URL: {$this->baseUrl}");
        $this->info("Asset URL: {$this->assetUrl}");

        // Clean output directory
        if (File::exists($this->outputPath)) {
            File::deleteDirectory($this->outputPath);
        }
        File::makeDirectory($this->outputPath, 0755, true);

        // Export pages
        $this->exportHomepage();
        $this->exportDynamicPages();
        $this->exportResearchPages();
        $this->exportContactPage();
        $this->copyAssets();
        $this->createNojekyll();

        $this->info('Static site export completed successfully!');
        $this->info("Output directory: {$this->outputPath}");
        $this->line("\nNext steps:");
        $this->line("1. Review the generated files in: {$this->outputPath}");
        $this->line("2. Push changes to GitHub");
        $this->line("3. Enable GitHub Pages in your repository settings");
    }

    private function exportHomepage()
    {
        $this->info('Exporting homepage...');

        try {
            $html = $this->renderPath('/');

            $filePath = $this->outputPath . '/index.html';
            $this->saveHtmlFile($filePath, $html);
            $this->line('✓ Homepage exported');
        } catch (\Exception $e) {
            $this->error('Failed to export homepage: ' . $e->getMessage());
        }
    }

    private function exportDynamicPages()
    {
        $this->info('Exporting dynamic pages...');

        try {
            $pages = \DB::table('pages')->where('status', 'published')->get();
        } catch (\Exception $e) {
            $this->warn('Could not load pages from database: ' . $e->getMessage());
            return;
        }

        if (count($pages) === 0) {
            $this->line('No published pages found');
            return;
        }

        $bar = $this->output->createProgressBar(count($pages));
        $bar->start();

        foreach ($pages as $page) {
            try {
                $html = $this->renderPath('/' . $page->slug);

                $dirPath = $this->outputPath . '/' . $page->slug;
                File::makeDirectory($dirPath, 0755, true, true);

                $filePath = $dirPath . '/index.html';
                $this->saveHtmlFile($filePath, $html);

                $bar->advance();
            } catch (\Exception $e) {
                $this->line("\n✗ Failed to export page '{$page->slug}': " . $e->getMessage());
                $bar->advance();
            }
        }

        $bar->finish();
        $this->line("\n✓ " . count($pages) . " dynamic pages exported");
    }

    private function exportResearchPages()
    {
        $this->info('Exporting research pages...');

        // Export research index
        try {
            $html = $this->renderPath('/research');

            $dirPath = $this->outputPath . '/research';
            File::makeDirectory($dirPath, 0755, true, true);

            $filePath = $dirPath . '/index.html';
            $this->saveHtmlFile($filePath, $html);
            $this->line('✓ Research index exported');
        } catch (\Exception $e) {
            $this->warn('Failed to export research index: ' . $e->getMessage());
        }

        // Export individual research articles
        try {
            $research = \DB::table('research')->where('status', 'published')->get();
        } catch (\Exception $e) {
            $this->warn('Could not load research articles from database: ' . $e->getMessage());
            return;
        }

        if (count($research) === 0) {
            $this->line('No published research articles found');
            return;
        }

        $bar = $this->output->createProgressBar(count($research));
        $bar->start();

        foreach ($research as $article) {
            try {
                $html = $this->renderPath('/research/' . $article->slug);

                $dirPath = $this->outputPath . '/research/' . $article->slug;
                File::makeDirectory($dirPath, 0755, true, true);

                $filePath = $dirPath . '/index.html';
                $this->saveHtmlFile($filePath, $html);

                $bar->advance();
            } catch (\Exception $e) {
                $this->line("\n✗ Failed to export research '{$article->slug}': " . $e->getMessage());
                $bar->advance();
            }
        }

        $bar->finish();
        $this->line("\n✓ " . count($research) . " research articles exported");

        // Export category pages
        try {
            $categories = \DB::table('categories')->get();
        } catch (\Exception $e) {
            $this->warn('Could not load categories from database');
            return;
        }

        if (count($categories) > 0) {
            $bar = $this->output->createProgressBar(count($categories));
            $bar->start();

            foreach ($categories as $category) {
                try {
                    $html = $this->renderPath('/research/category/' . $category->slug);

                    $dirPath = $this->outputPath . '/research/category/' . $category->slug;
                    File::makeDirectory($dirPath, 0755, true, true);

                    $filePath = $dirPath . '/index.html';
                    $this->saveHtmlFile($filePath, $html);

                    $bar->advance();
                } catch (\Exception $e) {
                    $this->line("\n✗ Failed to export category '{$category->slug}': " . $e->getMessage());
                    $bar->advance();
                }
            }

            $bar->finish();
            $this->line("\n✓ " . count($categories) . " category pages exported");
        }

        // Export tag pages
        try {
            $tags = \DB::table('tags')->get();
        } catch (\Exception $e) {
            $this->warn('Could not load tags from database');
            return;
        }

        if (count($tags) > 0) {
            $bar = $this->output->createProgressBar(count($tags));
            $bar->start();

            foreach ($tags as $tag) {
                try {
                    $html = $this->renderPath('/research/tag/' . $tag->slug);

                    $dirPath = $this->outputPath . '/research/tag/' . $tag->slug;
                    File::makeDirectory($dirPath, 0755, true, true);

                    $filePath = $dirPath . '/index.html';
                    $this->saveHtmlFile($filePath, $html);

                    $bar->advance();
                } catch (\Exception $e) {
                    $this->line("\n✗ Failed to export tag '{$tag->slug}': " . $e->getMessage());
                    $bar->advance();
                }
            }

            $bar->finish();
            $this->line("\n✓ " . count($tags) . " tag pages exported");
        }
    }

    private function exportContactPage()
    {
        $this->info('Exporting contact page...');

        try {
            $html = $this->renderPath('/contact');

            $dirPath = $this->outputPath . '/contact';
            File::makeDirectory($dirPath, 0755, true, true);

            $filePath = $dirPath . '/index.html';
            $this->saveHtmlFile($filePath, $html);
            $this->line('✓ Contact page exported');
        } catch (\Exception $e) {
            $this->warn('Failed to export contact page: ' . $e->getMessage());
        }
    }

    private function copyAssets()
    {
        $this->info('Copying assets...');

        $publicPath = public_path();

        $assetDirs = [
            'build',
            'images',
            'css',
            'js',
            'fonts',
            'storage',
        ];

        foreach ($assetDirs as $dir) {
            $sourcePath = $publicPath . '/' . $dir;
            $destinationPath = $this->outputPath . '/' . $dir;

            if (File::isDirectory($sourcePath)) {
                try {
                    File::copyDirectory($sourcePath, $destinationPath);
                    $this->line("✓ Copied {$dir} assets");
                } catch (\Exception $e) {
                    $this->warn("Could not copy {$dir} assets: " . $e->getMessage());
                }
            }
        }

        $rootFiles = [
            'favicon.ico',
            'robots.txt',
        ];

        foreach ($rootFiles as $file) {
            $sourcePath = $publicPath . '/' . $file;
            $destinationPath = $this->outputPath . '/' . $file;

            if (File::exists($sourcePath)) {
                try {
                    File::copy($sourcePath, $destinationPath);
                    $this->line("Copied {$file}");
                } catch (\Exception $e) {
                    $this->warn("Could not copy {$file}: " . $e->getMessage());
                }
            }
        }
    }

    private function createNojekyll()
    {
        File::put($this->outputPath . '/.nojekyll', '');
        File::put($this->outputPath . '/.gitkeep', '');
    }

    private function saveHtmlFile($filePath, $html)
    {
        File::put($filePath, $html);
    }

    private function renderPath(string $path)
    {
        $currentPath = $path;
        $redirects = 0;
        $maxRedirects = 5;

        while ($redirects <= $maxRedirects) {
            try {
                $request = Request::create($currentPath, 'GET');
                $kernel = app(\Illuminate\Contracts\Http\Kernel::class);
                $response = $kernel->handle($request);
            } catch (\Throwable $e) {
                $this->error("Failed to render {$currentPath}: " . $e->getMessage());
                return '';
            }

            $status = $response->getStatusCode();
            $location = $response->headers->get('Location');

            if ($status >= 300 && $status < 400 && !empty($location)) {
                $currentPath = $this->normalizePath($location);
                $redirects++;
                $kernel->terminate($request, $response);
                continue;
            }

            $html = $response->getContent() ?? '';
            $kernel->terminate($request, $response);

            if ($status >= 400) {
                $this->warn("Non-success response for {$currentPath}: {$status}");
            }

            return $html;
        }

        $this->warn("Too many redirects for {$path}");
        return '';
    }

    private function normalizePath(string $location): string
    {
        $parts = parse_url($location);
        if ($parts && isset($parts['path'])) {
            $path = $parts['path'];
            if (!empty($this->basePath) && str_starts_with($path, $this->basePath)) {
                $path = substr($path, strlen($this->basePath));
                if ($path === '') {
                    $path = '/';
                }
            }
            if (!empty($parts['query'])) {
                $path .= '?' . $parts['query'];
            }
            return $path;
        }

        return $location;
    }
}
