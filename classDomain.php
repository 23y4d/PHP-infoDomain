<?php


class info {

    const INFO  = '/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i';

    const PREG  = '/\?.*/';

    /**
	 * get ip Url
	 *
	 * @access public
	 * @return static
	 */
    public function hostName($r){

      if ($r!="" ){
                $r = explode('/', $r);
                $r = array_filter($r);
                $r = array_merge($r, array());
                $r = preg_replace(self::PREG, '', $r);
                $endofurl = $r[1];
                $fi = gethostbyname($endofurl);
        echo" IP:<a id='co' href='{$fi}' >{$fi}</a>\r\n";
      } else {
            return false;
        }
    }

    /**
	 * get Dns website
	 *
	 * @access public
	 * @return static
	 */


  public function getDns($u){

  $parse = parse_url($u);
  $domain = isset($parse['host']) ? $parse['host'] : '';

    if (preg_match(self::INFO,$domain,$regs)) {

            $ip = gethostbyname($regs['domain']);
            $ipco   = gethostbyaddr($ip);
            echo "Dns: <a id='co' href='{$ipco}' >{$ipco}</a>";
    } else{
        return false;
     }
 }


}
