<?php

namespace App\Common;

use eftec\bladeone\BladeOne;
class Controller
{
    /**
     * The render method initializes BladeOne for rendering views.
     *
     * @var string
     */
    public function render($viewFile, $data = [])
    {
        $viewDir = './resource/view';
        $storageDir = './public/cache';
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
