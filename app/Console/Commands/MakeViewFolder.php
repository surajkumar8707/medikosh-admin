<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewFolder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:viewfolder {folder}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a set of views (index, create, edit, show) in a specified folder';

    // Create a new command instance
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $folder = $this->normalizeFolderArgument($this->argument('folder'));

        $views = ['index', 'create', 'edit', 'show'];
        $viewPath = resource_path("views/{$folder}");

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
        }

        foreach ($views as $view) {
            $filePath = "{$viewPath}/{$view}.blade.php";
            if (!File::exists($filePath)) {
                File::put($filePath, "<!-- {$view} view -->");
                $this->info("Created: {$filePath}");
            } else {
                $this->info("File already exists: {$filePath}");
            }
        }

        return Command::SUCCESS;
    }

    protected function normalizeFolderArgument($folder)
    {
        // Replace dots, forward slashes, and backslashes with forward slashes
        $folder = str_replace(['.', '\\'], '/', $folder);

        // Remove duplicate slashes
        $folder = preg_replace('#/{2,}#', '/', $folder);

        return trim($folder, '/');
    }
}
