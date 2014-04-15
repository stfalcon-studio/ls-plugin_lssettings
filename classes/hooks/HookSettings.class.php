<?php

/**
 * PluginLsgallery_HookGallery
 *
 * Hooks for gallery
 */
class PluginLssettings_HookSettings extends Hook
{
    /**
     * Register hooks
     */
    public function RegisterHook()
    {
        $this -> AddHook ('lang_init_start', 'LangInitStart', __CLASS__, PHP_INT_MAX); //init config
    }

    public function LangInitStart()
    {
        $this->PluginLssettings_Config_ApplyConfigData();
    }
}