<?php
/**
 * Scheme collection
 *
 * @package    sandbox
 * @subpackage Module
 */
namespace sandbox\Module\Common;

use Ray\Di\ProviderInterface as Provide;
use BEAR\Resource\Adapter\App as AppAdapter;
use BEAR\Resource\Adapter\Page;
use BEAR\Resource\SchemeCollection;
use BEAR\Framework\Inject\AppNameInject;
use BEAR\Framework\Inject\InjectorInject;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

/**
 * Scheme collection
 *
 * @package    sandbox
 * @subpackage Module
 */
class SchemeCollectionProvider implements Provide
{
    use AppNameInject;
    use InjectorInject;

    /**
     * Return resource adapter set.
     *
     * @return array
     */
    public function get()
    {
        $schemeCollection = new SchemeCollection;
        $pageAdapter = new AppAdapter($this->injector, $this->appName, 'Resource\Page');
        $appAdapter = new AppAdapter($this->injector, $this->appName, 'Resource\App');
        $schemeCollection->scheme('page')->host('self')->toAdapter($pageAdapter);
        $schemeCollection->scheme('app')->host('self')->toAdapter($appAdapter);

        return $schemeCollection;
    }
}
