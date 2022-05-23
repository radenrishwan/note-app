<?php

namespace Seior\PHP\Uas\Helper;

class View
{
    public static function render(string $view, $model = []): void
    {
        require __DIR__ . '/../View/component/header.php';
        require __DIR__ . '/../View/' . $view . '.php';
        require __DIR__ . '/../View/component/footer.php';
    }

    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}