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
//        $data = array(
//            'plugin.lsgallery.aldbum_create_rating' => '5',
//            'plugin.lsgallery.images_new_time' => 60*60*24 ,
//            'plugin.lsgallery.test_array' => array(
//                'first' => 'ok',
//                'second' => 'ok',
//            ),
//        );
//      $this->PluginLssettings_Config_SetConfigData($data);
        $this->PluginLssettings_Config_GetConfigData();
    }
}