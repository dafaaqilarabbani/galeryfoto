<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('alamat')->nullable();
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->enum('role', ['admin', 'users'])->default('users');
            $table->string('password');
            $table->string('url')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        // TRIGGER REKAP INSERT USER
        DB::unprepared('
        CREATE TRIGGER trigger_user_insert
        AFTER INSERT ON users
        FOR EACH ROW
        BEGIN
            DECLARE alamat_value VARCHAR(255);

            -- Set alamat_value ke nilai alamat dari NEW atau KOSONGIN jika NULL
            SET alamat_value = COALESCE(NEW.alamat, "");

        INSERT INTO log_users (users_id, action, username, alamat, keterangan, created_at, updated_at)
        VALUES (NEW.id, "INSERT", NEW.username, alamat_value, "", NOW(), NOW());
        END;
    ');
    //TRIGGER REKAP DELETE USER
    DB::unprepared('
    CREATE TRIGGER trigger_user_delete
    AFTER DELETE ON users
    FOR EACH ROW
    BEGIN
        INSERT INTO log_users (users_id, action, username, alamat, keterangan, created_at, updated_at)
        VALUES (OLD.id, "DELETE", OLD.username, OLD.alamat,  "", NOW(), NOW());
    END;
    ');
    //TRIGGER REKAP UPDATE USER
    DB::unprepared('
    CREATE TRIGGER trigger_user_update
    AFTER UPDATE ON users
    FOR EACH ROW
    BEGIN
        INSERT INTO log_users (users_id, action, username, alamat, keterangan, created_at, updated_at)
        VALUES (NEW.id, "UPDATE", NEW.username,  NEW.alamat,  "", NOW(), NOW());
    END;
');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
