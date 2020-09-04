<?php

class Content
{
    public const IMAGE = "image";
    private $file;
    private $types;
    private $destination;
    private $fileName;
    private $extension;

    public function add(string $name, string $path, array $types, int $size, string $type)
    {
        $this->file = $_FILES[$name];
        $this->types = $types;
        $tempFileName = $this->file["tmp_name"];
        $year = jdate("Y", "", "", "Asia/Tehran", "en");
        $month = jdate("m", "", "", "Asia/Tehran", "en");
        $day = jdate("d", "", "", "Asia/Tehran", "en");
        $this->destination = FILES_PATH . "/$type$path/$year/$month/$day";

        if ($this->file["size"] > ($size * 1024))
            throw new ExceptionUser("فایل نباید بزرگتر از " . (round($size / 1024, 1)) . " مگابایت باشد");

        $this->getExtension();
        $this->createRandomFileName();

        if (!file_exists($this->destination))
            $makeDirStatus = $this->makePath();

        $this->destination = "$this->destination/$this->fileName.$this->extension";

        if (isset($makeDirStatus) and !$makeDirStatus)
            throw new ExceptionUser("مشکلی پیش آمده است لطفا دوباره تلاش کنید");

        if (OPERATION_SYSTEM === "windows")
            $this->destination = str_replace(array("/"), array("\\"), $this->destination);

        if (OPERATION_SYSTEM === "linux")
            $this->destination = str_replace(array("\\"), array("/"), $this->destination);

        $status = move_uploaded_file($tempFileName, $this->destination);

        if (!$status)
            throw new ExceptionUser("مشکلی پیش آمده است لطفا دوباره تلاش کنید2");

        return "/$type$path/$year/$month/$day/$this->fileName.$this->extension";
    }

    private function getExtension()
    {
        $fileName = basename($this->file["name"]);
        $exploded = explode(".", $fileName);
        $valid = false;

        if (strpos($fileName, ".") !== false){

            $this->extension = end($exploded);
            $valid = true;

            if (!in_array(".$this->extension", $this->types))
                $valid = false;
        }

        if (!$valid)
            throw new ExceptionUser("فایل معتبر نمی باشد");
    }

    private function makePath()
    {
        $dirs = explode("/", $this->destination);
        $currentPath = "";
        $valid = file_exists($this->destination);

        foreach ($dirs as $dir){

            $currentPath .= "$dir/";

            if (!file_exists($currentPath))
                $valid = mkdir($currentPath);
        }

        return $valid;
    }

    private function createRandomFileName()
    {
        $this->fileName = round(microtime(true)) * rand(9000, 9999);

        if (file_exists(
            $this->destination . "/" . $this->fileName . "." . $this->extension
        ))
            $this->createRandomFileName();
    }
}