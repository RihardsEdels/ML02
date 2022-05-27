<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magebit\SampleModule\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class dummyPatchUpgrade
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

        //update
        $connection->update(
            $this->moduleDataSetup->getTable('magebit_sample_table'),
            ['name' => 'Jose','role' => 'CFO'],
            ['id = ?' => 1]
        );

        //add last name in every row of the table
        foreach ($connection->fetchAll('SELECT * FROM magebit_sample_table') as $row) {
            $connection->update(
                $this->moduleDataSetup->getTable('magebit_sample_table'),
                ['last_name' => 'Doe'],
                ['id = ?' => $row['id']]
            );
        }

        //delete
        $connection->delete(
            $this->moduleDataSetup->getTable('magebit_sample_table'),
            ['id = ?' => 2]
        );    
        $connection->endSetup();
    }

   
    public static function getDependencies()
    {
       
        return [dummyPatch::class];
    }

    public function getAliases()
    {

        return [];
    }
}

