<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('video_url')->nullable();
            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropColumn('video_url');
        $this->dropColumn('published_at');
    }

    private function dropColumn(string $column_name)
    {
        if(Schema::hasColumn('posts',$column_name)){
            Schema::table('posts', function (Blueprint $table) use ($column_name) {
                $table->dropColumn($column_name);
            });
        }
    }
}
