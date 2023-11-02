<?php
    class DotEnv
    {
        private static $instance;
        protected $path;

        private function __construct(string $path)
        {
            if (!file_exists($path)) {
                throw new InvalidArgumentException(sprintf("File doesn't exists"));
            }
            $this->path = $path;
        }

        public static function getInstance(string $path)
        {
            if (!self::$instance) {
                self::$instance = new self($path);
            }
            return self::$instance;
        }
        public function load(){
            if(!is_readable($this->path)){
                throw new RuntimeException(sprintf("File is not readable!"));
            }
            $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {

                if (strpos(trim($line), '#') === 0) {
                    continue;
                }

                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value);

                if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                    putenv(sprintf('%s=%s', $name, $value));
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
            define('POSTGRES_USER', getenv('POSTGRES_USER'));
            define('POSTGRES_PASSWORD',getenv("POSTGRES_PASSWORD"));
            define('POSTGRES_DB',getenv("POSTGRES_DB"));
            define('POSTGRES_HOST',getenv("POSTGRES_HOST"));
        }
    };
?>