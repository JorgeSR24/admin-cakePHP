<?php



use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass(DashedRoute::class);

/*
 * This file is loaded in the context of the `Application` class.
  * So you can use  `$this` to reference the application class instance
  * if required.
 */
return function (RouteBuilder $routes): void {
   
    $routes->setRouteClass(DashedRoute::class);

    /* 
        Aplications Routes

    */

    Router::prefix('admin', function (RouteBuilder $route) {
        $route->connect('/', ['controller' => 'Dashboards', 'action' => 'index']);

        $route->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $route->connect('/users/dashboard', ['controller' => 'Dashboards', 'action' => 'index']);
        $route->connect('/users/logout', ['controller' => 'Users', 'action' => 'logout']);

        //College Route
        $route->connect('/add-college', ['controller' => 'Colleges', 'action' => 'addCollege']);
        $route->connect('/list-colleges', ['controller' => 'Colleges', 'action' => 'listCollege']);
        $route->connect("/edit-college/:id", ['controller' => 'Colleges', 'action' => 'editCollege'], ["pass" => ["id"]]);
        $route->connect("/delete-college/:id", ['controller' => 'Colleges', 'action' => 'deleteCollege'], ["pass" => ["id"]]);

        //Branch Route

        $route->connect('/add-branch', ['controller' => 'Branches', 'action' => 'addBranch']);
        $route->connect('/list-branches', ['controller' => 'Branches', 'action' => 'listBranch']);
        $route->connect('/edit-branch/:id', ['controller' => 'Branches', 'action' => 'editBranch'], ["pass" => ["id"]]);
        $route->connect('/delete-branch/:id', ['controller' => 'Branches', 'action' => 'deleteBranch'], ["pass" => ["id"]]);

        //Student Route

        $route->connect('/add-student', ['controller' => 'Students', 'action' => 'addStudent']);
        $route->connect('/list-students', ['controller' => 'Students', 'action' => 'listStudent']);
        $route->connect('/edit-student/:id', ['controller' => 'Students', 'action' => 'editStudent'], ["pass" => ["id"]]);
        $route->connect('/delete-student/:id', ['controller' => 'Students', 'action' => 'deleteStudent'], ["pass" => ["id"]]);

        //Staff Route

        $route->connect('/add-staff', ['controller' => 'Staffs', 'action' => 'addStaff']);
        $route->connect('/list-staffs', ['controller' => 'Staffs', 'action' => 'listStaff']);
        $route->connect('/edit-staff/:id', ['controller' => 'Staffs', 'action' => 'editStaff'], ["pass" => ["id"]]);
        $route->connect('/delete-staff/:id', ['controller' => 'Staffs', 'action' => 'deleteStaff'], ["pass" => ["id"]]);

        //Report Route

        $route->connect('/college-report', ['controller' => 'Reports', 'action' => 'collegesReport']);
        $route->connect('/student-report', ['controller' => 'Reports', 'action' => 'studentsReport']);
        $route->connect('/staff-report', ['controller' => 'Reports', 'action' => 'staffsReport']);

        $route->connect("/allot-college", ["controller" => "Students", "action" => "getCollegeBranches"]);
        $route->connect("/assign-college", ["controller" => "Students", "action" => "assingCollegeBranch"]);
        $route->connect("/assign-college-staff", ["controller" => "Staffs", "action" => "assingCollegeBranch"]);

        $route->connect("/remove-assigned-college/:id", ["controller" => "Students", "action" => "removeAssignedCollegeBranch"], ["pass" => ["id"]]);
        $route->connect("/remove-assigned-college-staff/:id", ["controller" => "Staffs", "action" => "removeAssignedCollegeBranch"], ["pass" => ["id"]]);
    });


    $routes->scope('/', function (RouteBuilder $builder): void {
        /*
         * Here, we are connecting '/' (base path) to a controller called 'Pages',
         * its action called 'display', and we pass a param to select the view file
         * to use (in this case, templates/Pages/home.php)...
         */
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);

        /*
         * ...and connect the rest of 'Pages' controller's URLs.
         */
        $builder->connect('/pages/*', 'Pages::display');

        /*
         * Connect catchall routes for all controllers.
         *
         * The `fallbacks` method is a shortcut for
         *
         * ```
         * $builder->connect('/{controller}', ['action' => 'index']);
         * $builder->connect('/{controller}/{action}/*', []);
         * ```
         *
         * You can remove these routes once you've connected the
         * routes you want in your application.
         */
        $builder->fallbacks();
    });

    /*
     * If you need a different set of middleware or none at all,
     * open new scope and define routes there.
     *
     * ```
     * $routes->scope('/api', function (RouteBuilder $builder): void {
     *     // No $builder->applyMiddleware() here.
     *
     *     // Parse specified extensions from URLs
     *     // $builder->setExtensions(['json', 'xml']);
     *
     *     // Connect API actions here.
     * });
     * ```
     */
};
