<?php
function getParamFromRequest($param){
    return isset($_REQUEST[$param])?$_REQUEST[$param]:null;
}
