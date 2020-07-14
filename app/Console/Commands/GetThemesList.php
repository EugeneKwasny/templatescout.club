<?php

namespace App\Console\Commands;

use App\Theme;
use App\Vendor;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class GetThemesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme_list:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get themes list from wp.org rest api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $response = Http::get('https://api.wordpress.org/themes/info/1.1/', [
            'action' => 'query_themes'
        ]);

        $responseArray = $response->json();

        

        // get $themes count
        $items_count = $responseArray['info']['results'];

        // // get $pages count 
        $pages_count = $responseArray['info']['pages'];

        $bar = $this->output->createProgressBar($items_count);

        $bar->start();
        // // loop through theme list by pages
        for($i=1;$i<=$pages_count;$i++){
            $response = Http::get('https://api.wordpress.org/themes/info/1.1/', [
                'action' => 'query_themes',
                'request[page]' => $i
            ]);
            $responseArray = $response->json();

            foreach($responseArray['themes'] as $theme){
                    $vendor = Vendor::firstOrCreate(['name' => $theme['author']]);

                    unset($theme['author']);
                    $theme['vendor_id'] = $vendor->id;
                    $newTheme = Theme::firstOrNew(['slug' => $theme['slug']]);
                    $newTheme->fill($theme);
                    $newTheme->save();
                    
                   $bar->advance();
            }

        }
        $bar->finish();

        DB::insert('insert into themes_updates (items_count, created_at) values (?, ?)', [$items_count, now()]);
    }
}
