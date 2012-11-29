<?php

/**
 * A plugin for Omeka that adds Google Analytics code to your page.
 *
 * @package   Google Analytics
 * @author    Dave Widmer <dwidmer@bgsu.edu>
 */
class GoogleAnalyticsPlugin extends Omeka_Plugin_AbstractPlugin
{
	/**
	 * @var array  Plugin hooks
	 */
	protected $_hooks = array('install','uninstall','config','config_form', 'public_footer');

	/**
	 * @var array  Plugin options
	 */
	protected $_options = array(
		'ga_tracking_id' => ""
	);

	/**
	 * Installation hook.
	 */
	public function hookInstall()
	{
		$this->_installOptions();
	}

	/**
	 * Uninstalls any options that have been set.
	 */
	public function hookUninstall()
	{
		$this->_uninstallOptions();
	}

	/**
	 * Set the options from the Config form.
	 */
	public function hookConfig()
	{
		foreach (array_keys($this->_options) as $key)
		{
			set_option($key, trim($_POST[$key]));
		}
	}

	/**
	 * Displays the configuration form.
	 */
	public function hookConfigForm()
	{
		require dirname(__FILE__) . DIRECTORY_SEPARATOR . 'views'. DIRECTORY_SEPARATOR . 'config_form.php';
	}

	/**
	 * The hook that adds the google analytics code to your website, as long as
	 * the tracking code is set.
	 *
	 * @param  array $args  Plugin hook arguments (in this case the view)
	 */
	public function hookPublicFooter($args)
	{
		$tracking_id = get_option('ga_tracking_id');

		if ( ! empty($tracking_id))
		{
			ob_start();
			include dirname(__FILE__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'tracking_code.php';
			echo ob_get_clean(); // I wish this was a return instead of a direct echo, but ohs well...
		}
	}

}
