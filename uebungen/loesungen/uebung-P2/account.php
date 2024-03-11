<?php
declare( strict_types=1 );

class Bank_Account {
	function __construct(
		public string $account_number,
		public string $type,
		public float $balance
	) {
	}

	public function deposit( float $amount ): float {
		$this->balance += $amount;

		return $this->balance;
	}

	public function withdraw( float $amount ): float {
		$this->balance -= $amount;

		return $this->balance;
	}
}

