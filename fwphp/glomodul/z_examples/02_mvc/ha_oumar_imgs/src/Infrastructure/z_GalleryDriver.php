<?php

namespace App\Infrastructure;

/**
 * Class GalleryDriver
 */
class z_GalleryDriver implements z_GalleryDriverInterface
{
    /** @var A piClientInterface */
    private $client;

    /**
     * GalleryDriver constructor.
     *
     * @param A piClientInterface $client
     */
    public function __construct(z_ApiClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @inheritDoc
     */
    /* public function findAll(array $options): array
    {
        $uri = sprintf('https://picsum.photos/v2/list?%s', http_build_query($options));

        $contents = $this->client->retrieve($uri);

        return \json_decode($contents);
    } */


    public function findAll(object $pp1, array $options=[1,10]): array
    {
        $uri = sprintf('https://picsum.photos/v2/list?%s', http_build_query($options));

        //https://github.com/peterkahl/curlmaster
        //$curlm=new curlmaster;
        $this->client->CacheDir=$pp1->module_path ; //'/srv/cache';
        $this->client->ca_file=$pp1->wsroot_path .'/zinc/cacert.pem' ; //'/srv/cert-ca/cacert.pem';
        // Method GET is default.
        $response = $this->client->Request($uri); // 'https://www.google.com/'
        return \json_decode($response['response']['body']); //var_export($response);
    }



}
