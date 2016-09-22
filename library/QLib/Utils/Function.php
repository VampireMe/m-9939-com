<?php

/**
 * 公共方法
 *
 * example：
 * <pre>
 *
 * </pre>
 *
 * @name String
 * @version 
 * @package QLib.Utils.Function
 */
class QLib_Utils_Function {

    
    /*
     * 判断是不是移动端访问
     * 
     */
    public static function ismobile() {
        $_SERVER['ALL_HTTP'] = isset($_SERVER['ALL_HTTP']) ? $_SERVER['ALL_HTTP'] : '';
        $mobile_browser = 0;
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|iphone|ipad|ipod|android|xoom|blackberry|googlebot-mobile|iemobile|opera mobile|palmos|webos|ucbrowser|qqbrowser)/i', strtolower($_SERVER['HTTP_USER_AGENT'])))
            $mobile_browser++;
        if ((isset($_SERVER['HTTP_ACCEPT'])) and ( strpos(strtolower($_SERVER['HTTP_ACCEPT']), 'application/vnd.wap.xhtml+xml') !== false))
            $mobile_browser++;
        if (isset($_SERVER['HTTP_X_WAP_PROFILE']))
            $mobile_browser++;
        if (isset($_SERVER['HTTP_PROFILE']))
            $mobile_browser++;
        
        $user_agents =$_SERVER['HTTP_USER_AGENT'];
        $mobile_ua = strtolower(substr($user_agents, 0, 4));
        
        $mobile_agents = array(
            'w3c ', 'acs-', 'alav', 'alca', 'amoi', 'audi', 'avan', 'benq', 'bird', 'blac',
            'blaz', 'brew', 'cell', 'cldc', 'cmd-', 'dang', 'doco', 'eric', 'hipt', 'inno',
            'ipaq', 'java', 'jigs', 'kddi', 'keji', 'leno', 'lg-c', 'lg-d', 'lg-g', 'lge-',
            'maui', 'maxo', 'midp', 'mits', 'mmef', 'mobi', 'mot-', 'moto', 'mwbp', 'nec-',
            'newt', 'noki', 'oper', 'palm', 'pana', 'pant', 'phil', 'play', 'port', 'prox',
            'qwap', 'sage', 'sams', 'sany', 'sch-', 'sec-', 'send', 'seri', 'sgh-', 'shar',
            'sie-', 'siem', 'smal', 'smar', 'sony', 'sph-', 'symb', 't-mo', 'teli', 'tim-',
            'tosh', 'tsm-', 'upg1', 'upsi', 'vk-v', 'voda', 'wap-', 'wapa', 'wapi', 'wapp',
            'wapr', 'webc', 'winw', 'winw', 'xda', 'xda-'
        );
        
        if (in_array($mobile_ua, $mobile_agents))
            $mobile_browser++;
        if (strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false)
            $mobile_browser++;
        // Pre-final check to reset everything if the user is on Windows  
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows') !== false)
            $mobile_browser = 0;
        // But WP7 is also Windows, with a slightly different characteristic  
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']), 'windows phone') !== false)
            $mobile_browser++;
        
        return $mobile_browser>0;
    }
    
    /*
     * 判断是不是移动端访问
     * 
     */
    public static function getuseragent() {
        $user_agents =$_SERVER['HTTP_USER_AGENT'];
//        var_dump($user_agents);
        if(stripos($user_agents,"UCBrowser")||stripos($user_agents,"ucweb")) 
            return 'uc';
        else if(stripos($user_agents,"Chrome")) 
            return "google"; 
        else if(stripos($user_agents,"Safari")) 
            return "safari"; 
        else if(stripos($user_agents,"Opera")) 
            return "opera"; 
        else 
            return $user_agents;  
    }

}