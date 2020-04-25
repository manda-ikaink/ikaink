<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

class ThemeSettingsComposer extends GlobalsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $globals = $this->getEntries('theme_settings', 'settings')->first();

        if ($globals) {
            // Add scripts to collection
            $globals->head_scripts = $this->getScripts('all', 'head');
            $globals->top_scripts  = $this->getScripts('all', 'top');
            $globals->btm_scripts  = $this->getScripts('all', 'bottom');
        }

        $view->with('globals', $globals);
    }
}