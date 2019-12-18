<?php


namespace Nickcheek\Handwriting;


class Builder
{
    protected string $url;
    protected string $text;
    protected string $font;
    protected string $size;
    protected string $color;
    protected string $width;
    protected string $height;
    protected string $lineSpace;
    protected string $randomSeed;
    protected string $lineSpaceVariance;
    protected string $wordSpaceVariance;

    public function __construct()
    {
        $this->font = 'handwriting_id=2D5QW0F80001';
        $this->text ??= '&text=test';
        $this->height = '&height=auto';
        $this->width = '';
        $this->size = '';
        $this->lineSpace = '';
        $this->lineSpaceVariance='';
        $this->wordSpaceVariance = '';
        $this->randomSeed = '';
        $this->color = '';
    }

    public function build(): string
    {
        $this->url = $this->font.$this->text.$this->width.$this->height.$this->size.$this->lineSpace.$this->lineSpaceVariance.$this->wordSpaceVariance.$this->randomSeed.$this->color;
        return $this->url;
    }

    public function font($handwriting_id='2D5QW0F80001'): object
    {
        $this->font = 'handwriting_id='.$handwriting_id;
        return $this;
    }

    public function text($text): object
    {
        $this->text = '&text=' . $text;
        return $this;
    }

    public function width($width): object
    {
        $this->width = '&width=' . $width;
        return $this;
    }

    public function height($height): object
    {
        $this->height = '&height=' . $height;
        return $this;
    }

    public function size($size): object
    {
        $this->size = '&handwriting_size=' . $size;
        return $this;
    }

    public function lineSpace($lineSpace): object
    {
        $this->lineSpace = '&line_spacing=' . $lineSpace;
        return $this;
    }

    public function lineSpaceVariance($lineSpaceVariance): object
    {
        $this->lineSpaceVariance = '&line_spacing_variance=' . $lineSpaceVariance;
        return $this;
    }

    public function wordSpaceVariance($wordSpace): object
    {
        $this->wordSpaceVariance = '&word_spacing_variance=' . $wordSpace;
        return $this;
    }

    public function randomSeed($seed): object
    {
        $this->randomSeed = '&random_seed=' . $seed;
        return $this;
    }

    public function color($color): object
    {
        $this->color = '&handwriting_color=' . $color;
        return $this;
    }

}
