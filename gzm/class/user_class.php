<?php
	class User {
		public $name;
		protected $email;
		
		public function __construct($name, $email) {
			$this->name = $name;
			$this->email = $email;
		}
		public function sayHi() {
			echo "hi! my name is ".$this->name;
		}
	}
	
	class SuperUser extends User {
	
		public function superSayHi() {
			echo "HIIIIIiii! my email is ".$this->email;
		}
	}
