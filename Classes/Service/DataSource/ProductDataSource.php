<?php
namespace Sitegeist\GoldenGate\Neos\Mixins\Service\DataSource;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Sitegeist\GoldenGate\Neos\Api\Eel\ApiHelper;

class ProductDataSource extends AbstractDataSource
{

    /**
     * @var ApiHelper
     * @Flow\Inject
     */
    protected $apiHelper;

    /**
     * @var string
     */
    protected static $identifier = 'SitegeistGoldenGate_Product';

    /**
     * @param NodeInterface|null $node
     * @param array $arguments
     */
    public function getData(NodeInterface $node = null, array $arguments)
    {
        if ($arguments && array_key_exists('shopProperty', $arguments)) {
            $shopProperty = $arguments;
        } else {
            $shopProperty = 'shop';
        }

        if ($node->hasProperty($shopProperty)) {
            $shopIdentifier = $node->getProperty($shopProperty);
        } else {
            $shopIdentifier = 'default';
        }

        $productReferences = $this->apiHelper->productReferences($shopIdentifier);

        $result = array();
        foreach ($productReferences as $productReference) {
            $result[] = array(
                'value' => $productReference->getId(),
                'label' => '[' . $productReference->getId() . '] ' . $productReference->getLabel()
            );
        }

        return $result;
    }
}
