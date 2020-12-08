<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->string('profile');
            $table->string('qualifications');
            $table->set('year_experiences', ['Beginner (less than 1 year)', 'First Experience (1-2 years)', 'Experienced (2-5 years)', 'Confirmed (5 years and more)']);
            $table->string('street_address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('contract');
            $table->string('contract_duration')->nullable();
            $table->string('company_name');
            $table->set('sector',['Banking', 'Engineering / Consultancy', 'Finance', 'Industry', 'IT'])->nullable();
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}