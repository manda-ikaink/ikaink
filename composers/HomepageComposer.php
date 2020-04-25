<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

class HomepageComposer extends GlobalsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $homepage = $this->getEntries('homepage', 'homepage')->first();

        if ($homepage) {
            // Add scripts to collection
            $homepage->head_scripts = $this->getScripts('home', 'head');
            $homepage->top_scripts  = $this->getScripts('home', 'top');
            $homepage->btm_scripts  = $this->getScripts('home', 'bottom');
        }

        $view->with('homepage', $homepage);
    }
}