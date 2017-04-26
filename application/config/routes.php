<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//rotas das Entidades
$route['create-entitie-form'] = '/entitieController/call_createView';
$route['create-entitie'] = 'entitieController/create';
$route['update-entitie-form/(:num)'] = 'entitieController/update_form/$1';
$route['update-entitie'] = 'entitieController/update';

//rotas dos Eventos 
$route['create-event-form'] = 'eventController/call_createView';
$route['create-event'] = 'eventController/create';
$route['event'] = 'eventController';
$route['update-event-form/(:num)'] = 'eventController/update_form/$1';
$route['update-event'] = 'eventController/update';
$route['form-event-people/(:num)'] = 'eventController/call_eventPeopleCreateView/$1';
$route['create-event-people/(:num)'] = 'eventController/create_eventPeople/$1';
$route['event-people/(:num)'] = 'eventController/call_eventPeople/$1';
$route['form-event-team/(:num)'] = 'eventController/call_eventTeamCreateView/$1';
$route['delete-event-people/(:num)'] = 'eventController/delete_eventPeople/$1';
$route['create-event-team/(:num)'] = 'eventController/create_eventTeam/$1';
$route['event-team/(:num)'] = 'eventController/call_eventTeam/$1';
$route['delete-event-team/(:num)'] = 'eventController/delete_eventTeam/$1';
$route['print-quadrante/(:num)'] = 'eventController/print_quadrante/$1';





//rotas das Atividades e cronogramas 
$route['form-event-schedule/(:num)'] = 'activitieController/call_eventScheduleCreateView/$1';
$route['create-activitie/(:num)'] = 'activitieController/create_activitie/$1';
$route['event-schedule/(:num)'] = 'activitieController/call_eventSchedule/$1';
$route['create-schedule-activitie'] = 'activitieController/create_scheduleActivitie';
$route['delete-schedule-activitie/(:num)/(:any)'] = 'activitieController/delete_scheduleActivitie/$1/$2';
$route['update-activitie-form/(:num)'] = 'activitieController/update_form/$1';
$route['update-activitie'] = 'activitieController/update';
$route['print/(:num)/(:any)'] = 'activitieController/printView/$1/$2';

//rotas das Equipes
$route['create-team-form'] = 'teamController/call_createView';
$route['create-team'] = 'teamController/create';
$route['team'] = 'teamController';
$route['update-team-form/(:num)'] = 'teamController/update_form/$1';
$route['update-team'] = 'teamController/update';
$route['form-team-people/(:num)'] = 'teamController/call_teamPeopleCreateView/$1';
$route['create-team-people/(:num)'] = 'teamController/create_teamPeople/$1';
$route['team-people/(:num)'] = 'teamController/call_teamPeople/$1';
$route['delete-team-people/(:num)'] = 'teamController/delete_teamPeople/$1';

//rotas des Pessoas
$route['create-people-form'] = 'peopleController/call_createView';
$route['create-people'] = 'peopleController/create';
$route['people'] = 'peopleController';
$route['update-people-form/(:num)'] = 'peopleController/update_form/$1';
$route['update-people'] = 'peopleController/update';