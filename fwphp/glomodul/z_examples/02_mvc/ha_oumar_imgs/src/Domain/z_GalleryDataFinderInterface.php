<?php

namespace App\Domain;

/**
 * Interface (Port) implemented by Infrastructure's adapter.
 * Domain uses this port to call infrastructure's adapter.
 *
 * interface GalleryDataFinderInterface
 */
interface z_GalleryDataFinderInterface
{
    public function findAll(array $options): array;
}
