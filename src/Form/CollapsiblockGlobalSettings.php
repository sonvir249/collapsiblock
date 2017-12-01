<?php

/**
 * Class CollapsiblockAdminSettings
 * @package Drupal\collapsiblock\Form
 */

namespace Drupal\collapsiblock\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class CollapsiblockGlobalSettings extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'collapsiblock_global_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return [
      'collapsiblock.global_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('collapsiblock.global_settings');
    $form['collapsiblock_default_state'] = [
      '#type' => 'radios',
      '#title' => $this->t('Default block collapse behavior'),
      '#options' => [
        1 => $this->t('None.'),
        2 => $this->t('Collapsible, expanded by default.'),
        3 => $this->t('Collapsible, collapsed by default.'),
        4 => $this->t('Collapsible, collapsed all the time.'),
      ],
      '#default_value' => $config->get('collapsiblock_default_state') ? $config->get('collapsiblock_default_state') : COLLAPSIBLOCK_DEFAULT_STATE,
    ];
    $form['collapsiblock_active_pages'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Remember collapsed state on active pages'),
      '#default_value' => $config->get('collapsiblock_active_pages') ? $config->get('collapsiblock_active_pages') : COLLAPSIBLOCK_ACTIVE_PAGES,
      '#description' => $this->t('Block can collapse even if it contains an active link (such as in menu blocks).'),
    ];
    $form['collapsiblock_slide_type'] = [
      '#type' => 'radios',
      '#title' => $this->t('Default animation type'),
      '#options' => [1 => $this->t('Slide'), 2 => $this->t('Fade and slide')],
      '#description' => t('Slide is the Drupal default while Fade and slide adds a nice fade effect.'),
      '#default_value' => $config->get('collapsiblock_slide_type') ? $config->get('collapsiblock_slide_type') :  COLLAPSIBLOCK_SLIDE_TYPE,
    ];
    $form['collapsiblock_slide_speed'] = [
      '#type' => 'select',
      '#title' => $this->t('Animation speed'),
      '#options' => ['0', '50', '100', '200', '300', '400', '500', '700', '1000', '1300', ],
      '#description' => $this->t('The animation speed in milliseconds.'),
      '#default_value' => $config->get('collapsiblock_slide_speed') ? $config->get('collapsiblock_slide_speed') : COLLAPSIBLOCK_SLIDE_SPEED,
    ];
    $form['collapsiblock_help'] = [
      '#markup' => $this->t('If collapsiblock doesn\'t work out of the box, you can force CSS selectors on <a href="adadad">appearance settings</a>.'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration
    $values = $form_state->getValues();
    $this->config('collapsiblock.global_settings')
      ->set('collapsiblock_default_state', $values['collapsiblock_default_state'])
      ->set('collapsiblock_active_pages', $values['collapsiblock_active_pages'])
      ->set('collapsiblock_slide_type', $values['collapsiblock_slide_type'])
      ->set('collapsiblock_slide_speed', $values['collapsiblock_slide_speed'])
      ->save();
  }
}