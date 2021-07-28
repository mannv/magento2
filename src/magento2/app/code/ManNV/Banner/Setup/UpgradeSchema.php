<?php

namespace ManNV\Banner\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $tableName = 'mannv_greeting';
        $installer = $setup;
        $installer->startSetup();
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $installer->getConnection()->addColumn($installer->getTable($tableName), 'content', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BLOB,
                'nullable' => true,
                'after' => 'message',
                'comment' => 'Noi dung'
            ]);
            $installer->getConnection()->addColumn($installer->getTable($tableName), 'status', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                'default' => true,
                'after' => 'url_key',
                'comment' => 'trang thai'
            ]);
        }
        if (version_compare($context->getVersion(), '1.1.1', '<')) {
            $installer->getConnection()->modifyColumn($installer->getTable($tableName), 'content', [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => true,
                '2M',
                'after' => 'message',
                'comment' => 'Noi dung 2'
            ]);
        }
        $installer->endSetup();
    }


}
