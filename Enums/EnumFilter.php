<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class EnumFilter {

  // use $enumoption = General::getEnumValues('table_name','column_name');

    public static function getEnumValues($table, $column) {
      $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type ;
      preg_match('/^enum\((.*)\)$/', $type, $matches);
      $enum = array();

      function array_delete($del_val, $array) {
      if(is_array($del_val)) {
           foreach ($del_val as $del_key => $del_value) {
              foreach ($array as $key => $value){
                  if ($value == $del_value) {
                      unset($array[$key]);
                  }
              }
          }
      } else {
          foreach ($array as $key => $value){
              if ($value == $del_val) {
                  unset($array[$key]);
              }
          }
      }
      return array_values($array);
    }


      foreach( explode(',', $matches[1]) as $value)
      {
        $v = trim( $value, "'" );

        $enum = array_add($enum, $v, $v);

        $enum = array_delete('ADMIN', $enum);
      }

       return $enum;
    }


}
