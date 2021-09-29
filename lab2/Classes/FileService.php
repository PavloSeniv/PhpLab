<?php

class FileService
{
    const UPLOAD_DIR = 'Files/';

    public static function store($file)
    {
        move_uploaded_file($file['tmp_name'], self::UPLOAD_DIR . $file['name']);

        header("Location: /lab2/table.php?file_name={$file['name']}");
    }

    public function show($name)
    {
        try {
            return $this->parseFile($name);
        } catch (Exception $e) {
            die('Wrong format!');
        }

    }

    public function edit($table, $row)
    {
        try {
            $array = $this->parseFile($table);
            return $array[$row];
        } catch (Exception $e) {
            die('Wrong row or table name');
        }
    }

    public function update($table, $row, $newData)
    {
        $array = $this->parseFile($table);
        $array[$row] = $newData;

        $this->changeFile($table, $array);
        header("Location: /lab2/table.php?file_name=$table");
    }

    public function delete($table, $row)
    {
        $array = $this->parseFile($table);
        unset($array[$row]);
        $this->changeFile($table, $array);
        header("Location: /lab2/table.php?file_name=$table");
    }

    private function parseFile($name)
    {
        $stringToParse = file_get_contents(self::UPLOAD_DIR . $name);
        $array = explode("\n-", $stringToParse);
        foreach ($array as &$value) {
            $value = explode('|', ltrim(rtrim($value)));
        }
        return $array;
    }

    private function changeFile($name, $array)
    {
        foreach ($array as &$value) {
            $value = implode('|', $value);
        }
        $array = implode("\n-\n", $array);
        var_dump($array);
        file_put_contents(self::UPLOAD_DIR . $name, $array);
    }
}