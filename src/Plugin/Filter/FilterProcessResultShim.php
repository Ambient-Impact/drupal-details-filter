<?php
/**
 * @file FilterProcessResultShim.php
 */

namespace Drupal\detailsfilter\Plugin\Filter;

use Drupal\filter\FilterProcessResult;

class FilterProcessResultShim extends FilterProcessResult {
  /**
   * Add all attachments from a render array.
   *
   * @param array $render
   * @return $this
   */
  public function addAttachmentsFromRenderArray(array $render) {
    if (!empty($render['#attached'])) {
      $this->addAttachments($render['#attached']);
    }
    foreach ($render as $key => $child) {
      // For performance don't use Element::children here.
      if (substr($key, 0, 1) !== '#') {
        $this->addAttachmentsFromRenderArray($child);
      }
    }
    return $this;
  }
}