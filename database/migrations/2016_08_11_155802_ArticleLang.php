<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Support\Facades\DB as DB;

use App\Models\Article;

class ArticleLang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article', function ($table) 
        {
            $table->integer('number_label')
                  ->after('user_id');
            $table->string('lang', 5)
                  ->after('number_label')
                  ->default('en');
        });
        
        DB::statement('UPDATE article SET number_label = id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article', function ($table) 
        {
            $table->dropColumn('number_label');
            $table->dropColumn('lang');
        });
    }
}
