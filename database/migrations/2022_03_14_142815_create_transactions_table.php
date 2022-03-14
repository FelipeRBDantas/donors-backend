<?php

use App\Models\Account;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Account::class);
            $table->uuid('uuid');
            $table->enum('donation_interval', ['ÚNICO', 'BIMESTRAL', 'SEMESTRAL', 'ANUAL']);
            $table->string('donation_amount');
            $table->enum('form_of_payment', ['DÉBITO', 'CRÉDITO']);
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
        Schema::dropIfExists('transactions');
    }
}
