<?php

namespace Mahout\AsaaS;

use Curl\Curl;

class Core
{
    protected $entity;
    protected $baseUrl;
    protected $token;
    protected $curl;
    protected $url;
    protected $data;

    public function __construct($baseUrl, $token)
    {
        $this->baseUrl = $baseUrl;
        $this->token = $token;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getCurl()
    {
        return $this->curl;
    }

    public function filter()
    {
        $vet = '';

        return !empty($vet) ? $vet : '';
    }

    public function getRequest($url)
    {
        $json = 'application/json';

        $this->setUrl($url);

        $this->curl = new Curl();
        $this->curl->setHeader('Accept', $json);
        $this->curl->setHeader('Content-Type', $json);
        $this->curl->setHeader('access_token', $this->getToken());
        $this->curl->get($url);

        $response = $this->curl->response;

        $this->curl->close();

        return $response;
    }

    public function get($id)
    {
        try {
            $url = $this->getBaseUrl() . '/' . $this->getEntity() . '/' . $id;
            return $this->getRequest($url);
        } catch (\Exception $except) {
            return $except->getMessage();
        } catch (\Throwable $except) {
            return $except->getMessage();
        }
    }

    public function listar($limit = 10, $offset = 0)
    {
        try {
            $url = $this->getBaseUrl() . '/' . $this->getEntity();
            $url .= '?limit=' . $limit;
            $url .= '&offset=' . $offset;
            $url .= $this->filter();

            return $this->getRequest($url);
        } catch (\Exception $except) {
            return $except->getMessage();
        } catch (\Throwable $except) {
            return $except->getMessage();
        }
    }

    public function inserir($data)
    {
        try {
            $json = 'application/json';
            $url = $this->getBaseUrl() . '/' . $this->getEntity();

            $this->setUrl($url);
            $this->setData($data);

            $this->curl = new Curl();
            $this->curl->setHeader('Accept', $json);
            $this->curl->setHeader('Content-Type', $json);
            $this->curl->setHeader('access_token', $this->getToken());
            $this->curl->post($url, $data);

            $response = $this->curl->response;

            $this->curl->close();

            return $response;
        } catch (\Exception $except) {
            return $except->getMessage();
        } catch (\Throwable $except) {
            return $except->getMessage();
        }
    }
}
