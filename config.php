<?php

foreach (glob('config/*.php') as $file) {
    require_once $file;
}
