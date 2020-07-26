<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class SetThemeTags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'set_theme:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command adds tags to theme items';

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
        $tags = \App\Tag::get()->toArray();

        $tags_progress = $this->output->createProgressBar(count($tags));
        $tags_progress->start();

       foreach($tags as $tag){
        $slug = '%'.$tag['slug'].'%';

           $themes = \App\Theme::where('description', 'like', $slug)
                    ->pluck('id')->toArray();

            foreach($themes as $theme_id){
                DB::table('tag_theme')->insertOrIgnore(['theme_id' => $theme_id, 'tag_id' => $tag['id']]);
            }

            $tags_progress->advance();
       }
       $tags_progress->finish();
    }
}
