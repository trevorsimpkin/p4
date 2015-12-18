<?php
class helpers
{
    public static function addPicture($profile, $fileName)
    {

        if (\Input::hasFile($profile)) {
            if (\Input::file($profile)->isValid()) {
                $destinationPath = public_path('uploads/');
                $extension = \Input::file($profile)->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                \Input::file($profile)->move($destinationPath, $fileName);
            }
        }
        return $fileName;
    }
}