<?php

namespace Drupal\custom_word_counter\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * External destination settings form.
 */
class CustomWordCounter extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'custom_word_counter.body_field',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('custom_word_counter.body_field');
    $form['allow_counter'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Allow word counter for all body fields'),
      '#default_value' => $config->get('allow_counter'),
      '#description' => $this->t("Checked this checkbox for enable word counter"),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'custom_word_counter_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('custom_word_counter.body_field');
    $config->set('allow_counter', $form_state->getValue('allow_counter'));
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
