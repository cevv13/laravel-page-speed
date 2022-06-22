<?php

namespace RenatoMarinho\LaravelPageSpeed\Middleware;

class CollapseWhitespace extends PageSpeed
{
    public function apply($buffer)
    {
        $replace = [
            "/\n([\S])/" => '$1',
            "/\r/" => '',
            "/\n/" => '',
            # "/\t/" => '', // fix template
            "/ +/" => ' ',
            "/> +</" => '><',
        ];

        //return $this->replace($replace, $this->removeComments($buffer));                                              // no funciona con la vista de error de laravel
        return $this->replace($replace, $buffer);
    }

    protected function removeComments($buffer)
    {
        return (new RemoveComments)->apply($buffer);
    }
}
