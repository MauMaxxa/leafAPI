<?php
namespace Config;

use Symfony\Component\Console\Application;

class Console {
	private $app;

	public function __construct() {
		$this->app = new Application("Leaf API Framework v1.1.0");

		// Random Commands
		$this->app->add(new \Config\Command\ServerCommand());
		$this->app->add(new \Config\Command\ConsoleCommand());

		// Generate Commands
		$this->app->add(new \Config\Command\GenerateTemplateCommand());
		$this->app->add(new \Config\Command\GenerateMigrationCommand());
		$this->app->add(new \Config\Command\GenerateModelCommand());
		$this->app->add(new \Config\Command\GenerateHelperCommand());
		$this->app->add(new \Config\Command\GenerateControllerCommand());
		$this->app->add(new \Config\Command\GenerateSeedCommand());

		// Delete Commands
		$this->app->add(new \Config\Command\DeleteModelCommand());
		$this->app->add(new \Config\Command\DeleteTemplateCommand());
		$this->app->add(new \Config\Command\DeleteControllerCommand());

		// Database Commands
		$this->app->add(new \Config\Command\DatabaseMigrationCommand());
		$this->app->add(new \Config\Command\DatabaseRollbackCommand());
		$this->app->add(new \Config\Command\DatabaseSeedCommand());
	}

	/**
	 * Register a custom command
	 * 
	 * @param Symfony\Component\Console\Command\Command $command: Command to run
	 * 
	 * @return void
	 */
	public function registerCustom($command) {
		$this->app->add($command);
	}

	/**
	 * Run the console app
	 */
	public function run() {
		$this->app->run();
	}
}