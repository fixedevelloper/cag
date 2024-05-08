<?php

namespace App\Console\Commands;

use App\Models\CryptoMonaire;
use Illuminate\Console\Command;

class CalculTaux extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:calcul-taux';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cryptos=CryptoMonaire::all();
        foreach ($cryptos as $crypto){
            $taux=1/(620*$crypto->price);
            $crypto->taux=$taux;
            $crypto->taux_sell=$taux;
            $crypto->save();
        }
    }
}
