<?php
/* 
    Cấu hình DotenvConfig để sử dụng được các biến môi trường từ tệp .env hoặc .env.example
    Hàm env(): có thể thay thế khai báo biến env: $_ENV['example'] -> env('example')
*/
class DotenvConfig
{
    protected $envFile;
    protected $exampleEnvFile;
    public function __construct($envFile, $exampleEnvFile = null)
    {
        if (!file_exists($envFile)) {
            throw new \InvalidArgumentException(sprintf('%s does not exist', $envFile));
        }
        $this->envFile = $envFile;
        $this->exampleEnvFile = $exampleEnvFile;
    }
    /**
     * Load .env and .env.example file.
     * @return void
     */
    public function load()
    {
        $this->loadFile($this->envFile);
        if ($this->exampleEnvFile && file_exists($this->exampleEnvFile)) {
            $this->loadFile($this->exampleEnvFile, false);
        }
    }
    /**
     * Check .env and .env.example files can readable.
     * @param mixed $envFile
     * @param mixed $overwrite
     * @throws \RuntimeException
     * @return void
     */
    protected function loadFile($envFile, $overwrite = true)
    {
        if (!is_readable($envFile)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $envFile));
        }
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }
            [$name, $value] = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if ($overwrite || !array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
            }
        }
    }
}
    /**
     * The env() function can replace the $_ENV environment variable.
     * @param mixed $key
     * @param mixed $default
     * @return mixed
     */
    function env($key = null, $default = null) {
        if ($key === null) {
            return $_ENV;
        }
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }
        return $default;
    }
$dotenv = new DotenvConfig('./.env', './.env.example');
$dotenv->load();
