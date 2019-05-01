<?php

namespace App\Observers;

use App\News;

class NewsObserver
{
    /**
     * Handle the news "created" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function created(News $news)
    {
        //
    }


   /**
     * Handle the category "saving" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function saving(News $news)
    {
        // нужно всегда изменять потому что категория может измениться
            if(!empty($news->category)){
                $news->alias = $news->category->alias.'/'.\translit_russian_alias($news->title);
            
            }else{
                $news->alias = \translit_russian_alias($news->title);
            }
      
    }
    /**
     * Handle the news "updated" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function updated(News $news)
    {
        //
    }

    /**
     * Handle the news "deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function deleted(News $news)
    {
        //
    }

    /**
     * Handle the news "restored" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function restored(News $news)
    {
        //
    }

    /**
     * Handle the news "force deleted" event.
     *
     * @param  \App\News  $news
     * @return void
     */
    public function forceDeleted(News $news)
    {
        //
    }
}
