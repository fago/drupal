<?php

/**
 * @file
 * Contains \Drupal\contextual\Element\ContextualLinksPlaceholder.
 */

namespace Drupal\contextual\Element;

use Drupal\Core\Template\Attribute;
use Drupal\Core\Render\Element\RenderElement;

/**
 * Provides a contextual_links_placeholder element.
 *
 * @todo Annotate once https://www.drupal.org/node/2326409 is in.
 *   RenderElement("contextual_links_placeholder")
 */
class ContextualLinksPlaceholder extends RenderElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return array(
      '#pre_render' => array(
        array($class, 'preRenderPlaceholder'),
      ),
      '#id' => NULL,
    );
  }

  /**
   * Pre-render callback: Renders a contextual links placeholder into #markup.
   *
   * Renders an empty (hence invisible) placeholder div with a data-attribute
   * that contains an identifier ("contextual id"), which allows the JavaScript
   * of the drupal.contextual-links library to dynamically render contextual
   * links.
   *
   * @param array $element
   *   A structured array with #id containing a "contextual id".
   *
   * @return array
   *   The passed-in element with a contextual link placeholder in '#markup'.
   *
   * @see _contextual_links_to_id()
   */
  public static function preRenderPlaceholder(array $element) {
    $element['#markup'] = '<div' . new Attribute(array('data-contextual-id' => $element['#id'])) . '></div>';
    return $element;
  }

}
