<?php
 use yii\db\Schema;
   use yii\db\Migration;

   
   class m160713_082518_test_table extends Migration {
      public function up() {
         $this->createTable("user", [
            "id" => Schema::TYPE_PK,
            "name" => Schema::TYPE_STRING,
            "email" => Schema::TYPE_STRING,
         ]);
         $this->batchInsert("user", ["name", "email"], [
            ["User1", "user11@gmail.com"],
            ["User2", "user22@gmail.com"],
            ["User3", "user33@gmail.com"],
            ["User4", "user44@gmail.com"],
            ["User5", "user55@gmail.com"],
            ["User6", "user66@gmail.com"],
            ["User7", "user77@gmail.com"],
            ["User8", "user88@gmail.com"],
            ["User9", "user99@gmail.com"],
            ["User10", "user1010@gmail.com"],
            ["User11", "user1111@gmail.com"],
         ]);
      }
      public function down() {
         //$this->dropTable('user');
      }
   
}
