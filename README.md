# MrMilu CRO Drupal Module

- Variables required in the settings.php
```
$settings['CRO_ENABLED'] = TRUE;
$settings['CRO_EXPERIMENT_GA_KEY'] = 'TESTKEY';
$settings['CRO_EXPERIMENT_GA_ID'] = 'TESTID';
$settings['CRO_EXPERIMENT_COOKIE_NAME'] = 'cro_exp_1';
$settings['CRO_EXPERIMENT_COOKIE_SECONDS'] = 120 * 24 * 60 * 60;
$settings['CRO_EXPERIMENT_VARIANTS'] = ['TESTAA', 'TESTBB', 'TESTCC'];
```
**CRO_ENABLED**: Enable CRO implementation \
**CRO_EXPERIMENT_GA_KEY**: Google Analytics Key \
**CRO_EXPERIMENT_GA_ID**: Google Analytics ID \
**CRO_EXPERIMENT_COOKIE_NAME**: Name of the cookie assigned to the CRO \
**CRO_EXPERIMENT_COOKIE_SECONDS**: Cookie life cycle in seconds \
**CRO_EXPERIMENT_VARIANTS**: Id of the experiment variants

- Should be added to the services.yml the cache context **mrmilu_cro**:

```
required_cache_contexts: ['languages:language_interface', 'theme', 'user.permissions', 'mrmilu_cro']
```

### Authors
By Mr. Milú
