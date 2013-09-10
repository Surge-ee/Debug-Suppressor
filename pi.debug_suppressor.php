<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ExpressionEngine - by EllisLab
 *
 * @package		ExpressionEngine
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2003 - 2011, EllisLab, Inc.
 * @license		http://expressionengine.com/user_guide/license.html
 * @link		http://expressionengine.com
 * @since		Version 2.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Debug Suppressor Plugin
 *
 * @package		ExpressionEngine
 * @subpackage	Addons
 * @category	Plugin
 * @author		Digital Surgeons
 * @link		http://www.digitalsurgeons.com
 */

$plugin_info = array(
	'pi_name'		=> 'Debug Suppressor',
	'pi_version'	=> '0.1.0',
	'pi_author'		=> 'Digital Surgeons',
	'pi_author_url'	=> 'http://www.digitalsurgeons.com',
	'pi_description'=> 'Supresses template debugger and profiler regardless of the control panel setting. Useful for rss pages and the like.',
	'pi_usage'		=> Debug_suppressor::usage()
);


class Debug_suppressor {

	public $return_data;

	/**
	 * Constructor
	 */
	public function __construct() {

		// Get global EE.
		$this->EE =& get_instance();

		// Disable template debugging.
		$this->EE->TMPL->debugging = false;

		// Disable output profiler
		$this->EE->output->enable_profiler(false);

	}

	// ----------------------------------------------------------------

	/**
	 * Plugin Usage
	 */
	public static function usage() {
		ob_start();
?>
{exp:debug_suppressor}
<?php
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}
}


/* End of file pi.debug_suppressor.php */
/* Location: /system/expressionengine/third_party/debug_suppressor/pi.debug_suppressor.php */
