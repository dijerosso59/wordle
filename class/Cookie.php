<?php

class Cookie {

    public function getCookie(string $name) {
        return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
    }

    public function setCookie(string $name, string $value): void {
        setcookie($name, $value);
    }

    public function destroy(string $name): void {
        setcookie($name, null, -1);
    }

}