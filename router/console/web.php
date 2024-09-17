<?php
    namespace Router;
    /*khởi tạo route */ 
    use App\Controller\Admin\AdminController;
    use App\Controller\Admin\UserController;
    use App\Controller\Client\ClientController;

    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;
    
    $url = $_GET['u'] ?? '/';
    $router = new CustomRoute();

    /* điều hướng route */
    $router->get('/',[ClientController::class,'home']);
    $router->get('admin/',[AdminController::class,'dashboard']);
    $router->get('admin/login',[AdminController::class,'login']);
    $router->post('admin/login/check',[AdminController::class,'loginCheck']);
    $router->get('admin/logout',[AdminController::class,'logoutAdmin']);

    $router->mount('admin/users/',function($router){
        $router->get('/',[UserController::class,'list']);
        $router->get('create/',[UserController::class,'create']);
        $router->post('store/',[UserController::class,'store']);
        $router->get('ban/{id}',[UserController::class,'ban']);
        $router->post('ban/post/{id}',[UserController::class,'banPost']);
        $router->get('edit/{id}',[UserController::class,'edit']);
        $router->post('update/{id}',[UserController::class,'update']);
        $router->get('delete/{id}',[UserController::class,'delete']);
        $router->get('destroy/{id}',[UserController::class,'destroy']);

        $router->get('hide/',[UserController::class,'hide']);
        $router->get('restore/{id}',[UserController::class,'restore']);
    });

    /* chạy route */
    $dispatcher = new Dispatcher($router->getData());
    try {
        $routeresponse = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$url);
        echo $routeresponse;
    } catch (HttpRouteNotFoundException $e) {
        header("HTTP/1.0 404 Not Found");
        include 'public/errordocs/404.php';
        exit;
    }
