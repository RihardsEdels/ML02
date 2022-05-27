<?php

namespace Magento\DummyModule\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $table = $setup->getConnection()->newTable(
            $setup->getTable('greeting_messages')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Item ID'
        )->addColumn(
            'message',
            Table::TYPE_TEXT,
            255,
            ['NULLABLE' => false],
            'Item message'
        )->addIndex(
            $setup->getIdxName('greeting_messages', ['message']),
            ['message']
        )->setComment(
            'Sample greeting messages'
        );
        $setup->getConnection()->createTable($table);
        $setup->endSetup();
    }
}