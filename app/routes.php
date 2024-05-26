<?php

use Jenssegers\Blade\Blade;
use Slim\App;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
require_once "../resources/models/Image.php";

/**
 * @throws \Random\RandomException
 */
function moveUploadedFile($uploadDirectory,$file): string
{
    $extension=pathinfo($file->getClientFilename(), PATHINFO_EXTENSION);
    $basename=bin2hex(random_bytes(8));
    $filename=sprintf('%s.%0.8s',$basename,$extension);
    $file->moveTo($uploadDirectory.DIRECTORY_SEPARATOR.$filename);
    return $filename;
}

function scanImageDirectory($directory)
{
    $images=[];
    if(is_dir($directory))
    {
        $files=scandir($directory);
        foreach($files as $file)
        {
            if($file!='.'&&$file!='..')
            {
                $filePath=DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR.$file;
                if(preg_match('/\.(jpg|jpeg|gif|png|bmp)$/i',$file))
                {
                    $image=new Image($file,$filePath);
                    $images[]=$image;

                }
            }
        }
    }
    return $images;
}

return function (App $app) {
    function view(Response $response, $template, $with = []): Response
    {
        $cache = __DIR__ . '/../cache';
        $views = __DIR__ . '/../resources/views';

        $blade = (new Blade($views, $cache))->make($template, $with);
        $response->getBody()->write($blade->render());

        return $response;
    }

    $app->get('/', function (Request $request, Response $response, $args) {

        $uploadDirectory=__DIR__."\..\public\uploads";
        $images=scanImageDirectory($uploadDirectory);
        return view($response, 'index', compact('images'));
    });

    $app->post('/addpost', function (Request $request, Response $response, $args) {

        $uploadDirectory=__DIR__."\..\public\uploads";
        $data=$request->getUploadedFiles();

        if(!is_dir($uploadDirectory))
        {
            mkdir($uploadDirectory);
        }
        if(isset($data['images']))
        {
            foreach($data['images'] as $file)
            {
                if($file->getError() === UPLOAD_ERR_OK)
                {
                    $filename=moveUploadedFile($uploadDirectory,$file);
                }
            }
        }
        $images=scanImageDirectory($uploadDirectory);

        return view($response, 'index', compact('images'));
    });

    $app->get('/add', function (Request $request, Response $response, $args) {

        return view($response, 'add');
    });


};
