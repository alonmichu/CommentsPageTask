<?php

function connect_mysql(string $hostname, string $usuarios,
                       string $senha, string $bancodedados)
{
    /** The function opens connection with mySQL server.
        * Args:
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        * Returns:
        *     bool|mysqli: false if connection failed.
    */
    $link = mysqli_connect($hostname, $usuarios, $senha, $bancodedados);
    if ($link != false)
    {/*
        print("Error: can't connect to MySQL " . mysqli_connect_error());
    }
    else
    {
        print("Connection succesful");*/
        mysqli_set_charset($link, "utf8");
    }
    return $link;
}

function create_comments_table(string $hostname, string $usuarios,
                               string $senha, string $bancodedados)
{
    /** The function creates new table if it doesn't exists yet 
    * with fielsds id, commentor_name, comment_text and date.
        * Args:
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        * Returns:
        *    bool: if operation was successful or not.
    */
    $link = connect_mysql($hostname, $usuarios, $senha, $bancodedados);
    $result = false;
    if ($link != false)
    {
        $sql = 'CREATE TABLE IF NOT EXISTS Comments (id INT PRIMARY KEY AUTO_INCREMENT,
        comment_date DATETIME NOT NULL, commentor_name NVARCHAR(50) NOT NULL,
        comment_text NVARCHAR(1000) NOT NULL)';
        $result = mysqli_query($link, $sql);
    }
    return $result;
}

function add_comment(string $hostname, string $usuarios, string $senha,
                     string $bancodedados, string $commentor_name, string $comment_text)
{
    /** The function adds new comment to the database.
        * Args:
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        *     commentor_name: string. Customer's name written in a comment.
        *     comment_text: string. Text of a comment.
        * Returns:
        *     bool: if operation was successful or not.
    */
    $link = connect_mysql($hostname, $usuarios, $senha, $bancodedados);
    $result = false;
    if ($link != false)
    {
        //date and time in format 'YYYY-MM-DD hh:mm:ss'
        $comment_date = date("Y-m-d H:i:s");
        $sql = "INSERT Comments(comment_date, commentor_name, comment_text)
        VALUES ('$comment_date', '$commentor_name', '$comment_text')";
        $result = mysqli_query($link, $sql);
    }
    return $result;
}

function show_comments(string $hostname, string $usuarios,
                       string $senha, string $bancodedados)
{
    /** The function returns array of all comments from the database.
        * Args:
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        * Returns:
        *     array|bool: array of comments, false if operation wasn't successful.
    */
    $link = connect_mysql($hostname, $usuarios, $senha, $bancodedados);
    $result = false;
    if ($link != false)
    {
        //date and time in format 'YYYY-MM-DD hh:mm:ss'
        $sql = "SELECT * FROM Comments";
        $result = mysqli_query($link, $sql);
        if ($result != false)
        {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
        }
    }
    return $result;
}

function delete_comment(int $id, string $hostname, string $usuarios,
                        string $senha, string $bancodedados)
{
    /** The function deletes comment by id from the database.
        * Args:
        *     id: int. Id of the comment.
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        * Returns:
        *     bool: if operation was successful or not.
    */
    $link = connect_mysql($hostname, $usuarios, $senha, $bancodedados);
    $result = false;
    if ($link != false)
    {
        $sql = "DELETE FROM Comments WHERE id = $id";
        $result = mysqli_query($link, $sql);
    }
    return $result;
}

function get_comment(int $id, string $hostname, string $usuarios,
                     string $senha, string $bancodedados)
{
    /** The function returns array key-value of comment with the given id.
        * Args:
        *     id: int. Id of the comment.
        *     hostname: string. Host name for db connection.
        *     usuarios: string. User name for db connection.
        *     senha: string. Password for db connection.
        *     bancodedados: string. Database name for db connection.
        * Returns:
        *     array|bool: array of comment information, false if operation wasn't successful.
    */
    $link = connect_mysql($hostname, $usuarios, $senha, $bancodedados);
    $result = false;
    if ($link != false)
    {
        $sql = "SELECT * FROM Comments WHERE id = $id";
        $result = mysqli_query($link, $sql);
        /*if ($result != false)
        {
            $row = mysqli_fetch_array($result);
            return $row;
        }*/
    }
    return $result;
}