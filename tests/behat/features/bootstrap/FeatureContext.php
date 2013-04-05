<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\MinkExtension\Context\MinkContext,
    Behat\Mink\Exception\ExpectationException,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

$sDirRoot = dirname(realpath((dirname(__FILE__)) . "/../../../../../"));
set_include_path(get_include_path().PATH_SEPARATOR.$sDirRoot);

require_once("tests/behat/features/bootstrap/BaseFeatureContext.php");

/**
 * LiveStreet custom feature context
 */
class FeatureContext extends MinkContext
{
    protected $pluginName = 'lssettings';

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
        $this->useContext('base', new BaseFeatureContext($parameters));
    }

    public function getEngine() {
        return $this->getSubcontext('base')->getEngine();
    }

    /**
     * @Then /^save config data:$/
     */
    public function saveConfigData(TableNode $table)
    {
        $data = array();
        foreach ($table->getHash() as $genreHash) {
            $data[$genreHash['key']] = $genreHash['value'];
        }

        $this->getEngine()->PluginLssettings_Config_SetConfigData($data);
    }

    /**
     * @Then /^save config data array$/
     */
    public function saveConfigDataArray()
    {
        $data = array(
            'block.rule_people' => array(
                'action' => array()
            )
        );

        $this->getEngine()->PluginLssettings_Config_SetConfigData($data);
    }


}