<?php

namespace App\Console\Commands;

use App\Services\MailService;
use App\Services\ProductService;
use App\Services\SiteMapService;
use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductService $productService, SiteMapService $siteMapService)
    {
        //$siteMapService->createCategoriesMap();
        $siteMapService->createProductMaps();
        //$siteMapService->createBrandsMap();
        //$siteMapService->createSiteMap();
        //$productService->productBySlug('aim-tti-rm200a-rack-mount-kit');
    }
}
