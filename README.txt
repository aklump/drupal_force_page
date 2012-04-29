/* $Id$ */

SUMMARY: This is an API module to be used by other modules that want to force a
page to be displayed instead of the normal page based on what is typed into the
url box of the browser. It can be used to force a profile to be filled out for
example, or for a product to be purchased, before allowing the user to return to
normal website flow.

Examples of use cases:

- You want to make sure a profile is fully filled out before the user navigates the site
- You want to whittle the site down to a single page for a short duration; say to close the site (alternative to site offline)
- You want to force a user to view a certain page and submit a form before navigating the site
- The user must make a purchase before navigating the site.

REQUIREMENTS:


INSTALLATION:
* Download and unzip this module into your modules directory.
* Goto Administer > Site Building > Modules and enable this module.


CONFIGURATION:
*


USAGE:
*


API:
* Using your custom module, employ hook_force_page_pages(). See
  force_page.api.php


--------------------------------------------------------
CONTACT:
In the Loft Studios
Aaron Klump - Web Developer
PO Box 29294 Bellingham, WA 98228-1294
aim: theloft101
skype: intheloftstudios

http://www.InTheLoftStudios.com