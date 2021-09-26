<?php


namespace App\Providers;


use Illuminate\Http\Testing\MimeType;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    public static function serveAsset($filePath)
    {
        $filePath = str_replace(['\\','/'], DIRECTORY_SEPARATOR, resource_path($filePath));

        if(file_exists($filePath)) {
            $fileStat = stat($filePath);
            $filePathInfo = pathinfo($filePath);
            $filePathInfo['mime'] = MimeType::from($filePath);;
            $filePathInfo['size'] = $fileStat[7];
            $filePathInfo['mtime'] = $fileStat[9];

            if(in_array($filePathInfo['extension'], ['json', 'txt', 'xml', 'js', 'css'])) {
                header('Content-Disposition: filename=' . $filePathInfo['filename'] . '.' . $filePathInfo['extension']);
                header('Content-Transfer-Encoding: binary');
                header('Last-Modified: ' . gmdate('D, d M Y H:i:s', time()) . ' GMT');
                header('Content-Type: ' . $filePathInfo['mime']);
                echo file_get_contents($filePath);
                exit;
            } else {
                $fileChunkSize = 1024 * 1024;
                $lengthStart = 0;
                $lengthEnd = $filePathInfo['size'];

                if (isset($_SERVER['HTTP_RANGE'])) {
                    // if the HTTP_RANGE header is set we're dealing with partial content
                    // find the requested range
                    // this might be too simplistic, apparently the client can request
                    // multiple ranges, which can become pretty complex, so ignore it for now
                    preg_match('/bytes=(\d+)-(\d+)?/', $_SERVER['HTTP_RANGE'], $matches);
                    $offset = intval($matches[1]);
                    $end = $matches[2] || $matches[2] === '0' ? intval($matches[2]) : $lengthEnd - 1;
                    $length = $end + 1 - $offset;
                    // output the right headers for partial content
                    header('HTTP/1.1 206 Partial Content');
                    header("Content-Range: bytes $offset-$end/$lengthEnd");
                }

                header('Content-Type: ' . $filePathInfo['mime']);
                header('Cache-Control: max-age=60');
                header('Content-Length:' . ($lengthEnd - $lengthStart));
                header("Content-Range: bytes " . ($lengthStart - $lengthEnd) / $fileStat['size']);
                header("Content-Disposition: inline; filename=" . $filePathInfo['filename'] . '.' . $filePathInfo['extension']);
                header("Content-Transfer-Encoding: binary\n");
                header("Last-Modified: " . gmdate('D, d M Y H:i:s', $filePathInfo['mtime']) . ' GMT');
                header('Connection: close');

                $lengthCurrent = $lengthStart;
                $fileHandle = fopen($filePath, 'r');
                fseek($fileHandle, $lengthStart, 0);

                $buffer = '';
                ob_start();
                while (!feof($fileHandle) && $lengthCurrent < $lengthEnd && (connection_status() == 0)) {
                    echo fread($fileHandle, min($fileChunkSize, $lengthEnd - $lengthCurrent));
                    $lengthCurrent += $fileChunkSize;
                    $buffer .= ob_get_contents();

                    ob_end_flush();
                }

                echo $buffer;
                exit;
            }
        } else {
            abort(404);
        }
    }
}