<?php
namespace App\Http\Services;

use App\Models\Setting;
use App\Models\User;

/**
 * Laravel/Symfony Developer
 * Name: Muongozo
 * Telegram: @muongozotrader
 * Hire me via Telegram: muongozotrader
 */
class WalletServices
{
    private $setting;
    private $default_currency;
    private $default_currency_sym;
    private $support_currency;
    private $data_currency;

    

    public function __construct()
    {
        $this->setting = Setting::first();
        $this->default_currency = $this->setting->cur_text;
        $this->default_currency_sym = $this->setting->cur_sym;

        $this->support_currency = [$this->default_currency, 'USDT'];
        $this->data_currency = [
            [
                'text' => $this->default_currency,
                'sym' => $this->default_currency_sym
            ],
            [
                'text' => 'USDT',
                'sym' => '₮'
            ]
        ];
    }

    /**
     * Get User Balance for select currency
     */
    public function getBalance(
        User $user,
        string $currency
    )
    {
        try {
            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Balance currency not support");

            // DEFAULT BALANCE
            if($currency == $this->default_currency) return $user->balance;

            // USDT BALANCE
            if($currency == 'USDT') return $user->usdt_balance;

            // Return Balance
            return $user->usdt_balance;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Get User Balance for select currency
     */
    public function getBalanceRaw(
        User $user,
        string $currency
    )
    {
        try {
            
            // Main Balance
            $mainBalance = $this->getBalance($user, $currency);

            // Income Balance
            $incomeBalance = $this->getIncome($user, $currency);

            // Income Balance
            $pendingIncome = $this->getPendingIncome($user, $currency);

            // Return Balance
            return [
                'main' => $mainBalance,
                'income' => $incomeBalance,
                'pending_income' => $pendingIncome];

            // Return Balance
            return $user->usdt_balance;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Get User income for select currency
     */
    public function getIncome(
        User $user,
        string $currency
    )
    {
        try {
            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Income currency not support");

            // DEFAULT BALANCE
            if($currency == $this->default_currency) return $user->income;

            // USDT BALANCE
            if($currency == 'USDT') return $user->usdt_income;

            // Return Income
            return $user->income;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Get User pending income for select currency
     */
    public function getPendingIncome(
        User $user,
        string $currency
    )
    {
        try {
            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Income currency not support");

            // DEFAULT BALANCE
            if($currency == $this->default_currency) return $user->pending_income;

            // USDT BALANCE
            if($currency == 'USDT') return $user->usdt_pending_income;

            // Return Income
            return $user->pending_income;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Get Available Balance
     */
    public function getAvailableBalance(
        User $user,
        string $type,
        string $currency
    )
    {
        try {
            // Verify type
            if(!in_array($type, [1, 2])) throw new \Exception("$type not support");

            // Balance
            if($type == 1) return $this->getBalance($user, $currency);

            // Income
            if($type == 2) return $this->getIncome($user, $currency);
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Validate currency
     */
    public function verifyCurrency(
        string $currency
    )
    {
        try {
            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("currency not support");

            // Return currency
            return $this->getCurrency($currency);
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * get currency
     */
    public function getCurrency(
        string $currency = null
    )
    {
       // Verify currency
       $allCurrency = $this->data_currency;

       if($currency) {
        //
        foreach ($allCurrency as $key => $value) {
            # code...
            if($value['text'] == $currency) {
                //
                return [
                    'text' => $value['text'],
                    'sym' => $value['sym']
                ];
            }
        }
       }

       // Return currency
       return $allCurrency;
    }

    /**
     * Debit Wallet
     */
    public function debitBalance(
        User $user,
        string $currency,
        string $amount,
        bool $isExchange = false,
        string $toCurrency = null
    )
    {
        try {
            
            // Balance
            $userBalance = $this->getBalance($user, $currency);

            if($userBalance instanceOf \Exception) throw new \Exception($userBalance->getMessage());
            
            // Verify balance
            if ($amount > $userBalance || getAmount($userBalance) == 0) throw new \Exception('You do not have sufficient balance to charge.');
            

            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Balance currency not support");

            // Convert amount
            if($isExchange && $currency != $toCurrency) {

                // Verify currency
                if(!in_array($toCurrency, $this->support_currency)) throw new \Exception("Debit currency not support");

                //
                $exchange = $this->getExchangeRate($user, $amount, $currency, $toCurrency);

                if($exchange instanceOf \Exception) throw new \Exception($exchange->getMessage());

                // Calculate fees
                //$fees = ($toCurrency == $this->default_currency) ? $exchange['amount'] * $this->setting->usdt_to_ngn_fee/100 : $exchange['amount'] * $this->setting->ngn_to_usdt_fee/100;
                //$fees = ($currency == $toCurrency) ? 0 : $fees;

                // Update amount
                $amount = $exchange['amount_with_fees'];
            }

            // DEFAULT BALANCE
            if($currency == $this->default_currency && $isExchange == false || $toCurrency == $this->default_currency && $isExchange) $user->balance -= $amount;

            // USDT BALANCE
            if($currency == 'USDT' && $isExchange == false || $toCurrency == 'USDT' && $isExchange) $user->usdt_balance -= $amount;

            // Save changes
            $user->save();

            // Return Amount
            return $amount;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Credit Wallet
     */
    public function creditBalance(
        User $user,
        string $currency,
        string $amount
    )
    {
        try {
            
            // Balance
            $userBalance = $this->getBalance($user, $currency);

            if($userBalance instanceOf \Exception) throw new \Exception($userBalance->getMessage());

            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Balance currency not support");
            
            // DEFAULT BALANCE
            if($currency == $this->default_currency) $user->balance += $amount;

            // USDT BALANCE
            if($currency == 'USDT') $user->usdt_balance += $amount;

            // Save changes
            $user->save();

            // Return Amount
            return $amount;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Credit Income
     */
    public function creditIncome(
        User $user,
        string $currency,
        string $amount
    )
    {
        try {
            
            // Income
            $userIncome = $this->getIncome($user, $currency);

            if($userIncome instanceOf \Exception) throw new \Exception($userIncome->getMessage());
            

            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Income currency not support");

            // DEFAULT INCOME
            if($currency == $this->default_currency) $user->income += $amount;

            // USDT INCOME
            if($currency == 'USDT') $user->usdt_income += $amount;

            // Save changes
            $user->save();

            // Return Amount
            return $amount;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Debit Income
     */
    public function debitIncome(
        User $user,
        string $currency,
        string $amount
    )
    {
        try {
            
            // Income
            $userIncome = $this->getIncome($user, $currency);

            if($userIncome instanceOf \Exception) throw new \Exception($userIncome->getMessage());
            
            // Verify income
            if($amount > getAmount($userIncome) || getAmount($userIncome) == 0) throw new \Exception('You do not have income fund.');
            

            // Verify currency
            if(!in_array($currency, $this->support_currency)) throw new \Exception("Income currency not support");

            // DEFAULT INCOME
            if($currency == $this->default_currency) $user->income -= $amount;

            // USDT INCOME
            if($currency == 'USDT') $user->usdt_income -= $amount;

            // Save changes
            $user->save();

            // Return Amount
            return $amount;
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    
    /**
     * Credit Available Balance
     */
    public function creditAvailableBalance(
        User $user,
        string $type,
        string $currency,
        string $amount
    )
    {
        try {
            // Verify type
            if(!in_array($type, [1, 2])) throw new \Exception("$type not support");

            // Balance
            if($type == 1) return $this->creditBalance($user, $currency, $amount);

            // Income
            if($type == 2) return $this->creditIncome($user, $currency, $amount);
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Debit Available Balance
     */
    public function debitAvailableBalance(
        User $user,
        string $type,
        string $currency,
        string $amount
    )
    {
        try {
            // Verify type
            if(!in_array($type, [1, 2])) throw new \Exception("$type not support");

            // Balance
            if($type == 1) return $this->debitBalance($user, $currency, $amount);

            // Income
            if($type == 2) return $this->debitIncome($user, $currency, $amount);
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }

    /**
     * Get Exchange Rate
     */
    public function getExchangeRate(
        User $user,
        string $amount,
        string $fromCurrency,
        string $toCurrency
    )
    {
        try {
            // Verify currency
            if(!in_array($fromCurrency, $this->support_currency)) throw new \Exception("$fromCurrency currency not support");
            if(!in_array($toCurrency, $this->support_currency)) throw new \Exception("$toCurrency currency not support");

            $exchange = [];

            // DEFAULT currency
            if($toCurrency == $this->default_currency) $exchange = [ 'rate' => $this->setting->usdt_to_ngn, 'amount' => $amount * $this->setting->usdt_to_ngn ];

            // USDT currency
            if($toCurrency == 'USDT') $exchange = [ 'rate' => $this->setting->ngn_to_usdt, 'amount' => $amount * $this->setting->ngn_to_usdt ];

            // Same currency
            if($fromCurrency == $toCurrency) $exchange = [ 'rate' => 1, 'amount' => $amount ];

            $fees = ($toCurrency == $this->default_currency) ? $exchange['amount'] * $this->setting->usdt_to_ngn_fee/100 : $exchange['amount'] * $this->setting->ngn_to_usdt_fee/100;
            $fees = ($fromCurrency == $toCurrency) ? 0 : $fees;

            // Return Rate
            return [
                'rate' => $exchange['rate'],
                'rate_text' => ($fromCurrency == $toCurrency) ? null : '1 '.$fromCurrency.' == '.$toCurrency.' '.$exchange['rate'],
                'currency' => [
                    'text' => $toCurrency,
                    'sym' => ($toCurrency == 'USDT')? '₮' : $this->default_currency_sym,
                ],
                'amount' => $exchange['amount'],
                'fees' => $fees,
                'amount_with_fees' => $exchange['amount'] + $fees
            ];//
            
        } catch (\Exception $th) {
            //throw $th;
            return $th;
        }
    }
}
