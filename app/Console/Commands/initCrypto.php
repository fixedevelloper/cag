<?php

namespace App\Console\Commands;

use App\Models\CryptoMonaire;
use App\Models\CryptoMonnaie;
use App\Services\CoinrangingService;
use Illuminate\Console\Command;

class initCrypto extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init-crypto';

    private $coinrangingService;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    public function __construct(CoinrangingService $coinrangingService)
    {
        parent::__construct();
        $this->coinrangingService = $coinrangingService;
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $coin=$this->coinrangingService->allCoins();
        $coins=$coin['data']['coins'];
        logger($coins);
        for ($i=0;$i<count($coins);$i++){
            $crypto=CryptoMonaire::query()->firstWhere(['code'=>$coins[$i]['uuid']]);
            if (is_null($crypto)){
                $crypto=new CryptoMonaire();
                $crypto->code=$coins[$i]['uuid'];
            }
            $crypto->last_price=is_null($crypto->price)?0:$crypto->price;
            $crypto->name=$coins[$i]['name'];
            $crypto->symbol=$coins[$i]['symbol'];
            $crypto->price=$coins[$i]['price'];
            $crypto->iconUrl=$coins[$i]['iconUrl'];
            $crypto->change=$coins[$i]['change'];
            $crypto->marketCap=$coins[$i]['marketCap'];
            $crypto->btcPrice=$coins[$i]['btcPrice'];
            $crypto->rank=$coins[$i]['rank'];
            $crypto->color=$coins[$i]['color'];
            $crypto->save();
        }
    }
}
