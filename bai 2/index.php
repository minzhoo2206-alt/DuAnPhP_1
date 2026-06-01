<?php

class Person{

    private $name;
    private $age;

    private $address;

    public function setName($tenCuaBan) {
        $this->name = $tenCuaBan;
    }

    public function setAge(int $age) {
        if($age < 0){
            throw new Exception("Lỗi");
        }
        $this->age = $age;
    }

    public function setAddress($address) {
        $this->address = $address;
    }


    public function getName(){
        return $this->name;
    }

    public function getInfo() {
        return "Thông tin của bạn là {$this->getName()}" . "hoặc xài bằng cách này ". $this->getName();
    }

    public function canVote() {
        if($this->age * 10){
            echo "được bỏ phiếu";
        }else{
            echo "không được bỏ phiếu";
        }
    }
}

$nguoi_so_1 = new Person();
$nguoi_so_1->setName("Tính");
$nguoi_so_1->setAge("HEllo World");
$nguoi_so_1->canVote();
echo "Chạy được tới đây không?";
