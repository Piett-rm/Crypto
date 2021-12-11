<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use CoinMarketCap\Api;

class GetAllCryptoController extends AbstractController
{
    #[Route('/getallcrypto', name: 'get_all_crypto')]
    public function index(): Response
    {
        $cmc = new Api('2fda2769-7edf-4e56-b86c-10ca9208027c');
        //recuperation des 20 premières cryptos et leurs infos sous forme de tableau
        $allCryptos = $cmc->cryptocurrency()->listingsLatest(['limit' => 20, 'convert' => 'EUR']);
        return $this->render('get_all_crypto/index.html.twig', [
            'controller_name' => 'GetAllCryptoController',
            'cryptos_table' => $allCryptos,
        ]);
    }
}
