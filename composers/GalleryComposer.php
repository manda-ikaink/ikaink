<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

class GalleryComposer extends GlobalsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $viewData   = collect($view->getData());
        $collection = $this->getCollection('gallery')->first();
        $pages      = $this->getEntries('gallery','pages')->sorted()->enabled()->live()->get();
        $entry      = $this->getEntry($viewData);

        if ($collection) {
            // Add scripts to collection
            $collection->head_scripts = $this->getScripts('gallery', 'head');
            $collection->top_scripts  = $this->getScripts('gallery', 'top');
            $collection->btm_scripts  = $this->getScripts('gallery', 'bottom');
        }

        $view->with('collection', $collection);
        $view->with('pages', $pages);
        $view->with('entry', $entry);
    }
}