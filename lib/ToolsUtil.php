<?php

/**
 * Description of ToolsUtil
 *
 * @author yangguofeng
 */
class ToolsUtil {

    public static function env($key, $default = null) {
        $value = getenv($key);
        if ($value === false) {
            return $default;
        }
        return $value;
    }

}
