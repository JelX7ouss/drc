<?php

/**
 * @file
 * Contains \Drupal\drc\Form\LiveChatForm.
 *
 * 
 * The ConfigFormBase required class for module configuration
 * Any configuration enhancement must be done within  
 */

namespace Drupal\drc\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

use Drupal\drc\FormManager;


class LiveChatForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drc.admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'drc.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {

    $config = $this->config('drc.settings');

    $form['url'] = array(
      '#type' => 'url',
      '#title' => $this->t('Your server address:'),
      '#required' => true,
      '#attributes' => array(
          'placeholder' => $config->get('server') # last saved server or just print 'server'
        )
    );

    $form['ip_port'] = array(
      '#type' => 'number',
      '#title' => $this->t('Port:'),
      '#required' => true,
      '#attributes' => array(
          'placeholder' => $config->get('port') # last saved port or just print 'port'
        )
    );

    $form['slach_path'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Path:'),
      '#required' => true,
      '#attributes' => array(
          'placeholder' => $config->get('path') # last saved path or just print 'e.g. mypath'
        )
    );

    return parent::buildForm($form, $form_state);  

  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    
    // fields are all submitted.
    if(!empty($form_state->getValue('url'))
        && !empty($form_state->getValue('ip_port'))
        && !empty($form_state->getValue('slach_path'))
      ){ 
         
        // check if port is valid  
        if (!FormManager::isPort(
          (int) $form_state->getValue('ip_port')
        )){
            $form_state->setErrorByName('ip_port', $this->t('Please type a correct port!'));
        }

        // check if host server is running  
        if(!FormManager::serverRun(
          $form_state->getValue('url'), (int) $form_state->getValue('ip_port')
        )){
            $form_state->setErrorByName('url', $this->t(
                '<p>'.
                '<b>Server is not working!</b>'.
                '<br>'.
                '<i>incorrect address, please check your server and your port.</i>'
                .'</p>'
              )); 
        }

        if(!FormManager::isLowerCaseLetters(
          $form_state->getValue('slach_path')
          )){
            $form_state->setErrorByName('slach_path',  $this->t('Please type a lowercase letter path'));
        }

    }
 
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

      $config = $this->config('drc.settings');

      drupal_set_message(
          $this->t(
            '<b>Clear-Cache your site.</b>'
          )
      );

      drupal_set_message(
          $this->t(
            'Your server address is @url', 
            array('@url' => $form_state->getValue('url'))
          )
      );

      drupal_set_message(
          $this->t(
            'Listening on @ip_port', 
            array('@ip_port' => $form_state->getValue('ip_port'))
          )
      );

      drupal_set_message(
          $this->t(
            'Access the widget @yoursite/@slach_path', 
            array('@slach_path' => $form_state->getValue('slach_path'))
          )
      );

      $config
      ->clear('server')
      ->set('server', $form_state->getValue('url'))
      ->save();

      $config
      ->clear('port')
      ->set('port', $form_state->getValue('ip_port'))
      ->save();

      $config
      ->clear('path')
      ->set('path', $form_state->getValue('slach_path'))
      ->save();

  }

}