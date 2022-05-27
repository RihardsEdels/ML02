<?php

namespace Magento\DummyModule\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $data = [
            [
                'message' => 'Happy Holidays'
            ],
            [
                'message' => 'Happy new Year'
            ],
            [
                'message' => 'Happy Easter'
            ],
            [
                'message' => 'Happy Piektdiena'
            ]
        ];
        foreach($data as $item) {
            $setup->getConnection()->insert(
                $setup->getTable('greeting_messages'),
                $item
            );
        }
        $setup->endSetup();
    }
}