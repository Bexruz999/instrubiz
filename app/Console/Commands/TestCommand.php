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

        $a = mail("bexruzfatullayev999@gmail.com", "Заявка с сайта", "ФИО: fio".". E-mail: " ,"From: fatullayevbexruz011@gmail.com \r\n");
        $b = $a;
        /*$siteMapService->createMainSitemap();
        $siteMapService->createSitemaps();
        $siteMapService->createCategoryMaps();
        $siteMapService->createBrandMaps();
        $siteMapService->createProductMaps();*/
        //$productService->productBySlug('fluke-729-pressure-calibrator');
    }
}
