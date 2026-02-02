<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ExportStaticSite extends Command
{
    protected $signature = 'export:static-site {--output=dist}';
    protected $description = 'Export the entire website to static HTML files';

    private $outputPath;
    private $baseUrl;

    public function handle()
    {
        $this->outputPath = base_path($this->option('output'));
        $this->baseUrl = rtrim(config('app.url'), '/');

        $this->info('Starting static site export...');
        $this->info("Base URL: {$this->baseUrl}");

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
            $response = Http::timeout(30)->get($this->baseUrl . '/');
            $html = $response->body();

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
                $response = Http::timeout(30)->get($this->baseUrl . '/' . $page->slug);
                $html = $response->body();

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
            $response = Http::timeout(30)->get($this->baseUrl . '/research');
            $html = $response->body();

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
                $response = Http::timeout(30)->get($this->baseUrl . '/research/' . $article->slug);
                $html = $response->body();

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
                    $response = Http::timeout(30)->get($this->baseUrl . '/research/category/' . $category->slug);
                    $html = $response->body();

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
                    $response = Http::timeout(30)->get($this->baseUrl . '/research/tag/' . $tag->slug);
                    $html = $response->body();

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
            $response = Http::timeout(30)->get($this->baseUrl . '/contact');
            $html = $response->body();

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
            'images',
            'css',
            'js',
            'fonts',
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
}
