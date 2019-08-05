<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PartenaireControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient([],[
            'PHP_AUTH_USER'=>'AWA',
             'PHP_AUTH_PW'=>'pass123'

          ]);
          $crawler = $client->request('POST', 'api/partenaire',[],[],
          ['CONTENT_TYPE'=>'application/json'],
          '{
                "nomentreprise":"Nabienne Service",
                "registreCommerce":"SA45036",
                "raisonSociale":"SArl1",
                "adresse":"parcelles",
                "statut":"bloqué",
                "username":"lenaTEST",
                "password":"1994TEST1",
                "roles": ["ROLE_ADMINPARTENAIRE"],
                "nom":"NDIONGUE",
                "prenom":"lenaTEST",
                "email":"lena@gmail.com",
                "telephone":445556987,
                "statuts":"bloque",
                "solde":0,
                "cni":7712365
            }');
          $rep=$client->getResponse();
              var_dump($rep);
         $this->assertSame(201,$client->getResponse()->getStatusCode());
    }
}
