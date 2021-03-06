<?php



use Illuminate\Support\Facades\Schema;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;



class CreateProductsTable extends Migration

{

    /**

     * Run the migrations.

     *

     * @return void

     */

    public function up()

    {

        Schema::create('products', function(Blueprint $tabla){

            $tabla->increments('id');



            $tabla ->integer('user_id')->unsigned()->index();

            $tabla ->string('title');

            $tabla ->string('category');
            $tabla->integer('category_id')->unsigned();
            $tabla->foreign('category_id')->references('id')->on('categories');

            $tabla ->text('description');

            $tabla ->decimal('pricing',9,2);

            $tabla->string('extension')->nullable();
            $tabla->string('codigo_proveedor')->nullable();

            $tabla ->timestamps();

        });

    }



    /**

     * Reverse the migrations.

     *

     * @return void

     */

    public function down()

    {

       

    }

}

