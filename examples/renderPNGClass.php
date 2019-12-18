<?php

use Nickcheek\Handwriting\Writer;

class renderPNGClass
{
    protected Writer $writer;

    public function __construct()
    {
        $this->writer = new Writer('your_user_key','your_secret_key');
    }

    public function makeImage($text)
    {
        $builder = $this->writer->font()->text($text)->build();
        $this->writer->renderPNGImage($builder);
    }
}

$test = new renderPNGClass();
echo $test->makeImage('This is a new image');
