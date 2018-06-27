<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoadDataFromXml extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $xml = simplexml_load_file(public_path('test.xml'));

        foreach ($xml->dealers->item as $v) {

            $dealer = new App\Dealer();
            $dealer->id = (integer)$v['id'];
            $dealer->name = (string)$v['name'];
            $dealer->code = (string)$v['code'];
            $dealer->site = (string)$v['site'];
            $dealer->save();
        }

        foreach ($xml->sections->item as $v) {

            $section = new App\Section();
            $section->id = (integer)$v['id'];
            $section->parent_id = (integer)$v['parent_id'];
            $section->dealer_id = (integer)$v['dealer_id'];
            $section->name = (string)$v['name'];
            $section->save();
        }

        foreach ($xml->items->item as $v) {

            $item = new App\Item();
            $item->id = (integer)$v['id'];
            $item->section_id = (integer)$v['section_id'];
            $item->name = (string)$v['name'];
            $item->price = (string)$v['price'];
            $item->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
