<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;

class AdvantagesController extends AppController
{
    /**
     * @param EventInterface $event
     * @return void
     */
    public function beforeFilter(EventInterface $event)
    {
        $this->Auth->allow();
        parent::beforeFilter($event);
    }

    /**
     * @return void
     */
    public function digitalVersion()
    {
        $titleForLayout = 'Offering Digital Version | International Remittance Services';
        $desc = 'Experience the convenience of digital international remittance services. Seamlessly send and receive money globally with Remitso\'s secure digital platform.';
        $this->set(compact('titleForLayout', 'desc'));
    }

    /**
     * @return void
     */
    public function cloudServices()
    {
        $titleForLayout = 'Cloud Based International Remittance Services | RemitSo';
        $desc = 'Access cloud-based international remittance services for seamless and secure money transfers. Enjoy the reliability of the cloud for your global remittance needs.';
        $this->set(compact('titleForLayout', 'desc'));
    }

    /**
     * @return void
     */
    public function fraudAndRisk()
    {
        $titleForLayout = 'Fraud And Risk Mitigation On  Money Transfer | Remitso';
        $desc = 'Remitso prioritizes fraud and risk mitigation. Experience secure international remittance services with advanced measures to protect your transactions.';
        $this->set(compact('titleForLayout', 'desc'));
    }

    /**
     * @return void
     */
    public function compliance()
    {
        $titleForLayout = 'Compliance On  Money Transfer | Remitso';
        $desc = 'Explore Remitso\'s commitment to compliance in money transfers. Discover compliant international remittance services, ensuring transactions meet regulatory standards.';
        $this->set(compact('titleForLayout', 'desc'));
    }

}
