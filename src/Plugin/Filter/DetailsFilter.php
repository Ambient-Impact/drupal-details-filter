<?php

namespace Drupal\detailsfilter\Plugin\Filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Render\RendererInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterInterface;
use Drupal\filter\Plugin\FilterBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @Filter(
 *  id = "detailsfilter",
 *  title = @Translation("Details tags"),
 *  description = @Translation("Renders <code>[details open: Title] Text... [/details]</code> into collapsible <a href='https://developer.mozilla.org/en-US/docs/Web/HTML/Element/details'><code>&lt;details&gt;</code> elements</a>. <code>open</code> is optional and makes the <code>&lt;details&gt;</code> expanded initially if specified. <code>Title</code> is optional and will output text after the <code>:</code> as the contents of the <code>&lt;summary&gt;</code> element if specified."),
 *  type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE,
 * )
 */
class DetailsFilter extends FilterBase implements FilterInterface, ContainerFactoryPluginInterface {

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * {@inheritdoc}
   *
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(
    array $configuration, $plugin_id, $plugin_definition,
    RendererInterface $renderer
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);

    $this->renderer = $renderer;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration, $plugin_id, $plugin_definition
  ) {
    return new static(
      $configuration, $plugin_id, $plugin_definition,
      $container->get('renderer')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function process($text, $langcode) {
    $pattern = '#[[]details(?<open> +open)? *(: *(?<title>.*?))?](?<text>.*?)[[]/details]#usm';
    $result = new FilterProcessResult('');
    $callback = function ($matches) use ($result) {
      $render = [
            '#type' => 'details',
            'text' => ['#markup' => $matches['text']]
          ];
      if (!empty($matches['open'])) {
        $render['#open'] = TRUE;
      }
      if (!empty($matches['title'])) {
        $render['#title'] = $matches['title'];
      }

      $return = $this->renderer->render($render);
      // Rendering will always populate this and all attachments will bubble
      // up to the top level.
      $result->addAttachments($render['#attached']);
      return $return;
    };
    $new_text = preg_replace_callback($pattern, $callback, $text);
    $result->setProcessedText($new_text);
    return $result;
  }

}
