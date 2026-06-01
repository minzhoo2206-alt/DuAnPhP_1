<?php

class Subject{
    private $no;
    private $code;
    private $name;
    private $type;
    private $syllabus;

    public function __construct($stt, $maMon, $tenMon, $loai, $linkSyllabus){
        $this->no = $stt;
        $this->name = $maMon;
        $this->code = $tenMon;
        $this->type = $loai;
        $this->syllabus = $linkSyllabus;
    }

    public function setNo(int $stt){
        $this->no = $stt;
    }

    public function getNo(){
        return $this->no;
    }

    public function setSyllabus($link_syllabus){
        $this->syllabus = $link_syllabus;
    }

    public function downloadSyllabus(){
        $this->syllabus;
    }
}
$no1 = new Subject("1", "PDP102", "Kỹ năng học tập", "BLE", "Chưa có");
$no2 = new Subject("2", "COM1071", "TIN HỌC", "ONL", "https://fplsms.web.app/");
$no3 = new Subject("3", "COM108", "NHẬP MÔN LẬP TRÌNH", "BLE", "https://fplsms.web.app/");
$no4 = new Subject("4", "ITI101", "NHẬP MÔN CNTT", "TRA", "https://fplsms.web.app/");