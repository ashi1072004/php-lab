<?php

class BankAccount
{
    private $balance;

    public function __construct($amount)
    {
        $this->balance = $amount;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function deposit($amount)
    {
        if ($amount > 0) {
            $this->balance += $amount;
        }
        return $this;
    }
    // final method: to prevent the method in the child class from overriding the method in the parent class
    // final public function withdraw($amount)
    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }
}

class CheckingAccount extends BankAccount
{
    private $minBalance;

    public function __construct($amount, $minBalance)
    {
        if ($amount > 0 && $amount >= $minBalance) {
            parent::__construct($amount);
            $this->minBalance = $minBalance;
        } else {
            throw new InvalidArgumentException('amount must be more than zero and higher than the minimum balance');
        }
    }

    public function withdraw($amount)
    {
        $canWithdraw = $amount > 0 &&
            $this->getBalance() - $amount > $this->minBalance;

        if ($canWithdraw) {
            parent::withdraw($amount);

            return true;
        }

        return false;
    }
}

$account = new CheckingAccount(2000, 100);
echo $account->withdraw(500); // Output: 1
