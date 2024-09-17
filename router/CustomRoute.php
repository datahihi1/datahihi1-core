<?php
    namespace Router;
    use Phroute\Phroute\RouteCollector;

    class CustomRoute extends RouteCollector {
        public function mount($prefix, callable $callback){
            $callback(new PrefixedRoute($this, $prefix));
        }
    }
    class PrefixedRoute {
        protected $collector;
        protected $prefix;
        public function __construct($collector, $prefix) {
            $this->collector = $collector;
            $this->prefix = $prefix;
        }
        public function __call($method, $args) {
            $args[0] = $this->prefix . $args[0];
            return call_user_func_array([$this->collector, $method], $args);
        }
    }
