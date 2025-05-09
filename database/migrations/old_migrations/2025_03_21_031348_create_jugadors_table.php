    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up()
        {
            Schema::create('jugadores', function (Blueprint $table) {
                $table->id();
                $table->string('nombre');
                $table->integer('edad');
                $table->string('posicion');
                $table->decimal('puntos_por_partido', 5, 2);
                $table->timestamps();
            });
        }
        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('jugadores');
        }
    };

