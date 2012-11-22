<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Kill Karacter
 *
 * @package			Kill Karacter
 * @version			1.0.0
 * @author			Sam Sullivan <@samsull>
 * @copyright		Copyright (c) 2012 Sam Sullivan
 * @license			MIT  http://opensource.org/licenses/mit-license.php
 * @link			http://sparkloop.com/samsull
 */
 
/**
 * Kill Karacter - Plugin
 */

$plugin_info = array(
	'pi_name'			=> 'kill Karacter',
	'pi_version'		=> '1.0.0',
	'pi_author'			=> 'Sam Sullivan',
	'pi_author_url'		=> 'http://sparkloop.com',
	'pi_description'	=> 'Remove single characters from text',
	'pi_usage'			=> Kill_Karacter::usage()
);

class Kill_karacter {

	public $return_data;

	// --------------------------------------------------------------------

	/**
	 * Constructor
	 */

 	public function __construct()
    {
        $this->EE =& get_instance();
	}

	/**
     * Cut
     *
     * This function slices & dices text based on characters.d
     * Also adds a <br> tag to the end except for the last item.
     *
     * @access		public
     * @return		string
     */
	public function kill() {

		$data 	= $this->EE->TMPL->tagdata;
		$chars 	= $this->EE->TMPL->fetch_param('chars');

		$removed = "";

		$results = str_replace($chars, $removed, $data);
		
		if ($chars == FALSE) 
		{
			return 'You forgot to set the character paramater.';
		}
		else
		{
			return $results;
		}
	}
	
	// --------------------------------------------------------------------

	/**
     * Usage
     *
     * This function describes how the plugin is used.
     *
     * @access		public
     * @return		string
     */
    public static function usage()
    {
        ob_start();
?>

	Parameter: chars (required)

	Example:

	{exp:kill_karacter:kill chars=","}Too many commas, in this,.{/exp:kill_karacter:kill}

	Will give:

Too many commas in this.


    <?php
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
    // END
}


/* End of file pi.kill_Karacter.php */
/* Location: /system/expressionengine/third_party/kill_Karacter/pi.kill_Karacter.php */