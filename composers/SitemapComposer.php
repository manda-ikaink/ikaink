<?php

namespace Themes\ikaink\composers;

use Illuminate\View\View;

class SitemapComposer extends GlobalsComposer
{
   /**
    * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view) 
    {
        $pages = $this->getEntries('pages', 'pages')->enabled()->orderBy('name', 'asc')->get();
        // Blog Example:
        // $blog = $this->getCollection('blog')->enabled()->first();
        // $blogPosts = $this->getEntries('blog', 'posts')->enabled()->sorted()->live()->limit(50)->get();

        $view->with('pages', $pages);
        // $view->with('blog', $blog);
        // $view->with('blogPosts', $blogPosts);
    }
}