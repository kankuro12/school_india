<?php

$defaults=["asdf","asdfs"];
function def($name)  {
    return \App\Data::data[$name];
}


function getIDPath($id){
      return implode('/', str_split(sprintf("%09d", $id),3));
}