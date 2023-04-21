This is a fork of the [Details
Filter](https://www.drupal.org/project/detailsfilter) Drupal module. The module
appears abandoned, so this applies various patches and fixes to work with
Drupal 9 and 10, and with the core CKEditor 5 module:

* [Summary option doesn't work due to incorrect regex capture group name [#3257467]](https://www.drupal.org/project/detailsfilter/issues/3257467)
* [Filter title and description improvements [#3257470]](https://www.drupal.org/project/detailsfilter/issues/32574700)
* [Replace deprecated render() function with injected renderer service [#3257475]](https://www.drupal.org/project/detailsfilter/issues/3257475)
* [Automated Drupal 10 compatibility fixes [#3286963]](https://www.drupal.org/project/detailsfilter/issues/3286963)
* Changed `core_version_requirement` to `^9.3 || ^10`
* Changed filter type to `Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_REVERSIBLE` as `FilterInterface::TYPE_MARKUP_LANGUAGE` is rejected by the CKEditor 5 module as incompatible.
