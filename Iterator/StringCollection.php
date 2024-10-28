<?php

namespace Iterator;

require_once 'StringIterator.php';

interface StringCollection
{
    public function getIterator(): StringIterator;
}
