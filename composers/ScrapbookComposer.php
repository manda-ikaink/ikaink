<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

class ScrapbookComposer extends GlobalsComposer
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
        $posts      = $this->getEntries('scrapbook','posts');
        $entry      = $this->getEntry($viewData);
        $category   = $this->getCategory($viewData);
        $categories = $this->getCategories($collection->handle);
        $perPage    = 24;

        if ($category) {
            $posts = $posts->underCategory($category->handle)->sorted()->enabled()->live()->paginate($perPage);
        } else {
            $posts = $posts->sorted()->enabled()->live()->paginate($perPage);
        }

        $view->with('collection', $collection);
        $view->with('posts', $posts);
        $view->with('entry', $entry);
        $view->with('category', $category);
        $view->with('categories', $categories);
    }
}