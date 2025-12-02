<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| ... (comments omitted for brevity)
*/

$route['default_controller'] = 'Home';
$route['404_override'] = 'Page404';
$route['translate_uri_dashes'] = FALSE;

// Prevent direct access to old URLs that you want hidden
$route['home/brands'] = 'home/noUrl';
$route['home/sub_categories'] = 'home/noUrl';
$route['home/coupons/trending'] = 'home/noUrl';

// --- NEW ROUTES ADDED HERE ---

// Map new German-friendly URLs to existing English controller methods
$route['ueber-uns']          = 'home/about_us';          // New: /ueber-uns    -> Old: home/about_us
$route['kategorien']         = 'home/categories';        // New: /kategorien    -> Old: home/categories/
$route['blogs']              = 'home/blog_info';         // New: /blogs        -> Old: home/blog_info
$route['kontakt']            = 'home/contact_us';        // New: /kontakt    -> Old: home/contact_us
$route['datenschutz']        = 'home/privacy_policy';    // New: /datenschutz -> Old: home/privacy_policy
$route['impressum']          = 'home/imprints';          // New: /impressum    -> Old: home/imprints
$route['faq']                = 'home/faqs/users';        // New: /faq        -> Old: home/faqs/users
$route['neueste-Rabattcodes']= 'home/coupons/popular';   // New: /neueste-Rabattcodes -> Old: home/coupons/popular

// --- END NEW ROUTES ---


$route['marken'] = 'home/brands';
$route['brands/(:any)/(:any)'] = 'home/brands/$1/$2';
$route['brands/(:any)'] = 'home/brands/$1';
$route['marken/(:any)'] = 'home/brands/$1';
$route['marken/(:any)/(:any)'] = 'home/brands/$1/$2'; // for opening coupen on clicking
$route['marken/(:any)/(:any)/(:any)'] = 'home/brands/$1/$2/$3'; // for opening coupen on clicking
$route['marken/(:any)/(:any)/(:any)/(:any)'] = 'home/brands/$1/$2/$3/$4'; // for opening coupen on clicking
$route['sitemap\.xml'] = "Sitemap/index";

// For admin

$route['admin'] = 'home/noUrl';
$route['gutscheinfuralleadmin'] = 'admin';

// The catch-all route for brands/special links MUST remain at the bottom
$route['(:any)'] = 'home/special_brands/$1';

