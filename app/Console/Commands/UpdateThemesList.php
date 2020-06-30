<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Theme;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class UpdateThemesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme_list:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update themes list from wp.org rest api';

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

        $latest_item_count = DB::table('themes_updates')
                                ->select('items_count')
                                ->latest()
                                ->first();

        if($items_count <= $latest_item_count->items_count){
           die('No updates found');
        }

        //@todo create update theme_list logic
    }
}
