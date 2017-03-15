<?php

/**
 * @file
 * Contains Drupal\bollyshake_article/Plugin/Block/BollyshakeArticleVideos
 */

namespace Drupal\minka_ui\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\node\Entity\Node;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


/**
 * @Block(
 *  id = "minka_ui_banner",
 *  admin_label = @Translation("Minka - Banner"),
 * )
 */
class Banner extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Banner constructor.
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, RouteMatchInterface $route_match) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->routeMatch = $route_match;
  }

  /**
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param array $configuration
   * @param string $plugin_id
   * @param mixed $plugin_definition
   * @return static
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_route_match')
    );
  }

  /**
   * @return array
   */

  public function build() {
    /**
     * @var \Drupal\node\Entity\Node $Node
     */
//    $Article = $this->routeMatch->getParameter('node');
//    $tags = [];
//    foreach ($Article->get('field_tags')->getValue() as $tag) {
//      $tags[] = $tag['target_id'];
//    }
//
//    $query = \Drupal::entityQuery('node')
//      ->condition('type', 'video')
//      ->sort('created', 'DESC')
//      ->range(0, 4);
//
//    if (!empty($tags)) {
//      $query->condition('field_tags', $tags, 'IN');
//    }
//
//    $result = $query->execute();
//    $nids = array_keys($result);
//    $Nodes = Node::loadMultiple($nids);
//    $videos = [];
//    foreach ($Nodes as $Node) {
//      $videos[] = node_view($Node, 'teaser');
//    }

    $build = [
      '#theme' => 'minka_ui_banner',
//      '#videos' => $videos,
    ];

    return $build;
  }
}