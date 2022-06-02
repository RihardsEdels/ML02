<?php

/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magebit\Form\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

class addFormData implements DataPatchInterface

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
            $this->moduleDataSetup->getTable('magecomp_customtable'),
            ['name' => 'Name1', 'content' => 'content1', 'title' => 'title1']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magecomp_customtable'),
            ['name' => 'Name2', 'content' => 'content2', 'title' => 'title2']
        );

        $connection->insert(
            $this->moduleDataSetup->getTable('magecomp_customtable'),
            ['name' => 'Name3', 'content' => 'content3', 'title' => 'title3']
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
