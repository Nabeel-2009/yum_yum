<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'booking_time')) {
                $table->dateTime('booking_time');
            }
            if (!Schema::hasColumn('bookings', 'location')) {
                $table->enum('location', ['indoor', 'outdoor'])->default('indoor')->after('booking_time');
            }
            if (!Schema::hasColumn('bookings', 'persons_count')) {
                $table->integer('persons_count')->default(1)->after('location');
            }
        });
        
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('location');
            $table->dropColumn('persons_count');
        });
    }
};
