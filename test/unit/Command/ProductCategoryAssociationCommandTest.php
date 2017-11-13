<?php
declare(strict_types=1);
namespace SnowIO\Magento2DataModel\Test;


use SnowIO\Magento2DataModel\Command\ProductCategoryAssociationCommand;
use SnowIO\Magento2DataModel\ProductCategoryAssociation;

class ProductCategoryAssociationCommandTest extends CommandTest
{

    public function testToJson()
    {
        $time = time();
        $command = ProductCategoryAssociationCommand::of(ProductCategoryAssociation::of('test-product', ['category1']))
            ->withTimestamp($time);
        self::assertEquals([
            'productSku' => 'test-product',
            'categoryCodes' => ['category1'],
            '@timestamp' => $time,
        ], $command->toJson());
    }

    public function testAccessors()
    {
        $command = ProductCategoryAssociationCommand::of(ProductCategoryAssociation::of('test-product', ['category1']));
        self::assertTrue($command->getProductCategoryAssociation()
            ->equals(ProductCategoryAssociation::of('test-product', ['category1'])));
    }
}