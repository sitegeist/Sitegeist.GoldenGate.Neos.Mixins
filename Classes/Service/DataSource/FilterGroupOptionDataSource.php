<?php
namespace Sitegeist\GoldenGate\Neos\Mixins\Service\DataSource;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Sitegeist\Goldengate\Dto\Structure\FilterGroup;
use Sitegeist\Goldengate\Dto\Structure\FilterGroupReference;
use Sitegeist\GoldenGate\Neos\Api\Eel\ApiHelper;

class FilterGroupOptionDataSource extends AbstractDataSource
{

    /**
     * @var ApiHelper
     * @Flow\Inject
     */
    protected $apiHelper;

    /**
     * @var string
     */
    protected static $identifier = 'SitegeistGoldenGate_FilterGroupOption';

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

        /**
         * @var FilterGroupReference $filterGroupReferences
         */
        $filterGroupReferences = $this->apiHelper->filterGroupReferences($shopIdentifier);

        $result = array();
        foreach ($filterGroupReferences as $filterGroupReference) {
            /**
             * @var FilterGroup $filterGroup
             */
            $filterGroup = $this->apiHelper->filterGroup($shopIdentifier, $filterGroupReference);
            foreach ($filterGroup->getOptions() as $option) {
                $result[] = array(
                    'value' => $option->getId(),
                    'group' => $filterGroup->getLabel(),
                    'label' => '[' . $filterGroup->getLabel() . '] ' . $option->getLabel()
                );
            }
        }

        return $result;
    }
}
