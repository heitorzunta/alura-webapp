<?php

class Redirection {

    public static function redirecionar(string $url): void
    {
        header("Location: $url");
        exit();
    }
}
?>