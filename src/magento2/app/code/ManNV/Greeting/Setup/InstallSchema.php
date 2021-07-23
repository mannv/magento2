<?php

namespace ManNV\Greeting\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = 'mannv_greeting';
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists($tableName)) {
            $table = $installer->getConnection()->newTable($installer->getTable($tableName))
                ->addColumn('id', Table::TYPE_INTEGER, null, [
                    'identity' => true,
                    'nullable' => false,
                    'primary' => true,
                    'unsigned' => true,
                ], 'Message Id')
                ->addColumn('message', Table::TYPE_TEXT, 255, ['nullable' => false], 'Message Text')
                ->addColumn('url_key', Table::TYPE_TEXT, 255, [], 'Message URL KEY')
                ->addColumn('created_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT], 'Created at')
                ->addColumn('updated_at', Table::TYPE_TIMESTAMP, null, ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE], 'Updated at')
                ->setComment('Message Table');

            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }

}
