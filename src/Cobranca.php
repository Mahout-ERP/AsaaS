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
        $this->entity = 'payments';
        parent::__construct($baseUrl, $token);
    }

    public function getBillingType()
    {
        return $this->billingType;
    }

    public function setBillingType($billingType)
    {
        $this->billingType = $billingType;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCustomer()
    {
        return $this->customer;
    }

    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    public function getExternalReference()
    {
        return $this->externalReference;
    }

    public function setExternalReference($externalReference)
    {
        $this->externalReference = $externalReference;
    }

    public function getInstallment()
    {
        return $this->installment;
    }

    public function setInstallment($installment)
    {
        $this->installment = $installment;
    }

    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = $paymentDate;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
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
}
