<?php


class Property
{
    private $_propertyId, $_userId, $_title, $_address, $_description, $_bedrooms, $_bathrooms, $_parking, $_area,
        $_year, $_dateInserted, $_updateDate, $_price;

    public function __construct($propertyId, $userId, $title, $address, $description, $bedrooms, $bathrooms, $parking,
                                $area, $year, $dateInserted, $updateDate, $price)
    {
        $this->_propertyId = $propertyId;
        $this->_userId = $userId;
        $this->_title = $title;
        $this->_address = $address;
        $this->_description = $description;
        $this->_bedrooms = $bedrooms;
        $this->_bathrooms = $bathrooms;
        $this->_parking = $parking;
        $this->_area = $area;
        $this->_year = $year;
        $this->_dateInserted = $dateInserted;
        $this->_updateDate = $updateDate;
        $this->_price = $price;
    }

    public function getPropertyId() {
        return $this->_propertyId;
    }

    public function getPropertyUserId() {
        return $this->_userId;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getAddress() {
        return $this->_address;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getBedrooms() {
        return $this->_bedrooms;
    }

    public function getBathrooms() {
        return $this->_bathrooms;
    }

    public function getParking() {
        return $this->_parking;
    }

    public function getArea() {
        return $this->_area;
    }

    public function getBuildingYear() {
        return $this->_year;
    }

    public function getDateInserted() {
        return $this->_dateInserted;
    }

    public function getUpdateDate() {
        return $this->_updateDate;
    }

    public function getPrice() {
        return $this->_price;
    }
}