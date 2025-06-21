<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('bm_id');
            $table->string('credit_line');
            $table->string('card_line');
            $table->string('fb_page_link1');
            $table->string('fb_page_link2')->nullable();
            $table->string('fb_page_link3')->nullable();
            $table->string('fb_page_link4')->nullable();
            $table->string('fb_page_link5')->nullable();
            $table->string('website_link1');
            $table->string('website_link2')->nullable();
            $table->string('monthly_budget');
            $table->string('campaign_start_date')->nullable();
            $table->float('balance')->default(0.00);
            $table->float('total_spent')->default(0.00);
            $table->float('limit')->default(0.00);
            $table->tinyInteger('status')->default(2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ad_accounts');
    }
}
