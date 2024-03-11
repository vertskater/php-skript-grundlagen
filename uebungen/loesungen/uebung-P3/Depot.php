<?php
declare( strict_types=1 );

class Depot {
	public function __construct(
		private array $stocks = [],
		public float $balance = 0.0,
		public string $iban = '',
		public string $owner = ''
	) {
	}

	public static function fromArray( array $data ): Depot {
		$depot          = new Depot();
		$depot->balance = $data['balance'];
		$depot->iban    = $data['iban'];
		$depot->owner   = $data['owner'];
		foreach ( $data['stocks'] as $stock ) {
			$depot->stocks[ $stock['label'] ] = new Stock( (string) rand( 0, 1000 ), $stock['label'], $stock['price'], $stock['amount'] );
		}

		return $depot;
	}

	public function deposit( float $amount ): void {
		$this->balance += $amount;
	}

	public function getStocks(): array {
		return $this->stocks;
	}

	public function buyStock( object $stock, int $amount ): void {
		$price = $stock->price * $amount;
		if ( $this->balance >= $price ) {
			$this->balance                 -= $price;
			$stock->amount                 += $amount;
			$this->stocks[ $stock->label ] = $stock;
		}
	}

	public function sellStock( string $label, int $amount ): void {
		$stock = $this->stocks[ $label ];
		if ( ! isset( $stock ) ) {
			return;
		}
		if ( $stock->amount >= $amount ) {
			$stock->amount -= $amount;
			$this->balance += $stock->price * $amount;
		}
	}
}

