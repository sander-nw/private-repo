<?php
use App\Controller\IndexController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

$routesData = [
	// controller: index
	'index' => [
		'path' => '/',
		'defaults' => [
			'_controller' => [IndexController::class, 'index'],
		],
	],

];

return function(RoutingConfigurator $routes) use ($routesData) {
	foreach ($routesData as $routeName => $routeData) {
		if (is_array($routeData['path'])) {
			foreach ($routeData['path'] as $locale => $path) {
				if (substr($path, 0, 4) != '/'.$locale.'/') {
					$routeData['path'][$locale] = '/'.$locale.$path;
				}
			}
		}

		$routes
			->add($routeName, $routeData['path'])
			->defaults($routeData['defaults'])
			->requirements($routeData['requirements'] ?? []);
	}
};
