<?php
namespace Sitegeist\GoldenGate\Neos\Mixins\Service\DataSource;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Service\DataSource\AbstractDataSource;
use Neos\ContentRepository\Domain\Model\NodeInterface;
use Sitegeist\GoldenGate\Neos\Api\Service\ConfigurationService;

class ShopDataSource extends AbstractDataSource
{

    /**
     * @var ConfigurationService
     * @Flow\Inject
     */
    protected $configurationService;

    /**
     * @var string
     */
    protected static $identifier = 'SitegeistGoldenGate_Shop';

    /**
     * @param NodeInterface|null $node
     * @param array $arguments
     */
    public function getData(NodeInterface $node = null, array $arguments)
    {
        $shopConfigurations = $this->configurationService->getAllShopConfigurations();

        $result = array();
        foreach ($shopConfigurations as $shopIdentifier => $shopConfiguration) {
            $result[] = array(
                'value' => $shopIdentifier,
                'label' => $shopConfiguration['title']
            );
        }

        return $result;
    }
}
