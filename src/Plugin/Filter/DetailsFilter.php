<?php

namespace Drupal\detailsfilter\Plugin\Filter;

use Drupal\filter\Plugin\FilterInterface;


/**
 * @Filter(
 *  id = "filter",
 *  provider = "string",
 *  title = @Translation("The plugin ID."),
 *  description = "\Drupal\Core\Annotation\Translation (optional)",
 *  weight = "int (optional)",
 *  status = "bool (optional)",
 *  settings = "array (optional)",
 * )
 */
class DetailsFilter implements  FilterInterface {


    /**
    * {@inheritdoc}
    */
    public function build() {
    $build = [];

    // Implement your logic

    return $build;
    }

      /**
      * {@inheritdoc}
      */
      public function getType() {
        // Returns the processing type of this filter plugin.
      }
      /**
      * {@inheritdoc}
      */
      public function getLabel() {
        // Returns the administrative label for this filter plugin.
      }
      /**
      * {@inheritdoc}
      */
      public function getDescription() {
        // Returns the administrative description for this filter plugin.
      }
      /**
      * {@inheritdoc}
      */
      public function settingsForm(array $form, FormStateInterface $form_state) {
        // Generates a filter's settings form.
      }
      /**
      * {@inheritdoc}
      */
      public function prepare($text, $langcode) {
        // Prepares the text for processing.
      }
      /**
      * {@inheritdoc}
      */
      public function process($text, $langcode) {
        // Performs the filter processing.
      }
      /**
      * {@inheritdoc}
      */
      public function getHTMLRestrictions() {
        // Returns HTML allowed by this filter's configuration.
      }
      /**
      * {@inheritdoc}
      */
      public function tips($long = FALSE) {
        // Generates a filter's tip.
      }
      /**
      * {@inheritdoc}
      */
      public function getConfiguration() {
        // Gets this plugin's configuration.
      }
      /**
      * {@inheritdoc}
      */
      public function setConfiguration(array $configuration) {
        // Sets the configuration for this plugin instance.
      }
      /**
      * {@inheritdoc}
      */
      public function defaultConfiguration() {
        // Gets default configuration for this plugin.
      }
      /**
      * {@inheritdoc}
      */
      public function calculateDependencies() {
        // Calculates dependencies for the configured plugin.
      }
      /**
      * {@inheritdoc}
      */
      public function getPluginId() {
        // Gets the plugin_id of the plugin instance.
      }
      /**
      * {@inheritdoc}
      */
      public function getPluginDefinition() {
        // Gets the definition of the plugin implementation.
      }
  
}
