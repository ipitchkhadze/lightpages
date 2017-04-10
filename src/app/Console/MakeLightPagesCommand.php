<?php

namespace Ipitchkhadze\LightPages\App\Console;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class MakeLightPagesCommand extends Command {

    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lightpages:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate needed files for LightPages';

    public function fire() {
        $this->createController();
        $this->info('LightPagesController successfully.');
        $this->createViews();
        $this->info('Views created successfully.');
        $this->copyRoutes();
        $this->info('Routs copied successfully.');
        $this->info('Done.');
    }

    protected function createViews() {
        File::copyDirectory(__DIR__ . '/stubs/make/views/', resource_path('views'));
    }

    protected function copyRoutes() {
        $path = app_path('../routes/web.php');
        File::append($path, file_get_contents(__DIR__ . '/stubs/make/routes.stub'));
    }

    protected function createController() {
        $path = app_path('Http/Controllers/LightPagesController.php');
        File::put($path, $this->compileControllerStub());
    }

    protected function compileControllerStub() {
        return str_replace(
                '{{namespace}}', $this->getAppNamespace(), file_get_contents(__DIR__ . '/stubs/make/controllers/LightPagesController.stub')
        );
    }

}
