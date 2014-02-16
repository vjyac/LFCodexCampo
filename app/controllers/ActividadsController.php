<?php

class ActividadsController extends BaseController {


   public function search(){

        $term = Input::get('term');

        $actividads = DB::table('actividads')->where('actividad', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($actividads) > 0) {

            foreach ($actividads as $actividad)
                {
                    $adevol[] = array(
                        'id' => $actividad->id,
                        'value' => $actividad->actividad,
                    );
            }
        } else {
                    $adevol[] = array(
                        'id' => 0,
                        'value' => 'no hay coincidencias para ' .  $term
                    );            
        }

        return json_encode($adevol);


    }
   

}
