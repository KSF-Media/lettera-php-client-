<?php
/**
 * ArticlesApi
 * PHP version 5
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Lettera
 *
 * KSF Media's articles service
 *
 * The version of the OpenAPI document: 2.0.0
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.0.1-SNAPSHOT
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use OpenAPI\Client\ApiException;
use OpenAPI\Client\Configuration;
use OpenAPI\Client\HeaderSelector;
use OpenAPI\Client\ObjectSerializer;

/**
 * ArticlesApi Class Doc Comment
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class ArticlesApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /**
     * @param ClientInterface $client
     * @param Configuration   $config
     * @param HeaderSelector  $selector
     * @param int             $host_index (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null,
        $host_index = 0
    ) {
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex = $host_index;
    }

    /**
     * Set the host index
     *
     * @param  int Host index (required)
     */
    public function setHostIndex($host_index)
    {
        $this->hostIndex = $host_index;
    }

    /**
     * Get the host index
     *
     * @return Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation articleSearchGet
     *
     * @param  int $start start (optional)
     * @param  int $limit limit (optional)
     * @param  string $paper paper (optional)
     * @param  string $content_query content_query (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\Article[]
     */
    public function articleSearchGet($start = null, $limit = null, $paper = null, $content_query = null)
    {
        list($response) = $this->articleSearchGetWithHttpInfo($start, $limit, $paper, $content_query);
        return $response;
    }

    /**
     * Operation articleSearchGetWithHttpInfo
     *
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $paper (optional)
     * @param  string $content_query (optional)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\Article[], HTTP status code, HTTP response headers (array of strings)
     */
    public function articleSearchGetWithHttpInfo($start = null, $limit = null, $paper = null, $content_query = null)
    {
        $request = $this->articleSearchGetRequest($start, $limit, $paper, $content_query);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\Article[]' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\Article[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\Article[]';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\Article[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation articleSearchGetAsync
     *
     * 
     *
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $paper (optional)
     * @param  string $content_query (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function articleSearchGetAsync($start = null, $limit = null, $paper = null, $content_query = null)
    {
        return $this->articleSearchGetAsyncWithHttpInfo($start, $limit, $paper, $content_query)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation articleSearchGetAsyncWithHttpInfo
     *
     * 
     *
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $paper (optional)
     * @param  string $content_query (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function articleSearchGetAsyncWithHttpInfo($start = null, $limit = null, $paper = null, $content_query = null)
    {
        $returnType = '\OpenAPI\Client\Model\Article[]';
        $request = $this->articleSearchGetRequest($start, $limit, $paper, $content_query);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'articleSearchGet'
     *
     * @param  int $start (optional)
     * @param  int $limit (optional)
     * @param  string $paper (optional)
     * @param  string $content_query (optional)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function articleSearchGetRequest($start = null, $limit = null, $paper = null, $content_query = null)
    {
        if ($start !== null && $start > 9223372036854775807) {
            throw new \InvalidArgumentException('invalid value for "$start" when calling ArticlesApi.articleSearchGet, must be smaller than or equal to 9223372036854775807.');
        }
        if ($start !== null && $start < -9223372036854775808) {
            throw new \InvalidArgumentException('invalid value for "$start" when calling ArticlesApi.articleSearchGet, must be bigger than or equal to -9223372036854775808.');
        }

        if ($limit !== null && $limit > 9223372036854775807) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ArticlesApi.articleSearchGet, must be smaller than or equal to 9223372036854775807.');
        }
        if ($limit !== null && $limit < -9223372036854775808) {
            throw new \InvalidArgumentException('invalid value for "$limit" when calling ArticlesApi.articleSearchGet, must be bigger than or equal to -9223372036854775808.');
        }


        $resourcePath = '/article/search';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($start !== null) {
            $queryParams['start'] = ObjectSerializer::toQueryValue($start);
        }
        // query params
        if ($limit !== null) {
            $queryParams['limit'] = ObjectSerializer::toQueryValue($limit);
        }
        // query params
        if ($paper !== null) {
            $queryParams['paper'] = ObjectSerializer::toQueryValue($paper);
        }
        // query params
        if ($content_query !== null) {
            $queryParams['contentQuery'] = ObjectSerializer::toQueryValue($content_query);
        }


        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json;charset=utf-8']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json;charset=utf-8'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation articleUuidGet
     *
     * @param  string $uuid uuid (required)
     * @param  string $auth_user auth_user (optional)
     * @param  string $authorization authorization (optional)
     * @param  bool $textonly textonly (optional, default to false)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \OpenAPI\Client\Model\Article
     */
    public function articleUuidGet($uuid, $auth_user = null, $authorization = null, $textonly = false)
    {
        list($response) = $this->articleUuidGetWithHttpInfo($uuid, $auth_user, $authorization, $textonly);
        return $response;
    }

    /**
     * Operation articleUuidGetWithHttpInfo
     *
     * @param  string $uuid (required)
     * @param  string $auth_user (optional)
     * @param  string $authorization (optional)
     * @param  bool $textonly (optional, default to false)
     *
     * @throws \OpenAPI\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return array of \OpenAPI\Client\Model\Article, HTTP status code, HTTP response headers (array of strings)
     */
    public function articleUuidGetWithHttpInfo($uuid, $auth_user = null, $authorization = null, $textonly = false)
    {
        $request = $this->articleUuidGetRequest($uuid, $auth_user, $authorization, $textonly);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException(
                    "[{$e->getCode()}] {$e->getMessage()}",
                    $e->getCode(),
                    $e->getResponse() ? $e->getResponse()->getHeaders() : null,
                    $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null
                );
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(
                    sprintf(
                        '[%d] Error connecting to the API (%s)',
                        $statusCode,
                        $request->getUri()
                    ),
                    $statusCode,
                    $response->getHeaders(),
                    $response->getBody()
                );
            }

            $responseBody = $response->getBody();
            switch($statusCode) {
                case 200:
                    if ('\OpenAPI\Client\Model\Article' === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\OpenAPI\Client\Model\Article', []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
            }

            $returnType = '\OpenAPI\Client\Model\Article';
            $responseBody = $response->getBody();
            if ($returnType === '\SplFileObject') {
                $content = $responseBody; //stream goes to serializer
            } else {
                $content = $responseBody->getContents();
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders()
            ];

        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\OpenAPI\Client\Model\Article',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation articleUuidGetAsync
     *
     * 
     *
     * @param  string $uuid (required)
     * @param  string $auth_user (optional)
     * @param  string $authorization (optional)
     * @param  bool $textonly (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function articleUuidGetAsync($uuid, $auth_user = null, $authorization = null, $textonly = false)
    {
        return $this->articleUuidGetAsyncWithHttpInfo($uuid, $auth_user, $authorization, $textonly)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation articleUuidGetAsyncWithHttpInfo
     *
     * 
     *
     * @param  string $uuid (required)
     * @param  string $auth_user (optional)
     * @param  string $authorization (optional)
     * @param  bool $textonly (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function articleUuidGetAsyncWithHttpInfo($uuid, $auth_user = null, $authorization = null, $textonly = false)
    {
        $returnType = '\OpenAPI\Client\Model\Article';
        $request = $this->articleUuidGetRequest($uuid, $auth_user, $authorization, $textonly);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    $responseBody = $response->getBody();
                    if ($returnType === '\SplFileObject') {
                        $content = $responseBody; //stream goes to serializer
                    } else {
                        $content = $responseBody->getContents();
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders()
                    ];
                },
                function ($exception) {
                    $response = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(
                        sprintf(
                            '[%d] Error connecting to the API (%s)',
                            $statusCode,
                            $exception->getRequest()->getUri()
                        ),
                        $statusCode,
                        $response->getHeaders(),
                        $response->getBody()
                    );
                }
            );
    }

    /**
     * Create request for operation 'articleUuidGet'
     *
     * @param  string $uuid (required)
     * @param  string $auth_user (optional)
     * @param  string $authorization (optional)
     * @param  bool $textonly (optional, default to false)
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */
    protected function articleUuidGetRequest($uuid, $auth_user = null, $authorization = null, $textonly = false)
    {
        // verify the required parameter 'uuid' is set
        if ($uuid === null || (is_array($uuid) && count($uuid) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $uuid when calling articleUuidGet'
            );
        }

        $resourcePath = '/article/{uuid}';
        $formParams = [];
        $queryParams = [];
        $headerParams = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($textonly !== null) {
            $queryParams['textonly'] = ObjectSerializer::toQueryValue($textonly);
        }
        // header params
        if ($auth_user !== null) {
            $headerParams['AuthUser'] = ObjectSerializer::toHeaderValue($auth_user);
        }
        // header params
        if ($authorization !== null) {
            $headerParams['Authorization'] = ObjectSerializer::toHeaderValue($authorization);
        }

        // path params
        if ($uuid !== null) {
            $resourcePath = str_replace(
                '{' . 'uuid' . '}',
                ObjectSerializer::toPathValue($uuid),
                $resourcePath
            );
        }

        // body params
        $_tempBody = null;

        if ($multipart) {
            $headers = $this->headerSelector->selectHeadersForMultipart(
                ['application/json;charset=utf-8']
            );
        } else {
            $headers = $this->headerSelector->selectHeaders(
                ['application/json;charset=utf-8'],
                []
            );
        }

        // for model (json/xml)
        if (isset($_tempBody)) {
            // $_tempBody is the method argument, if present
            if ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode(ObjectSerializer::sanitizeForSerialization($_tempBody));
            } else {
                $httpBody = $_tempBody;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $multipartContents[] = [
                        'name' => $formParamName,
                        'contents' => $formParamValue
                    ];
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);

            } elseif ($headers['Content-Type'] === 'application/json') {
                $httpBody = \GuzzleHttp\json_encode($formParams);

            } else {
                // for HTTP post (form)
                $httpBody = \GuzzleHttp\Psr7\build_query($formParams);
            }
        }


        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $query = \GuzzleHttp\Psr7\build_query($queryParams);
        return new Request(
            'GET',
            $this->config->getHost() . $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option
     *
     * @throws \RuntimeException on file opening failure
     * @return array of http client options
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }
}
