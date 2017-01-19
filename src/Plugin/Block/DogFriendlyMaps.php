<?php

namespace Drupal\dogfriendly_maps\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Dog Friendly Maps' Block
 *
 * @Block(
 *   id = "dogfriendlymaps",
 *   admin_label = @Translation("Dog Friendly Maps"),
 * )
 */

class DogFriendlyMaps extends BlockBase implements BlockPluginInterface {
    /**
    * {@inheritdoc}
    */
    public function build() {
        return array(
            '#markup' => $this->t('Hello, World!'),
        );
    }
    /**
    *{@inheritdoc}
    */
    public function blockForm($form, FormStateInterface $form_state) {
        $form = parent::blockForm($form, $form_state);
        $config = $this->getConfiguration();
        $form['dogfriendly_maps_api'] = array (
            '#type' => 'textfield',
            '#title' => $this->t('API URL'),
            '#description' => $this->t('The URL of the api returning a list of locations'),
            '#default_value' => isset($config['api']) ? $config['api'] : '',
        );

        return $form;
    }
    /**
    *{@inheritdoc}
    */
    public function blockSubmit($form, FormStateInterface $form_state) {
        $this->configuration['api'] = $form_state->getValue('dogfriendly_maps_api');
    }
}