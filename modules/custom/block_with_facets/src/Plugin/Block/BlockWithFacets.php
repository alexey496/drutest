<?php

/**
 * @file
 * Contains \Drupal\block_with_facets\Plugin\Block\BlockWithFacets.
 */

// Пространство имён для нашего блока.
// helloworld - это наш модуль.
namespace Drupal\block_with_facets\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\PluginBase;
use Drupal\facets\Entity\Facet;
use Drupal\facets\FacetManager\DefaultFacetManager;

/**
 * Добавляем простой блок с текстом.
 * Ниже - аннотация, она также обязательна.
 *
 * @Block(
 *   id = "block_with_facets",
 *   admin_label = @Translation("Block contains all facets"),
 * )
 */
class BlockWithFacets extends BlockBase {
  /**
   * {@inheritdoc}
   */


  public function build() {

    // Load facet, build all results.
    /** @var \Drupal\facets\FacetInterface $facet */
    /** @var \Drupal\facets\FacetManager\DefaultFacetManager $facet_manager */

    /*
    * Укажем id источника фасетов, как правило это 'search_api:страница Views, созданная на основе поискового индекса'
    */
    $facet_source_id = 'search_api:views_page__product_facet_search__page_1';

    $facet_manager = \Drupal::service('facets.manager');
    $facets = $facet_manager->getFacetsByFacetSourceId($facet_source_id);
    $facet_manager->updateResults($facet_source_id);
    $processed_facets = [];
    foreach ($facets as $key => $facet) {
      $processed_facets[$key] = $facet_manager->build($facet);
      /*
       * Добавим к фасете заголовок, соответствующий наименованию фасета
       */
      $processed_facets[$key][0]['#title'] = $facet->getName();
    }
    /*
     * Укажем конфигурацию блока
     */
    $block = [
      '#type' => 'container',
      'element-content' => $processed_facets
    ];
    return $block;
  } 
}

 
