<?php
declare(strict_types=1);

namespace Diko\Queue\Model\Queue;

class Consumer
{
    /** @var \Psr\Log\LoggerInterface  */
    protected $_logger;

    public function process($orders)
    {
        //try{
        //    //function execute handles saving order object to table
        //    $this->execute($orders);

        //}catch (\Exception $e){
        //    //logic to catch and log errors
        //    $this->_logger->critical($e->getMessage());
        //}
    }
}
