CONTENTS OF THIS FILE
---------------------
   
 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

Page manager context argument allows you to add page contexts of page variants 
from page manager to be set as default arguments for views. I came across this 
solution after facing the issue given at following link:

https://www.drupal.org/node/2287073

This module adds new option "Page manager context" under default arguments 
drop down for contextual filters of views. Currently it supports only context 
of type "any".

 * For full description of the module, visit the project page:
   https://www.drupal.org/sandbox/patilvishalvs/2830217

 * To submit bug reports and feature suggestions, or to track changes:
   https://www.drupal.org/project/issues/2830217


REQUIREMENTS
------------

 * Views
 * Page Manager(https://www.drupal.org/project/page_manager)

INSTALLATION
------------
 
 * Install as you would normally install a contributed Drupal module.


CONFIGURATION
-------------
 
 * Add or edit page variant for a particular page
 * Go to Contexts section of the variant
 * Add new context of type 'any'
 * Enter Label, Description and enter you contextual filters default value in 
    Set a context value
 * Go Content section
 * Add a view block to a region
 * Edit the view which is added in page content
 * Click contextual filter of the view block and select 'Provide default value'
    option from 'When the filter value is NOT available'
 * In Type drop down select Page manager context
 * In Context, select the Context which was added in step 3
 * Click Apply and save the view


MAINTAINERS
-----------

Current maintainers:
 * Vishal V. Patil (patilvishalvs) - https://www.drupal.org/u/patilvishalvs
