<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magebit\SampleModule\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class dummyPatch
    implements DataPatchInterface
    
{
    /**
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup
    ) {
        
        $this->moduleDataSetup = $moduleDataSetup;
    }

    /**
     * @inheritdoc
     */
    public function apply()
    {

        $connection = $this->moduleDataSetup->getConnection();

        $connection->startSetup();

        //insert entries into table
        $connection->insert(
            $this->moduleDataSetup->getTable('magebit_sample_table'),
            ['name' => 'John','role' => 'CEO']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magebit_sample_table'),
            ['name' => 'Daisy','role' => 'CTO']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magebit_sample_table'),
            ['name' => 'Alex','role' => 'CTO']
        );  
        $connection->endSetup();
    }

   
    public static function getDependencies()
    {
       
        return [];
    }

    public function getAliases()
    {

        return [];
    }
}