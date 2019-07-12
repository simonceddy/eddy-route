<?php
namespace Eddy\Route\Support\Traits;

trait MethodMethods
{
    abstract public function map(string $method, string $path, $handler);

    public function get(string $path, $handler)
    {
        return $this->map('GET', $path, $handler);
    }

    public function post(string $path, $handler)
    {
        return $this->map('POST', $path, $handler);
    }

    public function put(string $path, $handler)
    {
        return $this->map('PUT', $path, $handler);
    }

    public function patch(string $path, $handler)
    {
        return $this->map('PATCH', $path, $handler);
    }

    public function delete(string $path, $handler)
    {
        return $this->map('DELETE', $path, $handler);
    }
}
