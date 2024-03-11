<?php
declare( strict_types=1 );

// interfaces
/*interface IAnimal {
	public function makeNoise( string $noise ): void;

	public function jump(): void;
}


interface ICanFly {
	public function fly(): void;
}

class Animal implements IAnimal, ICanFly {
	public function makeNoise( string $noise ): void {
		echo 'Animal makes ' . $noise . ' noise.';
	}

	public function jump(): void {
		echo 'Animal jumps';
	}

	public function fly(): void {
		echo __CLASS__ . ' flies';
	}
}

$bird = new Animal();
$bird->makeNoise( 'chirping' ); // Animal makes chirping noise.
$bird->fly(); // Animal flies*/

/*abstract class Animal {
	// zwingt die erbenden Klassen die Methoden zu implementieren
	abstract public function makeNoise( string $noise ): void;

	abstract public function jump(): void;

	// Methode mit einer Standardimplementierung
	public function eat(): void {
		echo 'Animal eats';
	}
}


class Dog extends Animal {
	public function makeNoise( string $noise ): void {
		echo 'Dog makes ' . $noise . ' noise.';
	}

	public function jump(): void {
		echo 'Dog jumps';
	}
}

$dog = new Dog();
$dog->eat(); // Animal eats*/


trait Utility {
	public function getSpeed( int $time, int $distance ): float {
		return $distance / $time;
	}
}

class Animal {
	use Utility;

	public function howFast( int $time, int $distance ): float {
		return $this->getSpeed( $time, $distance );
	}
}

$dog = new Animal();
echo $dog->howFast( 20, 100 ) . ' Meter/Sekunde'; // 5 m/s

