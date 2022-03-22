<?php

namespace Mahout\AsaaS;

use Curl\Curl;

class Cliente extends Core
{
    private $start_date;
    private $finish_date;

    public function __construct($baseUrl, $token)
    {
        $this->entity = 'customers';
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
}
