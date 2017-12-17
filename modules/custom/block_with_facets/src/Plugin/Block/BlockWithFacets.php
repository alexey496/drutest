<?php

/**
 * @file
 * Contains \Drupal\block_with_facets\Plugin\Block\BlockWithFacets.
 */

// Пространство имён для нашего блока.
// helloworld - это наш модуль.
namespace Drupal\block_with_facets\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\facets\FacetInterface;

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


    // Укажем id источника фасетов, как правило это 'search_api:страница Views, созданная на основе поискового индекса'
    $facet_source_id = 'search_api:views_page__product_facet_search__page_1';

    // Получим массив всех фасет из менеджера
    $facet_manager = \Drupal::service('facets.manager');
    $facets = $facet_manager->getFacetsByFacetSourceId($facet_source_id);
    $facet_manager->updateResults($facet_source_id);

    // Отсортируем фасеты по весу
    uasort($facets, function (FacetInterface $a, FacetInterface $b) {
      if ($a->getWeight() == $b->getWeight()) {
        return 0;
      }
      return ($a->getWeight() < $b->getWeight()) ? -1 : 1;
    });

    //соберем массив фасетов готовый для рендера
    $processed_facets = [];
    $index = 0;
    foreach ($facets as $key => $facet) {
      $processed_facets[$key] = $facet_manager->build($facet);
      // Изменим только не пустые фасеты
      if (!empty($processed_facets[$key][0]['#facet'])) {
        $processed_facets[$key][0]['#title'] = $facet->getName();// Добавим к фасете заголовок, соответствующий наименованию фасета
        // для отображения на малых устройствах оставим только первые N фасетов, остальный скроем
        if ($index > 5) {
          $processed_facets[$key][0]['#wrapper_attributes']['class'][] = 'hidden-xs';//создадим новый атрибут и передадим его в шаблон facets-item-list
        }
        $index++;
      }
    }

    // Укажем конфигурацию блока
    $block = [
      '#type' => 'container',
      'element-content' => $processed_facets
    ];
    return $block;
  }
}



