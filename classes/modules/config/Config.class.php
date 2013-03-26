<?php

class PluginLssettings_ModuleConfig extends Module
{
    protected $oMapper = NULL;
    protected $cacheKey = 'config_data';

    public function Init()
    {
        $this->oMapper = Engine::GetMapper(__CLASS__);
    }

    public function GetConfigData()
    {
        if (!$data = $this->Cache_Get($this->cacheKey)) {
            $data = $this->oMapper->GetGetConfigData();

            //set new cache to 7 days
            $this->Cache_Set($data, $this->cacheKey, array('config'), 604800);
        }

        foreach ($data as $configKey) {
            Config::Set($configKey['configset_key'], $configKey['configset_val']);
        }
    }

    public function SetConfigData($keysData)
    {
        if ($this->oMapper->SetConfigData($keysData)) {
            $this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG, array('config'));
            return true;
        }

        return false;
    }
}