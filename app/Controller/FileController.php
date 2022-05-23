<?php

namespace Seior\PHP\Uas\Controller;

use Exception;

class FileController
{
    public function getImage(string $imageName)
    {
        $extFile = ['jpg', 'jpeg', 'png', 'gif'];

        $pathImage = __DIR__ . '/../../public/files/' . $imageName . '.' . 'jpg';

        header('Content-Type: image/jpg');
        readfile($pathImage);
    }
}