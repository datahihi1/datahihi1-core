<?php
    /**
     * The post() function can replace the $_POST environment variable.
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    function post(?string $key = null, $default = null, bool $sanitize = true) {
        // If no key is provided, return the whole $_POST array, optionally sanitized
        if ($key === null) {
            return $sanitize ? array_map('htmlspecialchars', $_POST) : $_POST;
        }
    
        // Check if the key exists in the $_POST array
        if (array_key_exists($key, $_POST)) {
            // Sanitize the value if required
            $value = $_POST[$key];
            return $sanitize ? htmlspecialchars($value, ENT_QUOTES, 'UTF-8') : $value;
        }
    
        // If the key does not exist, return the default value
        return $default;
    }    
    /**
     * The get() function can replace the $_GET environment variable.
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    function get(?string $key = null, $default = null, bool $sanitize = true) {
        // If no key is provided, return the whole $_GET array, optionally sanitized
        if ($key === null) {
            return $sanitize ? array_map('htmlspecialchars', $_GET) : $_GET;
        }
    
        // Check if the key exists in the $_GET array
        if (array_key_exists($key, $_GET)) {
            // Sanitize the value if required
            $value = $_GET[$key];
            return $sanitize ? htmlspecialchars($value, ENT_QUOTES, 'UTF-8') : $value;
        }
    
        // If the key does not exist, return the default value
        return $default;
    }
    
    /**
     * The files() function can replace the $_FILES environment variable.
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    function files($key = null, $default = null) {
        // If no key is provided, return the whole $_FILES array
        if ($key === null) {
            return $_FILES; 
        }
    
        // If the key exists in the $_FILES array, return its value
        if (array_key_exists($key, $_FILES)) { 
            return $_FILES[$key]; 
        }
        
        // If the key does not exist, return the default value
        return $default;
    }