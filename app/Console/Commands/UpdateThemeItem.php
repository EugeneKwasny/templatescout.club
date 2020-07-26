<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Theme;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;

class UpdateThemeItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme_item:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update theme items';

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
        $themes = Theme::all();

        $bar = $this->output->createProgressBar($themes->count());

        $bar->start();


        Theme::chunk(100, function($themes) use ($bar){
            foreach($themes as $theme){
                $response = Http::retry(3, 1000)->get('https://api.wordpress.org/themes/info/1.1/', [
                    'action' => 'theme_information',
                    'request[slug]' => $theme->slug
                ]);
            
                $newChecksum = Hash::make($response->body(), [
                    'memory' => 1024,
                    'time' => 2,
                    'threads' => 2,
                ]);

    
                if (Hash::check($response->body(), $theme->checksum)) {
                    $bar->advance();
                    continue;
                }

                $themeArray = $response->json();

                if(is_array($themeArray)){
                    $theme->fill([
                        'name' => $themeArray['name'],
                        'version' => $themeArray['version'],
                        'preview_url' => $themeArray['preview_url'],
                        //'author' => $themeArray['author'],
                        'screenshot_url' => $themeArray['screenshot_url'],
                        'rating' => $themeArray['rating'],
                        'num_ratings' => $themeArray['num_ratings'],
                        'downloaded' => $themeArray['downloaded'],
                        'last_updated' => $themeArray['last_updated'],
                        'homepage' => $themeArray['homepage'],
                        'description' => $themeArray['sections']['description'],
                        'template' => $themeArray['template'] ?? null,
                        'download_link' => $themeArray['download_link'],
                        'specifications' => json_encode($themeArray['tags']),
                        'checksum' => $newChecksum 
                    ])->save();

                    $bar->advance();
                }
                

                
            }

           
        });
        $bar->finish();
    }
}
