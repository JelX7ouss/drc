<?php

/**
 * @file
 * Contains \Drupal\drockchat\Form\LiveChatForm.
 */

namespace Drupal\drockchat\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

class LiveChatForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drockchat.admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drockchat.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {

    $config = $this->config('drockchat.settings');

    $form['url'] = array(
      '#type' => 'url',
      '#title' => $this->t('Your server address:'),
      '#required' => true,
      '#attributes' => array(
          'placeholder' => $config->get('server'),
          'autofocus' => TRUE
        )
    );

    $form['ip_port'] = array(
      '#type' => 'number',
      '#title' => $this->t('Port:'),
      '#required' => true,
      '#attributes' => array(
          'placeholder' => $config->get('port'),
          'autofocus' => TRUE
        )
    );

    return parent::buildForm($form, $form_state);  

  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    if(!empty($form_state->getValue('url'))
        && !empty($form_state->getValue('ip_port'))
      ){ // fields are all submitted.
      
         if (5 < strlen($form_state->getValue('ip_port')))
            $form_state->setErrorByName('url', $this->t('Are you sure that is a Port?'));

    }
 
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $values = $form_state->getValues();

    drupal_set_message($this->t('Your server address is @url', array('@url' => $values['url'])));

    drupal_set_message($this->t('Listening on @ip_port', array('@ip_port' => $values['ip_port'])));

    $this->config('drockchat.settings')
      ->clear('server')
      ->set('server', $values['url'])
      ->save();

    $this->config('drockchat.settings')
      ->clear('port')
      ->set('port', $values['ip_port'])
      ->save();

  }

}