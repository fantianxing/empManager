<?php
class Emp {

	private $id;
	private $name;
	private $grade;
	private $email;
	private $salary;
	
	public function setId($id){
		$this->id=$id;
	}
	public function getId(){
		return $this->id;
	}


	public function setName($name){
		$this->name=$name;
	}
	public function getName(){
		return $this->name;
	}
	
	public function setGrade($grade){
		$this->grade=$grade;
	}
	public function getGrade(){
		return $this->grade;
	}
	
	
	public function setEmail($email){
		$this->email=$email;
	}
	public function getEmail(){
		return $this->email;
	}
	
	
	public function setSalary($salary){
		$this->salary=$salary;
	}
	public function getSalary(){
		return $this->salary;
	}
}
?>