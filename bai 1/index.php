    <?php
        class Person {
            public $name;
            public $age;
            public $address;

            public function setName($name) {
                $this->name = $name;
            }

            public function setAge($age) {
                $this->age = $age;
            }

            public function setAddress($address) {
                $this->address = $address;
            }

            public function getInfo() {
                return "Name: " . $this->name . "<br>" .
                        "Age: " . $this->age . "<br>" .
                        "Address: " . $this->address;
            }
            
            public function canVote() {
                if ($this->age >= 18) {
                    return true;
                } else {
                    return false;
                }
            }
        }

$a = new Person();
$a->setName("Nhân");
$a->setAge(20);
$a->setAddress("123 Đường ABC, Thành phố XYZ");
echo "Tên của bạn là: " . $a->name;