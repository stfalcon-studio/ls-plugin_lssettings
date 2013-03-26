<?php

if (!class_exists('Plugin')) {
    die('Hacking attemp!');
}

class PluginLssettings extends Plugin
{
    /**
     * Активация плагина
     *
     * @return boolean
     */
    public function Activate()
    {
        $this->Cache_Clean();
        if (!$this->isTableExists('prefix_configset')) {
            $result = $this->ExportSQL(dirname(__FILE__) . '/activate.sql');
            return $result['result'];
        }

        return false;
    }

    /**
     * Инициализация плагина
     *
     * @return void
     */
    public function Init()
    {

    }

    /**
     * Деактивация плагина
     *
     * @return boolean
     */
    public function Deactivate()
    {
        $this->Cache_Clean();
        return true;
    }

}