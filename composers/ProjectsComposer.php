<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

class ProjectsComposer extends GlobalsComposer
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
        $collection = $this->getCollection('scrapbook')->first();
        $entries    = $this->getEntries('projects','project')->sorted()->enabled()->live()->get();;
        $entry      = $this->getEntry($viewData);

        $view->with('collection', $collection);
        $view->with('entries', $entries);
        $view->with('entry', $entry);
    }
}