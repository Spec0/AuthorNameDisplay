<?php

namespace Drupal\authornamedisplay\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'AuthorNameBlock' block.
 *
 * @Block(
 *  id = "author_name_block",
 *  admin_label = @Translation("Author name block"),
 * )
 */
class AuthorNameBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'author_name' => $this->t('Valery Lourie'),
        ] + parent::defaultConfiguration();

 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['author_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Author name'),
      '#description' => $this->t(''),
      '#default_value' => $this->configuration['author_name'],
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['author_name'] = $form_state->getValue('author_name');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['author_name_block_author_name']['#markup'] = '<p>' . $this->configuration['author_name'] . '</p>';

    return $build;
  }

}
