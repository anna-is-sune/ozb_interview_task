<?php
namespace App\Utilities;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;

class ImageOptimiser
{
    private const MAX_WIDTH = 200;
    private const MAX_HEIGHT = 150;

    private $imagine;

    private int $targetWidth;
    private int $targetHeight;

    public function __construct(int $width = self::MAX_WIDTH, int $height = self::MAX_HEIGHT)
    {
        $this->imagine = new Imagine();
        $this->targetWidth = $width;
        $this->targetHeight = $height;
    }

    public function resize(string $source, string $target): array
    {
        list($iwidth, $iheight) = getimagesize($source);
        $ratio = $iwidth / $iheight;
        $width = $this->targetWidth;
        $height = $this->targetHeight;
        if ($width / $height > $ratio) {
            $width = $height * $ratio;
        } else {
            $height = $width / $ratio;
        }

        $photo = $this->imagine->open($source);
        $photo->resize(new Box($width, $height))->save($target);

        return [$width, $height];
    }
}