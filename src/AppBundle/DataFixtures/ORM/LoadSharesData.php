<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Share;

class LoadSharesData implements FixtureInterface
{
    private $data = [
        'YHOO' => 'Yahoo',
        'AAPL' => 'Apple',
        'GOOG' => 'Google',
        'YNDX' => 'Яндекс',
    ];

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $code => $share_name) {
            $share = new Share();
            $share->setName($share_name);
            $share->setCode($code);

            $manager->persist($share);
        }
        
        $manager->flush();
    }
}
