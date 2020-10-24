<?php

namespace App\Infrastructure;

//use GuzzleHttp\ClientInterface;
//use peterkahl\curlmaster\curlmaster ; //use GuzzleHttp\Client;

//use Psr\Log\LoggerInterface;

/**
 * Class ApiClient
 */
class z_ApiClient implements z_ApiClientInterface
{
    /** @var ClientInterface */
   private $client;

   /** @var LoggerInterface */
   private $logger;

    /**
     * ApiClient constructor.
     *
     * @param ClientInterface $client
     * @param LoggerInterface $logger
     */
    //public function __construct(ClientInterface $client, LoggerInterface $logger)
    public function __construct(object $client)
    {
        $this->client = $client;
        //$this->logger = $logger;
    }

    /**
     * @inheritDoc
     */
    public function retrieve(string $url): string
    {
        try {
            $response = $this->client->request('GET', $url);

            return $response->getBody()->getContents();
        } catch (\Exception $exception) {
            $this->logger->error('Error: ' . $exception->getMessage());

            throw $exception;
        }
    }
}
