Page manager context argument

Page manager context argument allows you to add page contexts of page variants 
from page manager to be set as default arguments for views. I came across this 
solution after facing the issue given at following link:

https://www.drupal.org/node/2287073

This module adds new option "Page manager context" under default arguments 
drop down for contextual filters of views. Currently it supports only context 
of type "any".

Dependencies:
- Page Manager
- Views

How it works:
1.  Add or edit page variant for a particular page
2.  Go to Contexts section of the variant
3.  Add new context of type 'any'
4.  Enter Label, Description and enter you contextual filters default value in 
    Set a context value
5.  Go Content section
6.  Add a view block to a region
7.  Edit the view which is added in page content
8.  Click contextual filter of the view block and select 'Provide default value'
    option from 'When the filter value is NOT available'
9.  In Type drop down select Page manager context
10. In Context, select the Context which was added in step 3
11. Click Apply and save the view
