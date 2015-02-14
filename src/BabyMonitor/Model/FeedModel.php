<?php

namespace BabyMonitor\Model;

class FeedModel
{
    public $userId;
    public $feedId;
    public $feedDate;
    public $feedTime;
    public $feedAmount;
    public $feedTemperature;
    public $feedNotes;

    public function exchangeArray()
    {
        $this->userId = (isset($data['userId'])) ? $data['userId'] : null;
        $this->feedId = (isset($data['feedId'])) ? $data['feedId'] : null;
        $this->feedDate = (isset($data['feedDate'])) ? $data['feedDate'] : null;
        $this->feedTime = (isset($data['feedTime'])) ? $data['feedTime'] : null;
        $this->feedAmount = (isset($data['feedAmount'])) ? $data['feedAmount'] : null;
        $this->feedTemperature = (isset($data['feedTemperature'])) ? $data['feedTemperature'] : null;
        $this->feedNotes = (isset($data['feedNotes'])) ? $data['feedNotes'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}