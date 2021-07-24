<?php

namespace Mahout\AsaaS;

use Curl\Curl;

class Cliente extends Core
{
    private $start_date;
    private $finish_date;

    public function __construct($baseUrl, $token)
    {
        parent::__construct($baseUrl, $token);
    }

    public function reset()
    {
        $this->start_date = null;
        $this->finish_date = null;
    }

    public function getStartDate()
    {
        return $this->start_date;
    }

    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    public function getFinishDate()
    {
        return $this->finish_date;
    }

    public function setFinishDate($finish_date)
    {
        $this->finish_date = $finish_date;
    }

    public function filter()
    {
        $vet = '';

        if ($this->getStartDate() != '') {
            $vet .= '&=startDate' . urlencode($this->getStartDate());
        }

        if ($this->getFinishDate() != '') {
            $vet .= '&finishDate=' . urlencode($this->getFinishDate());
        }

        return !empty($vet) ? $vet : '';
    }

    public function get($id)
    {
        try {
            $url = $this->getBaseUrl() . '/customers/' . $id;

            $this->setUrl($url);

            $this->curl = new Curl();
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
            $url = $this->getBaseUrl() . '/customers';
            $url .= '?limit=' . $limit;
            $url .= '&offset=' . $offset;
            $url .= $this->filter();

            $this->setUrl($url);

            $this->curl = new Curl();
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
            $url = $this->getBaseUrl() . '/customers';

            $this->setUrl($url);
            $this->setData($data);

            $this->curl = new Curl();
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
