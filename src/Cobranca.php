<?php

namespace Mahout\AsaaS;

use Curl\Curl;

class Cobranca extends Core
{
    private $billingType;
    private $status;
    private $customer;
    private $externalReference;
    private $installment;
    private $paymentDate;

    public function __construct($baseUrl, $token)
    {
        parent::__construct($baseUrl, $token);
    }

    public function reset()
    {
        $billingType = null;
        $status = null;
        $customer = null;
        $externalReference = null;
        $installment = null;
        $paymentDate = null;
    }

    public function filter()
    {
        $vet = '';

        return !empty($vet) ? $vet : '';
    }

    public function get($id)
    {
        try {
            $url = $this->getBaseUrl() . '/payments/' . $id;

            $this->setUrl($url);

            $this->curl = new Curl();
            $this->curl->setHeader('Accept', 'application/json');
            $this->curl->setHeader('Content-Type', 'application/json');
            $this->curl->setHeader('access_token', $this->getToken());
            $this->curl->get($url);

            $response = $this->curl->response;

            $this->curl->close();

            return $response;
        } catch (\Exception $except) {
            return $except->getMessage();
        } catch (\Throwable $except) {
            return $except->getMessage();
        }
    }

    public function listar($limit = 10, $offset = 0)
    {
        try {
            $url = $this->getBaseUrl() . '/payments';
            $url .= '?limit=' . $limit;
            $url .= '&offset=' . $offset;
            $url .= $this->filter();

            $this->setUrl($url);

            $this->curl = new Curl();
            $this->curl->setHeader('Accept', 'application/json');
            $this->curl->setHeader('Content-Type', 'application/json');
            $this->curl->setHeader('access_token', $this->getToken());
            $this->curl->get($url);

            $response = $this->curl->response;

            $this->curl->close();

            return $response;
        } catch (\Exception $except) {
            return $except->getMessage();
        } catch (\Throwable $except) {
            return $except->getMessage();
        }
    }

    public function inserir($data)
    {
        try {
            $url = $this->getBaseUrl() . '/payments';

            $this->setUrl($url);
            $this->setData($data);

            $this->curl = new Curl();
            $this->curl->setHeader('Accept', 'application/json');
            $this->curl->setHeader('Content-Type', 'application/json');
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
