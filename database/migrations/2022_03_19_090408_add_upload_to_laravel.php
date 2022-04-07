<?php declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUploadStatusToCrawlUrls extends Migration
{
    /**
     * @var string
     */
    private $table;

    public function __construct()
    {
        $this->table = config('uploadtolaravel.table');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->table, function (Blueprint $table) {
            $table->integer('upload_status')->default(0);
            $table->timestamp('uploaded_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('upload_status', 'uploaded_at')) {
            Schema::table($this->table, function (Blueprint $table) {
                $table->dropColumn('upload_status', 'uploaded_at');
            });
        }
    }
}