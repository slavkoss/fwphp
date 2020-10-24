<?php

namespace App\Infrastructure;

interface z_GalleryDriverInterface
{
    /**
     * @param array $options
     *
     * @return array
     */
    //public function findAll(array $options): array;
    public function findAll(object $pp1, array $options): array;
}
