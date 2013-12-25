<?php
define(BR,"<br/>\n");
class A
{
	public $somevar;
	
	public function __construct($somevar){
		echo "Constructing A<br/>\n";
		$this->somevar=$somevar;
	}
	
	public function __clone(){
		echo "Cloning A<br/>\n";
	}
}

class B
{
	public $imember;

	public function __construct($imember){
		echo "Constructing B<br/>\n";
		#to use a copy use "clone"
		#$this->imember=clone $imember;
		#to use a reference use a simple assignment
		$this->imember=$imember;
	}
}

$a = new A("AAA");
$b = new B($a);

echo "<br/>\nTest output<br/>\n";
echo "a ".$a->somevar."<br/>\n";
echo "b ".$b->imember->somevar."<br/>\n";
echo "<br/>\nChange var on A and Test output"."<br/>\n";
$a->somevar="BBB";

echo "a ".$a->somevar."<br/>\n";
echo "b ".$b->imember->somevar."<br/>\n";
?>