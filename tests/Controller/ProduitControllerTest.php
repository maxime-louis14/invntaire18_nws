<?php

// namespace App\Test\Controller;

// use App\Entity\Produit;
// use App\Repository\ProduitRepository;
// use Symfony\Bundle\FrameworkBundle\KernelBrowser;
// use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

// class ProduitControllerTest extends WebTestCase
// {
    
//     /**
//      * bin/console make:test
//      * TestCase > tests unitaires (tests PHPUnit)
//      * KernelTestCase > tests d'intégration
//      * WebTestCase > tests fonctionnels ou d'application
//      * PantherTestCase > tests de bout en bout
//      * ApiTestCase > scénarios orientés API
//      * Fixtures envois des données en base pour être utiliser en test  
//      */

//     private KernelBrowser $client;
//     private ProduitRepository $repository;
//     private string $path = '/produit/';

//     protected function setUp(): void
//     {
//         $this->client = static::createClient();
//         $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Produit::class);

//         foreach ($this->repository->findAll() as $object) {
//             $this->repository->remove($object, true);
//         }
//     }

//     public function testIndex(): void
//     {
//         $crawler = $this->client->request('GET', $this->path);

//         self::assertResponseStatusCodeSame(200);
//         self::assertPageTitleContains('Produit index');

//         // Use the $crawler to perform additional assertions e.g.
//         // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
//     }

//     public function testNew(): void
//     {
//         $originalNumObjectsInRepository = count($this->repository->findAll());

//         $this->markTestIncomplete();
//         // sprintf — Retourne une chaîne formatée
//         $this->client->request('GET', sprintf('%snew', $this->path));

//         self::assertResponseStatusCodeSame(200);

//         $this->client->submitForm('Save', [
//             'produit[name]' => 'Testing',
//             'produit[stock]' => 'Testing',
//         ]);

//         self::assertResponseRedirects('/produit/');

//         self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
//     }

//     public function testShow(): void
//     {
//                 //  Fixtures envois des données en base pour être utiliser en test  
//         $this->markTestIncomplete();
//         $fixture = new Produit();
//         $fixture->setName('My Title');
//         $fixture->setStock('My Title');

//         $this->repository->add($fixture, true);

//         $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

//         self::assertResponseStatusCodeSame(200);
//         self::assertPageTitleContains('Produit');

//         // Use assertions to check that the properties are properly displayed.
//     }

//     public function testEdit(): void
//     {
//         $this->markTestIncomplete();
//         $fixture = new Produit();
//         $fixture->setName('My Title');
//         $fixture->setStock('My Title');

//         $this->repository->add($fixture, true);

//         $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

//         $this->client->submitForm('Update', [
//             'produit[name]' => 'Something New',
//             'produit[stock]' => 'Something New',
//         ]);

//         self::assertResponseRedirects('/produit/');

//         $fixture = $this->repository->findAll();

//         self::assertSame('Something New', $fixture[0]->getName());
//         self::assertSame('Something New', $fixture[0]->getStock());
//     }

//     public function testRemove(): void
//     {
//         $this->markTestIncomplete();

//         $originalNumObjectsInRepository = count($this->repository->findAll());

//         $fixture = new Produit();
//         $fixture->setName('My Title');
//         $fixture->setStock('My Title');

//         $this->repository->add($fixture, true);

//         self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

//         $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
//         $this->client->submitForm('Delete');

//         self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
//         self::assertResponseRedirects('/produit/');
//     }
// }
