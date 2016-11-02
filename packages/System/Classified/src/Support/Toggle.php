<?php


namespace System\Classified\Support;

use Illuminate\Http\Request;

trait Toggle
{
    public function toggle(Request $request)
    {
        if( ! empty($this->class_toggle)) {
            $id = $request->input('id');
            $item = call_user_func_array($this->class_toggle. '::findOrFail', [$id]);

            $property = $request->input('property', null);

            if ($item->$property == 1 || $item->$property == 0) {
                if ($item->$property == 1) {
                    $item->$property = 0;
                } else {
                    $item->$property = 1;
                }
                $item->save();

                return $item->$property;
            }
        }

        abort(422);
    }
}