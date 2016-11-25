<?php

namespace Drupal\page_manager_context_argument\Plugin\views\argument_default;

use Drupal\Core\Cache\Cache;
use Drupal\Core\Cache\CacheableDependencyInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\argument_default\ArgumentDefaultPluginBase;
use Drupal\page_manager\Entity\Page;

/**
 * The page manager context argument default handler.
 *
 * @ingroup views_argument_default_plugins
 *
 * @ViewsArgumentDefault(
 *   id = "page_manager_context",
 *   title = @Translation("Page manager context")
 * )
 */
class PageManagerContextArgument extends ArgumentDefaultPluginBase implements CacheableDependencyInterface {

  /**
   * The variant manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $variantManager;

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();
    $options['context'] = ['default' => ''];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    /*  List all contexts from variants */
    $pages = Page::loadMultiple();
    $contextList = [];
    foreach ($pages as $page) {
      $variants = $page->getVariants();
      foreach ($variants as $variant) {
        $contexts = $variant->getContexts();
        foreach ($contexts as $key => $context) {
          $label = (string) $context->getContextDefinition()->getLabel();
          if ($context->getContextDefinition()->getDataType() == 'any') {
            $contextList[$context->getContextDefinition()->getDataType()][$key] = $label;
          }
        }
      }
    }

    $form['context'] = array(
      '#type' => 'select',
      '#title' => $this->t('Context'),
      '#options' => $contextList,
      '#default_value' => $this->options['context'],
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getArgument() {
    $params = \Drupal::routeMatch()->getParameters();
    $contexts = $params->get('page_manager_page_variant')->getContexts();
    $argument = NULL;
    foreach ($contexts as $key => $context) {
      if ($this->options['context'] == $key) {
        $argument = $context->getContextValue();
        break;
      }
    }

    return $argument;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheMaxAge() {
    return Cache::PERMANENT;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return [];
  }

}
