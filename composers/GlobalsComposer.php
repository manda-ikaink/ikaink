<?php
namespace Themes\ikaink\composers;

use Illuminate\View\View;

/**
 *  A series of helper functions for quicker conditionals
 */
class GlobalsComposer
{
  /**
   *  Get Matrix Collection
   *
   *  @param    string       $collection   Name of the collection
   *  @return   object|null
   */
  protected function getCollection($collection)
  {
    return matrix_exists($collection) ? matrix_collections()->where('handle', $collection) : null;
  }

  /**
   *  Get Matrix Collection Entries
   *
   *  @param    string       $collection   Name of the collection
   *  @param    string       $type       Name of the list type
   *  @return   object|null
   */
  protected function getEntries($collection, $type)
  {
    return matrix_exists($collection) ? matrix_entries($collection, $type) : null;
  }

  /**
    *  Get Single Entry Info
    *
    *  @param    string       $collection   Name of the collection
    *  @param    string       $type       Name of the list type
    *  @return   object|null
    */
    protected function getEntry($viewData)
    {
      return $viewData->has('entry') ? $viewData->get('entry') : null;
    }

  /**
   *  Get Matrix Categories
   *
   *  @param    string       $name   Name of the category
   *  @return   object|null
   */
  protected function getCategories($name)
  {
    return category_group_exists($name) ? categories($name)->get() : null;
  }

  /**
   *  Get Current Category
   *
   *  @param    object       $viewData
   *  @return   object|null
   */
  protected function getCategory($viewData) {
    return $viewData->has('category') ? $viewData->get('category') : null;
  }

  /**
   *  Get Scripts from Script Manager
   *
   *  @param    string   $page   Page set scripts are assigned to
   *  @param    string   $location   Location on the page where scripts should show
   *  @return   object       
   */
  protected function getScripts($page, $location) {
    $scripts = $this->getEntries('script_manager', 'scripts')->where('pages', '["' . $page . '"]')->where('location',  '["' . $location . '"]')->sorted()->enabled()->get();

    return !$scripts->isEmpty() ? $scripts : null;
  }
}