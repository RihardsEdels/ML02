<?php

/**
 * @copyright Copyright (c) 2022 Magebit (https://magebit.com/)
 * @author    <info@magebit.com>
 * @license   GNU General Public License ("GPL") v3.0
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Magebit\CatalogGraphQl\Model\Resolver\Product;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use Magento\Catalog\Model\Product;
use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\ResolverInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;

class Brand implements ResolverInterface
{
    private ProductRepositoryInterface $productRepository;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param Helper $helper
     */
    public function __construct(
        ProductRepositoryInterface $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * @inheritdoc
     */
    public function resolve(
        Field       $field,
        $context,
        ResolveInfo $info,
        array       $value = null,
        array       $args = null
    ) {
        if (!isset($value['model'])) {
            throw new LocalizedException(__('"model" value should be specified'));
        }

        /** @var Product $product */
        $product = $value['model'];
        $productData = $this->getProductById($product->getId());
        return $productData->getAttributeText('brand');
    }

    /**
     * @param $productId
     * @return ProductInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    private function getProductById($productId): ProductInterface
    {
        return $this->productRepository->getById($productId);
    }
}
