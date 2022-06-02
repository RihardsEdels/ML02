<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magebit\Grid\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class addBrands implements DataPatchInterface

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
            $this->moduleDataSetup->getTable('magebit_learning_brands'),
            ['brand_name' => 'Brand 1']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magebit_learning_brands'),
            ['brand_name' => 'Brand 2']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magebit_learning_brands'),
            ['brand_name' => 'Brand 3']
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
