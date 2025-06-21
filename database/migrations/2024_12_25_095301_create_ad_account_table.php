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
            $table->string('balance');
            $table->string('monthly_budget');
            $table->string('total_spent');
            $table->string('limit');
            $table->string('fb_page_link1');
            $table->string('fb_page_link2');
            $table->string('fb_page_link3');
            $table->string('fb_page_link4');
            $table->string('fb_page_link5');
            $table->string('campaign_start_date');
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
