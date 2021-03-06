<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

# Test routes
$route['test/tabs'] = "user/tabs_test";

# Admin routes
$route['admin/panel'] = "admin/index";

# Reports routes
$route['reports/resolve_report/(:num)'] = "admin/resolve_report/$1";
$route['reports/get_report/(:num)'] = "reports/get_report/$1";
$route['reports'] = "reports/index";

# Rating routes
$route['rating/set/(:num)/(:num)/(:num)'] = "rating/set_anime_rating/$1/$2/$3";
$route['rating/remove/(:num)/(:num)'] = "rating/remove_rating/$1/$2";
$route['rating/ratings'] = "rating/index";

# Watching routes
$route['watching/anime/(:num)'] = "watching/get_watching_anime/$1";
$route['watching/user/(:num)'] = "watching/get_watching_from_user/$1";
$route['watching'] = "watching/index";

# Anime routes
$route['anime/remove_from_watchlist/(:num)/'] = "anime/remove_anime_from_watch_list/$1";
$route['anime/add_to_watchlist/(:num)/'] = "anime/add_anime_to_watch_list/$1";
$route['anime/restore/(:num)'] = "anime/restore/$1";
$route['anime/delete/(:num)'] = "anime/delete/$1";
$route['anime/submit'] = "anime/submit";
$route['anime/search'] = "anime/search";
$route['anime/edit/(:num)'] = "anime/edit/$1";
$route['anime/(:num)'] = "anime/detail/$1";
$route['anime/browse/(:any)'] = "anime/browse/$1";
$route['anime'] = "anime/index";

# User routes
$route['user/upload_image'] = "user/upload_image";
$route['user/manage_watchlist'] = "user/manage_watchlist";
$route['user/edit_profile'] = "user/edit_profile";
$route['user/delete/(:num)'] = "user/delete/$1";
$route['user/profile/(:any)'] = "user/profile/$1";
$route['user/(:any)'] = "user/$1";
$route['user'] = "user/index";

$route['default_controller'] = "welcome";
#$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */