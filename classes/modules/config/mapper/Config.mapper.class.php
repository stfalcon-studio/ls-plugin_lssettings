<?php

class PluginLssettings_ModuleConfig_MapperConfig extends Mapper
{
    public function GetGetConfigData()
    {
        $sql = "SELECT
                    *
                FROM
                " . Config::Get('db.table.configset') . "
                ";

        if ($aRows = @$this->oDb->select($sql)) {
            foreach ($aRows as $index => &$data) {
                if ($data['configset_keytype'] == 'array') {
                    try {
                        $data['configset_val'] = unserialize($data['configset_val']);
                    } catch (Exception $e) {
                        unset($aRows[$index]);
                    }
                }
            }

            return $aRows;
        }

        return array();
    }

    public function SetConfigData($keysData)
    {
        $list = array();
        foreach ($keysData as $index => &$sKey) {
            $sType = 'string';
            if (is_array($sKey)) {
                $sType = 'array';
                $sKey = serialize($sKey);
            }
            $sKey = $this->oDb->escape($sKey);
            $list[] = "('{$index}', {$sKey}, '{$sType}')";
        }

        $query = implode(',', $list);
        $sql = "REPLACE INTO
            " . Config::Get('db.table.configset') . "
                VALUES {$query} ";

        if ($this->oDb->query($sql)) {

            return true;
        }

        return false;
    }

    public function ClearConfigData($keysList) {
        $sql = "DELETE FROM " . Config::Get('db.table.configset') . "
                WHERE configset_key IN (?a)";

        if ($this->oDb->query($sql, $keysList)) {
            return true;
        }
    }
}