<?php

namespace App\Test\Controller;

use App\Entity\Consigne;
use App\Repository\ConsigneRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ConsigneControllerTest extends WebTestCase
{
    private KernelBrowser $client;
    private ConsigneRepository $repository;
    private string $path = '/consigne/';

    protected function setUp(): void
    {
        $this->client = static::createClient();
        $this->repository = (static::getContainer()->get('doctrine'))->getRepository(Consigne::class);

        foreach ($this->repository->findAll() as $object) {
            $this->repository->remove($object, true);
        }
    }

    public function testIndex(): void
    {
        $crawler = $this->client->request('GET', $this->path);

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Consigne index');

        // Use the $crawler to perform additional assertions e.g.
        // self::assertSame('Some text on the page', $crawler->filter('.p')->first());
    }

    public function testNew(): void
    {
        $originalNumObjectsInRepository = count($this->repository->findAll());

        $this->markTestIncomplete();
        $this->client->request('GET', sprintf('%snew', $this->path));

        self::assertResponseStatusCodeSame(200);

        $this->client->submitForm('Save', [
            'consigne[name]' => 'Testing',
            'consigne[bookingdate]' => 'Testing',
            'consigne[duedate]' => 'Testing',
            'consigne[rendu]' => 'Testing',
            'consigne[email]' => 'Testing',
        ]);

        self::assertResponseRedirects('/consigne/');

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));
    }

    public function testShow(): void
    {
        $this->markTestIncomplete();
        $fixture = new Consigne();
        $fixture->setName('My Title');
        $fixture->setBookingdate('My Title');
        $fixture->setDuedate('My Title');
        $fixture->setRendu('My Title');
        $fixture->setEmail('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));

        self::assertResponseStatusCodeSame(200);
        self::assertPageTitleContains('Consigne');

        // Use assertions to check that the properties are properly displayed.
    }

    public function testEdit(): void
    {
        $this->markTestIncomplete();
        $fixture = new Consigne();
        $fixture->setName('My Title');
        $fixture->setBookingdate('My Title');
        $fixture->setDuedate('My Title');
        $fixture->setRendu('My Title');
        $fixture->setEmail('My Title');

        $this->repository->add($fixture, true);

        $this->client->request('GET', sprintf('%s%s/edit', $this->path, $fixture->getId()));

        $this->client->submitForm('Update', [
            'consigne[name]' => 'Something New',
            'consigne[bookingdate]' => 'Something New',
            'consigne[duedate]' => 'Something New',
            'consigne[rendu]' => 'Something New',
            'consigne[email]' => 'Something New',
        ]);

        self::assertResponseRedirects('/consigne/');

        $fixture = $this->repository->findAll();

        self::assertSame('Something New', $fixture[0]->getName());
        self::assertSame('Something New', $fixture[0]->getBookingdate());
        self::assertSame('Something New', $fixture[0]->getDuedate());
        self::assertSame('Something New', $fixture[0]->getRendu());
        self::assertSame('Something New', $fixture[0]->getEmail());
    }

    public function testRemove(): void
    {
        $this->markTestIncomplete();

        $originalNumObjectsInRepository = count($this->repository->findAll());

        $fixture = new Consigne();
        $fixture->setName('My Title');
        $fixture->setBookingdate('My Title');
        $fixture->setDuedate('My Title');
        $fixture->setRendu('My Title');
        $fixture->setEmail('My Title');

        $this->repository->add($fixture, true);

        self::assertSame($originalNumObjectsInRepository + 1, count($this->repository->findAll()));

        $this->client->request('GET', sprintf('%s%s', $this->path, $fixture->getId()));
        $this->client->submitForm('Delete');

        self::assertSame($originalNumObjectsInRepository, count($this->repository->findAll()));
        self::assertResponseRedirects('/consigne/');
    }
}
