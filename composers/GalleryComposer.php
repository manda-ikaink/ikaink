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

        $view->with('collection', $collection);
        $view->with('pages', $pages);
        $view->with('entry', $entry);
    }
}