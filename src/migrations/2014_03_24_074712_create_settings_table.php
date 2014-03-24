<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatesettingsTable extends Migration {

		/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('key', 255)->unique()->index();
			$table->string('value', 255);
			$table->string('group', 255);
			$table->timestamps();
		});

		$settings = array(
			array('key' => 'site_title', 'value' => 'Laravel Backoffice plugin', 'group' => 'general'),
			array('key' => 'email_contact', 'value' => 'arnaud.amant@gmail.com', 'group' => 'general'),
			array('key' => 'profil_facebook', 'value' => 'http://facebook.com', 'group' => 'reseau_sociaux'),
			array('key' => 'profil_twitter', 'value' => 'http://twitter.com', 'group' => 'reseau_sociaux'),
		);

		DB::table('settings')->insert($settings);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('settings');
	}

	public function afterCreate()
	{

	}

}
