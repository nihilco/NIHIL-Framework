<?php

function create($class, $attibutes = [], $count = null)
{
    return factory($class, $count)->create($attibutes);
}

function make($class, $attibutes = [], $count = null)
{
    return factory($class, $count)->make($attibutes);
}