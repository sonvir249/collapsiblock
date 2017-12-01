Drupal collapsiblock.module README.txt
==============================================================================

Collapsiblock makes all Drupal blocks collapsible. To show/hide the content of a block just click on its title.

Optionally, the last state of blocks is saved in a cookie for each user.

This module is intended for site-builders who are new to Drupal with relatively simple needs.
We will try to accomodate feature requests and options but will balance those with the need for a simple UI.

Theme Support
------------------------------------------------------------------------------

Collapsiblock needs to know the page element in which  block container, block 
titles (subjects) and block contents are enclosed, something that varies by 
theme.

Collapsiblock tries to support out-of-the-box the majority of theme by using
flexible jQuery selector. But for some themes it might not work.

If Collapsiblock doesn't work, go to the /admin/build/themes/settings.
You can set here your own jQuery selector for the different elements in blocks.

More info: http://api.jquery.com/category/selectors/
------------------------------------------------------------------------------

Drupal 8

8.x-1.x will be ported from 7.x-2.x when some stability is reached on that version.

MAINTAINERS
-----------
Current maintainers:

* Sonvir Choudhary (https://www.drupal.org/u/sonvir249)
* Max Pogonowski (https://drupal.org/user/darvanen)

This project 8.x-1.x has been sponsored by:
* QED42
QED42 is a web development agency focussed on helping organisations and individuals reach their potential, most of our work is in the space of publishing, e-commerce, social and enterprise.
