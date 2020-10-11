<?php

namespace App\Infrastructure;

//use GuzzleHttp\ClientInterface;
//use Psr\Log\LoggerInterface;

/**
 * Class ApiClient
 */
class ApiClient implements ApiClientInterface
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
  public function __construct()
  {
      //$this->client = $client;
      //$this->logger = $logger;
  }

  /**
   * @inheritDoc
   */
  public function retrieve(string $url): string
  {
    try
    {
                      echo '<pre>apicli $url='; print_r($url) ; echo '</pre>'; 
      $response = $this->client->request('GET', $url);
                      echo '<pre>apicli $response='; print_r($response) ; echo '</pre>'; 
      return $response->getBody()->getContents();
                      //return 'ggggggggg';
    } catch (\Exception $exception) {
        $this->logger->error('Error: ' . $exception->getMessage());
        throw $exception;
    }
  }

}
