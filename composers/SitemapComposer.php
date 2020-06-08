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
        $scrapbook = $this->getCollection('scrapbook')->first();
        $posts = $this->getEntries('scrapbook', 'posts')->enabled()->sorted()->live()->limit(50)->get();
        $gallery = $this->getCollection('gallery')->first();
        $galleryPages = $this->getEntries('gallery', 'pages')->enabled()->sorted()->live()->get();
        $projects = $this->getCollection('projects')->first();
        $projectPages = $this->getEntries('projects', 'project')->enabled()->sorted()->live()->get();

        $view->with('pages', $pages);
        $view->with('scrapbook', $scrapbook);
        $view->with('posts', $posts);
        $view->with('gallery', $gallery);
        $view->with('galleryPages', $galleryPages);
        $view->with('projects', $projects);
        $view->with('projectPages', $projectPages);
    }
}