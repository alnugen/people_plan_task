<?php

class Utils
{
    private function __construct()
    {
    }

    public static $templatePath = "";

    public static function Render($template, $data=[])
    {
        $templateFilePath = self::ConvertPath(self::$templatePath . $template);
        if (file_exists($templateFilePath)) {
            ob_start();
            extract($data);
            require_once $templateFilePath;
            $content = ob_get_contents();
            ob_clean();
            return $content;
        }
        return null;
    }

    public static function ConvertPath($path)
    {
        return str_replace('/', DIRECTORY_SEPARATOR, $path);
    }

    public static function Esc($value)
    {
        return htmlentities($value, ENT_QUOTES, 'UTF-8');
    }

    public static function GetFile($fileName)
    {
        $filePath = self::ConvertPath(self::$templatePath) . $fileName;
        if (file_exists($filePath)) {
            return fopen($filePath, "r");
        } else {
            return false;
        }
    }

    public static function WriteLog($fileName, $data = [])
    {
        $filePath = self::ConvertPath(self::$templatePath) . $fileName;
        if (file_exists($filePath)) {
            $current = file_get_contents($filePath);
            $writeData = self::changeArrayToString($current, $data);
            $fh = fopen($filePath, 'w');
            fwrite($fh, $writeData);
        } else {
            $fh = fopen($filePath, 'wb');
            $current = '';
            $writeData = self::changeArrayToString($current, $data);
            fwrite($fh, $writeData);
        }
    }

    private static function changeArrayToString($previousData, $newData)
    {
      foreach ($newData as $key => $value) {
           $previousData .= $value."\n";
      }
      return $previousData;
    }

    public function Show404()
    {
        header("HTTP/1.0 404 Not Found");
        $msg = <<<MSG
    <title>404 Page Not Found</title>
    <h1>404 Page Not Found</h1>
    <p>
    The page you are looking for does not exist.
    </p>
MSG;
        echo $msg;
        exit;
    }
}
