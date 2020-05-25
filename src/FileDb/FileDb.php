<?php


namespace adrianschubek\FileDb;


use adrianschubek\FileDb\Exceptions\TableNotFound;

class FileDb
{
    private string $dirpath;

    public function __construct(string $dirpath)
    {
        if (!is_dir($dirpath)) mkdir($dirpath);
        $this->dirpath = $dirpath;
    }

    public function rawDecode(string $table): string
    {
        $filepath = $this->dirpath . DIRECTORY_SEPARATOR . $table;
        if (!file_exists($filepath)) {
            throw new TableNotFound();
        }
        return file_get_contents($filepath);
    }

    public function rawEncode(string $table, string $data)
    {
        $filepath = $this->dirpath . DIRECTORY_SEPARATOR . $table;
        file_put_contents($filepath, $data);
    }
}