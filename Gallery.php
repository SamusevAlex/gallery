<?php

class Gallery {

    private $dirPath;
    private $dirFile;

    public function __construct($dirPath) {
        if (!is_dir($dirPath)) {
            throw new Exception("No directory match");
        }
        $this->dirPath = $dirPath;
        $this->dirFile = scandir($this->dirPath);
    }

    function GalleryOutPut($sliceSize = 5, $gifSlice = false) {
        foreach ($this->dirFile as $fileName) {
            if (preg_match("/\.gif$|\.png$|\.jpg$/u", $fileName)) {
                $imgSize = getimagesize($this->dirPath . "\\" . $fileName);
                $Slice = $gifSlice ? true : !preg_match("/\.gif$/u", $fileName);
                if ($Slice) {
                    $wigth = (int) ($imgSize[0] / $sliceSize);
                    $heigth = (int) ($imgSize[1] / $sliceSize);
                } else {
                    $wigth = $imgSize[0];
                    $heigth = $imgSize[1];
                }
                echo "<div><a href='$this->dirPath\\$fileName' target='_blank'><img src='$this->dirPath\\$fileName' alt='$fileName' width='$wigth' height='$heigth'></a></div><br>\n";
                echo "<p>", $this->OnlyName($fileName), "</p><br>";
            }
        }
    }

    private function OnlyName($fileName) {
        if (is_string($fileName)) {
            preg_match_all("/.+(?=\.\w+$)/u", $fileName, $row);
            return $row[0][0];
        } else {
            throw new Exception("It's must bee a string");
        }
    }

}
