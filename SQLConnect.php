<?php

class SQLConnect {

    static function CheckUser($user, $password) {
        $sql = "Select Password From login Where Login = \"$user\"";
        $result = self::SQLQuery($sql);
        $row = mysql_fetch_row($result);
        if ($password === $row[0]) {
            return TRUE;
        } else {
            return false;
        }
    }
    static function addUser($user, $password) {
        $sql = "Select Password From login Where Login = \"$user\"";
        $result = self::SQLQuery($sql);
        $row = mysql_fetch_row($result);
        if (empty($row)) {
            $sqladd = "Insert Into login (Login, Password) Value (\"$user\", \"$password\")";
            return self::SQLQuery($sqladd);
        } else {
            return false;
        }
    }

    static private function SQLQuery($sql) {
        $connect = mysql_connect("localhost", "root", "");
        if (!$connect) {
            throw new Exception("<b>Can't connect to DB, try later</b>");
        }
        mysql_select_db("gallerylogin", $connect);
        $result = mysql_query($sql);
        mysql_close($connect);
        return $result;
    }

}
